<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\Admins;
use App\Models\Courses;
use App\Models\Students;
use App\Models\Faculties;
use App\Models\StudentGrade;
use App\Models\SubjectTeachers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:admins');
        $this->middleware('guest:students');
        $this->middleware('guest:faculties');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' =>'required|string',
            'middle_name' =>'nullable',
            'last_name' =>'required|string',
            'suffix' =>'nullable',
            'username' =>'required|string|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminsRegisterForm()
    {
        return view('auth.register', ['url' => 'admins']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStudentsRegisterForm()
    {
        $level_data =DB::table('grade_levels')->select('id', 'gradelevel')->where('deleted', '=', NULL)->get();
        $section_data= DB::table('sections')->select('id', 'section')->where('deleted', '=', NULL)->get();
        $courses_data= DB::table('courses')->select('id', 'code')->where('deleted', '=', NULL)->get();
        return view('auth.register',compact('level_data','section_data', 'courses_data'), ['url' => 'students']);
        
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFacultiesRegisterForm()
    {
        return view('auth.register', ['url' => 'faculties']);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmins(Request $request)
    {
        $this->validator($request->all())->validate();
        Admins::create([
            'first_name' =>$request->first_name,
            'middle_name' =>$request->middle_name,
            'last_name' =>$request->last_name,
            'username' =>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admins');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createFaculties(Request $request)
    {
        $this->validator($request->all())->validate();
        Faculties::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/faculties');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createStudents(Request $request)
    {
        
        $strandCode = Courses::where('code', $request->input('course_id'))->value('id');
        if ($strandCode) {

            $user = Addresses::create([
                'city'=> 'Taguig City',
            ]);

            $validated = $request->validate([
                'LRN' => 'required|min:12|max:12|unique:students,LRN',
                'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'suffix' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'username' => 'required|max:255',
                'gender' => ['required'],
                'section_id' => ['required'],
                'gradelevel_id' => ['required'],
                'email' => ['required', 'email', Rule::unique('students', 'email')],
                'password' => 'required|confirmed|min:6'
            ]);

            if (Students::where('first_name', '=', $request->get("first_name"))->count() <= 0 || Students::where('middle_name', '=', $request->get("middle_name"))->count() <= 0
            || Students::where('last_name', '=', $request->get("last_name"))->count() <= 0 || Students::where('suffix', '=', $request->get("suffix"))->count() <= 0) {

                $validated['course_id'] = "$strandCode";
                // hashing
                $validated['password'] = bcrypt($validated['password']);
                    
            //     dd($validated);
                $course_id = $validated['course_id'];
                $user->student()->create($validated);
                $schoolyear = DB::table('school_years')->latest('id')->first();
                $students = DB::table('students')->latest('id')->first();
                $subjects = DB::table('subject_teachers')->where('deleted', '=', NULL)->where('course_id', '=', $course_id)->where('section_id', '=', $request->section_id)
                        ->where('gradelevel_id', '=', $request->gradelevel_id)->where('schoolyear_id', '=', $schoolyear->id)->get();
                    
                if($subjects->count() != 0){ 
                    foreach($subjects as $subject){
                        $studentgrade = new StudentGrade;
                        $studentgrade->student_id =  $students->id;
                        $studentgrade->gradelevel_id = $subject->gradelevel_id;
                        $studentgrade->semester_id = $subject->semester_id;
                        $studentgrade->subject_id = $subject->subject_id;
                        $studentgrade->faculty_id = $subject->faculty_id;
                        $studentgrade->subjectteacher_id = $subject->id;
                        $studentgrade->schoolyear_id = $schoolyear->id;
                        $studentgrade->save();
                    }
                }

                    // $user->addresses()->create([
                    //     'city' => 'Taguig City'
                    // ]);
                    // Addresses::create([
                    //     'user_id' => $user->id,
                    //     'city'=> 'Taguig City'
                    // ]);

                
                return redirect('/login/students')->with('success', 'Registered successfully!');;
            }

            else{
                return redirect()->back()->with('message', 'You have duplicate name!')->withInput();
            }
        }
        else{
            // return redirect()->back()->with([
            //     'message' => 'Sorry! Strand Code is Invalid!',
            // ])->withInput();
            return redirect()->back()->with('message', 'Sorry! Strand Code is Invalid! Please check ')->withInput();
        }
    }
}