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
use Illuminate\Support\Facades\Mail;


class StudentsController extends Controller
{

    // ============================================================ RESET PASSWORD ===================================================================================

    public function showStudentsResetForm(){
        return view('student.reset');
    }

    public function reset(Request $request){

        $request->validate([
            "email" => ['required'],
        ]);

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
        return redirect()->back()->with('message', 'Email has been sent!');
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
            "first_name" => ['required'],
            "middle_name" => ['required'],
            "last_name" => ['required'],
            "username" => 'nullable|max:255|unique:students,username,' . $ownid,
            "phone_number" => 'nullable|numeric|min:10',
            "email" => 'required|email:rfc,dns|email|unique:students,email,' . $ownid,
            "gender" => ['required'],
        ]);
        $validated['updated_at'] = now();
        $student->update($validated);

        $validated = $request->validate([
            "street" => 'nullable|regex:/^[a-z A-Z0-9]+$/u',
            "village" => 'nullable|regex:/^[a-z A-Z0-9]+$/u',
            "city" => 'nullable|alpha',
            "zip_code" => 'nullable|digits:4', 
        ]);
        $validated['updated_at'] = now();
        $address->update($validated);

        return back()->with('message', 'Profile has been edited Successfully');
    }


    // ============================================================ GRADES ===================================================================================  

    public function grades(){
        $allsubjects = StudentGrade::where('student_id', '=', Auth::user()->id)->where('deleted', '=', NULL)->get();
        $grade11 = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade11firstsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade11firstsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where('midterm', '=', 0)->orWhere('finals', '=', 0)->where('deleted', '=', NULL)->get();
        $grade11secondsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade11secondsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where('midterm', '=', 0)->orWhere('finals', '=', 0)->where('deleted', '=', NULL)->get();
        $grade12 = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade12firstsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade12firstsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where('midterm', '=', 0)->orWhere('finals', '=', 0)->where('deleted', '=', NULL)->get();
        $grade12secondsem = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade12secondsemungraded = StudentGrade::where('student_id', '=', Auth::user()->id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where('midterm', '=', 0)->orWhere('finals', '=', 0)->where('deleted', '=', NULL)->get();
        return view('student.grading.dashboard', compact('allsubjects', 'grade11', 'grade11firstsem', 'grade11firstsemungraded', 'grade11secondsem', 'grade11secondsemungraded', 
                        'grade12', 'grade12firstsem', 'grade12firstsemungraded', 'grade12secondsem', 'grade12secondsemungraded'));

    }

    public function vieweval($id){
        $data = GradeEvaluationRequests::findOrFail($id);
        return view('student.grading.vieweval', ['gradeevaluationrequest' => $data]);
    }

    public function gradeeval(){
        $stuid = Auth::user()->id;
        $gradeevaluationrequests = GradeEvaluationRequests::where('deleted', '=', null)->where('student_id', '=', $stuid)->get();
        return view('student.grading.gradeeval', compact('gradeevaluationrequests'));
    }

    public function gradeevalreq($student_id, $gradelevel_id, $course_id, $section_id, $semester_id, $faculty_id, $subject_id){
        $gradeevalrequest = new GradeEvaluationRequests();
        $gradeevalrequest->student_id = $student_id;
        $gradeevalrequest->gradelevel_id = $gradelevel_id;
        $gradeevalrequest->course_id = $course_id;
        $gradeevalrequest->section_id = $section_id;
        $gradeevalrequest->semester_id = $semester_id;
        $gradeevalrequest->faculty_id = $faculty_id;
        $gradeevalrequest->subject_id = $subject_id;
        $gradeevalrequest->save();
        $gradeevaluationrequests = GradeEvaluationRequests::where('deleted', '=', null)->where('student_id', '=', Auth::user()->id)->get();
        return redirect()->back()->with('alert', 'Requested successfully! Please refer to Evaluation Requests page.');
    }

    public function deletegradegradeeval(Request $request, GradeEvaluationRequests $gradeeval){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $gradeeval->update($validated);
        return redirect('/gradeeval')->with('message', 'Strand has been deleted successfully!');
     }

     public function deletegradeeval($id){
        $data = GradeEvaluationRequests::findOrFail($id);
        return view('student.grading.deletegradeeval', ['gradeeval' => $data]);
     }

    // ============================================================ DOCUMENT REQUEST ===================================================================================   

    public function documentRequest(){
        $stuid = Auth::user()->id;
        $lists = Documents::where('deleted', '=', null)->get();
        $requests = DocumentRequests::where('deleted', '=', null)->where('student_id', '=', $stuid)->get();
        $gradelevel = GradeLevels::where('id', '=', Auth::user()->gradelevel_id)->first();
        $course = Courses::where('id', '=', Auth::user()->course_id)->first();
        return view('student.documentrequest', compact('requests', 'lists', 'gradelevel', 'course'));
    }

    public function documentrequestsend(Request $request){
        $request->validate([
            'document_id' => 'required',
            'purpose' => 'required',
            'file' => 'mimes:doc,docx,docs,pdf|max:2048',
        ]);
        $docreq = new DocumentRequests();
        $docreq->document_id = $request->get('document_id');
        $docreq->purpose = $request->get('purpose');
        $docreq->student_id =  Auth::user()->id;
        $docreq->gradelevel_id =  Auth::user()->gradelevel_id;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/DocumentRequestFile/',$filename);
            $docreq->file = $filename;
        }   
        $docreq->save();
        return redirect()->back()->with('messages', 'New document request was added Successfully');
    }

    public function deletegraderequest($id){
        $leave = DocumentRequests::findOrFail($id);
        $leave->deleted = 1;
        $leave->deleted_at = now();
        $leave->save();
        return redirect('/studentrequest')->with('message', 'Your request has been deleted.');
     }
     public function deleterequest($id){
        $data = DocumentRequests::findOrFail($id);
        return view('student.requestdelete', ['request' => $data]);
     }

     public function viewrequest($id){
        $data = DocumentRequests::findOrFail($id);
        return view('student.docreqview', ['docreq' => $data]);
    }


     public function showrequest($id){
        $data = DocumentRequests::findOrFail($id);
        return view('student.docreq', ['docreq' => $data]);
    }

    public function updatedocreq(Request $request, DocumentRequests $docreq){
        $validated = $request->validate([
            'document_id' => ['required'],
            'purpose' => ['required'],
        ]);
       $docreq->update($validated);
       return redirect('/studentrequest')->with('message', 'Your request has been updated.');
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
        'new_password' => 'min:6|required_with:confirm_password|same:confirm_password',
        'confirm_password' => 'min:6'
    ]);
    $user = Students::where('id', Auth::user()->id)->first();
    // dd($user);
    $user->password = bcrypt($validated['new_password']);
    $user->save();

    return redirect()->back()->with('alert', 'Password has been updated successfully.');
}  
}