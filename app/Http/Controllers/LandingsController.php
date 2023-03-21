<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\Courses;
use App\Models\Faculties;
use App\Models\GradeLevels;
use App\Models\Landings;
use App\Models\Registrants;
use App\Models\SchoolYear;
use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class LandingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admins')->except('logout');
        $this->middleware('guest:students')->except('logout');
        $this->middleware('guest:faculties')->except('logout');
        $this->middleware('guest:registrants')->except('logout');
    }

    public function home()
    {
        if (View::exists('landing.home')) {
            $home = Landings::where('deleted', '=', NULL)->get();
            $sy = SchoolYear::first();
            if (is_null($sy)) {
                $SchoolYear = 'Not Set';
            } else {
                $SchoolYear = SchoolYear::orderBy('id', 'desc')->first();
            }
            $studentCount = Students::where('deleted', '=', NULL)->count();
            $facultyCount = Faculties::where('deleted', '=', NULL)->count();
            $coursesCount = Courses::where('deleted', '=', NULL)->count();
            $viewShareVars = array_keys(get_defined_vars());
            return view('landing.home', compact($viewShareVars));
        } else {
            return abort(404);
        }
    }

    public function announcements()
    {
        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  Carbon::tomorrow())->update(['status' => '2']);

        $announcement = DB::table('announcements')
            ->where('deleted', '=', NULL)
            ->where('status', '=', 1)
            ->where('privacy', '=', 1)
            ->where('approval', '=', 2)
            ->first();
        if (is_null($announcement)) {
            $announcement = NULL;
        } else {
            $matchThese = ['deleted' => NULL, 'status' => 1, 'approval' => 2, 'privacy' => 1, 'is_event' => NULL];
            $announcement = Announcements::where($matchThese)->orderBy('created_at', 'desc')->get();
        }

        $reminder =  DB::table('announcements')
            ->where('deleted', '=', NULL)
            ->where('privacy', '=', 1)
            ->where('status', '=', 1)
            ->where('privacy', '=', 1)
            ->where('is_event', '=', 2)
            ->first();
        if (is_null($reminder)) {
            $reminder = NULL;
        } else {
            $matchThese = ['deleted' => NULL, 'privacy' => 1, 'status' => 1, 'privacy' => 1, 'is_event' => 2];
            $reminder = Announcements::where($matchThese)->orderBy('created_at', 'desc')->get();
        }

        $viewShareVars = array_keys(get_defined_vars());
        return view('landing.generalannouncements', compact($viewShareVars));
    }

    public function events()
    {
        $events = DB::table('announcements')
            ->where('deleted', '=', NULL)
            ->where('status', '=', 1)
            ->where('is_event', '=', 1)
            ->first();
        if (is_null($events)) {
            $events = NULL;
        } else {
            $matchThese = ['deleted' => NULL, 'status' => 1, 'is_event' => 1];
            $events = Announcements::where($matchThese)->orderBy('created_at', 'desc')->get();
        }

        // $viewEvents = array_keys(get_defined_vars());
        // return view('landing.events',compact($viewEvents));
        // dd($events);
        return view('landing.events', ['events' => $events]);
    }

    public function faculties()
    {
        return view('landing.faculties');
    }


    public function courses()
    {
        $home = Landings::where('deleted', '=', null)->get();
        $strands = Courses::where('deleted', '=', null)->get();
        return view('landing.courses', compact('strands', 'home'));
    }

    public function coursedescription($id)
    {
        $data = Courses::findOrFail($id);
        // dd($data);
        return view('landing.coursedescription', ['course' => $data]);
    }

    public function login()
    {
        return view('auth.loginchoice');
    }

    public function userLogin()
    {
        if (View::exists('landing.login.userlogin')) {
            return view('landing.login.userlogin');
        } else {
            return abort(404);
        }
    }

    public function facultiesLogin()
    {
        if (View::exists('landing.login.facultieslogin')) {
            return view('landing.login.facultieslogin');
        } else {
            return abort(404);
        }
    }

    public function seePublicAnnouncement($id)
    {
        $view = Announcements::where('deleted', '=', null)->where('deleted', '=', NULL)->where('status', '=', 1)->where('privacy', '=', 1)->where('approval', '=', 2)->findOrFail($id);
        return view('landing.viewPublicAnnouncement', compact('view'));
    }

    public function seePublicEvent($id)
    {
        $view = Announcements::where('deleted', '=', null)->where('deleted', '=', NULL)->where('status', '=', 1)->where('is_event', '=', 1)->findOrFail($id);
        return view('landing.viewEvent', compact('view'));
    }

    public function registration()
    {
        $schoolyear = SchoolYear::orderBy('id', 'desc')->first();
        $gradelevels = GradeLevels::where('deleted', '=', null)->get();
        return view('landing.registration', compact('schoolyear', 'gradelevels'));
    }


    public function registerearly(Request $request)
    {
        $validated = $request->validate([
            'gradelevel_id' => 'required',
            'psa_no' => 'nullable',
            'lrn' => 'nullable',
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'suffix' => 'nullable|max:255',
            'birthdate' => 'required',
            'sex' => 'required',
            'age' => 'required',
            'isIndegenous' => 'nullable',
            'mother_tongue' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'father_last_name' => 'required|max:255',
            'father_first_name' => 'required|max:255',
            'father_middle_name' => 'nullable|max:255',
            'father_suffix' => 'nullable|max:255',
            'mother_last_name' => 'required|max:255',
            'mother_first_name' => 'required|max:255',
            'mother_middle_name' => 'nullable|max:255',
            'mother_suffix' => 'nullable|max:255',
            'guardian_last_name' => 'required|max:255',
            'guardian_first_name' => 'required|max:255',
            'guardian_middle_name' => 'nullable|max:255',
            'guardian_suffix' => 'nullable|max:255',
            'phone_number' => 'required',
            'cellphone_number' => 'required',
            'last_grade_level' => 'required',
            'last_school_year' => 'required',
            'school_name' => 'required',
            'school_address' => 'required',
            'semester_id' => 'required',
            'track' => 'required',
            'strand' => 'required',
            'modality' => 'required',
            'email' => 'required',
            'password' => 'required',
            'signature' => 'required',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $registrant = new Registrants();
        $registrant->gradelevel_id = $request->get('gradelevel_id');
        $registrant->psa_no = $request->get('psa_no');
        $registrant->lrn = $request->get('lrn');
        $registrant->last_name = $request->get('last_name');
        $registrant->first_name = $request->get('first_name');
        $registrant->middle_name = $request->get('middle_name');
        $registrant->suffix = $request->get('suffix');
        $registrant->birthdate = $request->get('birthdate');
        $registrant->sex = $request->get('sex');
        $registrant->age = $request->get('age');
        $registrant->isIndigenous = $request->get('isIndigenous');
        $registrant->mother_tongue = $request->get('mother_tongue');
        $registrant->street = $request->get('street');
        $registrant->barangay = $request->get('barangay');
        $registrant->city = $request->get('city');
        $registrant->zip_code = $request->get('zip_code');
        $registrant->father_last_name = $request->get('father_last_name');
        $registrant->father_first_name = $request->get('father_first_name');
        $registrant->father_middle_name = $request->get('father_middle_name');
        $registrant->father_suffix = $request->get('father_suffix');
        $registrant->mother_last_name = $request->get('mother_last_name');
        $registrant->mother_first_name = $request->get('mother_first_name');
        $registrant->mother_middle_name = $request->get('mother_middle_name');
        $registrant->mother_suffix = $request->get('mother_suffix');
        $registrant->guardian_last_name = $request->get('guardian_last_name');
        $registrant->guardian_first_name = $request->get('guardian_first_name');
        $registrant->guardian_middle_name = $request->get('guardian_middle_name');
        $registrant->guardian_suffix = $request->get('guardian_suffix');
        $registrant->phone_number = $request->get('phone_number');
        $registrant->cellphone_number = $request->get('cellphone_number');
        $registrant->last_grade_level = $request->get('last_grade_level');
        $registrant->last_school_year = $request->get('last_school_year');
        $registrant->school_name = $request->get('school_name');
        $registrant->school_address = $request->get('school_address');
        $registrant->semester_id = $request->get('semester_id');
        $registrant->track = $request->get('track');
        $registrant->strand = $request->get('strand');
        $registrant->modality = $request->get('modality');
        $registrant->email = $request->get('email');
        $registrant->password = $request->get('password');
        $registrant->save();
        return response()->json(array('success' => true));
    }
}
