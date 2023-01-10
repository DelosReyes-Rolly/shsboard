@include('partials.studentheader')
<main>

<body style="font-family: Arial;"> 

<div style="font-size: 20px;"><a href="/gradeeval"> Grade Evaluation</a>&emsp;<i class="fas fa-angle-right"></i>&emsp; view file</div><br/>
	<section>
        <div style="margin: 0px;">
            <a class="btn btn-secondary btn-lg" href="/gradeeval" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to grade evaluation request</a><br/><br/><br/><br/>
        </div>
        <iframe height= "1000" width= "100%" src="/views/{{$gradeevaluationrequest -> file}}"></iframe>
    </section>
</main>
<br><br><br><br>
<br><br><br><br>