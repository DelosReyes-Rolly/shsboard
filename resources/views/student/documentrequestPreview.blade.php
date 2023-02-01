@include('partials.studentheader')
<main>
    


	<section>
	<div style="font-size: 20px;">  
		<nav  aria-label = "breadcrumb">
            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
            <ul class = "breadcrumb">
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class = "breadcrumb-item"><a class="bca" href = "/studentrequest"></a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class = "breadcrumb-item active" aria-current = "page">Students</li>
            </ul>
         </nav>
	</div>
	<div style="font-size: 20px;"><a href="/studentrequest"> Document Request</a>&emsp;<i class="fas fa-angle-right"></i>&emsp; view file</div><br/>
		<div style="margin: 0px;">
            <a class="btn btn-secondary btn-lg" href="/studentrequest" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>  Back to document request</a><br/><br/><br/><br/> 
        </div>
		<center><img src="/views/{{$requests -> file}}" style="width:max-content; height:max-content; display: block;"></center>
	</section>

<br><br><br><br>