<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:admins')->except('logout');
            $this->middleware('guest:students')->except('logout');
            $this->middleware('guest:faculties')->except('logout');
            $this->middleware('guest:registrants')->except('logout');
    }

     public function showAdminsLoginForm()
    {
        return view('auth.login', ['url' => 'admins']);
    }

    public function adminsLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        if (FacadesAuth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admins');
        }
        return back()->with('message', 'Wrong credentials!')->withInput($request->only('email'));
    }

     public function showStudentsLoginForm()
    {
        return view('auth.login', ['url' => 'students']);
    }

    public function studentsLogin(Request $request)
    {
        $this->validate($request, [
            'LRN'   => 'required',
            'password' => 'required|min:6|max:255'
        ]);

        if (FacadesAuth::guard('students')->attempt(['lrn' => $request->LRN, 'password' => $request->password])) {

            return redirect()->intended('/students');
        }
        return back()->with('message', 'Wrong credentials!')->withInput($request->only('LRN'));
    }

    public function showFacultiesLoginForm()
    {
        return view('auth.login', ['url' => 'faculties']);
    }

    public function facultiesLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        if (FacadesAuth::guard('faculties')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/faculties');
        }
        return back()->with('message', 'Wrong credentials!')->withInput($request->only('email'));
    }


    public function showRegistrantsLoginForm()
    {
        return view('auth.login', ['url' => 'registrants']);
    }

    public function registrantsLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        if (FacadesAuth::guard('registrants')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/registrants');
        }
        return back()->with('message', 'Wrong credentials!')->withInput($request->only('email'));
    }
}