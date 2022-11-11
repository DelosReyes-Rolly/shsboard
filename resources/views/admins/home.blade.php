@include('partials.adminheader')
<main>
<!-- announcements -->
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Announcements</div>
</div>
<section id="about" class="about">
			<div class="container">
				<div id="main-content" class="blog-page">
				    <div class="container">
				        <div class="row clearfix">
				            <div class="col-lg-8 col-md-12 left-box fade-in-text">
			               			<br><br>
                                    @if($announcement == NULL)
                                        <br><br>
                                        <div class="alert alert-danger"><em>No announcements for now.</em></div>
                                    @else 
                                        @foreach ($announcement as $announcements)
                                            <div class="card single_post">
                                                <div class="body">
                                                    <div class="img-post">
                                                        @if($announcements->image != NULL)
                                                            <center><img class="d-block img-fluid" src="{{ asset('uploads/announcement/'.$announcements->image) }}" style="height:600px; width: 600px;"/></center>
                                                        @endif
                                                    </div>
                                                    <h3><b>{!!$announcements -> what!!}</b></h3>
                                                    <p>{!!$announcements -> content!!}</p>
                                                    <div class="footer">
                                                        <ul class="stats">
                                                            <?php $whn = date('F d, Y', strtotime($announcements -> whn)); ?>
                                                            <li>For {{$announcements -> who}}</a></li>
                                                            <li>On {{$date  =   date('F d, Y', strtotime($announcements->whn))}}</a></li>
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
                                        @if ($message = Session::get('reminder'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        @if($reminder == NULL)
                                            <br><br>
                                            <div class="alert alert-danger"><em>No reminders for now.</em></div>
                                        @else 
                                            @foreach ($reminder as $reminders)
                                                <div class="card single_post fade-in-text">
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