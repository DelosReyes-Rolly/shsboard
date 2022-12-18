<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\ActivityStreams;
use App\Models\Addresses;
use App\Models\Announcements;
use App\Models\Courses;
use App\Models\Faculties;
use App\Models\GradeEvaluationRequests;
use App\Models\GradeLevels;
use App\Models\Sections;
use App\Models\Semesters;
use App\Models\StudentGrade;
use App\Models\Subjects;
use App\Models\SubjectTeachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FacultyController extends Controller
{
   

    // ============================================================ RESET PASSWORD ===================================================================================

    public function showFacultiesResetForm(){
        return view('faculty.reset');
    }

    public function reset(Request $request){

        $request->validate([
            "email" => 'required|max:255',
        ]);
        if (Faculties::where('email', '=', $request->get("email"))->count() > 0) {
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

            Faculties::where('email', '=', $request->email)->update(['password' => $temp]);
            Mail::to($request->email)->send(new RegisterMail($pass));
            return redirect('/login/faculties')->with('success', 'Email has been sent!');
        }
        else{
            return redirect()->back()->with('message', 'Email is not found!');
        }
    
        
    }

    // ============================================================ ANNOUNCEMENTS ===================================================================================

    public function home(){

        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<', now())->update(['status' => '2']);
        
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
        return view('faculty.home',compact($viewShareVars));
    }

    // ============================================================ PROFILE ===================================================================================

    public function profile(){
        $address = Addresses::where('id', '=', Auth::user()->address_id)->first();
        return view('faculty.profile', compact('address'));
    }

    public function profileupdate(Request $request, Faculties $faculty, Addresses $address){
        $ownid=Auth::user()->id;
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'middle_name' => 'nullable|regex:/^[\pL\s]+$/u|max:255',
            'last_name' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'suffix' => 'nullable|regex:/^[\pL\s]+$/u|max:255',
            "email" => 'required|email:rfc,dns|email|unique:faculties,email,' . $ownid,
            "gender" => 'nullable',
            "username" => 'nullable|max:255|unique:faculties,username,' . $ownid,
        ]);
        $validated['updated_at'] = now();
        $faculty->update($validated);

        $validated = $request->validate([
            "street" => 'nullable|regex:/^[a-z A-Z0-9]+$/u',
            "village" => 'nullable|regex:/^[a-z A-Z0-9]+$/u',
            "city" => 'nullable|alpha',
            "zip_code" => 'nullable|digits:4', 
        ]);
        $validated['updated_at'] = now();
        $address->update($validated);
    
        return back()->with('success', 'Profile has been edited Successfully');
    }


    // ============================================================ CREATE ANNOUNCEMENT ===================================================================================

        public function createannouncement(){
            $facid = Auth::user()->id;
            $announcementCount = DB::table('activity_streams')
                ->where('faculty_id', '=', $facid)
                ->where('deleted', '=', Null)
                ->first();
            if(is_null($announcementCount)) {
                $announcementCount = NULL;
            }
            else{
                $announcementCount = ActivityStreams::where('deleted', '=', null)->where('faculty_id', '=', $facid)->get();
            }

            $gradelevels = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', $facid)->groupBy('gradelevel_id')->get();
            $courses = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', $facid)->groupBy('course_id')->get();
            $sections = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', $facid)->groupBy('section_id')->get();
            $subjects =  SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', $facid)->groupBy('subject_id')->get();
            return view('faculty.createannouncement', compact('announcementCount', 'gradelevels', 'courses', 'sections', 'subjects'));
        }
        
        public function storeannouncement(Request $request){
            // Validate the inputs
            $request->validate([
                'what' => 'required|max:255',
                'whn' => 'required',
                'whn_time' => 'required',
                'gradelevel_id' => 'required',
                'course_id' => 'required',
                'section_id' => 'required',
                'subject_id' => 'required',
                'content' => 'required|max:255',
                'expired_at' => 'required',
            ]);
            $announcement = new ActivityStreams();
            $announcement->what = $request->get('what');
            $announcement->whn = $request->get('whn');
            $announcement->whn_time = $request->get('whn_time');
            $announcement->content = $request->get('content');
            $announcement->gradelevel_id = $request->get('gradelevel_id');
            $announcement->course_id = $request->get('course_id');
            $announcement->section_id = $request->get('section_id');
            $announcement->subject_id = $request->get('subject_id');
            $announcement->expired_at = $request->get('expired_at');
            $announcement->status = 1;
            $announcement->faculty_id =  Auth::user()->id;
            $announcement->save();
            ActivityStreams::where('deleted', '=', NULL)->where('expired_at', '<',  now())->update(['status' => '2']);
            ActivityStreams::where('deleted', '=', NULL)->where('expired_at', '>',  now())->update(['status' => '1']);
            return redirect('/createannouncement')->with('success', 'New activity was added successfully!');
        }


        public function viewannouncement($id){
            $data = ActivityStreams::where('deleted', '=', null)->findOrFail($id);
            $semesters = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('semester_id')->get();
            $gradelevels = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('gradelevel_id')->get();
            $courses = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('course_id')->get();
            $sections = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('section_id')->get();
            $subjects =  SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('subject_id')->get();
            return view('faculty.announcementview', compact('gradelevels', 'semesters', 'courses', 'sections', 'subjects'), ['announcement' => $data]);
        }

        public function showannouncement($id){
            $data = ActivityStreams::where('deleted', '=', null)->findOrFail($id);
            $gradelevels = GradeLevels::all();
            $semesters = Semesters::all();
            $courses = Courses::where('deleted', '=', null)->get();
            $sections =Sections::where('deleted', '=', null)->get();
            $subjects = Subjects::where('deleted', '=', null)->get();
            return view('faculty.announcementupdate', compact('gradelevels', 'semesters', 'courses', 'sections', 'subjects'), ['announcement' => $data]);
        }
    
         public function updateannouncement(Request $request, ActivityStreams $announcement){
            $validated = $request->validate([
                'what' => 'required|max:255',
                'whn' => ['required'],
                'whn_time' => ['required'],
                'gradelevel_id' => ['required'],
                'course_id' => ['required'],
                'section_id' => ['required'],
                'subject_id' => ['required'],
                'content' => 'required|max:255',
                'expired_at' => ['required'],
            ]);
           $announcement->update($validated);
           ActivityStreams::where('deleted', '=', NULL)->where('expired_at', '<',  now())->update(['status' => '2']);
           ActivityStreams::where('deleted', '=', NULL)->where('expired_at', '>',  now())->update(['status' => '1']);
           return redirect('/createannouncement')->with('success', 'Activity has been updated.');;
       }

         public function deleteactivitystream(Request $request, ActivityStreams $activitystream){
            $validated = $request->validate([
                'deleted' => ['required'],
                'deleted_at' => ['required'],
            ]);
            $activitystream->update($validated);
            return redirect('/createannouncement')->with('success', 'Activity has been deleted successfully!');
         }
    
         public function deleteannouncement($id){
            $data = ActivityStreams::where('deleted', '=', null)->findOrFail($id);
            return view('faculty.deleteactivitystream', ['activitystream' => $data]);
         }

    // ============================================================ GRADES ===================================================================================  

    public function grades(){
        $subjectteacher = SubjectTeachers::where('faculty_id', '=', Auth::user()->id)->where('deleted', '=', null)->count();
        return view('faculty.grading.dashboard', compact('subjectteacher'));
    }

    public function facultysubjects(){
        $subjectteachers = SubjectTeachers::where('faculty_id', '=', Auth::user()->id)->groupBy('schoolyear_id')->where('deleted', '=', null)->orderBy('id', 'DESC')->get();
        $subjects = SubjectTeachers::where('faculty_id', '=', Auth::user()->id)->where('deleted', '=', null)->get();
        // dd($subjectteachers);
        return view('faculty.grading.facultysubjects', compact('subjectteachers', 'subjects'));

    }

    public function view_students($subject_id, $gradelevel_id, $semester_id, $schoolyear_id){
        $male = StudentGrade::where('subject_id', '=', $subject_id)->where('gradelevel_id', '=', $gradelevel_id)->where('semester_id', '=', $semester_id)->where('faculty_id', '=', Auth::user()->id)
                ->where('schoolyear_id', '=', $schoolyear_id)->where('deleted', '=', NULL)->whereHas('student', function($q) {
                    $q->where('gender', 'Male');
                })->orderByRaw('(SELECT last_name FROM students WHERE students.id = student_grades.student_id)')->get();
        $female = StudentGrade::where('subject_id', '=', $subject_id)->where('gradelevel_id', '=', $gradelevel_id)->where('semester_id', '=', $semester_id)->where('faculty_id', '=', Auth::user()->id)
                ->where('schoolyear_id', '=', $schoolyear_id)->where('deleted', '=', NULL)->whereHas('student', function($q) {
                    $q->where('gender', 'female');
                })->orderByRaw('(SELECT last_name FROM students WHERE students.id = student_grades.student_id)')->get();
        $sem = $semester_id;
        return view('faculty.grading.viewstudents', compact('male', 'female', 'sem'));

    }

    function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
                if ($request->midterm < 101 && $request->midterm > 64) {
                    $data = array(
                        'midterm'	=>	$request->midterm,
                    );
                    DB::table('student_grades')
                    ->where('id', $request->id)
                    ->update($data);
                }

                if ($request->finals < 101 && $request->finals > 64) {
                    $data = array(
                        'finals'	=>	$request->finals,
                    );
                    DB::table('student_grades')
    				->where('id', $request->id)
    				->update($data);
                }

                
    		}
    		if($request->action == 'delete')
    		{
                $delete = array(
                    'deleted' => 1,
                    'deleted_at' => now(),
                );
    			DB::table('student_grades')
    				->where('id', $request->id)
    				->update($delete);
    		}
    		return response()->json($request);
    	}
    }

    public function gradeeval(){
        $facid = Auth::user()->id;
        $gradeevaluationrequests = GradeEvaluationRequests::where('deleted', '=', null)->where('faculty_id', '=', $facid)->get();
        return view('faculty.grading.gradeeval', compact('gradeevaluationrequests'));
    }

    public function uploadeval(Request $request, GradeEvaluationRequests $upload){
        $request->validate([
            'file' => 'mimes:doc,docx,docs,pdf|max:2048',
        ]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/DocumentRequestFile/',$filename);
            $gradeeval = GradeEvaluationRequests::where('id', '=', $upload->id)->first();
            $gradeeval->file = $filename;
            $gradeeval->update();
            return redirect('/facultygradeeval')->with('success', 'Request has been updated successfully!');
        } 
    }

    // ============================================================ RESET PASSWORD ===================================================================================  

    public function facultyresetshow(){
        return view('faculty.reset-password');
    }

    public function facultyreset(Request $request){
        $validated = $request->validate([
            'new_password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);
        $user = Faculties::where('id', Auth::user()->id)->first();
        // dd($user);
        $user->password = bcrypt($validated['new_password']);
        $user->save();
        return redirect()->back()->with('alert', 'Password has been updated successfully.');
    }   

}
