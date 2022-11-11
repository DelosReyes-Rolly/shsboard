@include('partials.studentheader')
<main>
<br/><br/><br/><br/>
<body style="font-family: Arial;"> 

	
	<section>
		<div class="left-to-right">
			<div>
                    <div class="container-xl px-4 mt-4">
                        <!-- page navigation-->
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card border-start-lg border-start-yellow">
                                        <div class="card-header">View evaluation request</div>
                                        <div class="card-body" style="padding: 10px 40px 10px 40px">
                                            <div class="mb-3">

                                            </div>
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                    <div class="mb-3">
                                                            <label class="large" for="name">Grade Level: </label>
                                                            {{$gradeevaluationrequest -> gradelevel -> gradelevel}}
                                                    </div><br>
                                                    <div class="mb-3">
                                                            <label class="large" for="name">Semester: </label>
                                                            {{$gradeevaluationrequest -> semester -> sem}}
                                                    </div><br>
                                                    <div class="mb-3">
                                                            <label class="large" for="name">Subject: </label>
                                                            {{$gradeevaluationrequest -> subject -> subjectname}}
                                                    </div><br>
                                                    <div class="mb-3">
                                                            <label class="large" for="name">Teacher: </label>
                                                            {{$gradeevaluationrequest -> faculty -> last_name}}, {{$gradeevaluationrequest -> faculty -> first_name}} {{$gradeevaluationrequest -> faculty -> middle_name}}
                                                    </div><br>
                                                    <div class="mb-3">
                                                            <label class="large" for="name">Date Requested: </label>
                                                            {{$requested_at  =   date('F d, Y', strtotime($gradeevaluationrequest->updated_at))}}
                                                    </div><br>
                                                <div class="row gx-3 mb-3">
                                                    <!-- Save changes button-->
                                                    <div class="pull-right">
                                                        <a class="btn btn-info btn-sm" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                                        <a class="btn btn-danger btn-sm" href="{{route('student.deletegradeeval', $gradeevaluationrequest->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
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