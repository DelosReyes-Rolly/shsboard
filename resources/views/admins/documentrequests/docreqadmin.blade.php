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
                                                <div class="col-md-9">
                                                    <label class="labels" style="font-size: 26px;">Full Name</label><input type="text" class="form-control"  style="font-size: 20px;" placeholder=" {{$docreq->student->last_name}}, {{$docreq->student->first_name}} {{$docreq->student->middle_name}} {{$docreq->student->suffix}}" value="" readonly> <br>
                                                </div>
                                                <!-- Form Group document needed-->
                                                @if($docreq->gradelevel->gradelevel == 11 || $docreq->gradelevel->gradelevel == 12)
                                                    <div class="col-md-3">
                                                        <label class="labels" style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 20px;" placeholder=" {{$docreq->gradelevel->gradelevel}} " value="" readonly> <br>
                                                    </div>
                                                @else
                                                    <div class="col-md-3">
                                                        <label class="labels" style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" Alumni" value="" readonly> <br>
                                                    </div>
                                                @endif
                                            </div>
                                                <div class="mb-3 requestdocument">
                                                	<label class="large mb-1" style="font-size: 20px;"><br><b>Document Needed: </b></label>
                                                        <span style="font-size: 20px;">{{$docreq -> document -> name}}</span>
            									</div>
                                                <div class="mb-3 requestdocument">
                                                    <label class="large mb-1" for="inputpurpose" style="font-size: 20px;"><b>Purpose: </b></label>
                                                        <span style="font-size: 20px;">{{$docreq->purpose->purpose}}</span>
                                                </div>
                                                <div class="mb-3 requestdocument">
                                                	<label class="large mb-1" for="document_id" class="form-control @error('status') is-invalid @enderror" style="font-size: 20px;"><br><b>Status</b></label>
                                                    <div class="col-md-12" hidden><input class="form-control @error('status') is-invalid @enderror" id="inputstatus" type="text" placeholder="Enter status" name="status"  value="{{$docreq->status}}"></div>
            										<select id="status" name="status" class="form-control" value="{{$docreq->status}}"style="font-size: 16px;" >
            											<option value="" disabled selected>Change Status</option>
            										  	<option value="1" {{$docreq->status == "1" ?'selected' : ''}}>Pending</option>
            										  	<option value="2" {{$docreq->status == "2" ?'selected' : ''}}>On Process</option>
            										  	<option value="3" {{$docreq->status == "3" ?'selected' : ''}}>Completed</option>
            										  	<option value="4" {{$docreq->status == "4" ?'selected' : ''}}>Denied</option>
            										</select>
                                                </div>
                                                <br>
                                                <br>
                                                 <!-- Save changes button-->
                                                <a class="btn btn-info btn-md" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
                                                <font face = "Verdana" size = "4"><input type="submit" class="btn btn-primary" value="Submit"></font>
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