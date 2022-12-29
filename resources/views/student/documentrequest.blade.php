@include('partials.studentheader')
<main>
     <!-- new tables -->
     <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script> -->

	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-jquery-1.12.1.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-rowreorder-1.2.8.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-responsive-2.3.0.css') }}">
	<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-jquery-1.12.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-rowreorder-1.2.8.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-responsive-2.3.0.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>
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
                <form method="POST" action="{{ route('student.request') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="container-xl px-4 mt-4 right-to-left">
                        <!-- page navigation-->
                        <h3 style="font-size: 28px; font-weight: 800;">Request Documents</h3>
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="border-start-lg border-start-yellow">
                                        <div class="card-header">
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
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3" style="color: red">
                                                * required field
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row">
                                                <!-- Form Group (content)-->
                                                <div class="col-lg-6 col-md-6 col-sm-12 requestdocument">
                                                	<label class="large col-md-12" for="document_type" class="form-control @error('document_type') is-invalid @enderror" style="font-size: 20px;"><br><span style="color: red">*</span> Document Needed</label>
                                                    <div class="col-md-12" hidden>
                                                        <input class="form-control @error('document_type') is-invalid @enderror" id="inputdocument_type" type="text" placeholder="Enter document needed" name="document_type"  value="{{ old('document_type') }}">
                                                    </div>
                                                    <select id="document_type" name="document_type" class="form-control" value="{{ old('document_type') }}" style="font-size: 16px;" >
                                                        <option value="" disabled selected hidden>Choose Document</option>
                                                        @foreach ($lists as $list)
                                                            <option value="{{ $list->id }}">{{ $list->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br>
                                                <!-- Form Group (content)-->
                                                <div class="col-lg-6 col-md-6 col-sm-12 requestdocument">
                                                	<label class="large mb-1" for="inputpurpose" style="font-size: 20px;" class="form-control @error('purpose') is-invalid @enderror"><br><span style="color: red">*</span> Purpose</label>
                                                    <div class="col-md-12" hidden>
                                                        <input class="form-control @error('purpose') is-invalid @enderror" id="inputpurpose" type="text" placeholder="Enter purpose" name="purpose"  value="{{ old('purpose') }}">
                                                    </div>
                                                    <select id="purpose" name="purpose" class="form-control" value="{{ old('purpose') }}" style="font-size: 16px;" >
                                                        <option value="" disabled selected hidden>Choose Purpose</option>
                                                        @foreach ($purposes as $purpose)
                                                            <option value="{{ $purpose->id }}" data-proof="{{ $purpose->proof_needed}}">{{ $purpose->purpose}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br>
                                                <!-- Form Group (content)-->
                                                <div class="col-lg-10 col-md-12 col-sm-12 requestdocument">
                                                <br><br>
                                                    <div style="font-size: 20px;">
                                                        <span style="color: red">*</span> Proof needed: (only JPG or PNG files are allowed)
                                                        <input id="proof" style="width:100%; padding-left: 2%;" name="proof_needed" style="border: none;" value="" disabled><br><br>
                                                        <input type="file" name = "file" class="form-control" style="font-size: 16px;" >
                                                    </div>
            										<div class ="form-group">
            											
            										</div>                                 
            									</div> 
                                                 <!-- Save changes button-->
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <center> <br>
                                                        Note:<br>The documents will be processed <b>within five (5) working days</b> upon requesting.
                                                        The documents can be claimed in the <b>Registrars Office.</b>
                                                    </center>
                                                </div>
                                                <div class="col-lg-10 col-md-12 col-sm-12">
                                                    <font face = "Verdana" size = "8"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </form>
                    <hr style="border: 1px solid grey;">
                <!-- tables -->
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
									<table id="example" class="display nowrap table-bordered table-striped table-hover" style="width:100%">
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
                                                    @if($request -> purpose_id != 0)
                                                        <td>{{$request -> purpose -> purpose}}</td>
                                                    @else
                                                        <td>{{$request -> other_purposes}}</td>
                                                    @endif
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
                                                                    echo '<span class="badge bg-success" style="color: white;">Completed</span>';
                                                                    break;
                                                                case '4':
                                                                    echo '<span class="badge bg-danger" style="color: white;">Denied</span>';
                                                                    break;
                                                                default:
                                                                    echo '<span class="badge bg-secondary" style="color: white;">Undetermine</span>';
                                                                    break;
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success btn-md" href="/viewfileDocuments/{{$request->id}}"><i class="fas fa-eye"></i> View</a>
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