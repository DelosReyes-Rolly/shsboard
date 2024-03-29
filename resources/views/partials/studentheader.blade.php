<!DOCTYPE html>
<html>
@include('partials.loader')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-4.1.0-min.css') }}">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style4.css') }}">

    <!-- Font Awesome JS -->
    <script src="{{ asset('assets/js/fontawesome-solid-5.0.13.js') }}"></script>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script> -->
    <script src="{{ asset('assets/js/fontawesome-5.0.13.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->
    <!-- additional? -->
    <script src="{{ asset('assets/js/sweetalert-new.js') }}"></script>

    <!-- title of site -->
    <title>SVNHS-SHS BOARD</title>
    <link rel="shortcut icon" type="image/icon" href='{{ URL::asset("img/shs.png")}}' />

    <!--style.css-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div id="bodyOfPage">
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar" class="sticky-top h-100 vh-100" style="box-shadow: 0 4px 16px rgba(0,0,0,0.4);">
                <div class="sidebar-header">
                    <div class="title" style="text-shadow: 0 4px 16px rgba(0,0,0,1);"><img src="{{url('/img/svnhs-logo.png')}}" style="width: 80px; height: 80px;"><img src="{{url('/img/shs.png')}}" style="width: 80px; height: 80px;">
                        <div style="font-size: 20px;"> Signal Village National High School </div> <br /> SHS - BOARD
                    </div>
                    <strong> <img src="{{url('/img/shs.png')}}" style="width: auto; height: auto;"></strong>
                </div>

                <ul class="list-unstyled components">
                    <li title="Bulletin">
                        <a href="{{ url('/') }}">
                            <i class="fas fa-chalkboard"></i>
                            <span class="hide-word title-word"><b>
                                    <div class="Ashort">Bulletin</div>
                                    <div class="Along">Bulletin</div>
                                </b></span>
                        </a>
                    </li>
                    <li title="Activity Stream">
                        <a href="{{ url('/activitystream') }}">
                            <i class="fas fa-chalkboard"></i>
                            <span class="hide-word title-word"><b> Activity Stream</b></span>
                        </a>
                    </li>
                    <li>
                        <a href="#academicSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" title="Grades">
                            <i class="fas fa-school"></i>
                            <span class="hide-word title-word"><b> Grades</b></span>
                        </a>
                        <ul class="collapse list-unstyled" id="academicSubmenu">
                            <li title="Subjects">
                                <a href='{{ url("/studentgrade") }}'><i class="fas fa-calendar-alt"></i> <span class="hide-word"><b>Subjects</b></span></a>
                            </li>
                            <li title="Evaluation Requests">
                                <a href='{{ url("/gradeeval") }}'><i class="fas fa-home"></i> <span class="hide-word"><b> Evaluation Requests</b></span></a>
                            </li>
                        </ul>
                    </li>
                    <li title="Document Requests">
                        <a href="{{ url('/studentrequest') }}">
                            <i class="fas fa-briefcase"></i>
                            <span class="hide-word title-word"><b> Document Requests </b></span>
                        </a>
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
            </nav>

            <!-- Page Content  -->
            <div id="content" style="padding: 0px;">

                <nav class="navbar navbar-expand-lg navbar-light sticky-top">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <div class="greetingstop" style="padding-left:10px; color: #fff; font-weight:bold; font-style: Verdana;">Welcome Student {{Auth::user()->first_name}}!</div>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item" title="Profile">
                                    <a class="header-letter navbar-a" href="{{ url('/studentprofile') }}" style="color:#fff; border-top: none;">Profile</a>
                                </li>&emsp;
                                <li class="nav-item" title="Change Password">
                                    <a class="header-letter navbar-a" href="{{ url('password-student',['id'=>Auth::user()->id]) }}" style="color:#fff; border-top: none;">Change Password</a>
                                </li>&emsp;
                                <li class="nav-item" title="Logout">
                                    <a class="header-letter navbar-a" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color:#fff; border-top: none;">{{ __('Logout') }}</a>
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
                    <script>
                        var loadingPage = document.getElementById("loading-page");
                        var bodyOfPage = document.getElementById("bodyOfPage");
                        loadingPage.style.display = "block";
                        bodyOfPage.style.display = "none";

                        // hide the loading page once the content is loaded
                        window.onload = function() {
                            loadingPage.style.display = "none";
                            bodyOfPage.style.display = "block";
                        };
                    </script>
                    <!-- Go back from top -->
                    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
                    <script>
                        let mybutton = document.getElementById("myBtn");
                        window.onscroll = function() {
                            scrollFunction()
                        };

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
                        $(document).ready(function() {
                            $('#sidebarCollapse').on('click', function() {
                                $('#sidebar').toggleClass('active');
                            });
                        });
                    </script>
</body>

</html>