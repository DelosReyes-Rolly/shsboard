@include('partials.studentheader')
<main>
    


	<section>
	<div>  
		<nav  aria-label = "breadcrumb">
            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
            <ul class = "breadcrumb">
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class = "breadcrumb-item"><a class="bca" href = "{{ url('studentrequest') }}">Document Request</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class = "breadcrumb-item active" aria-current = "page">view file</li>
            </ul>
         </nav>
	</div>
		<div style="margin: 0px;">
            <a class="btn btn-secondary btn-lg" href="{{ url('studentrequest') }}" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>  Back to document request</a><br/><br/><br/><br/> 
        </div>
		<center><img src="{{ asset('uploads/DocumentRequestFile/'.$requests->file) }}" style="width:max-content; height:max-content; display: block;"></center>
	</section>

<br><br><br><br>