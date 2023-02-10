@include('partials.landingheader')
<main>
    <!--welcome-hero start -->
	
		<video poster="" id="myVideo" playsinline autoplay muted loop>
			<source src="uploads/svnhs-homevideo.mp4" type="video/mp4">
		</video>	
		<section id="welcome-hero" class="welcome-hero">
			<div class="container fade-in-text">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="header-text"><br/><br/><br/><br/>
							<img src="img/svnhs-logo.png" style="width: 120px; height: 120px;"> <img src="img/shs.png" style="width: 120px; height: 120px;">	
							<h3 style="color: white; font-weight:bold; font-size:20px">SIGNAL VILLAGE NATIONAL HIGHSCHOOL</h3>
							<h2>SENIOR HIGH<br> SCHOOL BOARD <br> <br>   </h2>
							<div class="getstarted"><button onclick="location.href='#about'">GET STARTED</button></div>
						</div><!--/.header-text-->
					</div><!--/.col-->
				</div><!-- /.row-->
			</div><!-- /.container-->
		</section><!--/.welcome-hero-->
	<!--welcome-hero end -->

	<section id="about" class="about">

   @foreach ($home as $homes)
        <!--about start -->
		@if($homes -> title == "About")
			<br/><br/><br/><br/><br/><br/>
			<div class="container" style="padding:0px 40px 0px 40px;">
				<div>
					<div class="reveal fade-left">{{$homes -> title}}</div>
					<div class="titlelanding reveal fade-bottom">SVNHS</div><br/>
					<div class="reveal fade-left"><p style="padding-top: 60px;">{!!$homes -> content!!}</p></div>
				</div>
				<div class="reveal fade-right">
					<img src="{{ asset('uploads/landing/'.$homes->image) }}" style = "width: 1000px; height: auto; box-shadow: 0 4px 16px rgba(0,0,0,1);"/>
				</div>
			</div>
		@elseif($homes -> title == "Principal Message")
		<br/><br/><br/><br/><br/><br/>
				<div class="container">
					<center><div class="titlelanding reveal fade-bottom" style="letter-spacing: 6px; text-transform: uppercase;">{{$homes -> title}}</div></center>
					<div class="about-content">
						<div class="row">
							<div class="col-sm-5 reveal fade-right" >
								<img src="{{ asset('uploads/landing/'.$homes->image) }}" style = "width: 800px; height: auto; box-shadow: 0 4px 16px rgba(0,0,0,1);"/>
							</div>
							<div class="col-sm-6">
								<div class="reveal fade-left" >
									<p style="padding-top: 60px;">{!!$homes -> content!!}</p>
								</div>
							</div>
						</div>
					</div>
				</div>

		@elseif($homes -> title != "The DEPED VISION" && $homes -> title != "The DEPED Mission" && $homes -> title != "CORE VALUES" && $homes -> title != "Strands Offered")
		<br/><br/><br/><br/><br/><br/>
				<div class="container">
					<div class="about-content">
						<div class="row" style="padding:0px 40px 0px 40px;">
							<div class="col-sm-6">
								<div class="titlelanding reveal fade-bottom">{{$homes -> title}}</div>
								<div class="reveal fade-left"><p style="padding-top: 60px;">{!!$homes -> content!!}</p></div>
							</div>
							<div class="col-sm-offset-1 col-sm-5 reveal fade-right">
								<img src="{{ asset('uploads/landing/'.$homes->image) }}" style = "width: auto; height: auto; box-shadow: 0 4px 16px rgba(0,0,0,1);"/>
							</div>
						</div>
					</div>
				</div>
	
		@endif
    @endforeach

    <!-- enrollment report -->
	<br/><br/><br/><br/><br/><br/>
			<div class="container reveal fade-bottom"  style="padding:0px 40px 0px 40px;">

					<div class="enrollmentreport"><b>Enrollment Report</b></div>
			       	<!-- page navigation-->
			        <center>
				       <hr class="mt-9 mb-9">
				        <div class="row">
				           
				               <!-- Account details card-->
				                <div class="card mb-4">
				                    <div class="card border-start-lg border-start-yellow">
					                    <!-- Form Row-->
					                    <div class="row gx-3 mb-3" style="color: #315d8c;">
					                        <!-- Form Group (title)-->
					                        <div class="col-md-3">
						                        <br><hr><br>
						                        <h1 style="font-size: 40px;"><b>
													@if($SchoolYear == "Not Set")
														Not Set
													@else
														{{$SchoolYear -> schoolyear}}
													@endif
												</b></h1>					
												<h1 style="font-size: 20px;">School Year	</h1>
												<hr>
					                       	</div>
					                        <!-- Form Group (title)-->
					                        <div class="col-md-3">
					                            <br><hr><br>
						                        <h1 style="font-size: 40px;"><b>{{$studentCount}}</b></h1>	
												<h1 style="font-size: 20px;">Enrolled Students</h1>
												<hr>
					                        </div>
					                        <!-- Form Group (title)-->
					                        <div class="col-md-3">
					                            <br><hr><br>
						                        <h1 style="font-size: 40px;"><b>{{$facultyCount}}</b></h1>	
												<h1 style="font-size: 20px;">Teachers</h1>
												<hr>
					                        </div>
					                        <!-- Form Group (title)-->
					                        <div class="col-md-3">
					                            <br><hr><br>
						                        <h1 style="font-size: 40px;"><b>{{$coursesCount}}</b></h1>	
												<h1 style="font-size: 20px;">Strands</h1>
												<hr>
					                        </div>
					                    </div>
					                </div>
					            </div>
					      
					   </div>
					</center>
				
			</div>
			<br/><br/><br/><br/><br/><br/>
		<div class="container">
			<center>
			<div class="videotitle reveal fade-left">SIGNAL VILLAGE NATIONAL HIGH SCHOOL</div>
			<div class="videotitleborder reveal fade-right"></div>
			</center>
			<video poster="img/svnhs.jpg" id="lowervideo" class=" reveal fade-bottom"controls>
				<source src="uploads/svnhs-promotionalvideo.mp4" type="video/mp4">
			</video>
		</div><br/><br/><br/><br/>
	</section>
	@include('sweetalert::alert')
</main>
@include('partials.landingfooter')
