<!DOCTYPE html>
<html lang="en">
    <head>
	<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-5.6.3.css') }}">
		<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
        <!-- meta data -->
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!--font-family-->
		<link rel="stylesheet" href="{{ asset('assets/css/google-font-poppins.css') }}">
		<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet"> -->
        
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
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				                <li class=" smooth-menu active"></li>
									<li class="smooth-menu"><a  class="a-header" href="{{ url('/') }}">Announcement</a></li>
									<li class="smooth-menu"><a  class="a-header" href="{{ url('/activitystream') }}">Activity Stream</a></li>
									<li class="menu smooth-menu a-header">
										<button>Grades <span style='font-size:18px;'>&#9661;</span></button>
										<ul class="submenu" style="z-index: 1000;">
											<li><a href='{{ url("/studentgrade") }}'>Subjects</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
											<li><a href='{{ url("/gradeeval") }}'>Evaluation Requests</a></li>
										</ul>
									</li>
									<li class="smooth-menu"><a class="a-header" href="{{ url('/studentrequest') }}">Document Request</a></li>
									<li class="menu smooth-menu">
										<button>{{Auth::user()->first_name}} <span style='font-size:18px;'>&#9661;</span></button>
										<ul class="submenu" style="z-index: 1000;">
											<li><a class="a-header" href="{{ url('/studentprofile') }}">Profile</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
											<li><a class="a-header" href="/password-student/{{Auth::user()->id}}">Change Password</a></li><hr style="margin: 0 0 0 0; border-top: 2px solid #808080">
											<li class="smooth-menu"><a class="a-header" href="{{ url('/logout') }}">Logout</a></li>
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
		<!-- Include all js compiled plugins (below), or include individual files as needed -->


		<script src="{{ asset('assets/js/jquery.js') }}"></script>
		
		<!--bootstrap.min.js-->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery-easing.js') }}"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> -->
	     
        <!--Custom JS-->
        <script src="{{ asset('jquery.js') }}"></script>
	    <script> 
	    $(function(){
	      $("#includedContent").load("../admin/print/footer.php"); 
	    });
	    </script>
    </body>
</html>