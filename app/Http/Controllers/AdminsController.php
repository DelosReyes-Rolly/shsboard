<?php

namespace App\Http\Controllers;
use App\Mail\RegisterMail;
use App\Models\Addresses;
use App\Models\Admins;
use App\Models\Advisories;
use App\Models\Announcements;
use App\Models\Courses;
use App\Models\DocumentPurposes;
use App\Models\DocumentRequests;
use App\Models\Documents;
use App\Models\Expertises;
use App\Models\Faculties;
use App\Models\GradeLevels;
use App\Models\Landings;
use App\Models\Loads;
use App\Models\SchoolYear;
use App\Models\Sections;
use App\Models\Semesters;
use App\Models\StudentGrade;
use App\Models\Students;
use App\Models\Subjects;
use App\Models\SubjectTeachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Datatables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class AdminsController extends Controller
{

    // ============================================================ RESET PASSWORD ===================================================================================

    public function showAdminsResetForm(){
        return view('admins.reset');
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

        Admins::where('email', '=', $request->email)->update(['password' => $temp]);
        Mail::to($request->email)->send(new RegisterMail($pass));
        return redirect()->back()->with('success', 'Email has been sent!');
    }

    // ============================================================ ANNOUNCEMENTS ===================================================================================

    public function home(){
        $schoolYear = SchoolYear::orderBy('id', 'DESC')->where('deleted', '=', null)->first();
        $students = Students::where('deleted', '=', null)->where('status', '=', 1)->get();
        $faculties = Faculties::where('deleted', '=', null)->get();
        $courses = Courses::where('deleted', '=', null)->get();
        $sections = Sections::where('deleted', '=', null)->get();
        $subjects = Subjects::where('deleted', '=', null)->get();
         return view('admins.home2',compact('schoolYear', 'students', 'faculties', 'courses', 'sections', 'subjects'));
    }

    // ============================================================ PROFILE ===================================================================================

    public function profile(){
        return view('admins.profile');
    }

    public function profileupdate(Request $request, Admins $admin){
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
        ]);

        $admin->update($validated);
        return back()->with('success', 'Profile has been updated sucessfully!');
    }

    
    // ============================================================ LANDING ===================================================================================   

    public function landing(){
        $announcements = Announcements::where('deleted', '=', null)->where('is_event', '=', null)->where('status', '=', 1)->get();
        $events = Announcements::where('deleted', '=', null)->where('is_event', '=', 1)->where('status', '=', 1)->get();
        $reminders = Announcements::where('deleted', '=', null)->where('is_event', '=', 2)->where('status', '=', 1)->get();

        return view('admins.landing.landing',compact('announcements', 'events', 'reminders'));

    }

    // ================================================================= HOMEPAGE ===================================================

    public function homepage(){
        $landings = Landings::where('deleted', '=', null)->get();
        return view('admins.landing.homepage', compact('landings'));
    }

    public function storehomapage(Request $request){
        // Validate the inputs
        $request->validate([
            'title' => 'required|max:255',
            'editor' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        $landing = new Landings;
        $landing->title = $request->get('title');
        $landing->content = $request->get('editor');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/landing/',$filename);
            $landing->image = $filename;
        }
        $landing->save();
        return response()->json(array('success' => true));
    }
    
    public function viewlanding($id){
        $data = Landings::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.landingview', ['landing' => $data]);
    }

    public function showlanding($id){
        $data = Landings::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.landingupdate', ['landing' => $data]);
    }

    public function updatelanding(Request $request){
        $request->validate([
            'title' => ['required'],
            'editor3' => ['required'],
        ]);
        $landing = Landings::find($request->id);
        $landing->title = $request->title;
        $landing->content = $request->get('editor3');
        $landing->save();
        return response()->json($landing);
   }

     public function deletelanding(Landings $landing, Request $request, $id){
        if ($request->ajax()){

            $landing = Landings::findOrFail($id);
            if ($landing){
    
                $landing->deleted = 1;
                $landing->deleted_at = now();
                $landing->save();
    
                return response()->json(array('success' => true));
            }
        }
        
    }


     public function deletelandingpublic($id){
        $data = Landings::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.deletelanding', ['landing' => $data]);
     }

    // ================================================================= ANNOUNCEMENT ===================================================

    public function createannouncement(){
        $announcements = Announcements::where('deleted', '=', null)->where('is_event', '=', null)->where('privacy', '=', 1)->get();

        if(request()->ajax()) {
            return datatables()->of(Announcements::where('deleted', '=', null)->where('is_event', '=', null)->where('privacy', '=', 1))
            ->addColumn('action', 'admins.grading.action-button-announcement')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.landing.createannouncement', compact('announcements'));
    }

    public function tableofannouncement()
    {
        $announcements = Announcements::where('deleted', '=', null)->where('is_event', '=', null)->where('privacy', '=', 2)->get();
        if(request()->ajax()) {
            return datatables()->of(Announcements::where('deleted', '=', null)->where('is_event', '=', null)->where('privacy', '=', 2))
            ->addColumn('action', 'admins.grading.action-button-announcement')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.landing.tableofannouncement', compact('announcements'));
    }

    public function privateannouncement()
    {
        return view('admins.landing.privateannouncement');
    }

    public function storeannouncement(Request $request){
        // Validate the inputs
        $request->validate([
            'subject' => 'required|max:255',
            'date' => 'required',
            'time' => 'required',
            'sender' => 'required|max:255',
            'recipient' => 'required|max:255',
            'location' => 'required|max:255',
            'contents' => 'required',
            'post_expiration' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        $announcement = new Announcements();
        $announcement->what = $request->get('subject');
        $announcement->who = $request->get('recipient');
        $announcement->whn = $request->get('date');
        $announcement->whn_time = $request->get('time');
        $announcement->whr = $request->get('location');
        $announcement->sender = $request->get('sender');
        $announcement->content = $request->get('contents');
        $announcement->expired_at = $request->get('post_expiration');
        $announcement->privacy = 1;
        $announcement->approval = 2;
        $announcement->status = 1;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/announcement/',$filename);
            $announcement->image = $filename;
        }
        $announcement->save();
        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  now())->update(['status' => '2']);
        return response()->json(array('success' => true)); 
    }

    public function storeprivateannouncement(Request $request){
        // Validate the inputs
        $request->validate([
            'subject' => 'required|max:255',
            'date' => 'required',
            'time' => 'required',
            'sender' => 'required|max:255',
            'recipient' => 'required|max:255',
            'location' => 'required|max:255',
            'editor' => 'required',
            'post_expiration' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        $announcement = new Announcements();
        $announcement->what = $request->get('subject');
        $announcement->who = $request->get('recipient');
        $announcement->whn = $request->get('date');
        $announcement->whn_time = $request->get('time');
        $announcement->whr = $request->get('location');
        $announcement->sender = $request->get('sender');
        $announcement->content = $request->get('editor');
        $announcement->expired_at = $request->get('post_expiration');  
        $announcement->privacy = 2;
        $announcement->approval = 2;
        $announcement->status = 1;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/announcement/',$filename);
            $announcement->image = $filename;
        }
        $announcement->save();
        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  now())->update(['status' => '2']);
        return response()->json(array('success' => true)); 
    }

    public function approve($id){
        $leave = Announcements::where('deleted', '=', null)->findOrFail($id);
        $leave->approval = 2; 
        $leave->save();
        return redirect()->back()->with('approval', 'Announcement has been approved.');
     }
     
     public function decline($id){
        $leave = Announcements::where('deleted', '=', null)->findOrFail($id);
        $leave->approval = 3;
        $leave->save();
        return redirect()->back()->with('approval', 'Announcement has been rejected.');
     }

    public function viewannouncement($id){
        $data = Announcements::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.announcementview', ['announcement' => $data]);
    }

    public function showannouncement(Request $request){
        
        $where = array('id' => $request->id);
        $announcement  = Announcements::where($where)->first();
      
        return Response()->json($announcement);
    }


     public function updateannouncement(Request $request){
        $request->validate([
            'what' => 'required|max:255',
            'who' => 'required|max:255',
            'whn' => ['required'],  
            'whn_time' => ['required'],
            'whr' => 'required|max:255',
            'sender' => 'required|max:255',
            'editor2' => 'required',
            'expired_at' => ['required'],
        ]);
        $announcement = Announcements::find($request->id);
        $announcement->what = $request->what;
        $announcement->who = $request->who;
        $announcement->whn = $request->whn;
        $announcement->whn_time = $request->whn_time;
        $announcement->whr = $request->whr;
        $announcement->sender = $request->sender;
        $announcement->content = $request->get('editor2');
        $announcement->expired_at = $request->expired_at;
        $announcement->save();
        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<=',  now())->update(['status' => '2']);
        Announcements::where('deleted', '=', NULL)->where('status', '=', 2)->where('expired_at', '>',  now())->update(['status' => '1']);
        return response()->json($announcement);
   }

     public function deleteannouncement(Request $request){
        $reminder = Announcements::findOrFail($request->id);
        if ($reminder){
            $reminderId = $request->id;
            $reminder   =   Announcements::updateOrCreate(
            [
                'id' => $reminderId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
            ]);                
            return Response()->json($reminder);
        }
        
    }

     public function deleteannouncementpublic(Request $request){
        $where = array('id' => $request->id);
        $reminder  = Announcements::where($where)->first();
      
        return Response()->json($reminder);
     }


     public function downloadpdf(Request $request) {
            $request->validate([
                'dateFrom' => 'required',
                'dateTo' => 'required',
            ]);
            $users =  Announcements::where('deleted', '=', null)->where('is_event', '=', NULL)
                        ->where('created_at', '>=',  $request->get('dateFrom'))
                        ->where('created_at', '<=',  $request->get('dateTo'))
                        ->where('approval', '=', 2)->get();
            $from = $request->get('dateFrom');
            $to = $request->get('dateTo');
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf->loadView('admins.landing.pdf', compact('users', 'from', 'to'));
            return $pdf->download('announcement_report.pdf');
          }


    // ================================================================= EVENTS ===================================================


    public function createevent(){
        $events = Announcements::where('deleted', '=', null)->where('is_event', '=', 1)->get();

        if(request()->ajax()) {
            return datatables()->of(Announcements::where('deleted', '=', null)->where('is_event', '=', 1))
            ->addColumn('action', 'admins.grading.action-button-event')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.landing.createevent', compact('events'));
    }

    public function storeevent(Request $request){
        // Validate the inputs
        $request->validate([
            'subject' => 'required|max:255',
            'date' => 'required',
            'time' => 'required',
            'sender' => 'required|max:255',
            'recipient' => 'required|max:255',
            'location' => 'required|max:255',
            'editor' => 'required',
            'post_expiration' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        $announcement = new Announcements();
        $announcement->what = $request->get('subject');
        $announcement->who = $request->get('recipient');
        $announcement->whn = $request->get('date');
        $announcement->whn_time = $request->get('time');
        $announcement->whr = $request->get('location');
        $announcement->sender = $request->get('sender');
        $announcement->content = $request->get('editor');
        $announcement->expired_at = $request->get('post_expiration');
        $announcement->is_event = 1;
        $announcement->status = 1;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/event/',$filename);
            $announcement->image = $filename;
        }
        $announcement->save();
        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  now())->update(['status' => '2']);
        return response()->json(array('success' => true)); 
    }

    public function viewevent($id){
        $data = Announcements::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.eventview', ['event' => $data]);
    }

    public function showevent(Request $request){
        
        $where = array('id' => $request->id);
        $event  = Announcements::where($where)->first();
      
        return Response()->json($event);
    }

    public function updateevent(Request $request){
        $request->validate([
            'what' => 'required|max:255',
            'who' => 'required|max:255',
            'whn' => ['required'],
            'whn_time' => ['required'],
            'whr' => 'required|max:255',
            'sender' => 'required|max:255',
            'editor2' => 'required',
            'expired_at' => ['required'],
        ]);
        $event = Announcements::find($request->id);
        $event->what = $request->what;
        $event->who = $request->who;
        $event->whn = $request->whn;
        $event->whn_time = $request->whn_time;
        $event->whr = $request->whr;
        $event->sender = $request->sender;
        $event->content = $request->get('editor2');
        $event->expired_at = $request->expired_at;
        $event->save();
       Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  now())->update(['status' => '2']);
       Announcements::where('deleted', '=', NULL)->where('status', '=', 2)->where('expired_at', '>',  now())->update(['status' => '1']);
       return response()->json($event);
   }

    // ================================================================= REMINDERS ===================================================

    public function createreminder(){
        $reminders = Announcements::where('deleted', '=', null)->where('is_event', '=', 2)->where('privacy', '=', 1)->get();

        if(request()->ajax()) {
            return datatables()->of(Announcements::where('deleted', '=', null)->where('is_event', '=', 2)->where('privacy', '=', 1))
            ->addColumn('action', 'admins.grading.action-button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.landing.createreminder', compact('reminders'));
    }


    public function tableofreminders()
    {
        $reminders = Announcements::where('deleted', '=', null)->where('is_event', '=', 2)->where('privacy', '=', 2)->get();

        if(request()->ajax()) {
            return datatables()->of(Announcements::where('deleted', '=', null)->where('is_event', '=', 2)->where('privacy', '=', 2))
            ->addColumn('action', 'admins.grading.action-button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.landing.tableofreminders', compact('reminders'));
    }

    public function privatereminders()
    {
        return view('admins.landing.privatereminder');
    }


    public function storereminder(Request $request){
        // Validate the inputs
        $request->validate([
            'contents' => 'required|max:400',
            'expired_at' => 'required',
        ]);
        $announcement = new Announcements();
        $announcement->content = $request->get('contents');
        $announcement->expired_at = $request->get('expired_at');
        $announcement->privacy = 1;
        $announcement->is_event = 2;
        $announcement->status = 1;
        $announcement->save();
        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  now())->update(['status' => '2']);
        return response()->json(array('success' => true)); 
    }

    public function storeprivatereminder(Request $request){
        // Validate the inputs
        $request->validate([
            'content' => 'required|max:400',
            'expired_at' => 'required',
        ]);
        $announcement = new Announcements();
        $announcement->content = $request->get('content');
        $announcement->expired_at = $request->get('expired_at');
        $announcement->privacy = 2;
        $announcement->is_event = 2;
        $announcement->status = 1;
        $announcement->save();
        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  now())->update(['status' => '2']);
        return response()->json(array('success' => true)); 
    }
    

    public function viewreminder(Request $request)
    {   
        $where = array('id' => $request->id);
        $remidner  = Announcements::where($where)->first();
      
        return Response()->json($remidner);
    }   


    public function showreminder(Request $request){
        
        $where = array('id' => $request->id);
        $remidner  = Announcements::where($where)->first();
      
        return Response()->json($remidner);
    }

    public function updatereminder(Request $request){
        $request->validate([
            'expired_at' => ['required'],
            'content' => 'required',
        ]);
        $reminder = Announcements::find($request->id);
        $reminder->content = $request->content;
        $reminder->expired_at = $request->expired_at;
        $reminder->save();
       Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<=',  now())->update(['status' => '2']);
       Announcements::where('deleted', '=', NULL)->where('status', '=', 2)->where('expired_at', '>',  now())->update(['status' => '1']);
       return response()->json($reminder);
   }

    



    // ============================================================ DOCUMENT REQUEST ===================================================================================   

    public function documentRequest(){
        $requests = DocumentRequests::where('deleted', '=', null)->where('status', '!=', 4)->where('status', '!=', 3)->get();
        $documents = Documents::where('deleted', '=', null)->get();
        $documentpurposes = DocumentPurposes::where('deleted', '=', null)->get();

        if(request()->ajax()) {
            return datatables()->of(Documents::where('deleted', '=', null))
            ->addColumn('action', 'admins.grading.action-button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.documentrequests.documentrequest', compact('documents', 'documentpurposes', 'requests'));
    }

    public function documentRequestpurpose(){

        if(request()->ajax()) {
            return datatables()->of(DocumentPurposes::where('deleted', '=', null))
            ->addColumn('action', 'admins.grading.action-button-purpose')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.documentrequests.documentrequest');
    }

    public function documentRequestgrade11(){

        $grade11request = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.gradelevel_id', '=', 1)
            ->where('document_requests.status', '!=', 4)
            ->where('document_requests.status', '!=', 3)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select(['document_requests.id', 'document_requests.created_at AS created_atAct', 'document_requests.status', 'document_requests.file',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 'documents.name', 
            'documents.id AS doc_id', 'document_purposes.purpose', 'document_purposes.id AS purp_id',
            'courses.id AS c_id', 'courses.abbreviation']);

        if(request()->ajax()) {
            return datatables()->of($grade11request)
                ->addColumn('download', 'admins.grading.action-button-downloadrequest')
                ->addColumn('action', 'admins.grading.action-button-requestgrade11')
                ->rawColumns(['action', 'download'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admins.documentrequests.documentrequest');
    }

    public function documentRequestgrade11completed(){

        $grade11request = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.gradelevel_id', '=', 1)
            ->where('document_requests.status', '=', 3)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select(['document_requests.id', 'document_requests.created_at AS created_atAct', 'document_requests.status', 'document_requests.file',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 'documents.name', 
            'documents.id AS doc_id', 'document_purposes.purpose', 'document_purposes.id AS purp_id',
            'courses.id AS c_id', 'courses.abbreviation']);

        if(request()->ajax()) {
            return datatables()->of($grade11request)
                ->addColumn('download', 'admins.grading.action-button-downloadrequest')
                ->addColumn('action', 'admins.grading.action-button-requestgrade11')
                ->rawColumns(['action', 'download'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admins.documentrequests.documentrequestCompleted11');
    }

    public function documentRequestgrade11rejected(){

        $grade11request = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.gradelevel_id', '=', 1)
            ->where('document_requests.status', '=', 4)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select(['document_requests.id', 'document_requests.created_at AS created_atAct', 'document_requests.status', 'document_requests.file',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 'documents.name', 
            'documents.id AS doc_id', 'document_purposes.purpose', 'document_purposes.id AS purp_id',
            'courses.id AS c_id', 'courses.abbreviation']);

        if(request()->ajax()) {
            return datatables()->of($grade11request)
                ->addColumn('download', 'admins.grading.action-button-downloadrequest')
                ->addColumn('action', 'admins.grading.action-button-requestgrade11')
                ->rawColumns(['action', 'download'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admins.documentrequests.documentrequestRejected11');
    }



    public function documentRequestgrade12(){

        $grade12request = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.gradelevel_id', '=', 2)
            ->where('document_requests.status', '!=', 4)
            ->where('document_requests.status', '!=', 3)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select(['document_requests.id', 'document_requests.created_at AS created_atAct', 'document_requests.status', 'document_requests.file',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 'documents.name', 
            'documents.id AS doc_id', 'document_purposes.purpose', 'document_purposes.id AS purp_id',
            'courses.id AS c_id', 'courses.abbreviation']);

        if(request()->ajax()) {
            return datatables()->of($grade12request)
                ->addColumn('download', 'admins.grading.action-button-downloadrequest')
                ->addColumn('action', 'admins.grading.action-button-requestgrade12')
                ->rawColumns(['action', 'download'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admins.documentrequests.documentrequest');
    }


    public function documentRequestgrade12completed(){

        $grade12request = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.gradelevel_id', '=', 2)
            ->where('document_requests.status', '=', 3)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select(['document_requests.id', 'document_requests.created_at AS created_atAct', 'document_requests.status', 'document_requests.file',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 'documents.name', 
            'documents.id AS doc_id', 'document_purposes.purpose', 'document_purposes.id AS purp_id',
            'courses.id AS c_id', 'courses.abbreviation']);

        if(request()->ajax()) {
            return datatables()->of($grade12request)
                ->addColumn('download', 'admins.grading.action-button-downloadrequest')
                ->addColumn('action', 'admins.grading.action-button-requestgrade12')
                ->rawColumns(['action', 'download'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admins.documentrequests.documentrequestCompleted12');
    }

    public function documentRequestgrade12rejected(){

        $grade12request = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.gradelevel_id', '=', 2)
            ->where('document_requests.status', '=', 4)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select(['document_requests.id', 'document_requests.created_at AS created_atAct', 'document_requests.status', 'document_requests.file',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 'documents.name', 
            'documents.id AS doc_id', 'document_purposes.purpose', 'document_purposes.id AS purp_id',
            'courses.id AS c_id', 'courses.abbreviation']);

        if(request()->ajax()) {
            return datatables()->of($grade12request)
                ->addColumn('download', 'admins.grading.action-button-downloadrequest')
                ->addColumn('action', 'admins.grading.action-button-requestgrade12')
                ->rawColumns(['action', 'download'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admins.documentrequests.documentrequestRejected12');
    }


    public function documentRequestalumni(){

        $grade12request = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.status', '!=', 4)
            ->where('document_requests.status', '!=', 3)
            ->where('students.status', '=', 2)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select(['document_requests.id', 'document_requests.created_at AS created_atAct', 'document_requests.status', 'document_requests.file',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 'documents.name', 
            'documents.id AS doc_id', 'document_purposes.purpose', 'document_purposes.id AS purp_id',
            'courses.id AS c_id', 'courses.abbreviation']);

        if(request()->ajax()) {
            return datatables()->of($grade12request)
                ->addColumn('download', 'admins.grading.action-button-downloadrequest')
                ->addColumn('action', 'admins.grading.action-button-requestalumni')
                ->rawColumns(['action', 'download'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admins.documentrequests.documentrequest');
    }

    public function documentRequestalumnicompleted(){

        $alumnirequest = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.status', '=', 3)
            ->where('students.status', '=', 2)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select(['document_requests.id', 'document_requests.created_at AS created_atAct', 'document_requests.status', 'document_requests.file',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 'documents.name', 
            'documents.id AS doc_id', 'document_purposes.purpose', 'document_purposes.id AS purp_id',
            'courses.id AS c_id', 'courses.abbreviation']);

        if(request()->ajax()) {
            return datatables()->of($alumnirequest)
                ->addColumn('download', 'admins.grading.action-button-downloadrequest')
                ->addColumn('action', 'admins.grading.action-button-requestalumni')
                ->rawColumns(['action', 'download'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admins.documentrequests.documentrequestCompletedAlumni');
    }

    public function documentRequestalumnirejected(){

        $alumnirequest = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.status', '=', 4)
            ->where('students.status', '=', 2)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select(['document_requests.id', 'document_requests.created_at AS created_atAct', 'document_requests.status', 'document_requests.file',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 'documents.name', 
            'documents.id AS doc_id', 'document_purposes.purpose', 'document_purposes.id AS purp_id',
            'courses.id AS c_id', 'courses.abbreviation']);

        if(request()->ajax()) {
            return datatables()->of($alumnirequest)
                ->addColumn('download', 'admins.grading.action-button-downloadrequest')
                ->addColumn('action', 'admins.grading.action-button-requestalumni')
                ->rawColumns(['action', 'download'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admins.documentrequests.documentrequestRejected12');
    }

    public function adddocument(){
        return view('admins.documentrequests.documentadd');
    }

    public function storedocument(Request $request){
        // Validate the inputs
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $document = new Documents();
        $document->name = $request->get('name');
        $document->save();
        return response()->json(array('success' => true));
    }

    public function viewdocument(Request $request){
        
        $where = array('id' => $request->id);
        $document  = Documents::where($where)->first();
      
        return Response()->json($document);
    }
    
    public function tableofCompleted11(){
        $requests = DocumentRequests::where('deleted', '=', null)->where('gradelevel_id', '=', 1)->where('status', '=', 3)->get();
        return view('admins.documentrequests.documentrequestCompleted11', compact('requests'));
    }

    public function tableofRejected11(){
        $requests = DocumentRequests::where('deleted', '=', null)->where('gradelevel_id', '=', 1)->where('status', '=', 4)->get();
        return view('admins.documentrequests.documentrequestRejected11', compact('requests'));
    }

    public function tableofCompleted12(){
        $requests = DocumentRequests::where('deleted', '=', null)->where('gradelevel_id', '=', 2)->where('status', '=', 3)->get();
        return view('admins.documentrequests.documentrequestCompleted12', compact('requests'));
    }

    public function tableofRejected12(){
        $requests = DocumentRequests::where('deleted', '=', null)->where('gradelevel_id', '=', 2)->where('status', '=', 4)->get();
        return view('admins.documentrequests.documentrequestRejected12', compact('requests'));
    }

    public function tableofCompletedAlumni(){
        $requests = DocumentRequests::where('deleted', '=', null)->where('status', '=', 3)->whereHas('student', function($q) {
            $q->where('status', 2);
        })->get();
        return view('admins.documentrequests.documentrequestCompletedAlumni', compact('requests'));
    }

    public function tableofRejectedAlumni(){
        $requests = DocumentRequests::where('deleted', '=', null)->where('status', '=', 4)->whereHas('student', function($q) {
            $q->where('status', 2);
        })->get();
        return view('admins.documentrequests.documentrequestRejectedAlumni', compact('requests'));
    }


    public function showdocument(Request $request){
        
        $where = array('id' => $request->id);
        $document  = Documents::where($where)->first();
      
        return Response()->json($document);
    }

    public function updatedocument(Request $request){
        $request->validate([
            'nameq' => 'required|max:255',
        ]);
        $document = Documents::find($request->id);
        $document->name = $request->get('nameq');
        $document->save();
       return response()->json($document);
   }


     public function deletegradedocument(Request $request){
        $document = Documents::findOrFail($request->id);
        if ($document){
            $documentId = $request->id;
            $document   =   Documents::updateOrCreate(
            [
                'id' => $documentId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
            ]);                
            return Response()->json($document);
        } 
    }

     public function deletedocument(Request $request){
        $where = array('id' => $request->id);
        $document  = Documents::where($where)->first();
      
        return Response()->json($document);
     }

    public function addpurpose(){
        return view('admins.documentrequests.purposeadd');
    }

     public function viewrequest($id){
        $data = DocumentRequests::where('deleted', '=', null)->findOrFail($id);
        return view('admins.documentrequests.docreqviewadmin', ['docreq' => $data]);
    }

     public function showrequest(Request $request){
        

        $document = DB::table('document_requests')
            ->where('document_requests.deleted', '=', null)
            ->where('document_requests.id', '=', $request->id)
            ->join('students', 'document_requests.student_id', '=', 'students.id')
            ->join('grade_levels', 'document_requests.gradelevel_id', '=', 'grade_levels.id')
            ->join('documents', 'document_requests.document_id', '=', 'documents.id')
            ->join('document_purposes', 'document_requests.purpose_id', '=', 'document_purposes.id')
            ->select(['document_requests.id', 'document_requests.status',
            'students.first_name', 'students.middle_name', 'students.last_name', 'students.suffix', 'students.id AS stud_id', 
            'grade_levels.gradelevel', 'grade_levels.id AS grade_id',
            'documents.name', 'documents.id AS doc_id', 
            'document_purposes.purpose', 'document_purposes.id AS purp_id'])->first();
          
        return Response()->json($document);
    }

    public function updatedocreqgrade11(Request $request){
        $request->validate([
            'grade11status' => ['required'],
        ]);
        $docreq = DocumentRequests::find($request->id);
        $docreq->status = $request->get('grade11status');
        $docreq->save();
       return response()->json($docreq);
   }

    public function updatedocreqgrade12(Request $request){
        $request->validate([
            'grade12status' => ['required'],
        ]);
        $docreq = DocumentRequests::find($request->id);
        $docreq->status = $request->get('grade12status');
        $docreq->save();
        return response()->json($docreq);
    }

    public function updatedocreqalumni(Request $request){
        $request->validate([
            'alumnistatus' => ['required'],
        ]);
        $docreq = DocumentRequests::find($request->id);
        $docreq->status = $request->get('alumnistatus');
        $docreq->save();
        return response()->json($docreq);
    }

     public function downloadpdfdoc(Request $request) {
        $request->validate([
            'dateFrom' => 'required',
            'dateTo' => 'required',
        ]);
        $users =  DocumentRequests::where('deleted', '=', null)
                ->where('created_at', '>=',  $request->get('dateFrom'))
                ->where('created_at', '<=',  $request->get('dateTo'))->get();
        $from = $request->get('dateFrom');
        $to = $request->get('dateTo');
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('admins.documentrequests.pdf', compact('users', 'from', 'to'));
        return $pdf->download('documentRequest.pdf');
      }

      public function storepurpose(Request $request){
        // Validate the inputs
        $request->validate([
            'purpose' => 'required|max:255',
            'proof_needed' => 'required|max:255',
        ]);
        $document = new DocumentPurposes();
        $document->purpose = $request->get('purpose');
        $document->proof_needed = $request->get('proof_needed');
        $document->save();
        return response()->json(array('success' => true));
    }

    public function viewpurpose(Request $request){
        $where = array('id' => $request->id);
        $purpose  = DocumentPurposes::where($where)->first();

        return Response()->json($purpose);
    }

    public function showpurpose(Request $request){
        
        $where = array('id' => $request->id);
        $purpose  = DocumentPurposes::where($where)->first();
      
        return Response()->json($purpose);
    }

    public function updatepurpose(Request $request){
        $request->validate([
            'purpose' => 'required|max:255',
            'proof_needed' => 'required|max:255',
        ]);
        $purpose = DocumentPurposes::find($request->id);
        $purpose->purpose = $request->get('purpose');
        $purpose->proof_needed = $request->get('proof_needed');
        $purpose->save();
        return response()->json($purpose);
   }

     public function deletegradepurpose(Request $request){
        $purpose = DocumentPurposes::findOrFail($request->id);
        if ($purpose){
            $purposeId = $request->id;
            $purpose   =   DocumentPurposes::updateOrCreate(
            [
                'id' => $purposeId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
            ]);                
            return Response()->json($purpose);
        } 
    }

     public function deletepurpose(Request $request){
        $where = array('id' => $request->id);
        $purpose  = DocumentPurposes::where($where)->first();
      
        return Response()->json($purpose);
     }

     

    // ============================================================ GRADES ===================================================================================  

    public function grades(){
        $courseCount = Courses::where('deleted', '=', null)->get();
        $facultyCount = Faculties::where('deleted', '=', null)->get();
        $studentCount = Students::where('deleted', '=', null)->get();
        $subjectCount = Subjects::where('deleted', '=', null)->get();
        $yearCount = SchoolYear::where('deleted', '=', null)->get();
        $levelCount = GradeLevels::where('deleted', '=', null)->get();
        $sectionCount = Sections::where('deleted', '=', null)->get();
        $classCount = SubjectTeachers::where('deleted', '=', null)->get();
        return view('admins.grading.dashboard',compact('courseCount', 'facultyCount', 'studentCount', 'subjectCount', 'yearCount', 'levelCount', 'sectionCount', 'classCount'));

    }

    // ============================================================ COURSES ===================================================

    public function courses(){
        if(request()->ajax()) {
            return datatables()->of(Courses::where('deleted', '=', null))
            ->addColumn('action', 'admins.grading.action-button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.grading.courses');
    }

    public function showcourse(Request $request)
    {   
        $where = array('id' => $request->id);
        $course  = Courses::where($where)->first();
      
        return Response()->json($course);
    }   

    public function storecourse(Request $request){
        // Validate the inputs
        $request->validate([
            'courseName' => 'required|max:255',
            'abbreviation' => 'required|max:255',
            'description' => 'required',
            'code' => 'required|max:255',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'link' => 'url|nullable',
        ]);
        $coursenameunique = Courses::where('deleted', '=', null)->where('courseName', '=', $request->get('courseName'))->get();
        if($coursenameunique->count()==0){
            $courseabbunique = Courses::where('deleted', '=', null)->where('abbreviation', '=', $request->get('abbreviation'))->get();
            if($courseabbunique->count()==0){
                $coursecodeunique = Courses::where('deleted', '=', null)->where('code', '=', $request->get('code'))->get();
                if($coursecodeunique->count()==0){
                    $course = new Courses();
                    $course->courseName = $request->get('courseName');
                    $course->abbreviation = $request->get('abbreviation');
                    $course->description = $request->get('description');
                    $course->code = $request->get('code');
                    $course->link = $request->get('link');
                    if($request->hasFile('image')){
                        $file = $request->file('image');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time().'.'.$extension;
                        $file->move('img/',$filename);
                        $course->image = $filename;
                    }
                    $course->save();
                    return response()->json(array('success' => true));   
                }else{
                    return response()->json(['error' => 'Code is already taken.'], 422); 
                }
            }else{
                return response()->json(['error' => 'Abbreviation is already taken.'], 422); 
            }
        }else{
            return response()->json(['error' => 'Name is already taken.'], 422); 
        }
            
    }    

    public function viewcourse(Request $request){
        $where = array('id' => $request->id);
        $course = Courses::where($where)->first();
      
        return Response()->json($course);
    }

    public function updatecourse(Request $request){
        $request->validate([
            'courseName' => 'required|max:255',
            'abbreviation' => 'required|max:255',
            'description' => 'required',
            'code' => 'required|max:255',
            'link' => 'url|nullable',
        ]);
        $coursenameunique = Courses::where('deleted', '=', null)->where('id', '!=', $request->id)->where('courseName', '=', $request->get('courseName'))->get();
        if($coursenameunique->count() == 0){
            $courseabbunique = Courses::where('deleted', '=', null)->where('id', '!=', $request->id)->where('abbreviation', '=', $request->get('abbreviation'))->get();
            if($courseabbunique->count() == 0){
                $coursecodeunique = Courses::where('deleted', '=', null)->where('id', '!=', $request->id)->where('code', '=', $request->get('code'))->get();
                if($coursecodeunique->count() == 0){

                    $courseId = $request->id;
                    $course   =   Courses::updateOrCreate(
                                [
                                'id' => $courseId
                                ],
                                [
                                'courseName' => $request->courseName, 
                                'abbreviation' => $request->abbreviation,
                                'description' => $request->description,
                                'code' => $request->code,
                                'link' => $request->link,
                                ]);    
                                    
                    return Response()->json($course);
                }else{
                    return response()->json(['error' => 'Code is already taken.'], 422); 
                }
            }else{
                return response()->json(['error' => 'Abbreviation is already taken.'], 422); 
            }
        }else{
            return response()->json(['error' => 'Name is already taken.'], 422); 
        }

   }


     public function deletegradecourse(Request $request){
        // $validated = $request->validate([
        //     'deleted' => ['required'],
        //     'deleted_at' => ['required'],
        // ]);
        // $course->update($validated);
        // return redirect('/gradingcourses')->with('success', 'Strand has been deleted successfully!');
        $course = Courses::findOrFail($request->id);
        if ($course){
            $courseId = $request->id;
            $course   =   Courses::updateOrCreate(
            [
                'id' => $courseId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
            ]);                
            return Response()->json($course);
        }
        
    }

     public function deletecourse(Request $request){
        $where = array('id' => $request->id);
        $course  = Courses::where($where)->first();
      
        return Response()->json($course);
     }

     // ============================================================ SECTION ===================================================

     public function section(){
        // $courses = Courses::where('deleted', '=', null)->get();
        // return view('admins.grading.courses', compact('courses'));
        if(request()->ajax()) {
            return datatables()->of(Sections::where('deleted', '=', null))
            ->addColumn('action', 'admins.grading.action-button-gradelevel')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.grading.sections');
    }

    public function showsection(Request $request)
    {   
        $where = array('id' => $request->id);
        $section  = Sections::where($where)->first();
      
        return Response()->json($section);
    }   

    // public function addcourse(){
    //     return view('admins.grading.functions.courseadd');
    // }

    public function storesection(Request $request){
        $request->validate([
            'section' => 'required|max:255',
        ]);
        $sectionunique = Sections::where('deleted', '=', null)->where('section', '=', $request->get('section'))->get();
        if($sectionunique->count() == 0){
            $section = new Sections();
            $section->section = $request->section;
            $section->save();
            return response()->json(array('success' => true));
        }
        else{
            return response()->json(['error' => 'Section is already taken.'], 422); 
        }
            
    }    

    
    // public function viewcourse($id){
    //     $data = Courses::where('deleted', '=', null)->findOrFail($id);
    //     return view('admins.grading.functions.courseview', ['course' => $data]);
    // }


    // public function showcourse($id){
    //     $data = Courses::where('deleted', '=', null)->findOrFail($id);
    //     return view('admins.grading.functions.courseupdate', ['course' => $data]);
    // }

    public function updatesection(Request $request){
        $request->validate([
            'section' => 'required',
        ]);
        $sectionunique = Sections::where('deleted', '=', null)->where('id', '!=', $request->id)->where('section', '=', $request->get('section'))->get();
        if($sectionunique->count() == 0){
            $section = Sections::find($request->id);
            $section->section = $request->section;
            $section->save();
            return response()->json($section);
        }
        else{
            return response()->json(['error' => 'Section is already taken.'], 422); 
        }
   }


     public function deletegradesection(Request $request){
        $section = Sections::findOrFail($request->id);
        if ($section){
            $sectionId = $request->id;
            $section   =   Sections::updateOrCreate(
            [
                'id' => $sectionId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
            ]);                
            return Response()->json($section);
        }
        
    }

     public function deletesection(Request $request){
        $where = array('id' => $request->id);
        $section  = Sections::where($where)->first();
      
        return Response()->json($section);
     }

    public function viewsection($id){
        $data = Sections::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.sectionview', ['section' => $data]);
    }

    // ============================================================ LOAD ===================================================

    public function showminload(){
        $minload  = Loads::where('id', '=', 1)->first();
        return Response()->json($minload);
    }

    public function updateminload(Request $request){
        $request->validate([
            'regular_load' => ['required'],
        ]);
        $id = 1;
        $minload = Loads::find($id); 
        $minload->regular_load = $request->regular_load;
        $minload->save();
        return response()->json($minload);
    }

    public function showmaxload(){
        $maxload  = Loads::where('id', '=', 1)->first();
        return Response()->json($maxload);
    }

    public function updatemaxload(Request $request){
        $request->validate([
            'master_load' => ['required'],
        ]);
        $id = 1;
        $maxload = Loads::find($id); 
        $maxload->master_load = $request->master_load;
        $maxload->save();
        return response()->json($maxload);
    }
   // ============================================================ FACULTY ===================================================

    public function faculty(){
        if(request()->ajax()) {
            $faculty = DB::table('faculties')
            // join it with drawing table
            ->where('faculties.deleted', '=', null)->join('expertises', 'faculties.expertise_id', '=', 'expertises.id')
            //select columns for new virtual table. ID columns must be renamed, because they have the same title
            ->select(['faculties.id', 'faculties.first_name', 'faculties.middle_name', 'faculties.last_name', 'faculties.suffix', 'faculties.email', 'faculties.subject_load', 'faculties.class_load', 'faculties.isMaster', 'expertises.expertise', 'expertises.id AS expertise_id']);
            // feed new virtual table to datatables and let it preform rest of the query (like, limit, skip, order etc.)
            return datatables()->of($faculty)
            ->addColumn('action', 'admins.grading.action-button-faculty')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $expertises = Expertises::where('deleted', '=', null)->get();
        $load = Loads::where('deleted', '=', null)->first();
        return view('admins.grading.faculty', compact('load', 'expertises'));
    }

    public function addbatchfaculty(){
        return view('admins.grading.functions.facultybatchadd');
    }

    public function storefaculty(Request $request){
        // Validate the inputs
        $validated = $request->validate([
            'expertise_id' => ['required'],
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'suffix' => 'nullable|max:255',
            'email' => ['required', 'email', Rule::unique('faculties', 'email')],
            'isMaster' => ['required'],
        ]);

        if (Faculties::where('first_name', '=', $request->get("first_name"))->count() <= 0 || Faculties::where('middle_name', '=', $request->get("middle_name"))->count() <= 0
        || Faculties::where('last_name', '=', $request->get("last_name"))->count() <= 0 || Faculties::where('suffix', '=', $request->get("suffix"))->count() <= 0) {
            // hashing
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
            $validated['password'] = bcrypt($pass);
            $user = Addresses::create([
                'city'=> 'Taguig City',
            ]);
            $user->faculty()->create($validated);
            Mail::to($validated['email'])->send(new RegisterMail($pass));
            return response()->json(array('success' => true));   
        }
        else{
            return response()->json(['error' => 'Sorry. Teacher has a duplicate name.'], 422); 
        }
    }


    public function viewfaculty($id){
        $subjectteachers = SubjectTeachers::where('faculty_id', '=', $id)->groupBy('schoolyear_id')->where('deleted', '=', null)->orderBy('id', 'DESC')->get();
        $subjects = SubjectTeachers::where('faculty_id', '=', $id)->where('deleted', '=', null)->get();
        $faculty = Faculties::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.facultyview', compact('subjectteachers', 'subjects', 'faculty'));
    }

    public function showfaculty(Request $request)
    {   
        $where = array('id' => $request->id);
        $faculties  = Faculties::where($where)->first();
      
        return Response()->json($faculties);
    }   

    public function updatefaculty(Request $request){
        $request->validate([
            'expertise_id' => ['required'],
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'suffix' => 'nullable|max:255',
            "email" => 'required|email:rfc,dns|email|unique:faculties,email,' . $request->id,
            'isMaster' => 'nullable',
        ]);
        $faculty = Faculties::find($request->id); 
        $faculty->expertise_id = $request->expertise_id;
        $faculty->last_name = $request->last_name;
        $faculty->first_name = $request->first_name;
        $faculty->middle_name = $request->middle_name;
        $faculty->suffix = $request->suffix;
        $faculty->email = $request->email;
        $faculty->isMaster = $request->isMaster;
        $faculty->save();
        return response()->json($faculty);
    }

    public function deletegradefaculty(Request $request){
        $faculty = Faculties::findOrFail($request->id);
        if ($faculty){
            $facultyId = $request->id;
            $faculty   =   Faculties::updateOrCreate(
            [
                'id' => $facultyId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
                'email' => "",
                'password' => "", 
            ]);                
            return Response()->json($faculty);
        }
     }

     public function deletefaculty(Request $request){
        $where = array('id' => $request->id);
        $faculty  = Faculties::where($where)->first();
      
        return Response()->json($faculty);
     }

    public function downloadFacultyFileFormat() {
        $file_name = 'Faculty Excel Format.xlsx';
        $file_path = public_path('uploads/'.$file_name);
        return response()->download($file_path);
    } 

    function importFacultyBulk(Request $request){
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        // $path = $request->file('select_file')->getRealPath();
        // $data = Excel::load($path)->get();
        $path1 = $request->file('select_file')->store('temp'); 
        $path=storage_path('app').'/'.$path1;  
        $data = Excel::toArray([],$path);
        if(count($data) > 0){
            $excludedRows = 1;
            foreach($data as $key => $value){
                foreach($value as $row){
                    if($excludedRows > 3){
                        $sliced = array_slice($row,-4,6);
                        if(in_array(null, $sliced, true)){
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
                            $password = bcrypt($pass);

                            $address_id = DB::table('addresses')-> insertGetId(array(
                                'city'=> 'Taguig City',
                            ));
                            $expertise_id = Expertises::where('deleted', '=', null)->where('expertise', '=', $row[6])->first()->id;
                            if($row[7] == 'Regular'){
                                $status = 1;
                            }else{
                                $status = 0;
                            }
                            $insert_data[] = array(
                                'address_id' => $address_id,
                                'last_name'   => $row[0],
                                'first_name'  => $row[1],
                                'middle_name'   => $row[2],
                                'suffix'    => $row[3],
                                'email'  => $row[4],
                                'gender'   => $row[5],
                                'expertise_id'   => $expertise_id,
                                'password'   => $password,
                                'isMaster' => $status,
                            );
                            Mail::to($row[4])->send(new RegisterMail($pass));
                        }
                    }
                    $excludedRows++;
                }
            }
            if(!empty($insert_data)){
                DB::table('faculties')->insert($insert_data);
                return back()->with('success', 'Teacher(s) has been added successfully.');
            }
        }
    }

    // ============================================================ EXPERTISES ===================================================

    public function expertise(){
        if(request()->ajax()) {
            return datatables()->of(Expertises::where('deleted', '=', null))
            ->addColumn('action', 'admins.grading.action-button-expertise')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.grading.expertise');
    }

    public function storeexpertise(Request $request){
        // Validate the inputs
        $request->validate([
            'expertise' => 'required|max:255',
        ]);
        $expertiseunique = Expertises::where('deleted', '=', null)->where('expertise', '=', $request->get('expertise'))->get();
        if($expertiseunique->count()==0){
            $expertise = new Expertises();
            $expertise->expertise = $request->get('expertise');
            $expertise->save();
            return response()->json(array('success' => true));
        }else{
            return response()->json(['error' => 'Expertise is already taken.'], 422); 
        }
    }    

    public function viewexpertise(Request $request){
        $where = array('id' => $request->id);
        $subject = Subjects::where('expertise_id', '=', $where)->where('deleted', '=', null)->get();
        return Response()->json($subject);
    }

    public function viewteacherexpertise(Request $request){
        $where = array('id' => $request->id);
        $faculty = Faculties::where('expertise_id', '=', $where)->where('deleted', '=', null)->get();
        return Response()->json($faculty);
    }

    public function showexpertise(Request $request)
    {   
        $where = array('id' => $request->id);
        $expertise  = Expertises::where($where)->first();
      
        return Response()->json($expertise);
    }   

    public function updateexpertise(Request $request){
        $request->validate([
            'expertise' => 'required',
        ]);
        $expertiseunique = Expertises::where('deleted', '=', null)->where('id', '!=', $request->id)->where('expertise', '=', $request->get('expertise'))->get();
        if($expertiseunique->count()==0){
            $expertise = Expertises::find($request->id);
            $expertise->expertise = $request->expertise;
            $expertise->save();
            return response()->json($expertise);
        }else{
            return response()->json(['error' => 'Expertise is already taken.'], 422); 
        }
    }    

     public function deletegradeexpertise(Request $request){
        $expertise = Expertises::findOrFail($request->id);
        if ($expertise){
            $expertiseId = $request->id;
            $expertise   =   expertises::updateOrCreate(
            [
                'id' => $expertiseId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
            ]);                
            return Response()->json($expertise);
        }
     }

     public function deleteexpertise(Request $request){
        $where = array('id' => $request->id);
        $expertise  = Expertises::where($where)->first();
      
        return Response()->json($expertise);
     }


     // ============================================================ STUDENT ===================================================

    public function student(){
        if(request()->ajax()) {
            return datatables()->of(Students::where('deleted', '=', null)->where('status', '=', 1))
            ->addColumn('action', 'admins.grading.action-button-student')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $gradelevels = GradeLevels::where('deleted', '=', null)->get();
        $sections = Sections::where('deleted', '=', null)->get();
        $courses = Courses::where('deleted', '=', null)->get();
        return view('admins.grading.student', compact('gradelevels', 'sections', 'courses'));
    }
    
     public function alumni(){
        if(request()->ajax()) {
            return datatables()->of(Students::where('deleted', '=', null)->where('status', '=', 2))
            ->addColumn('action', 'admins.grading.action-button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $gradelevels = GradeLevels::where('deleted', '=', null)->get();
        $sections = Sections::where('deleted', '=', null)->get();
        $courses = Courses::where('deleted', '=', null)->get();
        return view('admins.grading.alumni', compact('gradelevels', 'sections', 'courses'));
    }

    public function dropped(){
        if(request()->ajax()) {
            return datatables()->of(Students::where('deleted', '=', null)->where('status', '=', 3))
            ->addColumn('action', 'admins.grading.action-button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $gradelevels = GradeLevels::where('deleted', '=', null)->get();
        $sections = Sections::where('deleted', '=', null)->get();
        $courses = Courses::where('deleted', '=', null)->get();
        return view('admins.grading.dropped', compact('gradelevels', 'sections', 'courses'));

    }

    public function addbatchstudent(){
        return view('admins.grading.functions.studentbatchadd');
    }

    public function storestudent(Request $request){
        // Validate the inputs

            $validated = $request->validate([
                'LRN' => 'required|min:12|max:12|unique:students,LRN',
                'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'suffix' => 'nullable|max:255',
                'section_id' => ['required'],
                'gender' => ['required'],
                'section_id' => ['required'],
                'gradelevel_id' => ['required'],
                'email' => ['required', 'email', Rule::unique('students', 'email')],
                'course_id' => ['required'],
        ]);

        if (Students::where('first_name', '=', $request->get("first_name"))->count() <= 0 || Students::where('middle_name', '=', $request->get("middle_name"))->count() <= 0
        || Students::where('last_name', '=', $request->get("last_name"))->count() <= 0 || Students::where('suffix', '=', $request->get("suffix"))->count() <= 0) {
            // hashing
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
            $validated['password'] = bcrypt($pass);

            $user = Addresses::create([
                'city'=> 'Taguig City',
            ]);

            $user->student()->create($validated);

                $course_id = $validated['course_id'];
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
            
            Mail::to($validated['email'])->send(new RegisterMail($pass));
            return response()->json(array('success' => true));  
        }
        else{
            return response()->json(['error' => 'Sorry. Student have a duplicate name.'], 422); 
        }
    }  


    public function viewstudent(Request $request){
        $where = array('id' => $request->id);
        $student = Students::where($where)->first();
      
        return Response()->json($student);
    }


    public function showstudent(Request $request){
        $where = array('id' => $request->id);
        $student  = Students::where($where)->first();
      
        return Response()->json($student);
    }

    public function updatestudent(Request $request){
        $request->validate([
            'LRN' => 'required|min:12|max:12|unique:students,LRN,' . $request->id,
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'suffix' => 'nullable|max:255',
            "email" => 'required|email:rfc,dns|email|unique:students,email,' . $request->id,
            'section_id' => 'required',
            'course_id' => 'required',
            'gradelevel_id' => 'required',
        ]);
        $student = Students::find($request->id);
        $student->LRN = $request->LRN;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->suffix = $request->suffix;
        $student->email = $request->email;
        $student->section_id = $request->section_id;
        $student->course_id = $request->course_id;
        $student->gradelevel_id = $request->gradelevel_id;
        $student->save();
        return response()->json($student);
        
    }

    public function deletegradestudent(Request $request){
        $student = Students::findOrFail($request->id);
        if ($student){
            $studentId = $request->id;
            $student   =   Students::updateOrCreate(
            [
                'id' => $studentId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
                'email'=> "",
                'password' => "",
            ]);                
            return Response()->json($student);
        }
     }

     public function dropstudent(Request $request){
        $where = array('id' => $request->id);
        $student  = Students::where($where)->first();
      
        return Response()->json($student);
     }

     public function dropgradestudent(Request $request){
        $student = Students::findOrFail($request->id);
        if ($student){
            $studentId = $request->id;
            $student   =   Students::updateOrCreate(
            [
                'id' => $studentId
            ],
            [
                'status' => 3, 
            ]);                
            return Response()->json($student);
        }
     }

     public function deletestudent(Request $request){
        $where = array('id' => $request->id);
        $student  = Students::where($where)->first();
      
        return Response()->json($student);
     }


     public function downloadpdfstu(Request $request) {
        $request->validate([
            'dateFrom' => 'required',
            'dateTo' => 'required',
        ]);
        $users =  Students::where('deleted', '=', null)
                    ->where('created_at', '>=',  $request->get('dateFrom'))
                    ->where('created_at', '<=',  $request->get('dateTo'))->get();
        $from = $request->get('dateFrom');
        $to = $request->get('dateTo');
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('admins.grading.pdf', compact('users', 'from', 'to'));
        return $pdf->download('StudentReport.pdf');
      }

      public function addstudentsubject($id){
        $student = Students::where('deleted', '=', null)->where('status', '=', 1)->findOrFail($id);
        $subjects = Subjects::where('deleted', '=', null)->get();
        $semesters = Semesters::all();
        $faculties = Faculties::where('deleted', '=', null)->get();
        $gradelevels = GradeLevels::where('deleted', '=', null)->get();
        return view('admins.grading.functions.studentaddsubject', compact('student', 'subjects', 'semesters', 'faculties', 'gradelevels'));
    }

    public function studentsubjectadd(Request $request){
        $request->validate([
            'gradelevel_id' => 'required',
            'subject_id' => 'required',
            'student_id' => 'required',
            'faculty_id' => 'required',
            'semester_id' => 'required',
        ]);
        $schoolyear = DB::table('school_years')->latest('id')->first();
        $facultysubject = SubjectTeachers::where('faculty_id', '=', $request->faculty_id)->where('subject_id', '=', $request->subject_id)
        ->where('schoolyear_id', '=', $schoolyear->id)->where('semester_id', '=', $request->semester_id)->where('gradelevel_id', '=', $request->gradelevel_id)->first();
        if($facultysubject == null){
            return response()->json(['error' => 'Sorry! No class offering for this teacher this semester.'], 422); 
        }
        else{
            $studentredundant = StudentGrade::where('student_id', '=', $request->student_id)->where('subject_id', '=', $request->subject_id)->first();
            
            if($studentredundant != null){
                $average = $studentredundant->midterm + $studentredundant->finals;
                if($average>74){
                    return response()->json(['error' => 'Sorry! The student already passed the subject.'], 422); 
                }
                else if($average==0){
                    return response()->json(['error' => 'Sorry! The average of student for this subject is 0, previous teacher must grade the student first to be eligible for reenrollment of subject.'], 422); 
                }
                else{
                 
                    $studentgrade = new StudentGrade();
                    $studentgrade->student_id = $request->get('student_id');
                    $studentgrade->gradelevel_id = $request->get('gradelevel_id');
                    $studentgrade->subject_id = $request->get('subject_id');
                    $studentgrade->faculty_id = $request->get('faculty_id');
                    $studentgrade->subjectteacher_id = $facultysubject->id;
                    $studentgrade->schoolyear_id = $schoolyear->id;
                    $studentgrade->semester_id = $request->get('semester_id');
                    $studentgrade->save();
                    return response()->json(array('success' => true));   
                }
            }
            else{
                $studentgrade = new StudentGrade();
                $studentgrade->student_id = $request->get('student_id');
                $studentgrade->gradelevel_id = $request->get('gradelevel_id');
                $studentgrade->subject_id = $request->get('subject_id');
                $studentgrade->faculty_id = $request->get('faculty_id');
                $studentgrade->subjectteacher_id = $facultysubject->id;
                $studentgrade->schoolyear_id = $schoolyear->id;
                $studentgrade->semester_id = $request->get('semester_id');
                $studentgrade->save();
                return response()->json(array('success' => true));   
            }
        }
    }

    public function downloadStudentFileFormat() {
        $file_name = 'Student Excel Format.xlsx';
        $file_path = public_path('uploads/'.$file_name);
        return response()->download($file_path);
    } 

    function importStudentBulk(Request $request){
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        // $path = $request->file('select_file')->getRealPath();
        // $data = Excel::load($path)->get();
        $path1 = $request->file('select_file')->store('temp'); 
        $path=storage_path('app').'/'.$path1;  
        $data = Excel::toArray([],$path);
        if(count($data) > 0){
            $excludedRows = 1;
            $schoolyear = DB::table('school_years')->latest('id')->first();
            $student_id = DB::table('students')->latest('id')->first()->id;
            foreach($data as $key => $value){
                foreach($value as $row){
                    if($excludedRows > 3){
                        $sliced = array_slice($row,-3,9);
                        if(in_array(null, $sliced, true)){
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
                            $password = bcrypt($pass);

                            $address_id = DB::table('addresses')-> insertGetId(array(
                                'city'=> 'Taguig City',
                            ));

                            $course_id = Courses::where('deleted', '=', null)->where('abbreviation', '=', $row[1])->first()->id;
                            $section_id = Sections::where('deleted', '=', null)->where('section', '=', $row[2])->first()->id;
                            $gradelevel_id = GradeLevels::where('deleted', '=', null)->where('gradelevel', '=', $row[0])->first()->id;

                            $insert_data[] = array(
                                'address_id' => $address_id,
                                'course_id' => $course_id,
                                'section_id'=> $section_id,
                                'LRN' => $row[3],
                                'gradelevel_id' => $gradelevel_id,
                                'last_name'   => $row[4],
                                'first_name'  => $row[5],
                                'middle_name'   => $row[6],
                                'suffix'    => $row[7],
                                'email'  => $row[8],
                                'gender'   => $row[9],
                                'username'   => $row[10],
                                'password'   => $password,
                            );

                            $student_id++;
                            $subjects = DB::table('subject_teachers')->where('deleted', '=', NULL)->where('course_id', '=', $course_id)->where('section_id', '=', $section_id)
                                    ->where('gradelevel_id', '=', $gradelevel_id)->where('schoolyear_id', '=', $schoolyear->id)->get();
                                
                            if($subjects->count() != 0){ 
                                foreach($subjects as $subject){
                                    $studentgrade = new StudentGrade;
                                    $studentgrade->student_id =  $student_id;
                                    $studentgrade->gradelevel_id = $subject->gradelevel_id;
                                    $studentgrade->semester_id = $subject->semester_id;
                                    $studentgrade->subject_id = $subject->subject_id;
                                    $studentgrade->faculty_id = $subject->faculty_id;
                                    $studentgrade->subjectteacher_id = $subject->id;
                                    $studentgrade->schoolyear_id = $schoolyear->id;
                                    $studentgrade->save();
                                }
                            }

                            Mail::to($row[8])->send(new RegisterMail($pass));
                        }
                    }
                    $excludedRows++;
                }
            }
            if(!empty($insert_data)){
                DB::table('students')->insert($insert_data);
                return back()->with('success', 'Student(s) has been added successfully.');
            }
        }
    }

    

     // ============================================================ SUBJECT ===================================================

    public function subjects(){
        if(request()->ajax()) {
            $drawings = DB::table('expertises')
            // join it with drawing table
            ->where('subjects.deleted', '=', null)->join('subjects', 'subjects.expertise_id', '=', 'expertises.id')
            //select columns for new virtual table. ID columns must be renamed, because they have the same title
            ->select(['subjects.id', 'subjects.subjectname', 'subjects.subjectcode', 'subjects.description', 'expertises.expertise', 'expertises.id AS expertise_id']);
            // feed new virtual table to datatables and let it preform rest of the query (like, limit, skip, order etc.)
            return datatables()->of($drawings)
            ->addColumn('action', 'admins.grading.action-button')
            ->rawColumns(['action'])
            ->make(true);
        }
        $expertises = Expertises::where('deleted', '=', null)->get();
        return view('admins.grading.subject',  compact('expertises'));
    }

    public function storesubject(Request $request){
        // Validate the inputs
        $request->validate([
            'subjectcode' => 'required|max:255',
            'subjectname' => 'required|max:255',
            'description' => 'required',
            'expertise_id' => 'required',
        ]);
        $subjectcodeunique = Subjects::where('deleted', '=', null)->where('subjectcode', '=', $request->get('subjectcode'))->get();
        if($subjectcodeunique->count()==0){
            $subjectnameunique = Subjects::where('deleted', '=', null)->where('subjectname', '=', $request->get('subjectname'))->get();
            if($subjectnameunique->count()==0){
                $subject = new Subjects();
                $subject->subjectcode = $request->get('subjectcode');
                $subject->subjectname = $request->get('subjectname');
                $subject->description = $request->get('description');
                $subject->expertise_id = $request->get('expertise_id');
                $subject->save();
                return response()->json(array('success' => true));   
            }else{
                return response()->json(['error' => 'Subject name is already taken.'], 422); 
            }
        }else{
            return response()->json(['error' => 'Subject code is already taken.'], 422); 
        }
    }  

    public function viewsubject(Request $request){
        $where = array('id' => $request->id);
        $subject  = Subjects::where($where)->first();
      
        return Response()->json($subject);
    }

    public function showsubject(Request $request)
    {   
        $where = array('id' => $request->id);
        $subject  = Subjects::where($where)->first();
      
        return Response()->json($subject);
    }   

    public function updatesubject(Request $request){
        $request->validate([
            'subjectcode' => 'required|max:255',
            'subjectname' => 'required|max:255',
            'description' => 'required',
            'expertise_id' => 'required',
        ]);
        $subjectcodeunique = Subjects::where('deleted', '=', null)->where('id', '!=', $request->id)->where('subjectcode', '=', $request->get('subjectcode'))->get();
        if($subjectcodeunique->count()==0){
            $subjectnameunique = Subjects::where('deleted', '=', null)->where('id', '!=', $request->id)->where('subjectname', '=', $request->get('subjectname'))->get();
            if($subjectnameunique->count()==0){
                $subject = Subjects::find($request->id);
                $subject->subjectcode = $request->get('subjectcode');
                $subject->subjectname = $request->get('subjectname');
                $subject->description = $request->get('description');
                $subject->expertise_id = $request->get('expertise_id');
                $subject->save();
                return response()->json($subject);
            }else{
                return response()->json(['error' => 'Subject name is already taken.'], 422); 
            }
        }else{
            return response()->json(['error' => 'Subject code is already taken.'], 422); 
        }
    }


     public function deletegradesubject(Request $request){
        $subject = Subjects::findOrFail($request->id);
        if ($subject){
            $subjectId = $request->id;
            $subject   =   Subjects::updateOrCreate(
            [
                'id' => $subjectId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
            ]);                
            return Response()->json($subject);
        }
     }

     public function deletesubject(Request $request){
        $where = array('id' => $request->id);
        $subject  = Subjects::where($where)->first();
      
        return Response()->json($subject);
     }


    // ============================================================ SCHOOL YEAR ===================================================

    public function schoolyear(){
        // $schoolyears = SchoolYear::where('deleted', '=', null)->orderBy('id', 'DESC')->get();
        // return view('admins.grading.schoolyear', compact('schoolyears'));
        if(request()->ajax()) {
            return datatables()->of(SchoolYear::where('deleted', '=', null))
            ->addColumn('action', 'admins.grading.action-button')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.grading.schoolyear');
    }

    public function viewschoolyear(Request $request){
        $where = array('id' => $request->id);
        $schoolyear    = SchoolYear::where($where)->first();
      
        return Response()->json($schoolyear);
    }


    public function showschoolyear(Request $request){
        $where = array('id' => $request->id);
        $schoolyear    = SchoolYear::where($where)->first();
      
        return Response()->json($schoolyear);
    }

    // public function addschoolyear(){
    //     return view('admins.grading.functions.schoolyearadd');
    // }

    public function storeschoolyear(Request $request){
        // Validate the inputs      
        $schoolyearunique = SchoolYear::where('deleted', '=', null)->where('schoolyear', '=', $request->get('schoolyear'))->get();
        if($schoolyearunique->count() == 0){
            $schoolyear = new SchoolYear();
            $schoolyear->schoolyear = $request->get('schoolyear');
            $schoolyear->save();
    
            Students::where('deleted', '=', null)->where('status', '=', 1)->increment('gradelevel_id', 1, ['updated_at' => now()]);
            Students::query()->where('gradelevel_id', '<', 1)->orWhere('gradelevel_id', '>', 2)->update(['status' => 2]);
            Advisories::query()->update(['active' => 1]);
            $ads = Advisories::where('deleted', '=', null)->get();
            foreach($ads as $ad){
                $newAdvisories = new Advisories;
                $newAdvisories->faculty_id = $ad->faculty_id;
                $newAdvisories->gradelevel_id = $ad->gradelevel_id;
                $newAdvisories->course_id = $ad->course_id;
                $newAdvisories->section_id = $ad->section_id;
                $newAdvisories->schoolyear_id = $ad->schoolyear_id;
                $newAdvisories->faculty_id = $ad->faculty_id;
                $newAdvisories->save();
            }
            return response()->json(array('success' => true));   
        }
        else{
            return response()->json(['error' => 'Schoolyear is already taken.'], 422); 
        }
            
    }    

    public function updateschoolyear(Request $request){
        $request->validate([
            'schoolyear' => 'required',
        ]);
        $schoolyearunique = SchoolYear::where('deleted', '=', null)->where('id', '!=', $request->id)->where('schoolyear', '=', $request->get('schoolyear'))->get();
        if($schoolyearunique->count() == 0){
            $schoolyear = SchoolYear::find($request->id);
            $schoolyear->schoolyear = $request->schoolyear;
            $schoolyear->save();
            return response()->json($schoolyear);
        }else{
            return response()->json(['error' => 'Schoolyear is already taken.'], 422); 
        }
   }

     public function deletegradeschoolyear(Request $request){
        $count = SchoolYear::all();
        if($count->count() == 1){
            return response()->json(['error' => 'Sorry. You cannot delete the only schoolyear.'], 422); 
        }
        else{
            $schoolyear = SchoolYear::findOrFail($request->id);
            if ($schoolyear){
                $courseId = $request->id;
                $schoolyear   =   SchoolYear::updateOrCreate(
                [
                    'id' => $courseId
                ],
                [
                    'deleted' => 1, 
                    'deleted_at' => now(),
                ]);                
                return Response()->json($schoolyear);
            }
        }
        
    }

     public function deleteschoolyear(Request $request){
        $where = array('id' => $request->id);
        $schoolyear  = SchoolYear::where($where)->first();
      
        return Response()->json($schoolyear);
     }


    // ============================================================ SUBJECT TEACHER ===================================================

    public function facultysubjects(){
        $subjectteachers = SubjectTeachers::where('deleted', '=', null)->orderBy('id', 'ASC')->get();
        return view('admins.grading.facultysubjects', compact('subjectteachers'));
    }

    public function subjectteacheradd(){
        $faculties = Faculties::where('deleted', '=', null)->get();
        $expertises = Expertises::where('deleted', '=', null)->get();
        $gradelevels = GradeLevels::where('deleted', '=', null)->get();
        $semesters = Semesters::all();
        $courses = Courses::where('deleted', '=', null)->get();
        $sections =Sections::where('deleted', '=', null)->get();
        $subjects = Subjects::where('deleted', '=', null)->get();
        return view('admins.grading.functions.subjectteacheradd', compact('faculties', 'gradelevels', 'semesters', 'courses', 'sections', 'subjects', 'expertises'));
    }

    public function subjectsearch(Request $request){
        $subject = Subjects::find($request->subject_id);
        return response()->json($subject);
    }

    public function teachersearch(Request $request){
        $teacher = Faculties::where('expertise_id', '=', $request->expertise_id)->get();
        return response()->json($teacher);
    }

    public function subjectteacherstore(Request $request){
        $request->validate([
            'faculty_id' => ['required'],
            'gradelevel_id' => ['required'],
            'semester_id' => ['required'],
            'course_id' => ['required'],
            'section_id' => ['required'],
            'subject_id' => ['required'],
            'time_start' => ['required'],
            'time_end' => ['required'],
        ]);
        $schoolyear = DB::table('school_years')->latest('id')->first();
        // count current subject om that class
        $checkLoads = SubjectTeachers::where('faculty_id', '=', $request->faculty_id)->where('gradelevel_id', '=', $request->gradelevel_id)->where('semester_id', '=', $request->semester_id)->where('course_id', '=', $request->course_id)->where('section_id', '=', $request->section_id)->where('schoolyear_id', '=', $schoolyear->id)->get();
        if($checkLoads->count() == null || $checkLoads->count() <= 2){

            //check current class load
            // $classload = DB::table('subject_teachers')->where('id', '=', $request->faculty_id)->where('schoolyear_id', '=', $year)->distinct()->count('course_id');
            $classload = DB::table('faculties')->where('id', '=', $request->faculty_id)->select('isMaster')->first();
            $findallclasses = DB::table('subject_teachers')->where('faculty_id', '=', $request->faculty_id)->where('schoolyear_id', '=', $schoolyear->id)->select('gradelevel_id', 'semester_id', 'course_id', 'section_id')->groupBy('gradelevel_id')->groupBy('semester_id')->groupBy('course_id')->groupBy('section_id')->get();
            if($classload == NULL){
                $limit = 6;
            }else{
                $limit = 5;
            }
            if($findallclasses->count() <= $limit){

                $checkAdvisor = Advisories::where('deleted', '=', null)->where('gradelevel_id', '=', $request->gradelevel_id)->where('course_id', '=', $request->course_id)->where('section_id', '=', $request->section_id)->where('schoolyear_id', '=', $schoolyear->id)->get();
                if($checkAdvisor->count() != 0){
                    $subjectteacherredundant = SubjectTeachers::where('deleted', '=', null)->where('faculty_id', '=', $request->faculty_id)->where('gradelevel_id', '=', $request->gradelevel_id)->where('semester_id', '=', $request->semester_id)->where('course_id', '=', $request->course_id)->where('section_id', '=', $request->section_id)->where('subject_id', '=', $request->subject_id)->where('schoolyear_id', '=', $schoolyear->id)->get();
                    if($subjectteacherredundant->count() == 0){
                        // check schedule confilcts
                        $scheduleconfilcts = SubjectTeachers::where('deleted', '=', null)->where('gradelevel_id', '=', $request->gradelevel_id)->where('semester_id', '=', $request->semester_id)->where('course_id', '=', $request->course_id)->where('section_id', '=', $request->section_id)->where('schoolyear_id', '=', $schoolyear->id)->where('time_start', '=', $request->time_start)->where('time_end', '=', $request->time_end)->where('monday', '=', $request->get('monday'))->where('tuesday', '=', $request->get('tuesday'))->where('wednesday', '=', $request->get('wednesday'))->where('thursday', '=', $request->get('thursday'))->where('friday', '=', $request->get('friday'))->where('saturday', '=', $request->get('saturday'))->get();
                        if($scheduleconfilcts->count() == 0){
                            $subjectteacher = new SubjectTeachers;
                            $subjectteacher->schoolyear_id = $schoolyear->id;
                            $subjectteacher->faculty_id = $request->get('faculty_id');
                            $subjectteacher->gradelevel_id = $request->get('gradelevel_id');
                            $subjectteacher->semester_id = $request->get('semester_id');
                            $subjectteacher->course_id = $request->get('course_id');
                            $subjectteacher->section_id = $request->get('section_id');
                            $subjectteacher->subject_id = $request->get('subject_id');
                            $subjectteacher->time_start = $request->get('time_start');
                            $subjectteacher->time_end = $request->get('time_end');
                            $subjectteacher->monday = $request->get('monday');
                            $subjectteacher->tuesday = $request->get('tuesday');
                            $subjectteacher->wednesday = $request->get('wednesday');
                            $subjectteacher->thursday = $request->get('thursday');
                            $subjectteacher->friday = $request->get('friday');
                            $subjectteacher->saturday = $request->get('saturday');
                            $subjectteacher->save();

                            //add subject load
                            Faculties::where('id', '=', $request->faculty_id)->increment('subject_load');

                            //add class load
                            $countuniqueclass = SubjectTeachers::where('faculty_id', '=', $request->faculty_id)->where('gradelevel_id', '=', $request->gradelevel_id)->where('semester_id', '=', $request->semester_id)->where('course_id', '=', $request->course_id)->where('section_id', '=', $request->section_id)->where('schoolyear_id', '=', $schoolyear->id)->get();
                            if($countuniqueclass->count() == 1){
                                Faculties::where('id', '=', $request->faculty_id)->increment('class_load');
                            }
                            
                            // creating student grade
                    
                            $subjectTeacherId = $subjectteacher->id;
                            $courseId = $subjectteacher->course_id;
                            $gradeLevelId = $subjectteacher->gradelevel_id;
                            $sectionId = $subjectteacher->section_id;
                            $semesterId = $subjectteacher->semester_id;
                            $subjectId = $subjectteacher->subject_id;
                            $teacherId = $subjectteacher->faculty_id;
                            $schoolyearId = $subjectteacher->schoolyear_id;
                            $students = Students::where('deleted', '=', NULL)->where('course_id', '=', $courseId)->where('section_id', '=', $sectionId)
                                        ->where('gradelevel_id', '=', $gradeLevelId)->where('status', '=', 1)->get();
                            if($students->count() != 0){ 
                                foreach($students as $student){
                                    $studentredundant = StudentGrade::where('student_id', '=', $student->id)->where('subject_id', '=', $subjectId)->first();
                                    if($studentredundant == null){
                                        $studentgrade = new StudentGrade;
                                        $studentgrade->student_id = $student->id;
                                        $studentgrade->gradelevel_id = $gradeLevelId;
                                        $studentgrade->semester_id = $semesterId;
                                        $studentgrade->subject_id = $subjectId;
                                        $studentgrade->faculty_id = $teacherId;
                                        $studentgrade->subjectteacher_id = $subjectTeacherId;
                                        $studentgrade->schoolyear_id = $schoolyearId;
                                        $studentgrade->save();
                                    }
                                    else{
                                        $average = $studentredundant->midterm + $studentredundant->finals;
                                        if($average<75){
                                            $studentgrade = new StudentGrade;
                                            $studentgrade->student_id = $student->id;
                                            $studentgrade->gradelevel_id = $gradeLevelId;
                                            $studentgrade->semester_id = $semesterId;
                                            $studentgrade->subject_id = $subjectId;
                                            $studentgrade->faculty_id = $teacherId;
                                            $studentgrade->subjectteacher_id = $subjectTeacherId;
                                            $studentgrade->schoolyear_id = $schoolyearId;
                                            $studentgrade->save();
                                        }
                                    }
                                }
                            }  
                    
                            return response()->json(array('success' => true));  
                        }else{
                            return response()->json(['error' => 'This is a conflicting schedule for this class.'], 422); 
                        }
                        
                    }
            
                    else{
                        return response()->json(['error' => 'This is a duplicate subject for this class.'], 422); 
                    }
                }
                else{
                    return response()->json(['error' => 'Sorry. This class has no advisory teacher. Kindly set first at the Advisory page.'], 422); 
                }
            }
            else{
                return response()->json(['error' => 'Sorry. This teacher has maximum class load.'], 422); 
            }
        }
        else{
            return response()->json(['error' => 'Sorry. This teacher has maximum subject load.'], 422); 
        }
    } 

    public function viewsubjectteacher($id){
        $data = SubjectTeachers::where('deleted', '=', null)->findOrFail($id);
        $faculties = Faculties::where('deleted', '=', null)->get();
        $gradelevels = GradeLevels::all();
        $semesters = Semesters::all();
        $courses = Courses::where('deleted', '=', null)->get();
        $sections =Sections::where('deleted', '=', null)->get();
        $subjects = Subjects::where('deleted', '=', null)->get();
        return view('admins.grading.functions.subjectteacherview', compact('faculties', 'gradelevels', 'semesters', 'courses', 'sections', 'subjects'), ['subjectteacher' => $data]);
    }


    public function showsubjectteacher($id){
        $data = SubjectTeachers::where('deleted', '=', null)->findOrFail($id);
        $faculties = Faculties::where('deleted', '=', null)->get();
        $gradelevels = GradeLevels::all();
        $semesters = Semesters::all();
        $courses = Courses::where('deleted', '=', null)->get();
        $sections =Sections::where('deleted', '=', null)->get();
        $subjects = Subjects::where('deleted', '=', null)->get();
        return view('admins.grading.functions.subjectteacherupdate', compact('faculties', 'gradelevels', 'semesters', 'courses', 'sections', 'subjects'), ['subjectteacher' => $data]);
    }

    public function updatesubjectteacher(Request $request, SubjectTeachers $subjectteacher){
        $request->validate([
            'faculty_id' => ['required'],
            // 'gradelevel_id' => ['required'],
            // 'semester_id' => ['required'],
            // 'course_id' => ['required'],
            // 'section_id' => ['required'],
            'subject_id' => ['required'],
            'time_start' => ['required'],
            'time_end' => ['required'],
        ]);
        $subjectteacher = SubjectTeachers::find($request->id);
        $subjectteacher->faculty_id = $request->faculty_id;
        $subjectteacher->subject_id = $request->subject_id;
        $subjectteacher->time_start = $request->time_start;
        $subjectteacher->time_end = $request->time_end;
        $subjectteacher->monday = $request->get('monday');
        $subjectteacher->tuesday = $request->get('tuesday');
        $subjectteacher->wednesday = $request->get('wednesday');
        $subjectteacher->thursday = $request->get('thursday');
        $subjectteacher->friday = $request->get('friday');
        $subjectteacher->saturday = $request->get('saturday');
        $subjectteacher->save();

        $studentgrades = StudentGrade::where('subjectteacher_id', '=', $subjectteacher->id)->get();
        foreach($studentgrades as $studentgrade){
            // $studentgrade->gradelevel_id = $request->gradelevel_id;
            // $studentgrade->semester_id = $request->semester_id;
            $studentgrade->subject_id = $request->subject_id;
            $studentgrade->faculty_id = $request->faculty_id;
            $studentgrade->save();
        }

        return response()->json($subjectteacher); 
    }

     public function deletegradesubjectteacher(SubjectTeachers $subjectteacher, Request $request, $id){
        // $validated = $request->validate([
        //     'deleted' => ['required'],
        //     'deleted_at' => ['required'],
        // ]);
        // $subjectteacher->update($validated);

        // $studentgrades = StudentGrade::where('subjectteacher_id', '=', $subjectteacher->id)->get();
        // foreach($studentgrades as $studentgrade){
        //     $studentgrade->deleted = 1;
        //     $studentgrade->deleted_at = now();
        //     $studentgrade->save();
        // }

        // return redirect('/gradingfacultysubjects')->with('success', 'Subject of teacher has been deleted successfully!');
            if ($request->ajax()){

                $subjectteacher = SubjectTeachers::findOrFail($id);
                if ($subjectteacher){
    
                    $subjectteacher->deleted = 1;
                    $subjectteacher->deleted_at = now();
                    $subjectteacher->save();

                    $studentgrades = StudentGrade::where('subjectteacher_id', '=', $subjectteacher->id)->get();
                    foreach($studentgrades as $studentgrade){
                        $studentgrade->deleted = 1;
                        $studentgrade->deleted_at = now();
                        $studentgrade->save();
                    }
    
                    return response()->json(array('success' => true));
                }
            }
    }

     public function deletesubjectteacher($id){
        $data = SubjectTeachers::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.subjectteacherdelete', ['subjectteacher' => $data]);
     }

     public function printgrades($id){
        $studentgrades = StudentGrade::where('subjectteacher_id', '=', $id)->orderByRaw('(SELECT last_name FROM students WHERE students.id = student_grades.student_id)')->get();
        $sem = StudentGrade::where('subjectteacher_id', '=', $id)->first();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('admins.grading.pdfgrades', compact('studentgrades', 'sem'));
        return $pdf->download('Grades.pdf');

    }

    // ============================================================ GRADE LEVEL ===================================================


    public function gradelevels(){
        // $schoolyears = SchoolYear::where('deleted', '=', null)->orderBy('id', 'DESC')->get();
        // return view('admins.grading.schoolyear', compact('schoolyears'));
        if(request()->ajax()) {
            return datatables()->of(GradeLevels::where('deleted', '=', null))
            ->addColumn('action', 'admins.grading.action-button-gradelevel')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.grading.gradelevels');
    }


    public function storegradelevel(Request $request){
        // Validate the inputs
        $request->validate([
            'gradelevel' => 'required|numeric',
        ]);
        $gradelevelunique = GradeLevels::where('deleted', '=', null)->where('gradelevel', '=', $request->get('gradelevel'));
        if($gradelevelunique->count()==0){
            $gradelevel = new GradeLevels();
            $gradelevel->gradelevel = $request->get('gradelevel');
            $gradelevel->save();
            return response()->json(array('success' => true));   
        }
        else{
            return response()->json(['error' => 'Gradelevel is already taken.'], 422); 
        }
        
    }    


    public function showgradelevel(Request $request){
        $where = array('id' => $request->id);
        $gradelevel    = GradeLevels::where($where)->first();
      
        return Response()->json($gradelevel);
    }

    public function updategradelevel(Request $request){
        $request->validate([
            'gradelevel' => 'required',
        ]);
        $gradelevelunique = GradeLevels::where('deleted', '=', null)->where('id', '!=', $request->id)->where('gradelevel', '=', $request->get('gradelevel'))->get();
        if($gradelevelunique->count() == 0){
            $gradelevel = GradeLevels::find($request->id);
            $gradelevel->gradelevel = $request->gradelevel;
            $gradelevel->save();
            return response()->json($gradelevel);
        }else{
            return response()->json(['error' => 'Gradelevel is already taken.'], 422); 
        }
   }

     public function deletegradegradelevel(Request $request){
        $gradelevel = GradeLevels::findOrFail($request->id);
        if ($gradelevel){
            $courseId = $request->id;
            $gradelevel   =   GradeLevels::updateOrCreate(
            [
                'id' => $courseId
            ],
            [
                'deleted' => 1, 
                'deleted_at' => now(),
            ]);                
            return Response()->json($gradelevel);
        }
        
    }

     public function deletegradelevel(Request $request){
        $where = array('id' => $request->id);
        $gradelevel  = GradeLevels::where($where)->first();
      
        return Response()->json($gradelevel);
     }

    // ============================================================ ADVISORY ===================================================

    public function advisory(){
        $advisories = Advisories::where('deleted', '=', null)->orderBy('id', 'ASC')->get();
        $schoolYear = Advisories::groupBy('schoolyear_id')->where('deleted', '=', null)->orderBy('id', 'DESC')->get();
        $year = DB::table('school_years')->latest('id')->first();
        $graderelease = Advisories::where('deleted', '=', null)->where('schoolyear_id', '=', $year->id)->orderBy('id', 'DESC')->first();
        return view('admins.grading.advisory', compact('advisories', 'schoolYear', 'graderelease'));
    }

    public function advisoryadd(){
        $faculties = Faculties::where('deleted', '=', null)->get();
        $gradelevels = GradeLevels::where('deleted', '=', null)->get();;
        $semesters = Semesters::all();
        $courses = Courses::where('deleted', '=', null)->get();
        $sections =Sections::where('deleted', '=', null)->get();
        return view('admins.grading.functions.advisoryadd', compact('faculties', 'gradelevels', 'semesters', 'courses', 'sections'));
    }

    public function advisorystore(Request $request){
        $request->validate([
            'faculty_id' => ['required'],
            'gradelevel_id' => ['required'],
            'course_id' => ['required'],
            'section_id' => ['required'],
        ]);
        if (Advisories::where('gradelevel_id', '=', $request->get("gradelevel_id"))->where('active', '=', null)->where('deleted', '=', null)->count() <= 0 || Advisories::where('course_id', '=', $request->get("course_id"))->where('active', '=', null)->where('deleted', '=', null)->count() <= 0
        || Advisories::where('section_id', '=', $request->get("section_id"))->where('active', '=', null)->where('deleted', '=', null)->count() <= 0) {
            if(Advisories::where('faculty_id', '=', $request->get("faculty_id"))->where('deleted', '=', null)){
                $schoolyear = DB::table('school_years')->latest('id')->first();
                $advisory = new Advisories();
                $advisory->schoolyear_id = $schoolyear->id;
                $advisory->faculty_id = $request->get('faculty_id');
                $advisory->gradelevel_id = $request->get('gradelevel_id');
                $advisory->course_id = $request->get('course_id');
                $advisory->section_id = $request->get('section_id');
                $advisory->save();
                return response()->json(array('success' => true));  
            }
           else{
            return redirect()->back()->with('warning', 'There is already an advisory class that is assigned to this teacher.')->withInput();
           }
        }
        else{
            return redirect()->back()->with('warning', 'There is already an advisory teacher that is assigned to this class.')->withInput();
        }
        
    } 

    public function viewadvisory($id){
        $data = Advisories::where('deleted', '=', null)->findOrFail($id);
        $faculties = Faculties::where('deleted', '=', null)->get();
        $gradelevels = GradeLevels::all();
        $courses = Courses::where('deleted', '=', null)->get();
        $sections =Sections::where('deleted', '=', null)->get();
        return view('admins.grading.functions.advisoryview', compact('faculties', 'gradelevels', 'courses', 'sections'), ['advisory' => $data]);
    }


    public function showadvisory($id){
        $data = Advisories::where('deleted', '=', null)->findOrFail($id);
        $faculties = Faculties::where('deleted', '=', null)->get();
        return view('admins.grading.functions.advisoryupdate', compact('faculties'), ['advisory' => $data]);
    }

    public function updateadvisory(Request $request){
        $request->validate([
            'faculty_id' => ['required'],
        ]);

        // $studentgrades = StudentGrade::where('subjectteacher_id', '=', $subjectteacher->id)->get();
        // foreach($studentgrades as $studentgrade){
        //     // $studentgrade->gradelevel_id = $request->gradelevel_id;
        //     // $studentgrade->semester_id = $request->semester_id;
        //     $studentgrade->subject_id = $request->subject_id;
        //     $studentgrade->faculty_id = $request->faculty_id;
        //     $studentgrade->save();
        // }
        $advisory = Advisories::find($request->id);
        $advisory->faculty_id = $request->faculty_id;
        $advisory->save();
        return response()->json($advisory);

        return redirect('/advisory')->with('success', 'Advisory class of teacher has been updated successfully!');
    }

    //  public function deletegradeadvisory(Request $request, Advisories $advisory){
    //     $validated = $request->validate([
    //         'deleted' => ['required'],
    //         'deleted_at' => ['required'],
    //     ]);
    //     $advisory->update($validated);

    //     // $studentgrades = StudentGrade::where('subjectteacher_id', '=', $subjectteacher->id)->get();
    //     // foreach($studentgrades as $studentgrade){
    //     //     $studentgrade->deleted = 1;
    //     //     $studentgrade->deleted_at = now();
    //     //     $studentgrade->save();
    //     // }

    //     return redirect('/advisory')->with('success', 'Advisory class of teacher has been deleted successfully!');
    //  }

    //  public function deleteadvisory($id){
    //     $data = Advisories::where('deleted', '=', null)->findOrFail($id);
    //     return view('admins.grading.functions.advisorydelete', ['advisory' => $data]);
    //  }

     public function firstquarter($schoolyear_id){
        $printgosignal = SubjectTeachers::where('schoolyear_id', '=', $schoolyear_id)->get();
        foreach($printgosignal as $go){
            $go->isPrint = 1;
            $go->update();
        }
        $advisers = Advisories::where('deleted', '=', null)->where('active', '=', null)->where('schoolyear_id', '=', $schoolyear_id)->get();
        foreach($advisers as $adviser){
            $adviser->grade_release = 1;
            $adviser->update();
        }
        return redirect()->back()->with('success', '1st quarter grades can be released.');
     }

     public function secondquarter($schoolyear_id){
        $advisers = Advisories::where('deleted', '=', null)->where('active', '=', null)->where('schoolyear_id', '=', $schoolyear_id)->get();
        foreach($advisers as $adviser){
            $adviser->grade_release = 2;
            $adviser->update();
        }
        return redirect()->back()->with('success', '2nd quarter grades can be released.');
     }


     public function thirdquarter($schoolyear_id){
        $advisers = Advisories::where('deleted', '=', null)->where('active', '=', null)->where('schoolyear_id', '=', $schoolyear_id)->get();
        foreach($advisers as $adviser){
            $adviser->grade_release = 3;
            $adviser->update();
        }
        return redirect()->back()->with('success', '3rd quarter grades can be released.');
     }

     public function fourthquarter($schoolyear_id){
        $advisers = Advisories::where('deleted', '=', null)->where('active', '=', null)->where('schoolyear_id', '=', $schoolyear_id)->get();
        foreach($advisers as $adviser){
            $adviser->grade_release = 4;
            $adviser->update();
        }
        return redirect()->back()->with('success', '4th quarter grades can be released.');
     }

    // ============================================================================= RESET PASSWORD ====================================================================


    public function adminresetshow(){
        return view('admins.reset-password');
    }

    public function adminreset(Request $request){
        $validated = $request->validate([
            'new_password' => 'min:6|required_with:confirm_password|same:confirm_password|max:255',
            'confirm_password' => 'min:6|max:255'
        ]);
        $user = Admins::where('id', Auth::user()->id)->first();
        // dd($user);
        $user->password = bcrypt($validated['new_password']);
        $user->save();
        return redirect()->back()->with('alert', 'Password has been updated successfully.');
    }   

    public function viewfile($file_name) {
        $file_path = public_path('uploads/DocumentRequestFile/'.$file_name);
        if (file_exists($file_path)) {
            return response()->file($file_path);
        }
        
    }

    public function viewfileDocument($id) {
        $requests = DocumentRequests::where('deleted', '=', null)->findOrFail($id);
        $file = $requests->file;
        return view('admins.documentrequests.documentrequestPreview', compact('requests'));
    }
}
