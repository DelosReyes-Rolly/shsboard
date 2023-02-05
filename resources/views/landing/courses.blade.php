
@include('partials.landingheader')
    <!-- courses start -->
		<section id="about" class="about">
			<div class="container">
				<center>
					<br/><br/><br/><br/><br/><br/>
					<div>
						<b style="font-size: 60px;" class="container_title">STRANDS  OFFERED</b><br/><br/>
						@foreach ($home as $homes)
							@if($homes -> title == "Strands Offered")
								{!!$homes -> content!!}
							@endif
						@endforeach
					</div>
					<br><br><br><br>
					<div class="row gx-4 mb-4">
						@if ($strands->count() == 0)
							<div class="alert alert-danger"><em>No strand available yet.</em></div>
						@else
							@php $count = 0; @endphp
							@foreach($strands as $strand)
								@if($count !=6)
									<div class="col-lg-4 col-md-12  left-to-right course-hover">
										@if($strand->id == 1)
											<a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
												@if($strand->image == NULL)
													<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
												@else
													<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
												@endif
												<div class="overlay-courses-top">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
												<div class="overlay-courses">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
											</a> @php $count++; @endphp
										@elseif($strand->id == 2)
											<a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
												@if($strand->image == NULL)
													<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
												@else
													<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
												@endif
												<div class="overlay-courses-top">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
												<div class="overlay-courses">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
											</a> @php $count++; @endphp
										@elseif($strand->id == 3)
											<a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
												@if($strand->image == NULL)
													<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
												@else
													<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
												@endif
												<div class="overlay-courses-top">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
												<div class="overlay-courses">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
											</a> @php $count++; @endphp
										@elseif($strand->id == 4)
											<a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
												@if($strand->image == NULL)
													<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
												@else
													<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
												@endif
												<div class="overlay-courses-top">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
												<div class="overlay-courses">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
											</a> @php $count++; @endphp
										@elseif($strand->id == 5)
											<a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
												@if($strand->image == NULL)
													<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
												@else
													<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
												@endif
												<div class="overlay-courses-top">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
												<div class="overlay-courses">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
											</a> @php $count++; @endphp
										@elseif($strand->id == 6)
											<a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
												@if($strand->image == NULL)
													<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
												@else
													<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
												@endif
												<div class="overlay-courses-top">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
												<div class="overlay-courses">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
											</a> @php $count++; @endphp
										@endif
									</div>
								@endif
							@endforeach
							@foreach($strands as $strand)
								<div class="course-hover">
									@if($strand->id == 7)
										<div class="col-sm-2 left-to-right course-hover"></div>
										<div class="col-lg-4 left-to-right">
											<a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
												@if($strand->image == NULL)
													<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
												@else
													<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
												@endif
												<div class="overlay-courses-top">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
												<div class="overlay-courses">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
											</a>
										</div>
									@elseif($strand->id == 8)
										<div class="col-lg-4 left-to-right course-hover">
											<a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
												@if($strand->image == NULL)
													<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
												@else
													<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
												@endif
												<div class="overlay-courses-top">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
												<div class="overlay-courses">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
											</a>
										</div>
										<div class="col-sm-2 left-to-right course-hover"></div>
									@elseif($strand->id >= 9)
										<div class="col-lg-4 left-to-right course-hover">
											<a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
												@if($strand->image == NULL)
													<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
												@else
													<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
												@endif
												<div class="overlay-courses-top">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
												<div class="overlay-courses">
													<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
												</div>
											</a>
										</div>
									@endif
								</div>
							@endforeach
						@endif
					</div>
				</center>
			</div>
		</section>
		<!-- courses end -->
@include('partials.landingfooter')