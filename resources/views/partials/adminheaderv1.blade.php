<!DOCTYPE html>
<html lang="en">
    <head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!-- meta data -->
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">
        
        <!-- title of site -->
        <title>SVNHS-SHS BOARD</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href='{{ URL::asset("img/shs.png")}}'/>

		<!--animate.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootsnav.css') }}" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

		<!-- transition -->
		<script>
			function reveal() {
			var reveals = document.querySelectorAll(".reveal");

			for (var i = 0; i < reveals.length; i++) {
				var windowHeight = window.innerHeight;
				var elementTop = reveals[i].getBoundingClientRect().top;
				var elementVisible = 150;

				if (elementTop < windowHeight - elementVisible) {
				reveals[i].classList.add("active");
				} else {
				reveals[i].classList.remove("active");
				}
			}
			}

			window.addEventListener("scroll", reveal);
		</script>
    </head>
    <body>
        <!-- top-area Start -->
		<header class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav navbar-fixed dark no-background">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
							<a class="navbar-brand" href='{{ url("/") }}'><div class="svnhshead">SIGNAL VILLAGE NATIONAL HIGH SCHOOL</div>SHS BOARD</a>
			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design left-to-right" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                	<li class=" smooth-menu active"></li>
								<li class="smooth-menu"><a class="a-header" href='{{ url("/") }}'>Home</a></li>
								<li class="menu smooth-menu">
									<button><li>Landing <span style='font-size:18px;'>&#9661;</span></li></button>
									<ul class="submenu" style="z-index: 1000;">
										<li><a href='{{ url("/homepage") }}'>Homepage</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href='{{ url("/createAnnoucement") }}'>Announcements</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href='{{ url("/createEvents") }}'>Events</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href='{{ url("/createReminder") }}'>Reminders</a></li>
									</ul>
								</li>
								<li class="menu smooth-menu">
									<button>Announcement <span style='font-size:18px;'>&#9661;</span></button>
									<ul class="submenu" style="z-index: 1000;">
										<li><a href='{{ url("/privateannouncement") }}'>Create Announcements</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href='{{ url("/tableofannouncement") }}'>Table of Announcements</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href='{{ url("/privatereminders") }}'>Create Reminders</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href='{{ url("/tableofreminders") }}'>Table of Reminders</a></li>
									</ul>
								</li>
								<li class="menu smooth-menu">
									<button>Grades <span style='font-size:18px;'>&#9661;</span></button>
									<ul class="submenu" style="z-index: 1000;">
										<li><a href="/grades"><i class="fas fa-desktop"></i><span> Dashboard</span></a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href="/gradingcourses"><i class="fas fa-cogs"></i><span> Strands</span></a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href="/gradingsections"><i class="fas fa-cogs"></i><span> Sections</span></a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href="/gradingfaculty"><i class="fas fa-table"></i><span> Faculty</span></a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href="/gradingstudents"><i class="fas fa-th"></i><span> Students</span></a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href="/gradingsubjects"><i class="fas fa-info-circle"></i><span> Subjects</span></a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href="/gradingschoolyear"><i class="fas fa-sliders-h"></i><span> School Year</span></a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href="/gradingfacultysubjects"><i class="fas fa-cogs"></i><span> Classes</span></a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href="/gradinggradelevels"><i class="fas fa-cogs"></i><span> Gradelevels</span></a></li>
									</ul>
								</li>
								<li class="smooth-menu"><a class="a-header" href='{{ url("documentrequest") }}'>Document Requests</a></li>
								<li class="menu smooth-menu">
									<button>{{Auth::user()->first_name}} <span style='font-size:18px;'>&#9661;</span></button>
									<ul class="submenu">
										<li><a href='{{ url("profile") }}'>Profile</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li><a href="/password-admin/{{Auth::user()->id}}}">Change Password</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
										<li>
											<a class="a-header" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    		<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        		@csrf
                                    		</form>
										</li>
									</ul>
								</li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->

		    <div class="clearfix"></div>

		</header><!-- /.top-area-->
		<!-- top-area End -->

        

        <!-- end of enrollment report -->



		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="{{ asset('assets/js/jquery.js') }}"></script>
		
		<!--bootstrap.min.js-->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
	     
        <!--Custom JS-->
        <script src="{{ asset('jquery.js') }}"></script>
    </body>
</html>