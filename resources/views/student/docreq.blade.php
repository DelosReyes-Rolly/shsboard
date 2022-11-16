@include('partials.studentheader')
<main>
<section>
        <div>
        	<div class="left-to-right">
                <hr style="border: 1px solid grey;">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="/updaterequest/{{$docreq->id}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="container-xl px-4 mt-4">
                        <!-- page navigation-->
                        <h3 style="font-size: 28px; font-weight: 800;">Request Documents</h3>
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card border-start-lg border-start-yellow">
                                        <div class="card-header"></div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                    
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (title)-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels" style="font-size: 20px;">Last Name</label><input type="text" class="form-control"  style="font-size: 16px;" placeholder=" {{Auth::user()->last_name}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group date-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels" style="font-size: 20px;">First Name</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{Auth::user()->first_name}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group (title)-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels" style="font-size: 20px;">Middle Name</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{Auth::user()->last_name}} " value="" readonly></div> <br>
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                            	 <!-- Form Group (location)-->
                                                <div class="col-md-6">
                                                    <div class="col-md-12"><label class="labels" style="font-size: 20px;">Course</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{Auth::user()->course_id}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group document needed-->
                                                <div class="col-md-6">
                                                	<div class="col-md-12"><label class="labels" style="font-size: 20px;">Grade Level</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{Auth::user()->gradelevel_id}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                	<label class="large mb-1" for="document_id" class="form-control @error('document_id') is-invalid @enderror" style="font-size: 20px;"><br>Document Needed</label>
                                                        <div class="col-md-12" hidden><input class="form-control @error('document_id') is-invalid @enderror" id="inputdocument_id" type="text" placeholder="Enter document needed" name="document_id"  value="{{$docreq->document_id}}"></div>
            											<select id="document_id" name="document_id" class="form-control" value="{{$docreq->document_id}}"style="font-size: 16px;" >
            												<option value="" disabled selected hidden>Select Document</option>
            											  	<option value="1" {{$docreq->document_id == "1" ?'selected' : ''}}>Grade Certificate</option>
            											  	<option value="2" {{$docreq->document_id == "2" ?'selected' : ''}}>Certification of Enrolment For 4P's</option>
            											  	<option value="3" {{$docreq->document_id == "3" ?'selected' : ''}}>Certificate of Good Moral</option>
            											  	<option value="4" {{$docreq->document_id == "4" ?'selected' : ''}}>Form 137</option>
            											  	<option value="5" {{$docreq->document_id == "5" ?'selected' : ''}}>Transfer-out Form</option>
            											</select>
            										</div>
                                                </div>
                                                <br>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                    <label class="large mb-1" for="inputpurpose" style="font-size: 20px;">Purpose</label>
                                                    <textarea class="form-control @error('purpose') is-invalid @enderror" id="editor" type="text" style="font-size: 16px;" placeholder="Enter your purpose" name="purpose">{{$docreq->purpose}}</textarea>
                                                </div>
                                                <br>
                                                 <!-- Save changes button-->
                                                    <br><center> Note:<br>The documents will be processed <b>within five (5) working days</b> upon requesting.
                                                    The documents can be claimed in the <b>Registrars Office.</b></center><br><br>
                                                <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                                <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit" style="float: right; margin-right: 80px;"></font>
                                                <br><br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </form>
                    <hr style="border: 1px solid grey;">
                
        </section>
        <script>
            CKEDITOR.replace('editor');
        </script> 
</main>
<br><br><br><br>