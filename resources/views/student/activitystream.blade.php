@include('partials.studentheader')
<main>
<!-- announcements -->
<div class="announcement_body">
	<div class="announcement_text">Activity Stream</div>
</div>
<section id="about" class="about">
			<div>
				<div id="main-content" class="blog-page">
				    <div>
				        <div class="row clearfix">
				            <div class="col-lg-12 col-md-12 left-box">
			               			<br><br>
                                    @if($announcement == NULL)
                                        <br><br>
                                        <div class="alert alert-danger fade-in-text"><center><em>No activity for now.</em></center></div>
                                    @else 
                                        @foreach ($announcement as $announcements)
                                            <div class="card single_post left-to-right">
                                                <div class="body">
                                                    <h3 style="font-size: 28px;"><b>{{$announcements -> what}}</b></h3><br/>
                                                    <h4 style="font-size: 24px;"><b>Subject Name: </b>{{$announcements -> subject -> subjectname}}</h4><br/>
                                                    <h6 style="font-size: 24px;"><b>Teacher: </b>{{$announcements -> faculty -> last_name}}, {{$announcements -> faculty -> first_name}} {{$announcements -> faculty -> middle_name}}</h6><br/>
                                                    <div style="font-size: 22px;">{{$announcements -> content}}</div><br/>
                                                    <div style="font-size: 24px;"><b>Gradelevel: </b>{{$announcements -> gradelevel -> gradelevel}}</div> <br/>
                                                    <div style="font-size: 24px;"><b>Strand: </b>{{$announcements -> course -> courseName}}</div> <br/>
                                                    <div style="font-size: 24px;"><b>Section: </b>{{$announcements -> section -> section}}</div> <br/>
                                                    <div class="footer">
                                                        <ul class="stats">
                                                            <?php $whn = date('F d, Y', strtotime($announcements -> whn)); ?>
                                                            <li style="font-size: 22px;">On {{$whn}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <hr style="border: 1px solid black">
                                            </div>
                                        @endforeach     
                                    @endif         
				            </div>
				            <br><br><br><br>
				        </div>
				    </div>
				</div>
			</div>
		</section>
</main>