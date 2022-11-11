@include('partials.landingheader')
<main><br/><br/>
    <!-- event start -->
		<section id="about" class="about">
            @if($events == NULL)
                <br><br><br><br>
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
                    
					<div class="container">
						<br><br>
						<div class="container-xl px-4 mt-4">
						    <!-- page navigation-->
						    <hr class="mt-9 mb-9">
						    <div class="row">
						        <div class="col-xl-12">
						            <!-- Account details card-->
						            <div class="card mb-4"  style="padding: 20px 20px 20px 20px;">
						                <div class="card border-start-lg border-start-yellow">
						                    <div class="card-header"><h4><b>{{$event -> what}}</b></h4></div>		
							                <!-- Form Row-->
							                <div class="row gx-3 mb-3"  style="padding: 10px 20px 10px 60px;">
							                    <!-- Form Group (title)-->
							                        <center>
								                        <br><hr><br>
														@if($event->image == NULL)
															<img class="d-block img-fluid" src="uploads/event/placeholder.png" style="width: 400px; height: 400px;"/>
														@else
															<img class="d-block img-fluid" src="{{ asset('uploads/event/'.$event->image) }}" style="width: auto; height: auto;"/>
														@endif
													</center>
													<br>
							                    <!-- Form Group (title)-->
							                    <div class="col-md-9">
							                        <br><hr>
													{!!$event -> content!!}
							                    </div>
							                    <!-- Form Group (title)-->
							                    <div class="col-md-3">
							                        <br><hr>
													<b>WHEN: <li>On {{$date  =   date('F d, Y', strtotime($event->whn))}}</a></li><br></b>
													<b>WHERE: {{$event -> whr}}</b>
													<br><br><br>
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

@include('partials.landingfooter')