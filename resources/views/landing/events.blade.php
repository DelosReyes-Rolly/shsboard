@include('partials.landingheader')
<main style="padding: 80px 40px 0px 40px;"><br/><br/>
    <!-- event start -->
		<section id="about" class="about"> 
            <div style="color: green; font-size: 40px; font-weight:bold;">Events</div>     
            <hr style="border: 1px solid black">
            @if($events == NULL)
			    <div class="container">
					<div class="container-xl px-4 mt-4 fade-in-text">
					    <!-- page navigation-->
					    <hr class="mt-9 mb-9">
					    <div class="row">
					        <div class="col-xl-12">
					        <!-- Account details card-->
					            <div class="card mb-4">
					                <div class="card border-start-lg border-start-yellow">
					                    <div class="alert alert-danger">
											<center><em>No events for now.</em></center>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            @else 
                @foreach ($events as $event)
					<div>
						<div class="container-xl px-4 mt-4">
						    <!-- page navigation-->
						    <hr class="mt-9 mb-9">
						    <div class="row">
						        <div class="col-xl-12">
						            <!-- Account details card-->
						            <div class="card mb-4"  style="padding: 20px 20px 20px 20px;">
						                <div class="card border-start-lg border-start-yellow">
						                    <center><div class="card-header" style="color: green; font-weight:bold; font-size:20px;"><b>{{$event -> what}}</b></div></center>		
							                <!-- Form Row-->
							                <div class="row gx-3 mb-3"  style="padding: 10px 20px 10px 60px;">
							                    <!-- Form Group (title)-->
												<div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="img-post">
														@if($event->image == NULL)
															<img class="d-block img-fluid" src="{{url('uploads/event/placeholder.png')}}" style="width: auto; height: auto;"/>
														@else
															<img class="d-block img-fluid" src="{{ asset('uploads/event/'.$event->image) }}" style="width: auto; height: auto;"/>
														@endif
													</div>
												</div>
							                    <!-- Form Group (title)-->
							                    <div class="col-lg-6 col-md-12 col-sm-12">
													{!!\Illuminate\Support\Str::limit($event -> content, 2000)!!}
							                    </div>
							                    <!-- Form Group (title)-->
							                    <div class="col-lg-2 col-md-12 col-sm-12">
													<b>WHEN: <li>On {{$date  =   date('F d, Y', strtotime($event->whn))}}</a></li><br></b>
													<b>WHERE: <li>{{$event -> whr}}</li></b><br>
													<b>FROM: </b>{{$event -> sender}}<br><br>
                                                    <b>TO: </b>{{$event -> who}}<br><br>
													<a class="btn btn-md btn-success" href="{{ url('seePublicEvent',['id'=>$event->id]) }}"><em>read more...</em></a>
													<br><br>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
						</div>
					</div>
                @endforeach 
            @endif 
		</section>
	<!-- event end -->
</main>
<br/><br/><br/><br/><br/><br/><br/><br/>
@include('partials.landingfooter')