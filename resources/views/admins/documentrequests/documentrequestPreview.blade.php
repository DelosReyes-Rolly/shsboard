@include('partials.adminheader')
<main>
    


	<section>
		<div style="font-size: 20px;"><a href="/documentrequest"> Document Requests</a>&emsp;<i class="fas fa-angle-right"></i>&emsp; view proof</div><br/>
		<div style="margin: 20px;">
        	<a class="btn btn-secondary btn-lg" href="/documentrequest" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to document requests</a>
        </div><br/>
		<center><img src="/view/{{$requests -> file}}" style="width:max-content; height:max-content; display: block;"></center>
	</section>

<br><br><br><br>