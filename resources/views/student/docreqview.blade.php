@include('partials.studentheader')
<main>
<section id="about" class="about">
        <div class="container">
        	<div class="body-container left-to-right">
                <hr style="border: 1px solid grey;">
                
                    <div class="container-xl px-4 mt-4">
                        <!-- page navigation-->
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card border-start-lg border-start-yellow">
                                        <div class="card-header">Requested Document</div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                    
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (title)-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels">Last Name</label><input type="text" class="form-control"  style="font-size: 16px;" placeholder=" {{Auth::user()->last_name}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group date-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels">First Name</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{Auth::user()->first_name}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group (title)-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels">Middle Name</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{Auth::user()->last_name}} " value="" readonly></div> <br>
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                            	 <!-- Form Group (location)-->
                                                <div class="col-md-6">
                                                    <div class="col-md-12"><label class="labels">Course</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{Auth::user()->course_id}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group document needed-->
                                                <div class="col-md-6">
                                                	<div class="col-md-12"><label class="labels">Grade Level</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{Auth::user()->gradelevel_id}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                	<label class="large mb-1"><br>Document Needed: </label>
                                                        {{$docreq -> document -> name}}
            										</div>
                                                </div>
                                                <br>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                    <label class="large mb-1" for="inputpurpose">Purpose: </label>
                                                    {{$docreq->purpose}}
                                                </div>
                                                <br>
                                                 <!-- Save changes button-->
                                                    <br><center> Note:<br>The documents will be processed <b>within five (5) working days</b> upon requesting.
                                                    The documents can be claimed in the <b>Registrars Office.</b></center><br><br>
                                                    <div class="pull-right">
                                                        <a class="btn btn-info btn-sm" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                                        <a class="btn btn-warning btn-sm" href="/showrequest/{{$docreq->id}}"><i class="fas fa-edit"></i> Update</a>
                                                        <a class="btn btn-danger btn-sm" href="{{route('student.deleterequest', $docreq->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
                                                    </div>
                                                <br><br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <hr style="border: 1px solid grey;">
                
        </section>
        
</main>
<br><br><br><br>