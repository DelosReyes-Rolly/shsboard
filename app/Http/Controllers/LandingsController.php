<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\Courses;
use App\Models\Faculties;
use App\Models\Faculty;
use App\Models\Landings;
use App\Models\SchoolYear;
use App\Models\Students;
use App\Models\User;
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
    }

    public function home(){
        if(View::exists('landing.home')){
            $home = Landings::where('deleted', '=', NULL)->get();
            $sy = SchoolYear::first();
            if(is_null($sy)) {
                $SchoolYear = 'Not Set';
            } else {
                $SchoolYear = SchoolYear::orderBy('id', 'desc')->first();
            }
            $studentCount = Students::where('deleted', '=', NULL)->count();
            $facultyCount = Faculties::where('deleted', '=', NULL)->count();
            $coursesCount = Courses::where('deleted', '=', NULL)->count();
            $viewShareVars = array_keys(get_defined_vars());
            return view('landing.home',compact($viewShareVars));
        }
        else{
             return abort(404);
        }
    }

    public function announcements(){
        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  Carbon::tomorrow())->update(['status' => '2']);

        $announcement = DB::table('announcements')
            ->where('deleted', '=', NULL)
            ->where('status', '=', 1)
            ->where('privacy', '=', 1)
            ->where('approval', '=', 2)
            ->first();
        if(is_null($announcement)) {
            $announcement = NULL;
        } else {
            $matchThese = ['deleted' => NULL, 'status' => 1, 'approval' => 2, 'privacy' => 1, 'is_event' => NULL];
            $announcement = Announcements::where($matchThese)->orderBy
            ('created_at', 'desc')->get();
        }

        $reminder =  DB::table('announcements')
            ->where('deleted', '=', NULL)
            ->where('privacy', '=', 1)
            ->where('status', '=', 1)
            ->where('privacy', '=', 1)
            ->where('is_event', '=', 2)
            ->first();
        if(is_null($reminder)) {
            $reminder = NULL;
         } else {
            $matchThese = ['deleted' => NULL, 'privacy' => 1, 'status' => 1, 'privacy' => 1, 'is_event' => 2];
            $reminder = Announcements::where($matchThese)->orderBy
            ('created_at', 'desc')->get();
        }

        $viewShareVars = array_keys(get_defined_vars());
        return view('landing.generalannouncements',compact($viewShareVars));
    }

    public function events(){
        $events = DB::table('announcements')
            ->where('deleted', '=', NULL)
            ->where('status', '=', 1)
            ->where('is_event', '=', 1)
            ->first();
        if(is_null($events)) {
            $events = NULL;
        } else {
            $matchThese = ['deleted' => NULL, 'status' => 1, 'is_event' => 1];
            $events = Announcements::where($matchThese)->orderBy
            ('created_at', 'desc')->get();
        }

        // $viewEvents = array_keys(get_defined_vars());
        // return view('landing.events',compact($viewEvents));
        // dd($events);
        return view('landing.events', ['events' => $events]);
    }

    public function faculties(){
        $landings = Landings::where('deleted', '=', null)->get();
        return view('landing.faculties', compact('landings'));
    }


    public function courses(){
        $home = Landings::where('deleted', '=', null)->get();
        $strands = Courses::where('deleted', '=', null)->get();
        return view('landing.courses', compact('strands', 'home'));
    }

    public function coursedescription($id){
        $data = Courses::findOrFail($id);
        // dd($data);
        return view('landing.coursedescription', ['course' => $data]);
    }

    public function login(){
        return view('auth.loginchoice');
    }

    public function userLogin(){
        if(View::exists('landing.login.userlogin')){
            return view('landing.login.userlogin'); 
        }
        else{
             return abort(404);
        }
    }

    public function facultiesLogin(){
        if(View::exists('landing.login.facultieslogin')){
            return view('landing.login.facultieslogin'); 
        }
        else{
             return abort(404);
        }
    }

    public function seePublicAnnouncement($id){
        $view = Announcements::where('deleted', '=', null)->where('deleted', '=', NULL)->where('status', '=', 1)->where('privacy', '=', 1)->where('approval', '=', 2)->findOrFail($id);
        return view('landing.viewPublicAnnouncement', compact('view'));
    }

    public function seePublicEvent($id){
        $view = Announcements::where('deleted', '=', null)->where('deleted', '=', NULL)->where('status', '=', 1)->where('is_event', '=', 1)->findOrFail($id);
        return view('landing.viewEvent', compact('view'));
    }

}
