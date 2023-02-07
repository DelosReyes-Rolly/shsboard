@include('partials.landingheader')
    <section id="about" class="about"><br/><br/>
		<div class="container">
			<center>
				<div>
					<br><br><br><br>
					<b class="container_title">THE FACULTY MEMBERS</b><br/><br/>
					<b>Senior High School Department</b>
				</div>
			</center>
			<div style="margin-top: 40px; margin-bottom: 200px; padding: 40px 40px 40px 40px;" class="course-box">
				<center>
					@foreach ($landings as $landing)
						@if($landing -> title == "The DEPED VISION")
							<div class="">
								<div class="faculty-title">{{$landing -> title}}<br/><br/></div>
								<div style="font-size: 60px;">{!!$landing -> content!!}</div><br/><br/><br/><br/>
							</div>
						@elseif($landing -> title == "The DEPED Mission")
							<div class="right-to-left">
								<div class="faculty-title">{{$landing -> title}}<br/><br/></div>
								{!!$landing -> content!!}<br/><br/><br/><br/>
							</div>
						@elseif($landing -> title == "CORE VALUES")
							<div class="">
								<div class="faculty-title">{{$landing -> title}}<br/><br/></div>
								{!!$landing -> content!!}<br/><br/><br/><br/>
							</div>	
						@endif
					@endforeach
				</center>
			</div>
			<center>
				<b class="container_title">FACULTY MEMBERS</b><br/><br/><br/><br/>
				<div class="row gx-4 mb-4">
					<div class="reveal fade-left">
						<div class="card single_post faculty-box" >
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">DR. RYAN REYNOLDS</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">Principal IV</div>
							<div class="teacherposition">*DepEd TAPAT Outstanding Principal 2019*</div> -->
						</div>
					</div>
				</div>
				<div class="row gx-4 mb-4">
					<div class="reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">DR. ANGEL CRISOSTOMO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">HEAD TEACHER IV / SHS COOR</div>
							<div class="teacherposition">*DEPED TAPAT OUTSTANDING TLE HEAD TEACHER*</div> -->
						</div>
					</div>
				</div>
				<div class="row gx-4 mb-4">
					<div class=" col-lg-3 reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">DR. REY VALERA</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">SHS COUNCIL PRESIDENT</div>
							<div class="teacherposition">RESEARCH AND MANAGEMENT TEACHER</div>
							<div class="teacherposition">*HUWARANG GURO 2018*</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. SHARON CUNETA</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">SHS FOCAL PERSON</div>
							<div class="teacherposition">HUMSS AND PHILOSOPHY TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">DR. LILY HIPOLITO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">SHS COUNCIL CHAIRMAN</div>
							<div class="teacherposition">SHS GUIDANCE COUNSILOR</div>
							<div class="teacherposition">CPAR AND PERSONAL DEVELOPEMENT TEACHER</div> -->
						</div>
					</div>		
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">DR. ARCEE MADRIGAL</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">SHS LIS & RECORDS COORDINATOR</div>
							<div class="teacherposition">RESEARCH AND ICT TEACHER</div>
							<div class="teacherposition">*CAMTESOL RESEARCH PRESENTER 2018*</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. MADONNA CRUZ</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">VICE PRESIDENT</div>
							<div class="teacherposition">HUMSS LITERATURE TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3 reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. ANN BALASI</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">SECRETARY</div>
							<div class="teacherposition">BIOLOGY AND CHEMISTRY TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. MARIAN RIVERA</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">TREASURER</div>
							<div class="teacherposition">ENTREPRENUERSHIP AND MATH TEACHER</div>
							<div class="teacherposition">*NATIONAL CHEERLEASING & DANCE CHAMPION - COACH*</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. MIRIAM DEFENSOR</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">AUDITOR</div>
							<div class="teacherposition">ACCOUNTING AND MANAGEMENT TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MR. JOE BERTINGS</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">PUBLIC INFORMATION OFFICER</div>
							<div class="teacherposition">LANGUAGE TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. KAREN DAVILA</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">BUSINESS MANAGER</div>
							<div class="teacherposition">SOCIAL SCIENCES TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. HYDELYN CASTRO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">MEDTRANS AND SCIENCE TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MR. RODOLFI CASTRO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">MANAGEMENT TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. AMIE BUENO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">CAREGIVING TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. JONNALYN BLAZE</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">FILIPINO TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MR. RAY MUNDO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">CALCULUS TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. RUTH MACAPAGAL</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">LANGUAGE COMMUNICATION TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. MEL TIANGCO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">FILIPINO SA PILING LARANG TEACHER</div>
							<div class="teacherposition">*CHAMPION DAGLIANG TALUMPATI 2018 (COACH)*</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. EVALYN DELOS SANTOS</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">WIKA SA PAGBASA SA PANANALIKSIK TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">DR. RENATO HERMAN</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">SCOUT MASTER</div>
							<div class="teacherposition">PHYSICAL EDUCATION TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">DR. RONALD LAURENTE</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">COOOKERY, BAKING & FBS TEACHER</div>
							<div class="teacherposition">*NATIONAL LEVEL - FESTIVAL OF TALENTS 1ST PLACE*</div>
							<div class="teacherposition">*OUTSTANDING TEACHER OF DEPED TAPAT*</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. MARCELINE CAROL</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">LITERATURE TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MR. NATHAN RENATO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">LANGUAGE TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. LESLEY PEREZ</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">PHYSICS TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-right">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MR. JAY PAREDES</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">GENERAL SCIENCE TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. MARICEL SORIANO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">READING AND WRITING TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MR. JOSEPH ROXAS</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">GEN MATH & STATISTICS TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. MARY ANN RESTOSO</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">SCIENCE TEACHER</div> -->
						</div>
					</div>
					<div class=" col-lg-3  reveal fade-left">
						<div class="card single_post faculty-box">
							<img src="img/faculty-profile.jpg" class="faculty-image" style="border-radius: 100%;">
							<div class="teachername">MS. GRACE ANN URSULA</div>
							<div class="teacherposition">SHS PERSONNEL</div>
							<!-- <div class="teacherposition">RESEARCH TEACHER</div> -->
						</div>
					</div>
				</div>
			</center>
		</div>
	</section>
@include('partials.landingfooter')