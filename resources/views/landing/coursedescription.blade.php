@include('partials.landingheader')
    <section id="about" class="about">  
		<div id="course_container_body">
			<b style="font-size: 40px;">{{$course -> courseName}}</b>
			<hr style="border: 2px solid green">
		</div>
		<div class="container">
			<br><br><br><br>
			<center>
				@if($course->image == NULL)
					<img src="{{ URL::asset('img/shs.png')}}" style="width: 600px; height: 600px;" class="">
				@else
					<img src="{{ asset('img/'.$course->image) }}" style="width: 600px; height: 600px;" class=""/>
				@endif<br><br>

				<div class="academic_track">{{$course -> abbreviation}}</div>
			</center>
				<div class="course_description">
                    {!!$course -> description!!}
					<br><br><br><br>
				</div>
			<center>
				@if($course->link != NULL)
					<iframe width="100%" height="720" box-shadow = "0 5px 20px rgba(0,0,0,2)" src="{{$course -> link}}" title="ABM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				@endif<br><br>
				<hr style="border: 0.6px solid green">
				<h1><a href="javascript:history.back()">Back to Strands</a></h1>
			</center>
		</div>
	</section>
@include('partials.landingfooter')