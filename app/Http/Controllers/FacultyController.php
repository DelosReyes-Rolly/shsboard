<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\ActivityStreams;
use App\Models\Addresses;
use App\Models\Advisories;
use App\Models\Announcements;
use App\Models\Faculties;
use App\Models\GradeEvaluationRequests;
use App\Models\GradeLevels;
use App\Models\Semesters;
use App\Models\StudentGrade;
use App\Models\Students;
use App\Models\SubjectTeachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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

        $ann = array();
    		$data = Announcements::where('deleted', '=', null) 
            ->where('status', '=', 1)
            ->where('privacy', '=', 2)
            ->where('approval', '=', 2)
            ->where('is_event', '=', NULL)->get();
            foreach($data as $d){
                $ann[] = [
                    'id' =>$d->id,                    
                    'title' => $d->what,
                    'start' => $d->whn,
                    'end' => $d->whn,
                ];
            }

        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<', now())->update(['status' => '2']);
        
        $announcement = DB::table('announcements')
            ->where('deleted', '=', NULL)
            ->where('status', '=', 1)
            ->where('privacy', '=', 2)
            ->where('approval', '=', 2)
            ->where('is_event', '=', NULL)
            ->where('release_at', '<=', now())
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
         return view('faculty.home', compact($viewShareVars, 'ann'));
    }

    public function seeAnnouncement($id){
        $view = Announcements::where('deleted', '=', null)->where('release_at', '>=', now())->findOrFail($id);
        return view('faculty.viewAnnouncement', compact('view'));
    }

    // ============================================================ PROFILE ===================================================================================

    public function profile(){
        $address = Addresses::where('id', '=', Auth::user()->address_id)->first();
        return view('faculty.profile', compact('address'));
    }

    public function profileupdate(Request $request, Faculties $faculty, Addresses $address){
        $ownid=Auth::user()->id;
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'suffix' => 'nullable|max:255',
            "email" => 'required|email:rfc,dns|email|unique:faculties,email,' . $ownid,
            "gender" => 'nullable',
            "username" => 'nullable|max:255|unique:faculties,username,' . $ownid,
        ]);
        $validated['updated_at'] = now();
        $faculty->update($validated);

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


    // ============================================================ CREATE ANNOUNCEMENT ===================================================================================

        public function createannouncement(){
            $activity = DB::table('activity_streams')
            ->where('activity_streams.deleted', '=', null)->join('grade_levels', 'activity_streams.gradelevel_id', '=', 'grade_levels.id')
            ->join('courses', 'activity_streams.course_id', '=', 'courses.id')
            ->join('sections', 'activity_streams.section_id', '=', 'sections.id')
            ->join('subjects', 'activity_streams.subject_id', '=', 'subjects.id')
            ->select(['activity_streams.id', 'activity_streams.created_at AS created_atAct', 'activity_streams.expired_at AS expired_atAct', 'activity_streams.status', 'activity_streams.what', 'activity_streams.created_at', 'activity_streams.expired_at', 'grade_levels.gradelevel', 'grade_levels.id AS grade_id', 'courses.abbreviation', 'courses.id AS course_id', 'sections.section', 'sections.id AS section_id', 'subjects.subjectname', 'subjects.id AS subject_id']);
            if(request()->ajax()) {
                return datatables()->of($activity)
                ->addColumn('action', 'admins.grading.action-button-announcement-faculty')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
            }

            $semesters = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('semester_id')->get();
            $gradelevels = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('gradelevel_id')->get();
            $courses = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('course_id')->get();
            $sections = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('section_id')->get();
            $subjects =  SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->groupBy('subject_id')->get();
            return view('faculty.createannouncement', compact('gradelevels', 'courses', 'sections', 'subjects'));
        }

        public function countfacultyannouncement(){
            $expired = ActivityStreams::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->where('status', '=', 2)->count();
            $active = ActivityStreams::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->where('status', '=', 1)->count();
            return response()->json(array(
                'expired' => $expired,
                'active' => $active,
            ));
        }
        
        public function storeannouncement(Request $request){
            // Validate the inputs
            $request->validate([
                'inputwhat' => 'required|max:255',
                'gradelevel_id' => 'required',
                'course_id' => 'required',
                'section_id' => 'required',
                'subject_id' => 'required',
                'editors' => 'required',
                'inputexpired_at' => 'required',
                'whn_time' => 'required',
            ]);
            $announcement = new ActivityStreams();
            $announcement->what = $request->get('inputwhat');
            $announcement->content = $request->get('editors');
            $announcement->gradelevel_id = $request->get('gradelevel_id');
            $announcement->course_id = $request->get('course_id');
            $announcement->section_id = $request->get('section_id');
            $announcement->subject_id = $request->get('subject_id');
            $announcement->expired_at = $request->get('inputexpired_at');
            $announcement->whn_time = $request->get('whn_time');
            $announcement->status = 1;
            $announcement->faculty_id =  Auth::user()->id;
            $announcement->save();
            ActivityStreams::where('deleted', '=', NULL)->where('expired_at', '<',  now())->update(['status' => '2']);
            ActivityStreams::where('deleted', '=', NULL)->where('expired_at', '>',  now())->update(['status' => '1']);
            return response()->json(array('success' => true)); 
        }


        public function viewannouncement(Request $request){
            $activity = DB::table('activity_streams')
            ->where('activity_streams.deleted', '=', null)
            ->where('activity_streams.id', '=', $request->id)
            ->join('grade_levels', 'activity_streams.gradelevel_id', '=', 'grade_levels.id')
            ->join('courses', 'activity_streams.course_id', '=', 'courses.id')
            ->join('sections', 'activity_streams.section_id', '=', 'sections.id')
            ->join('subjects', 'activity_streams.subject_id', '=', 'subjects.id')
            ->select(['activity_streams.id', 'activity_streams.created_at AS created_atAct', 'activity_streams.expired_at AS expired_atAct', 'activity_streams.whn_time AS whn_timeAct', 'activity_streams.content', 'activity_streams.status', 'activity_streams.what', 'activity_streams.created_at', 'activity_streams.expired_at', 'grade_levels.gradelevel', 'grade_levels.id AS grade_id', 'courses.courseName', 'courses.id AS course_id', 'sections.section', 'sections.id AS section_id', 'subjects.subjectname', 'subjects.id AS subject_id'])
            ->first();
            return Response()->json($activity);
        }

        public function showannouncement(Request $request){
            $where = array('id' => $request->id);
            $activity  = ActivityStreams::where($where)->first();
          
            return Response()->json($activity);
        }
    
         public function updateannouncement(Request $request){
            $request->validate([
                'what' => 'required|max:255',
                'gradelevel_id' => ['required'],
                'course_id' => ['required'],
                'section_id' => ['required'],
                'subject_id' => ['required'],
                'content' => 'required',
                'expired_at' => ['required'],
                'whn_time' => ['required'],
            ]);
            $announcement = ActivityStreams::find($request->id);
            $announcement->what = $request->get('what');
            $announcement->content = $request->get('content');
            $announcement->gradelevel_id = $request->get('gradelevel_id');
            $announcement->course_id = $request->get('course_id');
            $announcement->section_id = $request->get('section_id');
            $announcement->subject_id = $request->get('subject_id');
            $announcement->expired_at = $request->get('expired_at');
            $announcement->whn_time = $request->get('whn_time');
            $announcement->save();
            ActivityStreams::where('deleted', '=', NULL)->where('expired_at', '<',  now())->update(['status' => '2']);
            ActivityStreams::where('deleted', '=', NULL)->where('expired_at', '>',  now())->update(['status' => '1']);
            return response()->json($announcement);
       }

         public function deleteactivitystream(Request $request){
            $activity = ActivityStreams::findOrFail($request->id);
            if ($activity){
                $activityId = $request->id;
                $activity   =   ActivityStreams::updateOrCreate(
                [
                    'id' => $activityId
                ],
                [
                    'deleted' => 1, 
                    'deleted_at' => now(),
                ]);                
                return Response()->json($activity);
            }
         }
    
         public function deleteannouncement(Request $request){
            $where = array('id' => $request->id);
            $activity  = ActivityStreams::where($where)->first();
          
            return Response()->json($activity);
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
        $subject_id = Crypt::decrypt($subject_id);   
        $gradelevel_id = Crypt::decrypt($gradelevel_id);  
        $semester_id = Crypt::decrypt($semester_id);  
        $schoolyear_id = Crypt::decrypt($schoolyear_id);  
        $male = StudentGrade::where('subject_id', '=', $subject_id)->where('gradelevel_id', '=', $gradelevel_id)->where('semester_id', '=', $semester_id)->where('faculty_id', '=', Auth::user()->id)
                ->where('schoolyear_id', '=', $schoolyear_id)->where('deleted', '=', NULL)->whereHas('student', function($q) {
                    $q->where('gender', 'Male')->orWhere('gender', '');
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
                if (is_numeric($request->midterm)){
                    if ($request->midterm < 101 && $request->midterm > -1) {
                        $data = array(
                            'midterm'	=>	$request->midterm,
                        );
                        DB::table('student_grades')
                        ->where('id', $request->id)
                        ->update($data);
                    }

                }
                
                if (is_numeric($request->finals)){
                    if ($request->finals < 101 && $request->finals > -1) {
                        $data = array(
                            'finals'	=>	$request->finals,
                        );
                        DB::table('student_grades')
                        ->where('id', $request->id)
                        ->update($data);
                    }
                }

                if($request->midterm == ""){
                    $data = array(
                        'midterm'	=>	null,
                    );
                    DB::table('student_grades')
                        ->where('id', $request->id)
                        ->update($data);
                }

                if($request->finals == ""){
                    $data = array(
                        'finals'	=>	null,
                    );
                    DB::table('student_grades')
                        ->where('id', $request->id)
                        ->update($data);
                }
                
    		}
    		if($request->action == 'delete')
    		{
                $clear = array(
                    'midterm' => null,
                    'finals' => null,
                );
    			DB::table('student_grades')
    				->where('id', $request->id)
    				->update($clear);
    		}
    		return response()->json($request);
    	}
    }

    public function gradeeval(){
        $facid = Auth::user()->id;
        $gradeevaluationrequests = GradeEvaluationRequests::where('deleted', '=', null)->where('faculty_id', '=', $facid)->get();
        return view('faculty.grading.gradeeval', compact('gradeevaluationrequests'));
    }

    public function viewGradeEvaluation($id){
        $view = GradeEvaluationRequests::where('deleted', '=', null)->findOrFail($id);
        return view('faculty.viewGradeEvaluation', compact('view'));
    }

    public function uploadeval(Request $request, GradeEvaluationRequests $upload){
        $request->validate([
            'file' => 'mimes:pdf|max:2048',
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

    public function printgradesteacher($id){
        $studentgrades = StudentGrade::where('subjectteacher_id', '=', $id)->orderByRaw('(SELECT last_name FROM students WHERE students.id = student_grades.student_id)')->get();
        $sem = StudentGrade::where('subjectteacher_id', '=', $id)->first();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('admins.grading.pdfgrades', compact('studentgrades', 'sem'));
        return $pdf->download('Grades.pdf');

    }

    // ============================================================ ADVISORY ===================================================================================

    public function advisoryfaculty(){
        $advisories = Advisories::where('deleted', '=', null)->where('faculty_id', '=', Auth::user()->id)->orderBy('id', 'ASC')->get();
        $schoolYear = Advisories::groupBy('schoolyear_id')->where('deleted', '=', null)->orderBy('id', 'DESC')->get();
        return view('faculty.advisory', compact('advisories','schoolYear'));
    }

    public function cards(Request $request, $id){
        if ($request->ajax()){

            $advisory = Advisories::findOrFail($id);
            if ($advisory){

                $advisory->cardgiving = 1;
                $advisory->save();

                return response()->json(array('success' => true));
            }

        }
     }

     public function unreleasecard(Request $request, $id){
        if ($request->ajax()){

            $advisory = Advisories::findOrFail($id);
            if ($advisory){

                $advisory->cardgiving = null;
                $advisory->save();

                return response()->json(array('success' => true));
            }

        }
     }

     public function unrelease($id){
        $data = Advisories::where('deleted', '=', null)->where('active', '=', null)->findOrFail($id);
        return view('faculty.unrelease', ['card' => $data]);
     }

     public function card_giving($id){
        $data = Advisories::where('deleted', '=', null)->where('active', '=', null)->findOrFail($id);
        return view('faculty.card_giving', ['card' => $data]);
     }

     public function viewStudents($gradelevel_id, $course_id, $section_id){ 
        $gradelevel_id = Crypt::decrypt($gradelevel_id);  
        $course_id = Crypt::decrypt($course_id); 
        $section_id = Crypt::decrypt($section_id); 
        $males = Students::where('gradelevel_id', '=', $gradelevel_id)->where('course_id', '=', $course_id)->where('section_id', '=', $section_id)->where('gender', '=', 'Male') ->orderBy('last_name', 'asc')->get();
        $females = Students::where('gradelevel_id', '=', $gradelevel_id)->where('course_id', '=', $course_id)->where('section_id', '=', $section_id)->where('gender', '=', 'Female') ->orderBy('last_name', 'asc')->get();;
        $gradelevel_id = $gradelevel_id;
        $course_id = $course_id;
        $section_id = $section_id;
        $releasegrades = Advisories::where('deleted', '=', null)->where('active', '=', null)->where('faculty_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->first();
        return view('faculty.viewStudents', compact('males', 'females', 'gradelevel_id', 'course_id', 'section_id', 'releasegrades'));
     }
     public function viewstudentgrades($id){
        $id = Crypt::decrypt($id);  
        $student = Students::where('id', '=', $id)->first();
        $allsubjects = StudentGrade::where('student_id', '=', $id)->where('deleted', '=', NULL)->get();
        $grade11 = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade11firstsem = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade11firstsemungraded = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 1)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade11secondsem = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade11secondsemungraded = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 1)->where('semester_id', '=', 2)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade12 = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade12firstsem = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where('deleted', '=', NULL)->get();
        $grade12firstsemungraded = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 1)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        $grade12secondsem = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where('deleted', '=', NULL)->get();
        $grade12secondsemungraded = StudentGrade::where('student_id', '=', $id)->where('gradelevel_id', '=', 2)->where('semester_id', '=', 2)->where(function($q){$q->where('midterm', NULL)->orWhere('finals', NULL);})->where('deleted', '=', NULL)->get();
        return view('faculty.viewstudentgrades', compact('allsubjects', 'grade11', 'grade11firstsem', 'grade11firstsemungraded', 'grade11secondsem', 'grade11secondsemungraded', 
                        'grade12', 'grade12firstsem', 'grade12firstsemungraded', 'grade12secondsem', 'grade12secondsemungraded', 'student'));

    }

    public function releasemidterm($gradelevel_id, $course_id, $section_id){
        $schoolyear = DB::table('school_years')->latest('id')->first();
        $students = Students::where('course_id', '=', $course_id)->where('section_id', '=', $section_id)->get();
        foreach($students as $student){
            $grades = StudentGrade::where('gradelevel_id', '=', $gradelevel_id)->where('student_id', '=', $student->id)->where('semester_id', '=', 1)->where('schoolyear_id', '=', $schoolyear->id)->get();
            foreach($grades as $grade){
                $grade->isReleased = 1;
                $grade->update();
            }   
        }

        return redirect()->back()->with('success', 'Grades has been released successfully.');
    }

    public function releasefinals($gradelevel_id, $course_id, $section_id){
        $schoolyear = DB::table('school_years')->latest('id')->first();
        $students = Students::where('course_id', '=', $course_id)->where('section_id', '=', $section_id)->get();
        foreach($students as $student){
            $grades = StudentGrade::where('gradelevel_id', '=', $gradelevel_id)->where('student_id', '=', $student->id)->where('semester_id', '=', 1)->where('schoolyear_id', '=', $schoolyear->id)->get();
            foreach($grades as $grade){
                $grade->isReleased = 2;
                $grade->update();
            }   
        }
        return redirect()->back()->with('success', 'Grades has been released successfully.');
    }

    public function releasemidterm2($gradelevel_id, $course_id, $section_id){
        $schoolyear = DB::table('school_years')->latest('id')->first();
        $students = Students::where('course_id', '=', $course_id)->where('section_id', '=', $section_id)->get();
        foreach($students as $student){
            $grades = StudentGrade::where('gradelevel_id', '=', $gradelevel_id)->where('student_id', '=', $student->id)->where('semester_id', '=', 2)->where('schoolyear_id', '=', $schoolyear->id)->get();
            foreach($grades as $grade){
                $grade->isReleased = 1;
                $grade->update();
            }   
        }

        return redirect()->back()->with('success', 'Grades has been released successfully.');
    }

    public function releasefinals2($gradelevel_id, $course_id, $section_id){
        $schoolyear = DB::table('school_years')->latest('id')->first();
        $students = Students::where('course_id', '=', $course_id)->where('section_id', '=', $section_id)->get();
        foreach($students as $student){
            $grades = StudentGrade::where('gradelevel_id', '=', $gradelevel_id)->where('student_id', '=', $student->id)->where('semester_id', '=', 2)->where('schoolyear_id', '=', $schoolyear->id)->get();
            foreach($grades as $grade){
                $grade->isReleased = 2;
                $grade->update();
            }   
        }
        return redirect()->back()->with('success', 'Grades has been released successfully.');
    }



    // ============================================================ RESET PASSWORD ===================================================================================  

    public function facultyresetshow(){
        return view('faculty.reset-password');
    }

    public function facultyreset(Request $request){
        $validated = $request->validate([
            'new_password' => 'min:6|required_with:confirm_password|same:confirm_password|max:255',
            'confirm_password' => 'min:6|max:255'
        ]);
        $user = Faculties::where('id', Auth::user()->id)->first();
        // dd($user);
        $user->password = bcrypt($validated['new_password']);
        $user->save();
        return redirect()->back()->with('alert', 'Password has been updated successfully.');
    }   

}
