@include('partials.studentheader')
<main>
     <!-- new tables -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
<section>
        <div>
        	<div>
                <!-- boxes -->
                <hr style="border: 1px solid grey;">
                <div class="container-xl px-4 mt-4 left-to-right">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 3-->
                        <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white;"  >
                            <div class="card-body">
                                <div class="requesteddocument" style="color: white;" style="font-size: 20px; font-weight: 800;" >Requested Documents</div>
                                <div class="h3 d-flex align-items-center" style="padding:40px;"><i class="far fa-clipboard"></i> {{ $requests->count() }} </div>
                                <!-- <a class="text-arrow-icon small text-success" href="#!">
                                    View Active requests
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- form -->

                @if ($messages = Session::get('messages'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $messages }}</strong>
                    </div>
                @endif
                            
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


                <hr style="border: 1px solid grey;">
                <form method="POST" action="{{ route('student.request') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="container-xl px-4 mt-4 right-to-left">
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
                                                    <div class="col-md-12"><label class="labels" style="font-size: 20px;">Course</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{$course->courseName}} - {{$course->abbreviation}}" value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group document needed-->
                                                <div class="col-md-6">
                                                    @if($gradelevel == null)
                                                	    <div class="col-md-12"><label class="labels" style="font-size: 20px;">Grade Level</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" 12 " value="" readonly></div> <br>
                                                    @else
                                                        <div class="col-md-12"><label class="labels" style="font-size: 20px;">Grade Level</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{$gradelevel->gradelevel}} " value="" readonly></div> <br>
                                                    @endif
                                                </div>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                	<label class="large mb-1" for="document_id" class="form-control @error('document_id') is-invalid @enderror" style="font-size: 20px;"><br>Document Needed</label>
                                                        <div class="col-md-12" hidden><input class="form-control @error('document_id') is-invalid @enderror" id="inputdocument_id" type="text" placeholder="Enter document needed" name="document_id"  value="{{ old('document_id') }}"></div>
            											<select id="document_id" name="document_id" class="form-control" value="{{ old('document_id') }}" style="font-size: 16px;" >
            												<option value="" disabled selected hidden>Select Document</option>
            											  	<option value="1">Grade Certificate</option>
            											  	<option value="2">Certification of Enrolment For 4P's</option>
            											  	<option value="3">Certificate of Good Moral</option>
            											  	<option value="4">Form 137</option>
            											  	<option value="5">Transfer-out Form</option>
            											</select>
            										</div>
                                                </div>
                                                <br>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                    <label class="large mb-1" for="inputpurpose" style="font-size: 20px;">Purpose</label>
                                                    <textarea class="form-control @error('purpose') is-invalid @enderror" id="editor" type="text" style="font-size: 16px;" placeholder="Enter your purpose" name="purpose"  value="{{ old('purpose') }}"></textarea>
                                                </div>
                                                <br>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                    <label class="large mb-1" for="inputcontent" style="font-size: 20px;">Proof (Only DOCS, DOCX, and PDF files are allowed to upload.)</label>
            										<div class ="form-group row">
            											<div class="col-md-8"></div>
            											<input type="file" name = "file" class="form-control" style="font-size: 12px;" >
            										</div>                                 
            									</div> 
                                                 <!-- Save changes button-->
                                                    <br><center> Note:<br>The documents will be processed <b>within five (5) working days</b> upon requesting.
                                                    The documents can be claimed in the <b>Registrars Office.</b></center><br><br>
                                                    <font face = "Verdana" size = "4"><input type="submit" class="btn btn-primary" value="Submit"margin-right: 80px;"></font>
                                                <br><br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </form>
                    <hr style="border: 1px solid grey;">
                <!-- tables -->
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                            
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
                <h3 style="font-size: 28px; font-weight: 800;">Requested Documents</h3>
                <hr class="mt-0 mb-4">
                <div class="card mb-4 left-to-right border-start-lg border-start-yellow"  style="padding: 10px 40px 10px 40px">
                    <div class="card-header"></div>
                    <div class="card-body p-0">
						@if($requests->count() == 0)
							<br><br>
							<div class="alert alert-danger"><em>No records found.</em></div>
						@else 
								<br>
								<div class="table-responsive table-billing-history">
									<table id="example" class="display nowrap" style="width:100%">
										<thead>
											<tr>
												<th class="border-gray-200" scope="col">#</th>
												<th class="border-gray-200" scope="col">Document Name</th>
												<th class="border-gray-200" scope="col">Purpose</th>
												<th class="border-gray-200" scope="col">Date Requested</th>
												<th class="border-gray-200" scope="col">Proof Sent</th>
                                                <th class="border-gray-200" scope="col">Status</th>
												<th class="border-gray-200" scope="col">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 	
												$i=1;
											?>
                                            @foreach ($requests as $request)
                                                <tr>
                                                    <?php $requested_at = date('F d, Y', strtotime($request -> created_at)); ?>
                                                    <td class="text-center"><?php echo $i++; ?></td>
                                                    <td>{{$request -> document -> name}}</td>
                                                    <td>{{$request -> purpose}}</td>
                                                    <td>{{$requested_at}}</td>
                                                    <td>
                                                        <a href="/download/{{$request -> file}}" class="btn btn-primary">Download</a> 
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            switch ($request -> status) {
                                                                case '1':
                                                                    echo '<span class="badge bg-secondary" style="color: white;">Pending</span>';
                                                                    break;
                                                                case '2':
                                                                    echo '<span class="badge bg-success" style="color: white;">On Process</span>';
                                                                    break;
                                                                case '3':
                                                                    echo '<span class="badge bg-success" style="color: white;">For Collection</span>';
                                                                    break;
                                                                case '4':
                                                                    echo '<span class="badge bg-success" style="color: white;">Completed</span>';
                                                                    break;
                                                                case '5':
                                                                    echo '<span class="badge bg-danger" style="color: white;">Denied</span>';
                                                                    break;
                                                                case '6':
                                                                    echo '<span class="badge bg-secondary" style="color: white;">For follow-up</span>';
                                                                    break;
                                                                default:
                                                                    echo '<span class="badge bg-secondary" style="color: white;">Undetermine</span>';
                                                                    break;
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success btn-md" href="/viewrequest/{{$request->id}}"><i class="fas fa-eye"></i> View</a>
                                                        <a class="btn btn-warning btn-md" href="/showrequest/{{$request->id}}"><i class="fas fa-edit"></i> Update</a>
                                                        <a class="btn btn-danger btn-md" href="{{route('student.deleterequest', $request->id)}}"><i class="fas fa-trash-alt"></i> Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach 
										</tbody>
									</table>  
								</div>    
						@endif  
                    </div>
                </div>  
            </div>
        </section>
</main>