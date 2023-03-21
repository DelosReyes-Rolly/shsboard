<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\Announcements;
use App\Models\Registrants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RegistrantsController extends Controller
{
    // ============================================================ RESET PASSWORD ===================================================================================

    public function showRegistrantsResetForm(){
        return view('registrants.reset');
    }

    public function reset(Request $request){

        $request->validate([
            "email" => 'required|max:255',
        ]);
        if (Registrants::where('email', '=', $request->get("email"))->count() > 0) {
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

            Registrants::where('email', '=', $request->email)->update(['password' => $temp]);
            Mail::to($request->email)->send(new RegisterMail($pass));
            return redirect('/login/registrants')->with('success', 'Email has been sent!');
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
            ->where('release_at', '>=', now())
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
         return view('registrants.home', compact($viewShareVars, 'ann'));
    }

    public function seeAnnouncement($id){
        $view = Announcements::where('deleted', '=', null)->where('release_at', '>=', now())->findOrFail($id);
        return view('registrants.home', compact('view'));
    }
}