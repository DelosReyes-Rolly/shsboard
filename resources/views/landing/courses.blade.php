
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
							<div class="alert alert-danger"><em style="font-size: 28px;">No strand available yet.</em></div>
						@else
							@php $count = 0; @endphp
							@foreach($strands as $strand)
							    <div class="col-lg-4 col-md-12  left-to-right course-hover">
							        <a class="card single_post course-box" href="{!! route('stranddescription',['id'=>$strand->id]) !!}">
										@if($strand->image == NULL)
											<img src="{{ URL::asset('img/shs.png')}}" class="course-image">
										@else
											<img src="{{ asset('img/'.$strand->image) }}" class="course-image"/>
										@endif
										<div class="overlay-courses">
											<div class="text-courses">{{$strand->courseName}} ({{$strand->abbreviation}})</div>
										</div>
									</a> 
								</div>
							@endforeach
						@endif
					</div>
				</center>
			</div>
		</section>
		<!-- courses end -->
@include('partials.landingfooter')