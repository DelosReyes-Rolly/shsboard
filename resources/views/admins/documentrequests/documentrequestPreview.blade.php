@include('partials.adminheader')
<main>
    


	<section>
	<div>
		<nav  aria-label = "breadcrumb">
            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
            <ul class = "breadcrumb">
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class = "breadcrumb-item"><a class="bca" href = "{{ url('documentrequest') }}">Document Requests</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class = "breadcrumb-item active" aria-current = "page">View proof</li>
            </ul>
         </nav>
	</div>
		<div style="margin: 20px;">
        	<a class="btn btn-secondary btn-lg back-button back-button1" href="{{ url('documentrequest') }}"><i class="fas fa-arrow-left"></i>   Back to document requests</a>
        </div><br/><br/><br/><br/>
		<center><img src="{{ asset('uploads/DocumentRequestFile/'.$requests->file) }}" style="width:max-content; height:max-content; display: block;"></center>
	</section>

<br><br><br><br>