@include('partials.adminheader')
<main>
<!-- announcements -->
<span style="font-size: 40px; font-weight: 800; color: green;">School Year {{ $schoolYear->schoolyear}}</span>
<hr>
<section id="about" class="about">

			<div class=""> <!-- container  -->
				<div id="main-content" class="blog-page">
				    <div class="">
				        <div class="row clearfix">
                            <div class="col-lg-4 mb-4">
                                <div class="card h-100 border-start-lg border-start-yellow" style="background-color: orange; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                                    <div class="card-body delay-1">
                                        <div class="card-header" style="font-size: 20px; font-weight: 800;">Students</div>
                                        <div class="h3" style="padding: 40px 40px 10px 40px;"><i class="fas fa-users"></i> {{ $students->count() }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="card h-100 border-start-lg border-start-yellow" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                                    <div class="card-body delay-1">
                                        <div class="card-header" style="font-size: 20px; font-weight: 800;">Faculties</div>
                                        <div class="h3" style="padding: 40px 40px 10px 40px;"><i class="fas fa-user-tag"></i> {{ $faculties->count() }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="card h-100 border-start-lg border-start-yellow" style="background-color: green; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                                    <div class="card-body delay-1">
                                        <div class="card-header" style="font-size: 20px; font-weight: 800;">Strands</div>
                                        <div class="h3" style="padding: 40px 40px 10px 40px;"><i class="fas fa-calendar-times"></i> {{ $courses->count() }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="card h-100 border-start-lg border-start-yellow" style="background-color: grey; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                                    <div class="card-body delay-1">
                                        <div class="card-header" style="font-size: 20px; font-weight: 800;">Sections</div>
                                        <div class="h3" style="padding: 40px 40px 10px 40px;"><i class="fas fa-calendar-times"></i> {{ $sections->count() }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="card h-100 border-start-lg border-start-yellow" style="background-color: blue; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                                    <div class="card-body delay-1">
                                        <div class="card-header" style="font-size: 20px; font-weight: 800;">Subjects</div>
                                        <div class="h3" style="padding: 40px 40px 10px 40px;"><i class="fas fa-calendar-times"></i> {{ $subjects->count() }} </div>
                                    </div>
                                </div>
                            </div>
				        </div>
				    </div>
				</div>
			</div>
		</section>
</main>
<!-- </div>
@include('partials.adminfooter') -->