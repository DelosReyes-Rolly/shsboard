@include('partials.studentheader')
<main>

<body style="font-family: Arial;"> 

	
	<section>
        <div style="margin: 0px;">
            <a class="btn btn-secondary btn-lg" href="javascript:history.back()" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to grade evaluation request</a>
        </div>
        <iframe height= "1000" width= "100%" src="/views/{{$gradeevaluationrequest -> file}}"></iframe>
    </section>
</main>
<br><br><br><br>
<br><br><br><br>