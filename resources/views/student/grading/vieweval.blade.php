@include('partials.studentheader')
<main>

<body style="font-family: Arial;"> 

	
	<section>
		<div class="left-to-right">
			<div>
                    <div class="container-xl px-4 mt-4">
                        <!-- page navigation-->
                        <h3 style="font-size: 28px; font-weight: 800;">View evaluation request</h3>
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card border-start-lg border-start-yellow">
                                        <div class="card-header"></div>
                                        <div class="card-body" style="padding: 10px 40px 10px 40px">
                                            <div class="mb-3">

                                            </div>
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                    <div class="col-md-6">
                                                            <label class="large" for="name" style="font-size: 26px;"><b>Grade Level:</b> </label>
                                                                <span style="font-size: 26px;">{{$gradeevaluationrequest -> gradelevel -> gradelevel}}</span>
                                                    </div><br>
                                                    <div class="col-md-6">
                                                            <label class="large" for="name" style="font-size: 26px;"><b>Semester:</b> </label>
                                                                <span style="font-size: 26px;">{{$gradeevaluationrequest -> semester -> sem}}</span>
                                                    </div><br>
                                                    <div class="col-md-6">
                                                            <label class="large" for="name" style="font-size: 26px;"><b>Subject:</b> </label>
                                                                <span style="font-size: 26px;">{{$gradeevaluationrequest -> subject -> subjectname}}</span>
                                                    </div><br>
                                                    <div class="col-md-6">
                                                            <label class="large" for="name" style="font-size: 26px;"><b>Teacher:</b> </label>
                                                                <span style="font-size: 26px;">{{$gradeevaluationrequest -> faculty -> last_name}}, {{$gradeevaluationrequest -> faculty -> first_name}} {{$gradeevaluationrequest -> faculty -> middle_name}} {{$gradeevaluationrequest -> faculty -> suffix}}</span>
                                                    </div><br>
                                                    <div class="col-md-6">
                                                            <label class="large" for="name" style="font-size: 26px;"><b>Date Requested:</b> </label>
                                                                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($gradeevaluationrequest->updated_at))}}</span>
                                                    </div><br>
                                            </div>
                                                <div class="row gx-3 mb-3">
                                                    <!-- Save changes button-->
                                                    <div class="pull-right">
                                                        <a class="btn btn-info btn-md" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
                                                        <a class="btn btn-danger btn-md" href="{{route('student.deletegradeeval', $gradeevaluationrequest->id)}}"><i class="fas fa-trash-alt"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
            </div>
        </div>
    </section>
</main>
<br><br><br><br>
<br><br><br><br>