@include('partials.adminheader')
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
                <form method="POST" action="/updaterequestdocadmin/{{$docreq->id}}" enctype="multipart/form-data">
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
                                                    <div class="col-md-12"><label class="labels" style="font-size: 20px;">Last Name</label><input type="text" class="form-control"  style="font-size: 16px;" placeholder=" {{$docreq->student->last_name}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group date-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels" style="font-size: 20px;">First Name</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{$docreq->student->first_name}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group (title)-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels" style="font-size: 20px;">Middle Name</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{$docreq->student->middle_name}} " value="" readonly></div> <br>
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group document needed-->
                                                <div class="col-md-6">
                                                	<div class="col-md-12"><label class="labels" style="font-size: 20px;">Grade Level</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{$docreq->gradelevel->gradelevel}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group (content)-->
                                            </div>
                                                <div class="mb-3 requestdocument">
                                                	<label class="large mb-1" style="font-size: 20px;"><br><b>Document Needed: </b></label>
                                                        <span style="font-size: 20px;">{{$docreq -> document -> name}}</span>
            									</div>
                                                <div class="mb-3 requestdocument">
                                                    <label class="large mb-1" for="inputpurpose" style="font-size: 20px;"><b>Purpose: </b></label>
                                                        <span style="font-size: 20px;">{{$docreq->purpose}}</span>
                                                </div>
                                                <div class="mb-3 requestdocument">
                                                	<label class="large mb-1" for="document_id" class="form-control @error('status') is-invalid @enderror" style="font-size: 20px;"><br><b>Status</b></label>
                                                    <div class="col-md-12" hidden><input class="form-control @error('status') is-invalid @enderror" id="inputstatus" type="text" placeholder="Enter status" name="status"  value="{{$docreq->status}}"></div>
            										<select id="status" name="status" class="form-control" value="{{$docreq->status}}"style="font-size: 16px;" >
            											<option value="" disabled selected hidden>Change Status</option>
            										  	<option value="1" {{$docreq->status == "1" ?'selected' : ''}}>Pending</option>
            										  	<option value="2" {{$docreq->status == "2" ?'selected' : ''}}>On Process</option>
            										 	<option value="3" {{$docreq->status == "3" ?'selected' : ''}}>For Collection</option>
            										  	<option value="4" {{$docreq->status == "4" ?'selected' : ''}}>Completed</option>
            										  	<option value="5" {{$docreq->status == "5" ?'selected' : ''}}>Denied</option>
                                                        <option value="6" {{$docreq->status == "6" ?'selected' : ''}}>For follow-up</option>
            										</select>
                                                </div>
                                                <br>
                                                <br>
                                                 <!-- Save changes button-->
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