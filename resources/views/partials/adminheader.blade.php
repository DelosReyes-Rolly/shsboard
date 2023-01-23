<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/bootstrap-4.1.0-min.css') }}">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- Our Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style4.css') }}">

    <!-- Font Awesome JS -->
    <script src="{{ asset('assets/js/fontawesome-solid-5.0.13.js') }}"></script>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script> -->
    <script src="{{ asset('assets/js/fontawesome-5.0.13.js') }}"></script>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->
	<!-- additional? -->
    <script src="{{ asset('assets/js/sweetalert-new.js') }}"></script>
        <!-- title of site -->
        <title>SVNHS-SHS BOARD</title>
        <link rel="shortcut icon" type="image/icon" href='{{ URL::asset("img/shs.png")}}'/>

        <!--style.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="sticky-top h-100 vh-100" style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
            <div class="sidebar-header sticky-top">
                <div class="title" style="text-shadow: 0 4px 16px rgba(0,0,0,1);"><img src="{{url('/img/svnhs-logo.png')}}" style="width: 80px; height: 80px;"><img src="{{url('/img/shs.png')}}" style="width: 80px; height: 80px;"><div style="font-size: 20px;"> Signal Village National High School </div> <br/> SHS - BOARD</div>
                <strong> <img src="{{url('/img/shs.png')}}" style="width: auto; height: auto;"></strong>
            </div>

            <ul class="list-unstyled components">
                <li title="Dashboard">
                    <a href="/">
                        <i class="fas fa-chalkboard"></i>
                        <span class="hide-word title-word"> <b>Dashboard</b> </span>
                    </a>
                </li>
                <li>
                    <a href="#academicSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" title="School Management Access">
                    <i class="fas fa-school"></i>
                        <span class="hide-word title-word"> <b>Access Management</b></span>
                    </a>
                    <ul class="collapse list-unstyled" id="academicSubmenu">
                        <li title="School year">
                            <a href="/gradingschoolyear"><i class="fas fa-calendar-alt"></i> <span class="hide-word"> <b>School Year</b></span></a>
                        </li>
                        <li title="Grade Levels">
                            <a href="/gradinggradelevels"><i class="fas fa-signal"></i> <span class="hide-word"> <b>Grade Levels</b></span></a>
                        </li>
                        <li title="Strands">
                            <a href="/gradingcourses"><i class="fas fa-sitemap"></i> <span class="hide-word"> <b>Strands</b></span></a>
                        </li>
                        <li title="Sections">
                            <a href="/gradingsections"><i class="fas fa-bars"></i> <span class="hide-word"> <b>Sections</b></span></a>
                        </li>
                        <li title="Subjects">
                            <a href="/gradingsubjects"><i class="fas fa-book"></i> <span class="hide-word"> <b>Subjects</b></span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/gradingstudents" title="Students">
                        <i class="fas fa-users"></i>
                        <span class="hide-word title-word"> <b>Students</b> </span>
                    </a>
                </li>
                <li>
                    <a href="/advisory" title="Advisory">
                        <i class="fas fa-user-tag"></i>
                        <span class="hide-word title-word"> <b>Advisory</b> </span>
                    </a>
                </li>
                <li>
                    <a href="/gradingfacultysubjects" title="Class Schedule">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span class="hide-word title-word"> <b>Class Schedule</b> </span>
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled components">
                <li>
                    <a href="#facultySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" title="Faculty">
                        <i class="fas fa-stream"></i>
                        <span class="hide-word title-word"> <b>Faculty</b></span>
                    </a>
                    <ul class="collapse list-unstyled" id="facultySubmenu">
                        <li title="Faculties">
                            <a href="/gradingfaculty" title="Faculties"><i class="fas fa-user-tie"></i>&nbsp;<span class="hide-word"> <b>Faculties</b> </span></a>
                        </li>
                        <li title="Expertises">
                            <a href="/gradingexpertise" title="Expertises"><i class="fas fa-user-tie"></i>&nbsp;<span class="hide-word"> <b>Expertises</b> </span></a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul> -->

            <ul class="list-unstyled components">
                <div style="padding-left:8px;">External</div>
                <li>
                    <a href="#landingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" title="Manage Landing Page">
                        <i class="fas fa-stream"></i>
                        <span class="hide-word title-word"> <b>Manage Landing Page</b></span>
                    </a>
                    <ul class="collapse list-unstyled" id="landingSubmenu">
                        <li title="Homepage">
                            <a href='{{ url("/homepage") }}'><i class="fas fa-home"></i> <span class="hide-word"> <b>Homepage</b></span></a>
                        </li>
                        <li title="Public Announcements">
                            <a href='{{ url("/createAnnoucement") }}'><i class="fas fa-bullhorn"></i> <span class="hide-word"> <b>Announcements</b></span></a>
                        </li>
                        <li title="Public Events">
                            <a href='{{ url("/createEvents") }}'><i class="fas fa-calendar-times"></i> <span class="hide-word"> <b>Events</b></span></a>
                        </li>
                        <li title="Public Reminders">
                            <a href='{{ url("/createReminder") }}'><i class="fas fa-sticky-note"></i> <span class="hide-word"> <b>Reminders</b></span></a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled components">
                <div style="padding-left:8px;">Internal</div>
                <li>
                    <a href="#bulletinSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" title=" Bulletin">
                        <i class="fas fa-tv"></i>
                        <span class="hide-word title-word"> <b>Bulletin</b></span>
                    </a>
                    <ul class="collapse list-unstyled" id="bulletinSubmenu">
                        <li title="Private Announcements">
                            <a href='{{ url("/privateannouncement") }}'><i class="fas fa-bullhorn"></i> <span class="hide-word"> <b>Announcements</b></span></a>
                        </li>
                        <li title="Private Table of Announcement">
                            <a href='{{ url("/tableofannouncement") }}'><i class="fas fa-table"></i> <span class="hide-word"> <b>Table of Announcements</b></span></a>
                        </li>
                        <li title="Private Reminder">
                            <a href='{{ url("/privatereminders") }}'><i class="fas fa-sticky-note"></i> <span class="hide-word"> <b>Reminders</b></span></a>
                        </li>
                        <li title="Private Table of Reminders">
                            <a href='{{ url("/tableofreminders") }}'><i class="fas fa-table"></i> <span class="hide-word"> <b>Table of Reminders</b></span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="a-header" href='{{ url("documentrequest") }}' title="Document Requests">
                        <i class="fas fa-file-alt"></i> 
                        <span class="hide-word title-word"> <b>Document Requests</b> </span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" style="padding: 0px;">

            <nav class="navbar navbar-expand-lg navbar-light sticky-top">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <div style="padding-left:10px; color: #fff; font-weight:bold; font-style: Verdana;">Welcome {{Auth::user()->first_name}}!</div>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" title="Profile">
                                <a class="header-letter" href='{{ url("profile") }}'>Profile</a>
                            </li>&emsp;
                            <li class="nav-item" title="Change Password">
                                <a class="header-letter" href="/password-admin/{{Auth::user()->id}}}">Change Password</a>
                            </li>&emsp;
                            <li class="nav-item" title="Logout">
                                <a class="header-letter" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div style="padding: 20px;">
                @include('sweetalert::alert')
                <!-- Go back from top -->
                <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
                <script>
                    let mybutton = document.getElementById("myBtn");
                    window.onscroll = function() {scrollFunction()};

                    function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                    }
                    }
                    function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                    }
                </script>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('assets/js/jquery-slim.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap-4.1.0-min.js') }}"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>