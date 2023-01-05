@include('partials.adminheader')
<main>
    


	<section>
		<div style="margin: 20px;">
        	<a class="btn btn-secondary btn-lg" href="/documentrequest" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to document requests</a>
        </div>
		<center><img src="/view/{{$requests -> file}}" style="width:max-content; height:max-content; display: block;"></center>
	</section>

<br><br><br><br>