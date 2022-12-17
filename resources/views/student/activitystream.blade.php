@include('partials.studentheader')
<main>
<!-- announcements -->
<div class="announcement_body">
	<div class="announcement_text">Activity Stream</div>
</div>
<section id="about" class="about">
			<div>
				<div id="main-content" class="blog-page">
				    <div class="container">
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
                                                    <h3><b>{!!$announcements -> what!!}</b></h3><br/>
                                                    <h4><b>Subject Name: {{$announcements -> subject -> subjectname}}<b></h4><br/>
                                                    <h6><b>Teacher: {{$announcements -> faculty -> last_name}}, {{$announcements -> faculty -> first_name}} {{$announcements -> faculty -> middle_name}}<b></h6><br/>
                                                    {!!$announcements -> content!!}</p><br/>
                                                    Gradelevel: {{$announcements -> gradelevel -> gradelevel}} <br/>
                                                    Strand: {{$announcements -> course -> courseName}} <br/>
                                                    Section: {{$announcements -> section -> section}} <br/>
                                                    <div class="footer">
                                                        <ul class="stats">
                                                            <?php $whn = date('F d, Y', strtotime($announcements -> whn)); ?>
                                                            <li>On {{$whn}}</a></li>
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