<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Announcements;
use App\Models\Courses;
use App\Models\DocumentRequests;
use App\Models\Documents;
use App\Models\GradeEvaluationRequests;
use App\Models\GradeLevels;
use App\Models\StudentGrade;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\RegisterMail;
use App\Models\ActivityStreams;
use App\Models\Advisories;
use App\Models\DocumentPurposes;
use Illuminate\Support\Facades\Mail;


class StudentsController extends Controller
{

    // ============================================================ RESET PASSWORD ===================================================================================

    public function showStudentsResetForm(){
        return view('student.reset');
    }

    public function reset(Request $request){

        $request->validate([
            "email" => 'required|max:255',
        ]);
        if (Students::where('email', '=', $request->get("email"))->count() > 0) {
            $chars = "abcdefghijkmnopqrstuvwxyz023456789";
                        srand((double)microtime()*1000000);
                        $i = 0;
                        $pass = '' ;
                        while ($i <= 7) {
                            $num = rand() % 33;
                            $tmp = substr($chars, $num, 1);
                            $pass = $pass . $tmp;
                            $i++;
                        }
            $temp = bcrypt($pass);

            Students::where('email', '=', $request->email)->update(['password' => $temp]);
            Mail::to($request->email)->send(new RegisterMail($pass));
            return redirect('/login/students')->with('success', 'Email has been sent!');
        }
        else{
            return redirect()->back()->with('message', 'Email is not found!');
        }
    }

    // ============================================================ ANNOUNCEMENTS ===================================================================================

    public function home(){

        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  now())->update(['status' => '2']);

        $announcement = DB::table('announcements')
            ->where('deleted', '=', NULL)
            ->where('status', '=', 1)
            ->where('privacy', '=', 2)
            ->where('approval', '=', 2)
            ->where('is_event', '=', NULL)
            ->first();
        if(is_null($announcement)) {
            $announcement = NULL;
        } else {
            $matchThese = ['deleted' => NULL, 'status' => 1, 'approval' => 2, 'privacy' => 2, 'is_event' => NULL];
            $announcement = Announcements::where($matchThese)->orderBy
            ('created_at', 'desc')->get();
        }

        $reminder =  DB::table('announcements')
        ->where('deleted', '=', NULL)
        ->where('privacy', '=', 2)
        ->where('status', '=', 1)
        ->where('is_event', '=', 2)
        ->first();
        if(is_null($reminder)) {
            $reminder = NULL;
        } else {
            $matchThese = ['deleted' => NULL, 'privacy' => 2, 'status' => 1,  'is_event' => 2];
            $reminder = Announcements::where($matchThese)->orderBy
            ('created_at', 'desc')->get();
        }
        $viewShareVars = array_keys(get_defined_vars());
        return view('student.home',compact($viewShareVars));
    }

    public function seeAnnouncement($id){
        $view = Announcements::where('deleted', '=', null)->findOrFail($id);
        return view('student.viewAnnouncement', compact('view'));
    }

    
    // ============================================================ ACTIVITY STREAM ===================================================================================

    public function activitystream(){
        ActivityStreams::where('deleted', '=', NULL)->where('expired_at', '<',  now())->update(['status' => '2']);

        $announcement = DB::table('activity_streams')
            ->where('deleted', '=', NULL)
            ->where('status', '=', 1)
            ->where('gradelevel_id', '=', Auth::user()->gradelevel_id)
            ->where('course_id', '=', Auth::user()->course_id)
            ->where('section_id', '=', Auth::user()->section_id)
            ->first();
        if(is_null($announcement)) {
            $announcement = NULL;
        } else {
            $matchThese = ['deleted' => NULL, 'status' => 1, 'gradelevel_id' => Auth::user()->gradelevel_id, 'course_id' => Auth::user()->course_id, 'section_id' => Auth::user()->section_id];
            $announcement = ActivityStreams::where($matchThese)->orderBy
            ('created_at', 'desc')->get();
        }

        return view('student.activitystream',compact('announcement'));
    }

    // ============================================================ PROFILE ===================================================================================

    public function profile(){
        $student = Students::where('id', '=', Auth::user()->id)->first();
        $address = Addresses::where('id', '=', Auth::user()->address_id)->first();
        return view('student.profile', compact('student', 'address'));
    }

    public function profileupdate(Request $request, Students $student, Addresses $address){
        $ownid=Auth::user()->id;
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'suffix' => 'nullable|max:255',
            "username" => 'nullable|max:255|unique:students,username,' . $ownid,
            "phone_number" => 'nullable|numeric',
            "email" => 'required|email:rfc,dns|email|unique:students,email,' . $ownid,
            "gender" => 'nullable',
        ]);
        $validated['updated_at'] = now();
        $student->update($validated);

        $validated = $request->validate([
            "street" => 'nullable|regex:/^[a-z A-Z0-9]+$/u|max:255',
            "village" => 'nullable|regex:/^[a-z A-Z0-9]+$/u|max:255',
            "city" => 'nullable|alpha|max:255',
            "zip_code" => 'nullable|numeric', 
        ]);
        $validated['updated_at'] = now();
        $address->update($validated);

        return back()->with('success', 'Profile has been edited successfully');
    }


    // ============================================================ GRADES ===================================================================================  
    public function grades(){
        $cardprint = Advisories::where('course_id', '=', Auth::user()->course_id)->where('section_id', '=', Auth::user()->section_id)->where('deleted', '=', NULL)->where('active', '=', null)->first();
        // $cardprintprevious11 = Advisories::where('gradelevel_id', '=', 1)->where('course_id', '=', Auth::user()->course_id)->where('section_id', '=', Auth::user()->section_id)->where('deleted', '=', NULL)->where('active', '=', null)->first();
        // $cardprintlatest12 = Advisories::where('gradelevel_id', '=', 2)->where('course_id', '=', Auth::user()->course_id)->where('section_id', '=', Auth::user()->section_id)->where('deleted', '=', NULL)->where('active', '=', null)->first();
        $allsubjects = StudentGrade::where('student_id', '=', Auth::user()->id)->where('deleted', '=', NULL)->get();
        $grade11 = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade11firstsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade11firstsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade11firstsemunreleased = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->where(function($q){$q->where('isReleased', NULL)->orWhere('isReleased', 1);})->get();
        $grade11secondsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade11secondsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade11secondsemunreleased = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->where(function($q){$q->where('isReleased', NULL)->orWhere('isReleased', 1);})->get();
        $grade12 = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade12firstsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade12firstsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade12firstsemunreleased = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->where(function($q){$q->where('isReleased', NULL)->orWhere('isReleased', 1);})->get();
        $grade12secondsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade12secondsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade12secondsemunreleased = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->where(function($q){$q->where('isReleased', NULL)->orWhere('isReleased', 1);})->get();
        $gradeEvalCount = GradeEvaluationRequests::where('deleted', '=', null)->where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=',  Auth::user()->gradelevel_id)->where('course_id', '=',  Auth::user()->course_id)->where('section_id', '=',  Auth::user()->section_id)->get();
        return view('student.grading.dashboard', compact('allsubjects', 'grade11', 'grade11firstsem', 'grade11firstsemungraded', 'grade11secondsem', 'grade11secondsemungraded', 
                        'grade12', 'grade12firstsem', 'grade12firstsemungraded', 'grade12secondsem', 'grade12secondsemungraded', 'cardprint', 'grade11firstsemunreleased', 'grade11secondsemunreleased',
                        'grade12firstsemunreleased', 'grade12secondsemunreleased', 'gradeEvalCount'));

    }

    public function vieweval($id){
        $data = GradeEvaluationRequests::where('deleted', '=', null)->findOrFail($id);
        return view('student.grading.vieweval', ['gradeevaluationrequest' => $data]);
    }

    public function gradeeval(){
        $stuid = Auth::user()->id;
        $gradeevaluationrequests = GradeEvaluationRequests::where('deleted', '=', null)->where('student_id', '=', $stuid)->get();
        return view('student.grading.gradeeval', compact('gradeevaluationrequests'));
    }

    public function gradeevalreqModal($student_id, $gradelevel_id, $course_id, $section_id, $semester_id, $faculty_id, $subject_id){
        return view('student.grading.gradeEvalModal', compact('student_id', 'gradelevel_id', 'course_id', 'section_id', 'semester_id', 'faculty_id', 'subject_id'));
    }

    public function gradeevalreq(Request $request){
        $validated = $request->validate([
            'reason' => 'required',
        ]);
        $gradeevalrequest = new GradeEvaluationRequests();
        $gradeevalrequest->student_id =  $request->get('student_id');
        $gradeevalrequest->gradelevel_id = $request->get('gradelevel_id');
        $gradeevalrequest->course_id = $request->get('course_id');
        $gradeevalrequest->section_id = $request->get('section_id');
        $gradeevalrequest->semester_id = $request->get('semester_id');
        $gradeevalrequest->faculty_id = $request->get('faculty_id');
        $gradeevalrequest->subject_id = $request->get('subject_id');
        $gradeevalrequest->reason = $request->get('reason');
        $gradeevalrequest->save();
        return redirect()->back()->with('success', 'Requested successfully! Please refer to Evaluation Requests page.');
    }

     public function deletegradegradeeval(GradeEvaluationRequests $gradeeval, Request $request, $id){
        // $validated = $request->validate([
        //     'deleted' => ['required'],
        //     'deleted_at' => ['required'],
        // ]);
        // $gradeeval->update($validated);
        // return redirect('/gradeeval')->with('success', 'Grade Evaluation has been deleted successfully!');
        if ($request->ajax()){

            $gradeeval = GradeEvaluationRequests::findOrFail($id);
            if ($gradeeval){
    
                $gradeeval->deleted = 1;
                $gradeeval->deleted_at = now();
                $gradeeval->save();
    
                return response()->json(array('success' => true));
            }
        }
        
    }

     public function deletegradeeval($id){
        $data = GradeEvaluationRequests::where('deleted', '=', null)->findOrFail($id);
        return view('student.grading.deletegradeeval', ['gradeeval' => $data]);
     }

    //  public function printreportcardgrade11(){
    //     $stuid = Auth::user()->id;
    //     $printreportcard = StudentGrade::where('deleted', '=', null)->where('student_id', '=', $stuid)->get();
    //     $grade11 = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('deleted', '=', NULL)->get();
    //     $grade11firstsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
    //     $grade11firstsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
    //     $grade11secondsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
    //     $grade11secondsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
    //     $pdf = app('dompdf.wrapper');
    //     $pdf->getDomPDF()->set_option("enable_php", true);
    //     $pdf->loadView('student.pdf', compact('printreportcard', 'grade11', 'grade11firstsem', 'grade11firstsemungraded', 'grade11secondsem', 'grade11secondsemungraded'));
    //     return $pdf->download('Grade 11 report card.pdf');
    //  }

    //  public function printreportcardgrade12(){
    //     $stuid = Auth::user()->id;
    //     $printreportcard = StudentGrade::where('deleted', '=', null)->where('student_id', '=', $stuid)->get();
    //     $grade12 = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('deleted', '=', NULL)->get();
    //     $grade12firstsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
    //     $grade12firstsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
    //     $grade12secondsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
    //     $grade12secondsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
    //     $pdf = app('dompdf.wrapper');
    //     $pdf->getDomPDF()->set_option("enable_php", true);
    //     $pdf->loadView('student.pdf2', compact('printreportcard', 
    //     'grade12', 'grade12firstsem', 'grade12firstsemungraded', 'grade12secondsem', 'grade12secondsemungraded'));
    //     return $pdf->download('Grade 12 report card.pdf');
    //  }

    public function printreportcard(){
        $stuid = Auth::user()->id;
        $printreportcard = StudentGrade::where('deleted', '=', null)->where('student_id', '=', $stuid)->get();
        $grade11 = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade11firstsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade11firstsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade11secondsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade11secondsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade12 = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade12firstsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade12firstsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade12secondsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade12secondsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('student.pdf3', compact('printreportcard', 'grade11', 'grade11firstsem', 'grade11firstsemungraded', 'grade11secondsem', 'grade11secondsemungraded', 
        'grade12', 'grade12firstsem', 'grade12firstsemungraded', 'grade12secondsem', 'grade12secondsemungraded'));
        return $pdf->download('Certificate of Grades.pdf');

    }

    // ============================================================ DOCUMENT REQUEST ===================================================================================   

    public function documentRequest(){
        $stuid = Auth::user()->id;
        $lists = Documents::where('deleted', '=', null)->get();
        $purposes = DocumentPurposes::where('deleted', '=', null)->get();
        $requests = DocumentRequests::where('deleted', '=', null)->where('student_id', '=', $stuid)->get();
        $gradelevel = GradeLevels::where('id', '=', Auth::user()->gradelevel_id)->first();
        $course = Courses::where('id', '=', Auth::user()->course_id)->first();
        return view('student.documentrequest', compact('requests', 'lists', 'gradelevel', 'course', 'purposes'));
    }
    

    public function documentrequestsend(Request $request){
        $request->validate([
            'document_type' => 'required',
            'purpose' => 'required|max:11',
            'file' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);
        $docreq = new DocumentRequests();
        $docreq->document_id = $request->get('document_type');
        $docreq->purpose_id = $request->get('purpose');
        $docreq->student_id =  Auth::user()->id;
        $docreq->gradelevel_id =  Auth::user()->gradelevel_id;
        $docreq->status = 1;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/DocumentRequestFile/',$filename);
            $docreq->file = $filename;
        }   
        $docreq->save();
        return response()->json(array('success' => true));  
    }

     public function deletegraderequest(DocumentRequests $requestdocument, Request $request, $id){
        // $leave = DocumentRequests::where('deleted', '=', null)->findOrFail($id);
        // $leave->deleted = 1;
        // $leave->deleted_at = now();
        // $leave->save();
        // return redirect('/studentrequest')->with('success', 'Your request has been deleted.');
        if ($request->ajax()){

            $requestdocument = DocumentRequests::findOrFail($id);
            if ($requestdocument){
    
                $requestdocument->deleted = 1;
                $requestdocument->deleted_at = now();
                $requestdocument->save();
    
                return response()->json(array('success' => true));
            }
        }
        
    }
    //  public function deleterequest($id){
    //     $data = DocumentRequests::where('deleted', '=', null)->findOrFail($id);
    //     return view('student.requestdelete', ['request' => $data]);
    //  }

     public function viewrequest($id){
        $data = DocumentRequests::where('deleted', '=', null)->findOrFail($id);
        $gradelevel = GradeLevels::where('id', '=', Auth::user()->gradelevel_id)->first();
        $course = Courses::where('id', '=', Auth::user()->course_id)->first();
        return view('student.docreqview', ['docreq' => $data, 'gradelevel' => $gradelevel, 'course' => $course]);
    }


    public function showrequest($id){
        $lists = Documents::where('deleted', '=', null)->get();
        $data = DocumentRequests::where('deleted', '=', null)->findOrFail($id);
        $gradelevel = GradeLevels::where('id', '=', Auth::user()->gradelevel_id)->first();
        $course = Courses::where('id', '=', Auth::user()->course_id)->first();
        return view('student.docreq', ['docreq' => $data, 'gradelevel' => $gradelevel, 'course' => $course, 'lists' => $lists]);
    }

    public function updatedocreq(Request $request, DocumentRequests $docreq){
        $validated = $request->validate([
            'document_id' => ['required'],
            'purpose' => 'required',
        ]);
       $docreq->update($validated);
       return redirect('/studentrequest')->with('success', 'Your request has been updated.');
   }

   public function downloadrequest($file_name) {
        $file_path = public_path('uploads/DocumentRequestFile/'.$file_name);
        return response()->download($file_path);
  }

  public function studentresetshow(){
    return view('student.reset-password');
}

public function studentreset(Request $request){
    $validated = $request->validate([
        'new_password' => 'min:6|required_with:confirm_password|same:confirm_password|max:255',
        'confirm_password' => 'min:6|max:255'
    ]);
    $user = Students::where('id', Auth::user()->id)->first();
    // dd($user);
    $user->password = bcrypt($validated['new_password']);
    $user->save();

    return redirect()->back()->with('alert', 'Password has been updated successfully.');
}  
public function viewfiles($file_name) {
    $file_path = public_path('uploads/DocumentRequestFile/'.$file_name);
    if (file_exists($file_path)) {
        return response()->file($file_path);
    }
    
}

public function viewfileDocuments($id) {
    $requests = DocumentRequests::where('deleted', '=', null)->findOrFail($id);
    $file = $requests->file;
    return view('student.documentrequestPreview', compact('requests'));
}
}