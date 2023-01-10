@include('partials.studentheader')
<main>
<!-- view announcement -->
<div style="font-size: 20px;"><a href="javascript:history.back()"> Announcements</a>&emsp;<i class="fas fa-angle-right"></i>&emsp; view announcement</div><br/>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div style="color: green; font-size: 40px; font-weight:bold;">Announcement</div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <a class="btn btn-secondary btn-lg" href="javascript:history.back()" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to announcements</a>
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
                                    <div class="img-post" style="float: left; margin: 20px;">
                                        @if($view->image != NULL)
                                            <img class="d-block img-fluid" src="{{ asset('uploads/announcement/'.$view->image) }}" style="height:400px; width: 400px;"/>
                                        @else
                                            <img class="d-block img-fluid" src="{{ asset('uploads/event/placeholder.png') }}" style="height:400px; width: 400px;"/>
                                        @endif       
                                    </div>
                                    <div style="text-align: justify; font-size: 25px;">
                                        <br/><h3><b>{!!$view -> what!!}</b></h3><br/>
                                        <p>{!!$view -> content!!}</p><br/><br/>
                                    </div>
                                    <div class="footer">
                                        <ul class="stats">
                                            <?php $whn = date('F d, Y', strtotime($view -> whn)); ?>
                                            <li>From {{$view -> sender}}</li>
                                            <li>To {{$view -> who}}</li>
                                            <li>On {{$date  =   date('F d, Y', strtotime($view->whn))}}</li>
                                        </ul>
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