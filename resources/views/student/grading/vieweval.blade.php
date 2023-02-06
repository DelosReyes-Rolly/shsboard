@include('partials.studentheader')
<main>

<body style="font-family: Arial;"> 
    <div style="font-size: 20px;">  
		<nav  aria-label = "breadcrumb">
            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
            <ul class = "breadcrumb">
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class = "breadcrumb-item"><a class="bca" href = "{{ url('gradeeval') }}">Grade evelautions</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class = "breadcrumb-item active" aria-current = "page">View file</li>
            </ul>
         </nav>
	</div>
	<section>
        <div style="margin: 0px;">
            <a class="btn btn-secondary btn-lg" href="{{ url('gradeeval') }}" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to grade evaluation request</a><br/><br/><br/><br/>
        </div>
        <iframe height= "1000" width= "100%" src="{{ url('views',['file'=>$gradeevaluationrequest -> file]) }}"></iframe>
    </section>
</main>
<br><br><br><br>
<br><br><br><br>