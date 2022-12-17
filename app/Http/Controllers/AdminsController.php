<?php

namespace App\Http\Controllers;
use App\Mail\RegisterMail;
use App\Models\Addresses;
use App\Models\Admins;
use App\Models\Announcements;
use App\Models\Courses;
use App\Models\DocumentRequests;
use App\Models\Documents;
use App\Models\Faculties;
use App\Models\GradeLevels;
use App\Models\Landings;
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
use Carbon\Carbon;
use Illuminate\Validation\Rule;

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

        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<', Carbon::now())->update(['status' => '2']);
        
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
            ->where('approval', '=', NULL)
            ->where('is_event', '=', 2)
            ->first();
        if(is_null($reminder)) {
            $reminder = NULL;
         } else {
            $matchThese = ['deleted' => NULL, 'privacy' => 2, 'status' => 1, 'approval' => NULL, 'privacy' => 2, 'is_event' => 2];
            $reminder = Announcements::where($matchThese)->orderBy
            ('created_at', 'desc')->get();
        }
        $viewShareVars = array_keys(get_defined_vars());
        return view('admins.home',compact($viewShareVars));
    }

    // ============================================================ PROFILE ===================================================================================

    public function profile(){
        return view('admins.profile');
    }

    public function profileupdate(Request $request, Admins $admin){
        $validated = $request->validate([
            "first_name" => ['required'],
            "middle_name" => 'nullable',
            "last_name" => ['required'],
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        $landing = new Landings;
        $landing->title = $request->get('title');
        $landing->content = $request->get('content');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/landing/',$filename);
            $landing->image = $filename;
        }
        $landing->save();
        return redirect('/homepage')->with('success', 'New content was added Successfully');
    }
    
    public function viewlanding($id){
        $data = Landings::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.landingview', ['landing' => $data]);
    }

    public function showlanding($id){
        $data = Landings::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.landingupdate', ['landing' => $data]);
    }

    public function updatelanding(Request $request, Landings $landing){
        $validated = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);
       $landing->update($validated);
       return redirect('/homepage')->with('success', 'Landing content has been updated.');
   }

     public function deletelanding(Request $request, Landings $landing){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $landing->update($validated);
        return redirect('/homepage')->with('success', 'Landing content has been deleted.');
     }

     public function delete($id){
        $data = Landings::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.deletelanding', ['landing' => $data]);
     }

    // ================================================================= ANNOUNCEMENT ===================================================

    public function createannouncement()
    {
        $announcements = Announcements::where('deleted', '=', null)->where('is_event', '=', null)->where('privacy', '=', 1)->get();
        return view('admins.landing.createannouncement', compact('announcements'));
    }

    public function tableofannouncement()
    {
        $announcements = Announcements::where('deleted', '=', null)->where('is_event', '=', null)->where('privacy', '=', 2)->get();
        return view('admins.landing.tableofannouncement', compact('announcements'));
    }

    public function privateannouncement()
    {
        return view('admins.landing.privateannouncement');
    }

    public function storeannouncement(Request $request){
        // Validate the inputs
        $request->validate([
            'subject' => 'required',
            'date' => 'required',
            'time' => 'required',
            'sender' => 'required',
            'recipient' => 'required',
            'location' => 'required',
            'content' => 'required',
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
        $announcement->content = $request->get('content');
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
        return redirect()->back()->with('success', 'New announcement was added Successfully');
    }

    public function storeprivateannouncement(Request $request){
        // Validate the inputs
        $request->validate([
            'subject' => 'required',
            'date' => 'required',
            'time' => 'required',
            'sender' => 'required',
            'recipient' => 'required',
            'location' => 'required',
            'content' => 'required',
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
        $announcement->content = $request->get('content');
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
        return redirect()->back()->with('success', 'New private announcement was added Successfully');
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

     public function showannouncement($id){
        $data = Announcements::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.announcementupdate', ['announcement' => $data]);
    }

     public function updateannouncement(Request $request, Announcements $announcement){
        $validated = $request->validate([
            'what' => ['required'],
            'who' => ['required'],
            'whn' => ['required'],
            'whn_time' => ['required'],
            'whr' => ['required'],
            'sender' => ['required'],
            'content' => ['required'],
            'expired_at' => ['required'],
        ]);
       $announcement->update($validated);
       Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<=',  now())->update(['status' => '2']);
       Announcements::where('deleted', '=', NULL)->where('status', '=', 2)->where('expired_at', '>',  now())->update(['status' => '1']);
       return redirect('/createAnnoucement')->with('success', 'Announcement has been updated.');;
   }

     public function deleteannouncement(Request $request, Announcements $announcement){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $announcement->update($validated);
        return redirect('/homepage')->with('success', 'Content has been deleted.');
     }

     public function deleteadminannouncement($id){
        $data = Announcements::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.delete', ['announcement' => $data]);
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
        return view('admins.landing.createevent', compact('events'));
    }

    public function storeevent(Request $request){
        // Validate the inputs
        $request->validate([
            'subject' => 'required',
            'date' => 'required',
            'time' => 'required',
            'sender' => 'required',
            'recipient' => 'required',
            'location' => 'required',
            'content' => 'required',
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
        $announcement->content = $request->get('content');
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
        return redirect('/createEvents')->with('success', 'New event was added Successfully');
    }

    public function viewevent($id){
        $data = Announcements::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.eventview', ['event' => $data]);
    }


    public function showevent($id){
        $data = Announcements::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.eventupdate', ['event' => $data]);
    }

    public function updateevent(Request $request, Announcements $event){
        $validated = $request->validate([
            'what' => ['required'],
            'who' => ['required'],
            'whn' => ['required'],
            'whn_time' => ['required'],
            'whr' => ['required'],
            'sender' => ['required'],
            'content' => ['required'],
            'expired_at' => ['required'],
        ]);
       $event->update($validated);
       Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  now())->update(['status' => '2']);
       Announcements::where('deleted', '=', NULL)->where('status', '=', 2)->where('expired_at', '>',  now())->update(['status' => '1']);
       return redirect('/createEvents')->with('success', 'Event has been updated.');
   }

    // ================================================================= REMINDERS ===================================================

    public function createreminder(){
        $reminders = Announcements::where('deleted', '=', null)->where('is_event', '=', 2)->where('privacy', '=', 1)->get();
        return view('admins.landing.createreminder', compact('reminders'));
    }


    public function tableofreminders()
    {
        $reminders = Announcements::where('deleted', '=', null)->where('is_event', '=', 2)->where('privacy', '=', 2)->get();
        return view('admins.landing.tableofreminders', compact('reminders'));
    }

    public function privatereminders()
    {
        return view('admins.landing.privatereminder');
    }


    public function storereminder(Request $request){
        // Validate the inputs
        $request->validate([
            'content' => 'required',
            'expired_at' => 'required',
        ]);
        $announcement = new Announcements();
        $announcement->content = $request->get('content');
        $announcement->expired_at = $request->get('expired_at');
        $announcement->privacy = 1;
        $announcement->is_event = 2;
        $announcement->status = 1;
        $announcement->save();
        Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<',  now())->update(['status' => '2']);
        return redirect('/createReminder')->with('success', 'New reminder was added Successfully');
    }

    public function storeprivatereminder(Request $request){
        // Validate the inputs
        $request->validate([
            'content' => 'required',
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
        return redirect('/privatereminders')->with('success', 'New private reminder was added successfully');
    }

    public function viewreminder($id){
        $data = Announcements::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.reminderview', ['reminder' => $data]);
    }


    public function showreminder($id){
        $data = Announcements::where('deleted', '=', null)->findOrFail($id);
        return view('admins.landing.reminderupdate', ['reminder' => $data]);
    }

    public function updatereminder(Request $request, Announcements $reminder){
        $validated = $request->validate([
            'expired_at' => ['required'],
            'content' => ['required'],
        ]);
       $reminder->update($validated);
       Announcements::where('deleted', '=', NULL)->where('status', '=', 1)->where('expired_at', '<=',  now())->update(['status' => '2']);
       Announcements::where('deleted', '=', NULL)->where('status', '=', 2)->where('expired_at', '>',  now())->update(['status' => '1']);
       return redirect('/createReminder')->with('success', 'Reminder has been updated.');
   }

    



    // ============================================================ DOCUMENT REQUEST ===================================================================================   

    public function documentRequest(){
        $requests = DocumentRequests::where('deleted', '=', null)->get();
        $documents = Documents::where('deleted', '=', null)->get();
        return view('admins.documentrequests.documentrequest', compact('requests', 'documents'));
    }

    public function storedocument(Request $request){
        // Validate the inputs
        $request->validate([
            'name' => 'required',
        ]);
        $document = new Documents();
        $document->name = $request->get('name');
        $document->save();
        return redirect('/documentrequest')->with('success', 'New document was added Successfully');
    }


    public function viewdocument($id){
        $data = Documents::where('deleted', '=', null)->findOrFail($id);
        return view('admins.documentrequests.documentview', ['document' => $data]);
    }


    public function showdocument($id){
        $data = Documents::where('deleted', '=', null)->findOrFail($id);
        return view('admins.documentrequests.documentupdate', ['document' => $data]);
    }

    public function updatedocument(Request $request, Documents $document){
        $validated = $request->validate([
            'name' => ['required'],
        ]);
       $document->update($validated);
       return redirect('/documentrequest')->with('success', 'Document has been updated.');
   }


     public function deletegradedocument(Request $request, Documents $document){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $document->update($validated);
        return redirect('/documentrequest')->with('success', 'Document has been deleted successfully!');
     }

     public function deletedocument($id){
        $data = Documents::where('deleted', '=', null)->findOrFail($id);
        return view('admins.documentrequests.documentdelete', ['document' => $data]);
     }

     public function viewrequest($id){
        $data = DocumentRequests::where('deleted', '=', null)->findOrFail($id);
        return view('admins.documentrequests.docreqviewadmin', ['docreq' => $data]);
    }

    public function showrequest($id){
        $data = DocumentRequests::where('deleted', '=', null)->findOrFail($id);
        return view('admins.documentrequests.docreqadmin', ['docreq' => $data]);
    }

    public function updatedocreq(Request $request, DocumentRequests $docreq){
        $validated = $request->validate([
            'status' => ['required'],
        ]);
       $docreq->update($validated);
       return redirect('/documentrequest')->with('success', 'The request has been updated.');
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
        $courses = Courses::where('deleted', '=', null)->get();
        return view('admins.grading.courses', compact('courses'));
    }

    public function addcourse(){
        return view('admins.grading.functions.courseadd');
    }

    public function storecourse(Request $request){
        // Validate the inputs
        $request->validate([
            'courseName' => ['required'],
            'abbreviation' => ['required'],
            'description' => ['required'],
            'code' => ['required'],
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'link' => 'url|nullable',
        ]);
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
        return redirect('/gradingcourses')->with('success', 'New strand has been added successfully!');
    }    

    
    public function viewcourse($id){
        $data = Courses::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.courseview', ['course' => $data]);
    }


    public function showcourse($id){
        $data = Courses::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.courseupdate', ['course' => $data]);
    }

    public function updatecourse(Request $request, Courses $course){
        $validated = $request->validate([
            'courseName' => ['required'],
            'abbreviation' => ['required'],
            'description' => ['required'],
            'code' => ['required'],
            'link' => 'url|nullable',
        ]);
       $course->update($validated);
       return redirect('/gradingcourses')->with('success', 'Strand has been updated successfully!');
   }

     public function deletegradecourse(Request $request, Courses $course){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $course->update($validated);
        return redirect('/gradingcourses')->with('success', 'Strand has been deleted successfully!');
     }

     public function deletecourse($id){
        $data = Courses::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.coursedelete', ['course' => $data]);
     }

     // ============================================================ SECTION ===================================================

    public function section(){
        $sections = Sections::where('deleted', '=', null)->get();
        return view('admins.grading.sections', compact('sections'));
    }

    public function addsection(){
        return view('admins.grading.functions.sectionadd');
    }

    public function storesection(Request $request){
        // Validate the inputs
        $request->validate([
            'section' => 'required|unique:sections',
        ]);
        $section = new sections();
        $section->section = $request->get('section');
        $section->save();
        return redirect('/gradingsections')->with('success', 'Section has been added successfully!');
    }    

    public function viewsection($id){
        $data = Sections::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.sectionview', ['section' => $data]);
    }


    public function showsection($id){
        $data = Sections::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.sectionupdate', ['section' => $data]);
    }

    public function updatesection(Request $request, Sections $section){
        $validated = $request->validate([
            'section' => 'required',
        ]);
       $section->update($validated);
       return redirect('/gradingsections')->with('success', 'Section has been updated successfully!');
   }

   public function deletegradesection(Request $request, Sections $section){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $section->update($validated);
        return redirect('/gradingsections')->with('success', 'Section has been deleted successfully!');
    }

    public function deletesection($id){
        $data = sections::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.sectiondelete', ['section' => $data]);
    }

   // ============================================================ FACULTY ===================================================

    public function faculty(){
        $faculties = Faculties::where('deleted', '=', null)->get();
        return view('admins.grading.faculty', compact('faculties'));
    }

    public function addfaculty(){
        return view('admins.grading.functions.facultyadd');
    }

    public function storefaculty(Request $request){
        
        // Validate the inputs
        $validated = $request->validate([
            'first_name' => ['required'],
            'middle_name' => 'nullable',
            'last_name' => ['required'],
            'suffix' => 'nullable',
            'email' => ['required', 'email', Rule::unique('faculties', 'email')],
        ]);
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
        return redirect('/gradingfaculty')->with('success', 'Teacher has been added successfully!');
    }


    public function viewfaculty($id){
        $subjectteachers = SubjectTeachers::where('faculty_id', '=', $id)->groupBy('schoolyear_id')->where('deleted', '=', null)->orderBy('id', 'DESC')->get();
        $subjects = SubjectTeachers::where('faculty_id', '=', $id)->where('deleted', '=', null)->get();
        $faculty = Faculties::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.facultyview', compact('subjectteachers', 'subjects', 'faculty'));
    }


    public function showfaculty($id){
        $data = Faculties::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.facultyupdate', ['faculty' => $data]);
    }

    public function updatefaculty(Request $request, Faculties $faculty){
        $ownid=$faculty->id;
        $validated = $request->validate([
            'first_name' => ['required'],
            'middle_name' => 'nullable',
            'last_name' => ['required'],
            'suffix' => 'nullable',
            "email" => 'required|email:rfc,dns|email|unique:faculties,email,' . $ownid,
        ]);
    $faculty->update($validated);
    return redirect('/gradingfaculty')->with('success', 'Information of teacher has been updated successfully!');
    }

     public function deletegradefaculty(Request $request, Faculties $faculty){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $validated['email']="";
        $validated['password']="";
        $faculty->update($validated);
        return redirect('/gradingfaculty')->with('success', 'Record of teacher has been deleted successfully!');
    }

    public function deletefaculty($id){
        $data = Faculties::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.facultydelete', ['faculty' => $data]);
    }

     // ============================================================ STUDENT ===================================================

    public function student(){
        $students = Students::where('deleted', '=', null)->get();
        return view('admins.grading.student', compact('students'));
    }

    public function addstudent(){
        $level_data =DB::table('grade_levels')->where('deleted', '=', null)->select('id', 'gradelevel')->get();
        $section_data= DB::table('sections')->where('deleted', '=', null)->select('id', 'section')->get();
        $courses_data= DB::table('courses')->where('deleted', '=', null)->select('id', 'courseName')->get();
        return view('admins.grading.functions.studentadd',compact('level_data','section_data', 'courses_data'), ['url' => 'students']);
    }

    public function storestudent(Request $request){
        // Validate the inputs

        $validated = $request->validate([
            'LRN' => ['required'],
            'first_name' => ['required'],
            'middle_name' => 'nullable',
            'last_name' => ['required'],
            'suffix' => 'nullable',
            'section_id' => ['required'],
            'gender' => ['required'],
            'section_id' => ['required'],
            'gradelevel_id' => ['required'],
            'email' => ['required', 'email', Rule::unique('students', 'email')],
            'course_id' => ['required'],
        ]);
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
        return redirect('/gradingstudents')->with('success', 'Student has been added successfully!');
    }  


    public function viewstudent($id){
        $data = Students::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.studentview', ['student' => $data]);
    }


    public function showstudent($id){
        $data = Students::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.studentupdate', ['student' => $data]);
    }

    public function updatestudent(Request $request, Students $student){
        $ownid=$student->id;
        $validated = $request->validate([
            'LRN' => ['required'],
            'first_name' => ['required'],
            'middle_name' => 'nullable',
            'last_name' => ['required'],
            'suffix' => 'nullable',
            "email" => 'required|email:rfc,dns|email|unique:students,email,' . $ownid,
        ]);
        $student->update($validated);
        return redirect('/gradingstudents')->with('success', 'Student has been updated successfully!');
    }

     public function deletegradestudent(Request $request, Students $student){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $validated['email']="";
        $validated['password']="";
        $student->update($validated);
        return redirect('/gradingstudents')->with('success', 'Record of student has been deleted successfully!');
    }

    public function deletestudent($id){
        $data = Students::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.studentdelete', ['student' => $data]);
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

     // ============================================================ SUBJECT ===================================================

    public function subjects(){
        $subjects = Subjects::where('deleted', '=', null)->get();
        return view('admins.grading.subject', compact('subjects'));
    }

    public function addsubject(){
        return view('admins.grading.functions.subjectadd');
    }

    public function storesubject(Request $request){
        // Validate the inputs
        $request->validate([
            'subjectcode' => ['required'],
            'subjectname' => ['required'],
            'description' => ['required'],
        ]);
        $subject = new Subjects();
        $subject->subjectcode = $request->get('subjectcode');
        $subject->subjectname = $request->get('subjectname');
        $subject->description = $request->get('description');
        $subject->save();
        return redirect('/gradingsubjects')->with('success', 'Subject has been added successfully!');
    }  

    public function viewsubject($id){
        $data = Subjects::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.subjectview', ['subject' => $data]);
    }


    public function showsubject($id){
        $data = Subjects::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.subjectupdate', ['subject' => $data]);
    }

    public function updatesubject(Request $request, Subjects $subject){
        $validated = $request->validate([
            'subjectcode' => ['required'],
            'subjectname' => ['required'],
            'description' => ['required'],
        ]);
        $subject->update($validated);
        return redirect('/gradingsubjects')->with('success', 'Subject has been updated successfully!');
    }


     public function deletegradesubject(Request $request, Subjects $subject){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $subject->update($validated);
        return redirect('/gradingsubjects')->with('success', 'Subject has been deleted successfully!');
     }

     public function deletesubject($id){
        $data = Subjects::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.subjectdelete', ['subject' => $data]);
     }


    // ============================================================ SCHOOL YEAR ===================================================

    public function schoolyear(){
        $schoolyears = SchoolYear::where('deleted', '=', null)->orderBy('id', 'DESC')->get();
        return view('admins.grading.schoolyear', compact('schoolyears'));
    }

    public function viewschoolyear($id){
        $data = SchoolYear::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.schoolyearview', ['schoolyear' => $data]);
    }


    public function showschoolyear($id){
        $data = SchoolYear::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.schoolyearupdate', ['schoolyear' => $data]);
    }

    public function addschoolyear(){
        return view('admins.grading.functions.schoolyearadd');
    }

    public function storeschoolyear(Request $request){
        // Validate the inputs
        $request->validate([
            'schoolyear' => 'required|numeric|unique:school_years',
        ]);
        $schoolyear = new SchoolYear();
        $schoolyear->schoolyear = $request->get('schoolyear');
        $schoolyear->save();

        Students::where('deleted', '=', null)->increment('gradelevel_id', 1, ['updated_at' => now()]);
        Students::query()->where('gradelevel_id', '<', 1)->orWhere('gradelevel_id', '>', 2)->update(['gradelevel_id' => 4]);

        return redirect('/gradingschoolyear')->with('success', 'Schoolyear has been added successfully!');
    } 

    public function updateschoolyear(Request $request, SchoolYear $schoolyear){
        $validated = $request->validate([
            'schoolyear' => 'required',
        ]);
        $schoolyear->update($validated);
        return redirect('/gradingschoolyear')->with('success', 'Schoolyear has been updated successfully!');
    }


     public function deletegradeschoolyear(Request $request, SchoolYear $schoolyear){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $schoolyear->update($validated);
        return redirect('/gradingschoolyear')->with('success', 'Schoolyear has been deleted successfully!');
     }

     public function deleteschoolyear($id){
        $data = SchoolYear::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.schoolyeardelete', ['schoolyear' => $data]);
     }


    // ============================================================ SUBJECT TEACHER ===================================================

    public function facultysubjects(){
        $subjectteachers = SubjectTeachers::where('deleted', '=', null)->orderBy('id', 'DESC')->get();
        return view('admins.grading.facultysubjects', compact('subjectteachers'));
    }

    public function subjectteacheradd(){
        $faculties = Faculties::where('deleted', '=', null)->get();
        $gradelevels = GradeLevels::all();
        $semesters = Semesters::all();
        $courses = Courses::where('deleted', '=', null)->get();
        $sections =Sections::where('deleted', '=', null)->get();
        $subjects = Subjects::where('deleted', '=', null)->get();
        return view('admins.grading.functions.subjectteacheradd', compact('faculties', 'gradelevels', 'semesters', 'courses', 'sections', 'subjects'));
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
        $subjectteacher->save();

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
                    ->where('gradelevel_id', '=', $gradeLevelId)->get();
        if($students->count() != 0){ 
            foreach($students as $student){
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

        return redirect('/gradingfacultysubjects')->with('success', 'New subject of teacher was added successfully!');
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
        $validated = $request->validate([
            'faculty_id' => ['required'],
            // 'gradelevel_id' => ['required'],
            // 'semester_id' => ['required'],
            // 'course_id' => ['required'],
            // 'section_id' => ['required'],
            'subject_id' => ['required'],
            'time_start' => ['required'],
            'time_end' => ['required'],
        ]);
        $subjectteacher->update($validated);

        $studentgrades = StudentGrade::where('subjectteacher_id', '=', $subjectteacher->id)->get();
        foreach($studentgrades as $studentgrade){
            // $studentgrade->gradelevel_id = $request->gradelevel_id;
            // $studentgrade->semester_id = $request->semester_id;
            $studentgrade->subject_id = $request->subject_id;
            $studentgrade->faculty_id = $request->faculty_id;
            $studentgrade->save();
        }

        return redirect('/gradingfacultysubjects')->with('success', 'Subject of teacher has been updated successfully!');
    }

     public function deletegradesubjectteacher(Request $request, SubjectTeachers $subjectteacher){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $subjectteacher->update($validated);

        $studentgrades = StudentGrade::where('subjectteacher_id', '=', $subjectteacher->id)->get();
        foreach($studentgrades as $studentgrade){
            $studentgrade->deleted = 1;
            $studentgrade->deleted_at = now();
            $studentgrade->save();
        }

        return redirect('/gradingfacultysubjects')->with('success', 'Subject of teacher has been deleted successfully!');
     }

     public function deletesubjectteacher($id){
        $data = SubjectTeachers::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.subjectteacherdelete', ['subjectteacher' => $data]);
     }

    // ============================================================ GRADE LEVEL ===================================================

    public function gradelevels(){
        $gradelevels = GradeLevels::where('deleted', '=', null)->orderBy('id', 'ASC')->get();
        return view('admins.grading.gradelevels', compact('gradelevels'));
    }

    public function addgradelevel(){
        return view('admins.grading.functions.gradeleveladd');
    }

    public function storegradelevel(Request $request){
        // Validate the inputs
        $request->validate([
            'gradelevel' => 'required|numeric|unique:grade_levels',
        ]);
        $gradelevel = new GradeLevels();
        $gradelevel->gradelevel = $request->get('gradelevel');
        $gradelevel->save();
        return redirect('/gradinggradelevels')->with('success', 'Gradelevel has been added successfully!');
    }    


    public function showgradelevel($id){
        $data = GradeLevels::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.gradelevelupdate', ['gradelevel' => $data]);
    }

    public function updategradelevel(Request $request, GradeLevels $gradelevel){
        $validated = $request->validate([
            'gradelevel' => 'required',
        ]);
       $gradelevel->update($validated);
       return redirect('/gradinggradelevels')->with('success', 'Gradelevel has been updated successfully!');
   }

   public function deletegradegradelevel(Request $request, GradeLevels $gradelevel){
        $validated = $request->validate([
            'deleted' => ['required'],
            'deleted_at' => ['required'],
        ]);
        $gradelevel->update($validated);
        return redirect('/gradinggradelevels')->with('success', 'Gradelevel has been deleted successfully!');
    }

    public function deletegradelevel($id){
        $data = GradeLevels::where('deleted', '=', null)->findOrFail($id);
        return view('admins.grading.functions.gradeleveldelete', ['gradelevel' => $data]);
    }

    // ============================================================================= RESET PASSWORD ====================================================================


    public function adminresetshow(){
        return view('admins.reset-password');
    }

    public function adminreset(Request $request){
        $validated = $request->validate([
            'new_password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);
        $user = Admins::where('id', Auth::user()->id)->first();
        // dd($user);
        $user->password = bcrypt($validated['new_password']);
        $user->save();
        return redirect()->back()->with('alert', 'Password has been updated successfully.');
    }   
}
