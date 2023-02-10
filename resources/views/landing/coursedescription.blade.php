@include('partials.landingheader')
    <section id="about" class="about">  
		<div id="course_container_body">
			<b class="course-name">{{$course -> courseName}}</b>
			<hr style="border: 2px solid green">
		</div>
		<div class="container">
			<center>
				@if($course->image == NULL)
					<img src="{{ URL::asset('img/shs.png')}}" class="strand-logos">
				@else
					<img src="{{ asset('img/'.$course->image) }}" class="strand-logos"/>
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