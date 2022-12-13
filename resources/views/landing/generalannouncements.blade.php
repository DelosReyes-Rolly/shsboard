@include('partials.landingheader')
<main class="h-100">
<section id="about" class="about">
			<div class="container"><br/><br/><br/><br/>
				<div id="main-content" class="blog-page">
				    <div class="container">
				        <div class="row clearfix">
				            <div class="col-lg-8 col-md-12 left-box">
			               			<br><br>
                                    @if($announcement == NULL)
                                        <br><br>
                                        <div class="alert alert-danger"><em>No announcements for now.</em></div>
                                    @else 
                                        @foreach ($announcement as $announcements)
                                            <div class="card single_post">
                                                <div class="body">
                                                    <div>
                                                        @if($announcements->image != NULL)
                                                            <center><img class="d-block img-fluid" src="{{ asset('uploads/announcement/'.$announcements->image) }}" style="height:auto; width: auto;"/></center>
                                                        @endif
                                                    </div><br/>
                                                    <h3><b>{!!$announcements -> what!!}</b></h3><br/>
                                                    <p>{!!$announcements -> content!!}</p>
                                                    <div class="footer">
                                                        <ul class="stats">
                                                            <?php $whn = date('F d, Y', strtotime($announcements -> whn)); ?>
                                                            <li>For {{$announcements -> who}}</a></li>
                                                            <li>On {{$whn}}</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border: 1px solid black">
                                        @endforeach     
                                    @endif         
				            </div>
				            <br><br><br><br>
				            <div class="col-lg-4 col-md-12 right-box">
					            <div class="card">
					                <div class="header">
					                    <h2>Reminder</h2><br>
                                        @if($reminder == NULL)
                                            <br><br>
                                            <div class="alert alert-danger"><em>No reminders for now.</em></div>
                                         @else 
                                            @foreach ($reminder as $reminders)
                                                <div class="card single_post fade-in-text" style="padding: 10px 10px 10px 10px;">
                                                    {!!$reminders -> content!!}
                                                </div>
                                                <br>
                                            @endforeach 
                                        @endif 
					                </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</section>
</main>
<br><br><br><br>
@include('partials.landingfooter')