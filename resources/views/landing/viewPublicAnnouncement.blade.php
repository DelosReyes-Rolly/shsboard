@include('partials.landingheader')
<main style="padding: 80px 40px 0px 40px;">
<!-- view announcement -->
<br/><br/><br/><br/>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="announcementletter" style="color: green; font-weight:bold;">Announcements</div>     
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <a class="btn btn-secondary btn-lg back-button back-button1" href="javascript:history.back()"><i class="fas fa-arrow-left"></i>   Back to announcement</a>
        </div>
    </div>
    <hr style="border: 1px solid black">
    <section>
	    <div>
			<div id="main-content" class="blog-page">
				    <div class="row clearfix">
				        <div class="col-lg-12 col-md-12 left-box">
                            <div class="card single_post left-to-right border-start-lg border-start-yellow" style="height:auto;">
                                <div class="body">
                                    @if($view->image != NULL)
                                        <div class="img-post pull-left" style="margin: 20px;">
                                            <img class="d-block img-fluid announcement-image" src="{{ asset('uploads/announcement/'.$view->image) }}"/>
                                        </div>
                                    @endif   
                                    <div style="font-size: 25px;"><br/>
                                        <h3 style="font-size: 40px;"><b>{!!$view -> what!!}</b></h3><br/>
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
@include('partials.landingfooter')