@include('partials.studentheader')
<main>

<body style="font-family: Arial;"> 
    <div>  
		<nav  aria-label = "breadcrumb">
            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
            <ul class = "breadcrumb">
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class = "breadcrumb-item"><a class="bca" href = "{{ url('gradeeval') }}">Grade eveluations</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class = "breadcrumb-item active" aria-current = "page">view file</li>
            </ul>
         </nav>
	</div>
	<section>
        <div style="margin: 0px;">
            <a class="btn btn-secondary btn-lg back-button back-button1" href="{{ url('gradeeval') }}"><i class="fas fa-arrow-left"></i>   Back to grade evaluation request</a><br/><br/><br/><br/>
        </div>
        <iframe height= "1000" width= "100%" src="{{ asset('uploads/DocumentRequestFile/'.$gradeevaluationrequest -> file) }}"></iframe>
    </section>
</main>
<br><br><br><br>
<br><br><br><br>