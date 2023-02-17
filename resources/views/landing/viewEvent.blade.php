@include('partials.landingheader')
<main style="padding: 80px 40px 0px 40px;">
<!-- view announcement -->
<br/><br/><br/><br/>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div style="color: green; font-size: 40px; font-weight:bold;">Event</div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <a href="javascript:history.back()" class=" back-button back-button1"><i class="fas fa-arrow-left"></i>   Back to events</a>
        </div>
    </div>
    <hr style="border: 1px solid black">
    <section>
	    <div>
			<div id="main-content" class="blog-page">
				    <div class="row clearfix">
				        <div class="col-lg-12 col-md-12 left-box">
                            <div class="card single_post left-to-right border-start-lg border-start-yellow">
                                <div class="body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            @if($view->image != NULL)
                                                <center>
                                                    <div class="img-post">
                                                        <img class="d-block img-fluid announcement-image" src="{{ asset('uploads/event/'.$view->image) }}" style="width:80%; height:80%;"/>
                                                    </div>
                                                </center>
                                            @endif    
                                        </div>
                                        <div class="col-lg-10 col-md-12 col-sm-12"><br/>    
                                            <div style="font-size: 25px;">
                                                <br/><h3 style="font-size: 40px;"><b>{!!$view -> what!!}</b></h3><br/>
                                                <p>{!!$view -> content!!}</p><br/><br/>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 col-sm-12" style="margin-top: 20px;"><br/><br/>
											<b style="font-size: 20px;">WHEN: <li>On {{$date  =   date('F d, Y', strtotime($view->whn))}}</a></li><br></b>
											<b style="font-size: 20px;">WHERE: <li>{{$view -> whr}}</li></b><br>
											<b style="font-size: 20px;">FROM: {{$view -> sender}}</b><br><br>
                                            <b style="font-size: 20px;">TO: {{$view -> who}}</b><br><br>
											<br><br>
							            </div>
                                    </div>
                                </div>
                            </div>    
				        </div>
				    </div>
                <hr style="border: 1px solid black">
			</div>
		</div>
    </section>
</main>
<br><br><br><br>
@include('partials.landingfooter')