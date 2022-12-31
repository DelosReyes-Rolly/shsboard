<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\LandingsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|---------------------------------------------------------------------------------------
| Common routes naming
|---------------------------------------------------------------------------------------
|
| Here is the route names that can be used for uniformity. However, this is not being followed in the routes below.
|
|   index - show all
|   show  - display single data
|   create - show a form to add a new user
|   store - store a data
|   edit - show a form to edit a data
|   update - update a data
|   destroy - delete a data
|
*/

/*
|---------------------------------------------------------------------------------------
| LANDING Routes
|---------------------------------------------------------------------------------------
|
| Here is where you can find routes that is all about landing page.
|
*/

Route::controller(LandingsController::class)->group(function(){
    Route::get('/', 'home');
    Route::get('/generalannouncements', 'announcements');
    Route::get('/events', 'events');
    Route::get('/faculty', 'faculties');
    Route::get('/courses', 'courses');
    Route::get('/coursedescription/{id}', 'coursedescription');
    Route::get('/logins','login')->name('logins');
});

/*
|-----------------------------------------------------------------------------------
| LOGIN Routes
|-----------------------------------------------------------------------------------
|
| Here is where login routes are defined.
|
*/


Route::controller(LoginController::class)->group(function(){
    
    /*
    |-----------------------------------------------------------------------------------
    | LOGIN Routes - GET
    |-----------------------------------------------------------------------------------
    |
    | Here is where login GET routes are defined.
    |
    */
    Route::get('/login/admins', 'showAdminsLoginForm');
    Route::get('/login/faculties', 'showFacultiesLoginForm');
    Route::get('/login/students','showStudentsLoginForm')->name('login.students');

    Route::get('logout', 'logout');

    /*
    |-----------------------------------------------------------------------------------
    | LOGIN Routes - POST
    |-----------------------------------------------------------------------------------
    |
    | Here is where login POST routes are defined.
    |
    */
    Route::post('/login/admins', 'adminsLogin');
    Route::post('/login/faculties', 'facultiesLogin');
    Route::post('/login/students', 'studentsLogin');
});


/*
|-----------------------------------------------------------------------------------
| REGISTER Routes
|-----------------------------------------------------------------------------------
|
| Here is where register routes are defined.
|
*/
Route::controller(RegisterController::class)->group(function(){

    // Route::post('/register/admins', 'createAdmins');
    // Route::post('/register/faculties', 'createFaculties');
    // Route::get('/register/admins', 'showAdminsRegisterForm');
    // Route::get('/register/faculties', 'showFacultiesRegisterForm');
    Route::post('/register/students', 'createStudents');
    Route::get('/register/students', 'showStudentsRegisterForm');
});



// ========================================================================= RESET PASSWORD ===================================================================

// ======================================== GET ===========================================================

Route::get('/reset/students', [StudentsController::class,'showStudentsResetForm']);
Route::get('/reset/admins', [AdminsController::class,'showAdminsResetForm']);
Route::get('/reset/faculties', [FacultyController::class,'showFacultiesResetForm']);

// ======================================== POST ===========================================================

Route::post('/resetpassadmin', [AdminsController::class, 'reset']);
Route::post('/resetpassstudent', [StudentsController::class, 'reset']);
Route::post('/resetpassfaculty', [FacultyController::class, 'reset']);



/*
|-----------------------------------------------------------------------------------
| STUDENTS Routes
|-----------------------------------------------------------------------------------
|
| Here is where students routes are defined.
|
*/


Route::group(['middleware' => 'auth:students'], function () {
    
    Route::controller(StudentsController::class)->group(function(){

        /*
        |-----------------------------------------------------------------------------------
        | STUDENTS Routes - Home
        |-----------------------------------------------------------------------------------
        |
        | Here is where students routes that are included in their homepage are defined.
        |
        */
        Route::get('/views/{file}', [StudentsController::class, 'viewfiles']);
        Route::get('/viewfileDocuments/{id}', [StudentsController::class, 'viewfileDocuments']);

            /*
            |-----------------------------------------------------------------------------------
            | STUDENTS Routes - Home - GET
            |-----------------------------------------------------------------------------------
            |
            | Here is where students routes GET that are included in their homepage are defined.
            |
            */
            Route::get('/students', 'home');
            Route::get('/studentprofile', 'profile');
            Route::get('/studentrequest', 'documentrequest');
            Route::get('/viewrequest/{id}', 'viewrequest');
            Route::get('/showrequest/{id}', 'showrequest');
            Route::get('/deleterequest/{id}',  'deleterequest')->name('student.deleterequest');
            Route::put('/deletegraderequest/{id}', 'deletegraderequest');
            Route::get('/password-student/{id}', 'studentresetshow');
            Route::get('/activitystream', 'activitystream');

            /*
            |-----------------------------------------------------------------------------------
            | STUDENTS Routes - Home - PUT
            |-----------------------------------------------------------------------------------
            |
            | Here is where students routes PUT that are included in their homepage are defined.
            |
            */
            Route::put('/studentprofile/{student}/{address}', 'profileupdate');
            Route::put('/updaterequest/{docreq}', 'updatedocreq');

            
            /*
            |-----------------------------------------------------------------------------------
            | STUDENTS Routes - Home - POST
            |-----------------------------------------------------------------------------------
            |
            | Here is where students routes POST that are included in their homepage are defined.
            |
            */
            Route::post('/studentrequest', 'documentrequestsend')->name('student.request');
            Route::post('/reset-password-student', 'studentreset');
        
        
        /*
        |-----------------------------------------------------------------------------------
        | STUDENTS Routes - Grades
        |-----------------------------------------------------------------------------------
        |
        | Here is where students routes that are included in their grades page are defined.
        |
        */


            /*
            |-----------------------------------------------------------------------------------
            | STUDENTS Routes - Grades - GET
            |-----------------------------------------------------------------------------------
            |
            | Here is where students routes GET that are included in their grades page are defined.
            |
            */
            Route::get('/studentgrade', 'grades');
            Route::get('/gradeeval', 'gradeeval');
            Route::get('/vieweval/{id}', 'vieweval');
            Route::get('/grade-eval/{student_id}/{gradelevel_id}/{course_id}/{section_id}/{semester_id}/{faculty_id}/{subject_id}',  'gradeevalreq')->name('grade-eval');
            Route::get('/deletegradeeval/{id}',  'deletegradeeval')->name('student.deletegradeeval');
            Route::put('/deletegradeeval/{gradeeval}',  'deletegradegradeeval');
            Route::get('/printreportcard', 'printreportcard');
    });
});



/*
|-----------------------------------------------------------------------------------
| ADMINS Routes
|-----------------------------------------------------------------------------------
|
| Here is where admin routes are defined.
|
*/


Route::group(['middleware' => 'auth:admins'], function () {

    Route::controller(AdminsController::class)->group(function(){

        /*
        |-----------------------------------------------------------------------------------
        | ADMINS Routes - Home
        |-----------------------------------------------------------------------------------
        |
        | Here is where admins routes that are included in their homepage are defined.
        |
        */
        Route::get('/view/{file}', [AdminsController::class, 'viewfile']);
        Route::get('/viewfileDocument/{id}', [AdminsController::class, 'viewfileDocument']);

            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Home - GET
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes GET that are included in their homepage are defined.
            |
            */
            Route::get('/admins', 'home');
            Route::get('/profile', 'profile');


            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Home - POST
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes POST that are included in their homepage are defined.
            |
            */
            Route::put('/profile/{admin}', 'profileupdate');
        
        /*
        |-----------------------------------------------------------------------------------
        | ADMINS Routes - Landing
        |-----------------------------------------------------------------------------------
        |
        | Here is where admins routes that are included in their landing page are defined.
        |
        */


            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Landing - GET - All Pages
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes GET that are included in their landing are defined.
            |
            */
            Route::get('/landing', 'landing');
            Route::get('/homepage', 'homepage');
            Route::get('/createAnnoucement', 'createannouncement');
            Route::get('/tableofannouncement', 'tableofannouncement');
            Route::get('/privateannouncement', 'privateannouncement');
            Route::get('/createEvents', 'createevent');
            Route::get('/createReminder', 'createreminder');
            Route::get('/privatereminders', 'privatereminders');
            Route::get('/tableofreminders', 'tableofreminders');

                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - GET - Homepage Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes GET, homepage functions, that are included in their landing are defined.
                |
                */
                Route::get('/deleteadminannouncement/{id}', 'deleteadminannouncement');
                Route::get('/viewlanding/{id}', 'viewlanding');
                Route::get('/showlanding/{id}', 'showlanding');
                Route::get('/delete/{id}', 'delete');
                Route::get('/password-admin/{id}', 'adminresetshow');


                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - GET - Announcement Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes GET, annoncement functions, that are included in their landing are defined.
                |
                */
                Route::get('/approve/{id}', 'approve')->name('admin.approve');
                Route::get('/decline/{id}', 'decline')->name('admin.decline');
                Route::get('/viewannouncement/{id}','viewannouncement');
                Route::get('/showannouncement/{id}','showannouncement');

                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - GET - Events Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes GET, event functions, that are included in their landing are defined.
                |
                */
                Route::get('/viewevent/{id}', 'viewevent');
                Route::get('/showevent/{id}', 'showevent');
                Route::get('/deleteevent/{id}',  'deleteevent')->name('admin.deleteevent');


                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - GET - Reminder Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes GET, reminder functions, that are included in their landing are defined.
                |
                */
                Route::get('/viewreminder/{id}', 'viewreminder');
                Route::get('/showreminder/{id}', 'showreminder');
                Route::get('/deletereminder/{id}', 'deletereminder')->name('admin.deletereminder');


            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Landing - POST
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes POST that are included in their landing are defined.
            |
            */


                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - POST - Homepage Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes POST, homepage functions, that are included in their landing are defined.
                |
                */
                Route::post('/add/homepage', 'storehomapage')->name('homepage.store');
                Route::post('/reset-password-admin', 'adminreset');


                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - POST - Landing Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes POST, landing functions, that are included in their landing are defined.
                |
                */
                Route::post('/add/announcements', 'storeannouncement');
                Route::post('/add/privateannouncements', 'storeprivateannouncement');
                Route::post('/downloadPDF', 'downloadpdf')->name('admin.downloadpdf');

                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - POST - Event Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes POST, event functions, that are included in their landing are defined.
                |
                */
                Route::post('/add/event', 'storeevent')->name('event.store');

                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - POST - Reminder Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes POST, reminder functions, that are included in their landing are defined.
                |
                */
                Route::post('/add/reminder', 'storereminder')->name('reminder.store');
                Route::post('/add/privatereminders', 'storeprivatereminder');
            

            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Landing - PUT
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes PUT that are included in their landing are defined.
            |
            */


                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - PUT - Landing Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes PUT, landing functions, that are included in their landing are defined.
                |
                */
                Route::put('/updatelanding/{landing}', [AdminsController::class, 'updatelanding']);
                Route::put('/deletelanding/{landing}',  [AdminsController::class, 'deletelanding'])->name('admin.deletelanding');


                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - PUT - Announcement Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes PUT, announcement functions, that are included in their landing are defined.
                |
                */
                Route::put('/updateannouncement/{announcement}', 'updateannouncement');
                Route::put('/deleteannouncements/{announcement}', 'deleteannouncement')->name('admin.deletelanding');


                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - PUT - Event Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes PUT, event functions, that are included in their landing are defined.
                |
                */
                Route::put('/updateevent/{event}', 'updateevent');

                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Landing - PUT - Reminder Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes PUT, reminder functions, that are included in their landing are defined.
                |
                */
                Route::put('/updatereminder/{reminder}', 'updatereminder');
        
        /*
        |-----------------------------------------------------------------------------------
        | ADMINS Routes - Grading
        |-----------------------------------------------------------------------------------
        |
        | Here is where admins routes that are included in their grading page are defined.
        |
        */


            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Grading - GET - All Pages
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes GET that are included in their grading page are defined.
            |
            */
            Route::get('/grades', 'grades');     
            Route::get('/gradingcourses', 'courses'); 
            Route::get('/gradingsections', 'section'); 
            Route::get('/gradingfaculty', 'faculty');
            Route::get('/gradingstudents', 'student'); 
            Route::get('/gradingalumni', 'alumni'); 
            Route::get('/gradingdropped', 'dropped'); 
            Route::get('/gradingsubjects', 'subjects');
            Route::get('/gradingschoolyear', 'schoolyear');
            Route::get('/gradingfacultysubjects', 'facultysubjects'); 
            Route::get('/gradinggradelevels', 'gradelevels');
            Route::get('/advisory', 'advisory'); 
            Route::get('/firstquarter/{schoolyear_id}',  'firstquarter')->name('firstquarter');
            Route::get('/secondquarter/{schoolyear_id}',  'secondquarter')->name('secondquarter');
            Route::get('/thirdquarter/{schoolyear_id}',  'thirdquarter')->name('thirdquarter');
            Route::get('/fourthquarter/{schoolyear_id}',  'fourthquarter')->name('fourthquarter');

                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Grades - GET - Grade Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes GET, homepage functions, that are included in their grading page are defined.
                |
                */
                Route::get('/courseadd', 'addcourse')->name('course.add');
                Route::get('/viewcourse/{id}','viewcourse');
                Route::get('/showcourse/{id}','showcourse');
                Route::get('/deletecourse/{id}', 'deletecourse')->name('admin.deletecourse');

                Route::get('/sectionadd', 'addsection')->name('section.add');
                Route::get('/viewsection/{id}','viewsection');
                Route::get('/showsection/{id}','showsection');
                Route::get('/deletesection/{id}', 'deletesection')->name('admin.deletesection');

                Route::get('/facultyadd', 'addfaculty')->name('faculty.add');
                Route::get('/viewfaculty/{id}','viewfaculty');
                Route::get('/showfaculty/{id}','showfaculty');
                Route::get('/deletefaculty/{id}', 'deletefaculty')->name('admin.deletefaculty');

                Route::get('/studentadd', 'addstudent')->name('student.add');
                Route::get('/viewstudent/{id}','viewstudent');
                Route::get('/showstudent/{id}','showstudent');
                Route::get('/deletestudent/{id}', 'deletestudent')->name('admin.deletestudent');
                Route::get('/dropstudent/{id}', 'dropstudent')->name('admin.dropstudent');

                Route::get('/studentaddsubject/{id}', 'addstudentsubject');

                Route::get('/subjectadd', 'addsubject')->name('subject.add');
                Route::get('/viewsubject/{id}','viewsubject');
                Route::get('/showsubject/{id}','showsubject');
                Route::get('/deletesubject/{id}', 'deletesubject')->name('admin.deletesubject');

                Route::get('/schoolyearadd', 'addschoolyear')->name('schoolyear.add');
                Route::get('/viewschoolyear/{id}','viewschoolyear');
                Route::get('/showschoolyear/{id}','showschoolyear');
                Route::get('/deleteschoolyear/{id}', 'deleteschoolyear')->name('admin.deleteschoolyear');

                Route::get('/subjectteacheradd', 'subjectteacheradd')->name('subjectteacher.add');
                Route::get('/viewsubjectteacher/{id}','viewsubjectteacher');
                Route::get('/showsubjectteacher/{id}','showsubjectteacher');
                Route::get('/deletesubjectteacher/{id}', 'deletesubjectteacher')->name('admin.deletesubjectteacher');

                Route::get('/gradeleveladd', 'addgradelevel')->name('gradelevel.add');
                Route::get('/showgradelevel/{id}','showgradelevel');
                Route::get('/deletegradelevel/{id}', 'deletegradelevel')->name('admin.deletegradelevel');

                Route::get('/advisoryadd', 'advisoryadd')->name('advisory.add');
                Route::get('/viewadvisory/{id}','viewadvisory');
                Route::get('/showadvisory/{id}','showadvisory');
                Route::get('/deleteadvisory/{id}', 'deleteadvisory')->name('admin.deleteadvisory');

            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Grades - POST
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes POST that are included in their grading page are defined.
            |
            */
                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Grades - POST - Grade Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes POST, homepage functions, that are included in their grading page are defined.
                |
                */
                Route::post('/downloadPDFstu', 'downloadpdfstu')->name('admin.downloadpdfstu');
                Route::post('/add/course', 'storecourse')->name('course.store');
                Route::post('/add/section', 'storesection')->name('section.store');
                Route::post('/add/faculty', 'storefaculty')->name('faculty.store');
                Route::post('/add/student', 'storestudent')->name('student.store');
                Route::post('/add/subject', 'storesubject')->name('subject.store');
                Route::post('/add/schoolyear', 'storeschoolyear')->name('schoolyear.store');
                Route::post('/subjectteacheradd', 'subjectteacherstore')->name('subjectteacher.store');
                Route::post('/add/gradelevel', 'storegradelevel')->name('gradelevel.store');
                Route::post('/advisoryadd', 'advisorystore')->name('advisory.store');
                Route::post('/studentsubjectadd', 'studentsubjectadd')->name('studentsubjectadd.store');
                

            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Grades - PUT
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes PUT that are included in their grading page are defined.
            |
            */
                /*
                |-----------------------------------------------------------------------------------
                | ADMINS Routes - Grades - PUT - Grade Functions
                |-----------------------------------------------------------------------------------
                |
                | Here is where admin routes PUT, homepage functions, that are included in their grading page are defined.
                |
                */
                Route::put('/updatecourse/{course}', 'updatecourse');
                Route::put('/deletecourse/{course}', 'deletegradecourse');
                Route::put('/updatesection/{section}', 'updatesection');
                Route::put('/deletesection/{section}', 'deletegradesection');
                Route::put('/updatefaculty/{faculty}', 'updatefaculty');
                Route::put('/deletefaculty/{faculty}', 'deletegradefaculty');
                Route::put('/updatestudent/{student}', 'updatestudent');
                Route::put('/deletestudent/{student}', 'deletegradestudent');
                Route::put('/dropstudent/{student}', 'dropgradestudent');
                Route::put('/updatesubject/{subject}', 'updatesubject');
                Route::put('/deletesubject/{subject}', 'deletegradesubject');
                Route::put('/updateschoolyear/{schoolyear}', 'updateschoolyear');
                Route::put('/deleteschoolyear/{schoolyear}', 'deletegradeschoolyear');
                Route::put('/updatesubjectteacher/{subjectteacher}', 'updatesubjectteacher');
                Route::put('/deletesubjectteacher/{subjectteacher}', 'deletegradesubjectteacher');
                Route::put('/updategradelevel/{gradelevel}', 'updategradelevel');
                Route::put('/deletegradelevel/{gradelevel}', 'deletegradegradelevel');
                Route::put('/updateadvisory/{advisory}', 'updateadvisory');
                Route::put('/deleteadvisory/{advisory}', 'deletegradeadvisory');

        
        /*
        |-----------------------------------------------------------------------------------
        | ADMINS Routes - Document Request
        |-----------------------------------------------------------------------------------
        |
        | Here is where admins routes that are included in their document request are defined.
        |
        */
            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Document Request - GET
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes GET that are included in their document reuqest page are defined.
            |
            */
            Route::get('/documentrequest', 'documentRequest');
            Route::get('/viewdocument/{id}', 'viewdocument');
            Route::get('/showdocument/{id}', 'showdocument');
            Route::get('/viewrequestadmin/{id}', 'viewrequest');
            Route::get('/showrequestadmin/{id}', 'showrequest');
            Route::get('/deletedocument/{id}',  'deletedocument')->name('admin.deletedocument');

            Route::get('/tableofcompleted11', 'tableofCompleted11');
            Route::get('/tableofrejected11', 'tableofRejected11');

            Route::get('/tableofcompleted12', 'tableofCompleted12');
            Route::get('/tableofrejected12', 'tableofRejected12');

            Route::get('/tableofcompletedAlumni', 'tableofCompletedAlumni');
            Route::get('/tableofrejectedAlumni', 'tableofRejectedAlumni');

            Route::get('/viewpurpose/{id}', 'viewpurpose');
            Route::get('/showpurpose/{id}', 'showpurpose');
            Route::get('/deletepurpose/{id}',  'deletepurpose')->name('admin.deletepurpose');

            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Document Request - POST
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes POST that are included in their document reuqest page are defined.
            |
            */
            Route::post('/add/document', 'storedocument')->name('document.store');
            Route::post('/add/purpose', 'storepurpose')->name('purpose.store');
            Route::post('/downloadPDFdoc', 'downloadpdfdoc')->name('admin.downloadpdfdoc');


            /*
            |-----------------------------------------------------------------------------------
            | ADMINS Routes - Document Request - PUT
            |-----------------------------------------------------------------------------------
            |
            | Here is where admin routes PUT that are included in their document reuqest page are defined.
            |
            */
            Route::put('/updatedocument/{document}', 'updatedocument');
            Route::put('/deletedocument/{document}', 'deletegradedocument');
            Route::put('/updaterequestdocadmin/{docreq}', 'updatedocreq');

            Route::put('/updatepurpose/{purpose}', 'updatepurpose');
            Route::put('/deletepurpose/{purpose}', 'deletegradepurpose');
    });
});



/*
|-----------------------------------------------------------------------------------
| FACULTIES Routes
|-----------------------------------------------------------------------------------
|
| Here is where faculties routes are defined.
|
*/
Route::group(['middleware' => 'auth:faculties'], function () {

    Route::controller(FacultyController::class)->group(function(){
        
        /*
        |-----------------------------------------------------------------------------------
        | FACULTIES Routes - Home
        |-----------------------------------------------------------------------------------
        |
        | Here is where faculties routes that are included in their homepage are defined.
        |
        */


            /*
            |-----------------------------------------------------------------------------------
            | FACULTIES Routes - Home - GET
            |-----------------------------------------------------------------------------------
            |
            | Here is where faculties routes GET that are included in their homepage are defined.
            |
            */
            Route::get('/faculties', 'home');
            Route::get('/facultyprofile', 'profile');
            Route::get('/createannouncement', 'createannouncement');
            Route::get('/password-faculty/{id}', 'facultyresetshow');
            Route::get('/advisoryfaculty', 'advisoryfaculty');

            Route::get('/card_giving/{id}',  'card_giving')->name('faculty.card_giving');
            Route::put('/cards/{advisory}', 'cards');
            Route::get('/unrelease/{id}',  'unrelease')->name('faculty.unrelease');
            Route::put('/unrelease/{advisory}', 'unreleasecard');
            Route::get('/viewStudents/{gradelevel_id}/{course_id}/{section_id}', 'viewStudents')->name('faculty.viewStudents');
            Route::get('/viewstudentgrades/{id}', 'viewstudentgrades');
            Route::get('/releasemidterm/{gradelevel_id}/{course_id}/{section_id}',  'releasemidterm')->name('releasemidterm');
            Route::get('/releasefinals/{gradelevel_id}/{course_id}/{section_id}',  'releasefinals')->name('releasefinals');


            /*
            |-----------------------------------------------------------------------------------
            | FACULTIES Routes - Home - POST
            |-----------------------------------------------------------------------------------
            |
            | Here is where faculties routes POST that are included in their homepage are defined.
            |
            */
            Route::post('/reset-password-faculty', 'facultyreset');

            /*
            |-----------------------------------------------------------------------------------
            | FACULTIES Routes - Home - PUT
            |-----------------------------------------------------------------------------------
            |
            | Here is where faculties routes PUT that are included in their homepage are defined.
            |
            */
            Route::put('/facultyprofile/{faculty}/{address}', 'profileupdate');

        

        /*
        |-----------------------------------------------------------------------------------
        | FACULTIES Routes - Grading
        |-----------------------------------------------------------------------------------
        |
        | Here is where faculties routes that are included in their grading page are defined.
        |
        */


            /*
            |-----------------------------------------------------------------------------------
            | FACULTIES Routes - Grading - GET
            |-----------------------------------------------------------------------------------
            |
            | Here is where faculties routes GET that are included in their grading page are defined.
            |
            */
            Route::get('/facultygrade', 'grades');
            Route::get('/facultygradeeval', 'gradeeval');
            Route::get('/facultysubjects', 'facultysubjects');
            Route::get('/view-students/{subject_id}/{gradelevel_id}/{semester_id}/{schoolyear_id}', 'view_students')->name('view-students');


            /*
            |-----------------------------------------------------------------------------------
            | FACULTIES Routes - Home - POST
            |-----------------------------------------------------------------------------------
            |
            | Here is where faculties routes POST that are included in their homepage are defined.
            |
            */
            Route::post('/uploadeval/{upload}', 'uploadeval')->name('faculty.uploadeval');
            Route::post('tabledit/action', 'action')->name('tabledit.action');


        /*
        |-----------------------------------------------------------------------------------
        | FACULTIES Routes - Activity Stream
        |-----------------------------------------------------------------------------------
        |
        | Here is where faculties routes that are included in their activity stream page are defined.
        |
        */


            /*
            |-----------------------------------------------------------------------------------
            | FACULTIES Routes - Activity Stream - GET
            |-----------------------------------------------------------------------------------
            |
            | Here is where faculties routes GET that are included in their activity stream page are defined.
            |
            */
            Route::get('/createannouncement', 'createannouncement');
            Route::get('/viewfacultyannouncement/{id}', 'viewannouncement');
            Route::get('/showfacultyannouncement/{id}', 'showannouncement');
            Route::get('/deleteannouncement/{id}',  'deleteannouncement')->name('faculty.deleteannouncement');

            /*
            |-----------------------------------------------------------------------------------
            | FACULTIES Routes - Activity Stream - POST
            |-----------------------------------------------------------------------------------
            |
            | Here is where faculties routes POST that are included in their activity stream page are defined.
            |
            */
            Route::post('/add/announcement', 'storeannouncement')->name('announcement.store');

            /*
            |-----------------------------------------------------------------------------------
            | FACULTIES Routes - Activity Stream - PUT
            |-----------------------------------------------------------------------------------
            |
            | Here is where faculties routes PUT that are included in their activity stream page are defined.
            |
            */
            Route::put('/updatefacultyannouncement/{announcement}', 'updateannouncement');
            Route::put('/deleteactivitystream/{activitystream}', 'deleteactivitystream');
    });

});



/*
|-----------------------------------------------------------------------------------
| Miscellaneous Routes
|-----------------------------------------------------------------------------------
|
| Here is where other routes are defined.
|
*/


    /*
    |-----------------------------------------------------------------------------------
    | Route for Download
    |-----------------------------------------------------------------------------------
    |
    | The download function is located at StudentsController file. It can also be used by other users such admin and faculties.
    |
    */
    Route::get('/download/{file}', [StudentsController::class, 'downloadrequest']);
    
    /*
    |-----------------------------------------------------------------------------------
    | Route for Blocking Routes
    |-----------------------------------------------------------------------------------
    |
    | There are unused and unwanted routes in the web application. Here is where we blocked it using abort 404.
    |
    */
    Route::get('/admins/login', function () {
        return abort(404);
    });
    
    /*
    |-----------------------------------------------------------------------------------
    | Route for Miscellaneous Login
    |-----------------------------------------------------------------------------------
    |
    | We need it for login to function. DO NOT REMOVE or website won't work.
    |
    */
    Route::group(['prefix' => 'admins'], function () { 
        Auth::routes();
    });