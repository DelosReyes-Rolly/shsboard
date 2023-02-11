@include('partials.landingheader')
<main style="padding: 80px 40px 0px 40px;"><br/><br/>  
    <!-- announcements -->
    <section id="about" class="about fade-in-text">
        <div class="announcementletter" style="color: green; font-weight:bold;">Announcements</div>     
        <hr style="border: 1px solid black">
        <div id="main-content" class="blog-page">
				    <div class="">
				        <div class="row clearfix">
				            <div class="col-lg-9 col-md-12 left-box">
                                    @if($announcement == NULL)
                                        <br/><br/>
                                        <div class="alert alert-danger"><em>No announcements for now.</em></div>
                                    @else 
                                        @foreach ($announcement as $announcements)
                                            <div class="card single_post">
                                                <div class="body">
                                                    <div class="row">
                                                        @if($announcements->image != NULL)
                                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                                <div class="img-post">
                                                                    <center><img class="d-block img-fluid announcement-image2" src="{{ asset('uploads/announcement/'.$announcements->image) }}"/></center>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                                <h3 style="font-size: 28px;"><b>{!!$announcements -> what!!}</b></h3>
                                                                <p>{!!\Illuminate\Support\Str::limit($announcements -> content, 180)!!}</p><br/>
                                                                <a class="btn btn-md btn-success" href="{{ url('seePublicAnnouncement',['id'=>$announcements->id]) }}"><em style="font-size: 20px;">read more...</em></a>
                                                            </div>
                                                        @else
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <h3 style="font-size: 28px;"><b>{!!$announcements -> what!!}</b></h3>
                                                                <p>{!!\Illuminate\Support\Str::limit($announcements -> content, 400)!!}</p><br/>
                                                                <a class="btn btn-md btn-success" href="{{ url('seePublicAnnouncement',['id'=>$announcements->id]) }}"><em style="font-size: 20px;">read more...</em></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="footer">
                                                        <ul class="stats">
                                                            <?php $whn = date('F d, Y', strtotime($announcements -> whn)); ?>
                                                            <li>From {{$announcements -> sender}}</li>
                                                            <li>To {{$announcements -> who}}</li>
                                                            <li>On {{$date  =   date('F d, Y', strtotime($announcements->whn))}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border: 1px solid black">
                                        @endforeach     
                                    @endif         
				            </div>
				            <div class="col-lg-3 col-md-12 right-box">
					            <div class="card">
					                <div class="header">
					                    <h2 style="font-size: 28px;">Reminders</h2><br>
                                        @if ($message = Session::get('reminder'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        @if($reminder == NULL)
                                            <br><br>
                                            <div class="alert alert-danger"><em style="font-size: 20px;">No reminders for now.</em></div>
                                        @else 
                                            @foreach ($reminder as $reminders)
                                                <div class="single_post fade-in-text">
                                                    <hr> {!!$reminders -> content!!}
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
	</section>
</main>
<br><br><br><br>
@include('partials.landingfooter')