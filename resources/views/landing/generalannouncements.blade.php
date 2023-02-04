@include('partials.landingheader')
<main style="padding: 80px 40px 0px 40px;"><br/><br/>  
    <!-- announcements -->
    <section id="about" class="about fade-in-text">
        <div class="announcementletter" style="color: green; font-weight:bold;">Announcements</div>     
        <hr style="border: 1px solid black">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-sm-12 left-box fade-in-text">
                @if($announcement == NULL)
                    <br/><br/>
                    <div class="alert alert-danger"><em>No announcements for now.</em></div>
                @else 
                    @foreach ($announcement as $announcements)
                        <br/><br/>
                        <div class="card single_post">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="img-post">
                                            @if($announcements->image != NULL)
                                                <center><img class="d-block img-fluid" src="{{ asset('uploads/announcement/'.$announcements->image) }}" style="height:400px; width: 400px;"/></center>
                                            @endif 
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <h3><b>{!!$announcements -> what!!}</b></h3><br/>
                                        <p>{!!\Illuminate\Support\Str::limit($announcements -> content, 600)!!}</p><br/><br/>
                                        <a class="btn btn-md btn-success" href="/seePublicAnnouncement/{{$announcements->id}}"><em>read more...</em></a>
                                    </div>
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
			<br><br>
			<div class="col-lg-3 col-md-12 col-sm-12 right-box">
				<div class="card">
					<div class="header">
					    <h2>Reminders</h2><br>
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
	</section>
</main>
<br><br><br><br>
@include('partials.landingfooter')