@include('partials.adminheader')
<main>
    <!-- new tables -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script> -->

	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-jquery-1.12.1.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-rowreorder-1.2.8.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-responsive-2.3.0.css') }}">
	<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-jquery-1.12.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-rowreorder-1.2.8.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-responsive-2.3.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
		 $(document).ready(function() {
            table3 = $('#example2').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table3 );
        } );
        $(document).ready(function() {
            table3 = $('#example3').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table3 );
        } );
		$(document).ready(function() {
            table4 = $('#example4').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table4 );
        } );
    </script>
</head>

<body style="font-family: Arial;"> 

	
	<section>
		<div>
			<div>
		        <!-- boxes -->
		        <div class="px-2 mt-2">
	                <!-- page navigation-->
	                <hr class="mt-0 mb-4">
	                <div class="row">
	                    <div class="col-lg-4 mb-4">	
	                        <!-- Account details card-->
	                        <div class="card h-100 border-start-lg border-start-yellow" style="color: white; background-color: #B9B32E; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
	                            <div>
	                                <div class="card-header" style="font-size: 20px; font-weight: 800;">Requested Documents</div>
	                                <div class="card-body">
										<br>
	                                    <div style="padding: 0px 40px 10px 40px">
						                     <div style="font-size: 40px;" ><i class="fas fa-file-alt"></i>  <span id="reload">{{ $requests->count() }}</span> </div>
	                                    </div>
	                                </div>
	                            </div>
	                         </div>
	                     </div>
	                </div>
	            </div>
				
		        <!-- create new documents and print -->
	            <div class="px-2 mt-2">
	                <!-- page navigation-->
					<h3 style="font-size: 28px; font-weight: 800;">Document for Request</h3>
	                <hr class="mt-0 mb-4">
	                <div class="row">
	                    
	                        <!-- Account details card-->
	                        <div class="card mb-4">
	                            <div class="border-start-lg border-start-yellow">
	                                <div class="card-header"></div>
	                                <div class="card-body">
										<br>
	                                    <div>
											@if (count($errors) > 0)
												<div class="alert alert-danger">
													<button type="button" class="close" data-dismiss="alert">×</button>
													<strong>Whoops!</strong> There were some problems with your input.
													<ul>
														@foreach ($errors->all() as $error)
															<li>{{ $error }}</li>
														@endforeach
													</ul>
												</div>
											@endif
	                                        <!-- print document -->
											<div style="box-shadow: 0 4px 16px rgba(0,0,0,0.2);">
												<div class="card-header" style="font-size: 24px;">Print Document Request Report</div><br>
												<form action="{{route('admin.downloadpdfdoc')}}" method="POST">
													@csrf
													<div class="row" style="padding: 40px;">
														<div class="col-md-2">
															<b>From:</b>
															<input style="font-size: 20px;" type="date" name="dateFrom" class="form-control" value="<?php echo date('Y-m-d'); ?>" /><br/>
														</div>
														<div class="col-md-2">
															<b>To:</b>
															<input style="font-size: 20px;" type="date" name="dateTo" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
														</div>
														<div class="col-md-3">
															<br/>
															<input  style="font-size: 20px;" type="submit" name="submit" class="btn btn-primary" value="Print"/></input>
														</div>
													</div>
												</form>
											</div>
											<br><br>
												<!-- Table of Documents  -->
												<div class="card-header" style="font-size: 24px;">
													Table of Available Documents
													<a class="btn btn-primary" style="float: right;" onClick="add()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Record</a>
												</div>
                                                <br>
                                                <div class="table-responsive table-billing-history">
                                                    <table id="example1" class="display table-bordered table-striped table-hover example1" style="width:100%">
                                                        <thead class="table-success">
                                                             <tr>
                                                                <th class="border-gray-200" scope="col">#</th>
                                                                <th class="border-gray-200" scope="col">Document Name</th>
                                                                <th class="border-gray-200" scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>  
												<br/><br/>
												<!-- boostrap view model  -->
												<div class="modal fade" id="Document-modal-view" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content border-start-lg border-start-yellow">
															<div class="modal-header">
																<h1 class="modal-title" id="DocumentModal-view" style="font-size: 20px;">New Document</h1>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div style="font-size: 40px;">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-12">
																				<span><label class="large" for="name" style="font-size: 26px;"><b>Document Name: </b></label></span>
																				<span id="document_name-view" style="font-size: 26px;"></span><br/><br/>
																			</div>
																			<div class="col-md-12">
																				<span><label class="large" for="name" style="font-size: 26px;"><b>Created at: </b></label></span>
																				<span id="document_created-view" style="font-size: 26px;"></span>
																			</div>
																		</div>
																	</div>
																</div>        
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>


												<!-- boostrap add model -->
												<div class="modal fade" id="Document-modal" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content border-start-lg border-start-yellow">
															<div class="modal-header">
																<h1 class="modal-title" id="DocumentModal" style="font-size: 20px;">New Document</h1>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="javascript:void(0)" id="DocumentForm" name="DocumentForm" class="form-horizontal" method="POST">
																<div class="modal-body">
																	<input type="hidden" name="id" id="id">
																	<div class="row">
																		<div class="col-md-12">
																			<div id="whoops" class="alert alert-danger" style="display: none;">
																				<b>Whoops! There is a problem in your input</b> <br/>
																				<div id="validation-errors"></div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<label class="large" for="document_name-add" style="font-size: 20px;"><span style="color: red">*</span> Document Name</label>
																			<input class="form-control @error('name') is-invalid @enderror" id="document_name-add" type="text" style="font-size: 18px;"  placeholder="Document Name" name="name"  required>
																			<div class="invalid-feedback">
																				Please input document name.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
																</div>
															</form>
														</div>
													</div>
												</div>
												<!-- end bootstrap model -->

												<!-- boostrap update model  -->
												<div class="modal fade" id="Document-modal-update" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content border-start-lg border-start-yellow">
															<div class="modal-header">
																<h1 class="modal-title" id="DocumentModal-update" style="font-size: 20px;">Update Document</h1>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="javascript:void(0)" id="DocumentFormUpdate" name="DocumentFormUpdate" class="form-horizontal" method="POST">
																<div class="modal-body">
																	<input type="hidden" name="id" id="id-update">
																	<div class="row">
																		<div class="col-md-12">
																			<div id="whoops-update" class="alert alert-danger" style="display: none;">
																				<b>Whoops! There is a problem in your input</b> <br/>
																				<div id="validation-errors-update"></div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<label class="large" for="document_name-update" style="font-size: 20px;"><span style="color: red">*</span> Document name:</label>
																			<br>
																			<input id="document_name-update" class="form-control @error('name') is-invalid @enderror"  type="text" style="font-size: 18px;"  placeholder="Document Name" name="nameq" required>
																			<div class="invalid-feedback">
																				Please input valid document name.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
																</div>
															</form>
														</div>
													</div>
												</div>
												<!-- end bootstrap model -->

												<!-- boostrap delete model  -->
												<div class="modal fade" id="Document-modal-delete" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content border-start-lg border-start-yellow">
															<div class="modal-header">
																<h1 class="modal-title" id="DocumentModalDelete" style="font-size: 20px;">Delete Document</h1>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="javascript:void(0)" id="DocumentFormDelete" name="DocumentFormDelete" class="form-horizontal" method="POST">
																<div class="modal-body">
																	<input type="hidden" name="id" id="id-delete">
																	<p style="color: red; font-size:20px;">Are you sure you want to delete <span id="document-delete"></span>?</p>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<font face = "Verdana" size = "2"><input type="submit" class="btn btn-danger btn-md" value="Delete"></font>
																</div>
															</form>
														</div>
													</div>
												</div>
												<!-- end bootstrap model -->  
											<br><br>
											<!-- Table of Purposes -->
	                                        <div class="card-header" style="font-size: 24px;">
	                                        	Table of Purposes
												<a class="btn btn-primary" style="float: right;" onClick="addPurpose()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Record</a>
	                                    	</div>
                                                <br>
                                                <div class="table-responsive table-billing-history">
                                                    <table id="example5" class="display table-bordered table-striped table-hover" style="width:100%">
                                                        <thead class="table-success">
                                                             <tr>
                                                                <th class="border-gray-200" scope="col">#</th>
                                                                <th class="border-gray-200" scope="col">Purposes</th>
																<th class="border-gray-200" scope="col">Proof Needed</th>
                                                                <th class="border-gray-200" scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>    
	                                    </div>
	                                </div>
	                            </div>
												<!-- boostrap view model  -->
												<div class="modal fade" id="Purpose-modal-view" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content border-start-lg border-start-yellow">
															<div class="modal-header">
																<h1 class="modal-title" id="PurposeModal-view" style="font-size: 20px;">New Purpose</h1>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div style="font-size: 40px;">
																	<div class="card-body">
																		<div class="row">
																			<div class="col-md-12">
																				<span><label class="large" for="name" style="font-size: 26px;"><b>Purpose: </b></label></span>
																				<span id="purpose-view" style="font-size: 26px;"></span><br/>
																			</div>
																			<div class="col-md-12">
																				<span><label class="large" for="name" style="font-size: 26px;"><b>Proof Needed: </b></label></span>
																				<span id="proof_needed-view" style="font-size: 26px;"></span>
																			</div>
																			<div class="col-md-12">
																				<span><label class="large" for="name" style="font-size: 26px;"><b>Created at: </b></label></span>
																				<span id="created_at-purpose-view" style="font-size: 26px;"></span><br/>
																			</div>
																			<div class="col-md-12">
																				<span><label class="large" for="name" style="font-size: 26px;"><b>Updated at: </b></label></span>
																				<span id="updated_at-purpose-view" style="font-size: 26px;"></span><br/>
																			</div>
																		</div>
																	</div>
																</div>        
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
												<!-- boostrap add model -->
												<div class="modal fade" id="Purpose-modal" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content border-start-lg border-start-yellow">
															<div class="modal-header">
																<h1 class="modal-title" id="PurposeModal" style="font-size: 20px;">New Purpose</h1>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="javascript:void(0)" id="PurposeForm" name="PurposeForm" class="form-horizontal" method="POST">
																<div class="modal-body">
																	<input type="hidden" name="id" id="id">
																	<div class="row">
																		<div class="col-md-12">
																			<div id="whoops" class="alert alert-danger" style="display: none;">
																				<b>Whoops! There is a problem in your input</b> <br/>
																				<div id="validation-errors"></div>
																			</div>
																		</div>
																		<div class="col-lg-12">
																			<label class="large" for="purpose" style="font-size: 20px;">Purpose</label>
																			<input class="form-control @error('purpose') is-invalid @enderror" id="purpose" type="text" style="font-size: 18px;"  placeholder="New purpose" name="purpose" value="{{ old('purpose') }}" required>
																			<div class="invalid-feedback">
																				Please input purpose.
																			</div>
																		</div>
																		<div class="col-lg-12"><br/>
																			<label class="large" for="proof_needed" style="font-size: 20px;">Proof Needed</label>
																			<input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed" type="text" style="font-size: 18px;"  placeholder="Proof Needed" name="proof_needed" value="{{ old('proof_needed') }}" required>
																			<div class="invalid-feedback">
																				Please input proof needed.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
																</div>
															</form>
														</div>
													</div>
												</div>
												<!-- end bootstrap model -->

												<!-- boostrap update model  -->
												<div class="modal fade" id="Purpose-modal-update" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content border-start-lg border-start-yellow">
															<div class="modal-header">
																<h1 class="modal-title" id="PurposeModal-update" style="font-size: 20px;">Update Purpose</h1>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="javascript:void(0)" id="PurposeFormUpdate" name="PurposeFormUpdate" class="form-horizontal" method="POST">
																<div class="modal-body">
																	<input type="hidden" name="id" id="id-update-purpose">
																	<div class="row">
																		<div class="col-md-12">
																			<div id="whoops-update" class="alert alert-danger" style="display: none;">
																				<b>Whoops! There is a problem in your input</b> <br/>
																				<div id="validation-errors-update"></div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<label class="large" for="purpose" style="font-size: 20px;"><span style="color: red">*</span> Purpose:</label>
																			<br>
																			<input class="form-control @error('purpose') is-invalid @enderror" id="purpose-update" type="text" style="font-size: 18px;"  placeholder="Document purpose" name="purpose" required>
																			<div class="invalid-feedback">
																				Please input valid purpose.
																			</div>
																		</div>
																		<div class="col-md-12"><br/>
																			<label class="large" for="proof_needed" style="font-size: 20px;"><span style="color: red">*</span> Proof needed:</label>
																			<br>
																			<input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed-update" type="text" style="font-size: 18px;"  placeholder="Proof Needed" name="proof_needed" required>
																			<div class="invalid-feedback">
																				Please input valid proof needed.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
																</div>
															</form>
														</div>
													</div>
												</div>
												<!-- end bootstrap model -->

												<!-- boostrap delete model  -->
												<div class="modal fade" id="Purpose-modal-delete" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content border-start-lg border-start-yellow">
															<div class="modal-header">
																<h1 class="modal-title" id="PurposeModalDelete" style="font-size: 20px;">Delete Purpose</h1>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="javascript:void(0)" id="PurposeFormDelete" name="PurposeFormDelete" class="form-horizontal" method="POST">
																<div class="modal-body">
																	<input type="hidden" name="id" id="id-delete-purpose">
																	<p style="color: red; font-size:20px;">Are you sure you want to delete <span id="purpose-delete"></span>?</p>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<font face = "Verdana" size = "2"><input type="submit" class="btn btn-danger btn-md" value="Delete"></font>
																</div>
															</form>
														</div>
													</div>
												</div>
												<!-- end bootstrap model -->  
	                        </div>
		
	                 </div>
	            </div>
				<!-- tables need join -->
				<!-- tables -->
				<div class="px-2 mt-2">
					<hr class="mt-0 mb-4">
	                <div class="row">
	                        <!-- Account details card-->
	                        <div class="card border-start-lg border-start-success">
								<div class="tabs">
								    <input type="radio" name="tabs" id="tabone" checked="checked">
								    <label for="tabone">Grade 11</label>
								    <div class="tab" style="height: auto;">
										<div style="margin: 20px;">
											<a class="btn btn-success" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofcompleted11") }}'><i class="fas fa-tasks"></i> Completed</a>&ensp;
											<a class="btn btn-danger" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofrejected11") }}'><i class="fas fa-times-circle"></i> Denied</a>&ensp;
										</div>
								      	<div class="card-header"><b>Requested Documents</b></div>
										    <div class="card-body p-0">
											    <!-- Announcements table-->
											    @if($requests11->count() == 0)
													<br><br>
													<div class="alert alert-danger"><em>No records found.</em></div>
												@else 
											        <div class="table-responsive table-billing-history">
												        <table id="example2" class="display table-bordered table-striped table-hover" style="width:100%">
												            <thead class="table-success">
												                <tr>
																	<th class="border-gray-200" scope="col">#</th>
												                    <th class="border-gray-200" scope="col">Document</th>
												                    <th class="border-gray-200" scope="col">Student Name</th>
												                    <th class="border-gray-200" scope="col">Strand</th>
																	<th class="border-gray-200" scope="col">Purpose</th>
												                    <th class="border-gray-200" scope="col">Date Requested</th>
												                    <th class="border-gray-200" scope="col">Proof</th>
																	<th class="border-gray-200" scope="col">Status</th>
																	<th class="border-gray-200" scope="col">Action</th>
												                </tr>
												           	</thead>
												           	<tbody>
												                <?php 
												                    $i=1;
												                ?>
																	@foreach ($requests as $request)
																		@if($request->gradelevel_id == 1)
																			<tr>
																				<?php $requested_at = date('F d, Y', strtotime($request -> created_at)); ?>
																				<td class="text-center"><?php echo $i++; ?></td>
																				<td>{{$request -> document -> name}}</td>
																				<td>{{$request -> student -> last_name}}, {{$request -> student -> first_name}} {{$request -> student -> middle_name}} {{$request -> student -> suffix}}</td>
																				<td>{{$request -> student -> course -> abbreviation}}</td>
																				<td>{{$request -> purpose -> purpose}}</td>
																				<td>{{$requested_at}}</td>
																				<td>
																					<a href="{{ url('download',['file'=>$request->file]) }}" class="btn btn-primary">Download</a> 
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
																					<a class="btn btn-success btn-md" href="{{ url('viewfileDocument',['id'=>$request->id]) }}"><i class="fa-solid fa-eye"></i> View</a>
																					<a class="btn btn-warning btn-md" href="javascript:void(0)" onclick="editDoc11(this)" data-id="{{ $request->id }}" ><i class="fas fa-edit"></i> Update</a>
																				</td> 
																			</tr>
																			<!-- edit request -->
																			<div id="editModal" class="modal fade" aria-hidden="true">
																				<div class="modal-dialog modal-lg" role="document">
																					<div class="modal-content border-start-lg border-start-yellow">
																						<div class="modal-header">
																							<h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update request</h1>
																							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																								<span aria-hidden="true">&times;</span>
																							</button>
																						</div>
																						<form method="POST" id="updateRequest" name="updateRequest" action="javascript:void(0)" class="form-horizontal">
																							<div class="modal-body">
																								<div id="whoops" class="alert alert-danger" style="display: none;">
																									<b>Whoops! There is a problem in your input</b> <br/>
																									<div id="validation-errors"></div>
																								</div>
																								<div class="row">
																									<input type="hidden" name="id" id="id" value="{{$request->id}}">
																									<div class="col-md-12">
																										<label style="font-size: 26px;">Full Name</label><input type="text" class="form-control"  style="font-size: 20px;" placeholder=" {{$request->student->last_name}}, {{$request->student->first_name}} {{$request->student->middle_name}} {{$request->student->suffix}}" value="" readonly> <br>
																									</div>
																									@if($request->gradelevel->gradelevel == 11 || $request->gradelevel->gradelevel == 12)
																										<div class="col-md-12">
																											<label style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 20px;" placeholder=" {{$request->gradelevel->gradelevel}} " value="" readonly> <br>
																										</div>
																									@else
																										<div class="col-md-12">
																											<label style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 18px;" placeholder=" Alumni" value="" readonly> <br>
																										</div>
																									@endif
																									<div class="col-md-12">
																										<label class="large mb-1" style="font-size: 20px;"><br><b>Document Needed: </b></label>
																										<span style="font-size: 20px;">{{$request -> document -> name}}</span>
																									</div>
																									<div class="col-md-12">
																										<label class="large mb-1" for="inputpurpose" style="font-size: 20px;"><b>Purpose: </b></label>
																										<span style="font-size: 20px;">{{$request->purpose->purpose}}</span>
																									</div>
																									<div class="col-md-12">
																										<label class="large mb-1" for="document_id" class="form-control @error('status') is-invalid @enderror" style="font-size: 20px;"><br><b>Status</b></label>
																										<div class="col-md-12" hidden><input class="form-control @error('status') is-invalid @enderror" id="inputstatus" type="text" placeholder="Enter status" name="status"  value="{{$request->status}}"></div>
																										<select id="status" name="status" class="form-control" value="{{$request->status}}"style="font-size: 18px;" >
																											<option value="" disabled selected>Change Status</option>
																											<option value="1" {{$request->status == "1" ?'selected' : ''}}>Pending</option>
																											<option value="2" {{$request->status == "2" ?'selected' : ''}}>On Process</option>
																											<option value="3" {{$request->status == "3" ?'selected' : ''}}>Completed</option>
																											<option value="4" {{$request->status == "4" ?'selected' : ''}}>Denied</option>
																										</select>
																										<div class="invalid-feedback">
																											Please choose status.
																										</div>
																									</div>  
																								</div>
																							</div>
																							<div class="modal-footer">
																								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																								<font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
																							</div>
																						</form>
																					</div>
																				</div>
																			</div>
																		@endif
																	@endforeach 
												           	</tbody>
												        </table>
											        </div>
												@endif   
										    </div>
										</div>

								    	<input type="radio" name="tabs" id="tabtwo">
								    	<label for="tabtwo">Grade 12</label>
										<div class="tab" style="height: auto;">
											<div style="margin: 20px;">
												<a class="btn btn-success" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofcompleted12") }}'><i class="fas fa-tasks"></i> Completed</a>&ensp;
												<a class="btn btn-danger" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofrejected12") }}'><i class="fas fa-times-circle"></i> Denied</a>&ensp;
											</div>
											<div class="card-header"><b>Requested Documents</b></div>
											<div class="card-body p-0">
												<!-- Announcements table-->
												@if($requests12->count() == 0)
													<br><br>
													<div class="alert alert-danger"><em>No records found.</em></div>
												@else
													<div class="table-responsive table-billing-history">
														<table id="example3" class="display table-bordered table-striped table-hover" style="width:100%">
														<thead class="table-success">
												                <tr>
												                    <th class="border-gray-200" scope="col">#</th>
												                    <th class="border-gray-200" scope="col">Document</th>
												                    <th class="border-gray-200" scope="col">Student Name</th>
												                    <th class="border-gray-200" scope="col">Strand</th>
																	<th class="border-gray-200" scope="col">Purpose</th>
												                    <th class="border-gray-200" scope="col">Date Requested</th>
												                    <th class="border-gray-200" scope="col">Proof</th>
																	<th class="border-gray-200" scope="col">Status</th>
																	<th class="border-gray-200" scope="col">Action</th>
												                </tr>
												           	</thead>
												           	<tbody>
												                <?php 
												                    $i=1;
												                ?>
																	@foreach ($requests as $request)
																		@if($request->gradelevel_id == 2)
																			<tr>
																				<?php $requested_at = date('F d, Y', strtotime($request -> created_at)); ?>
																				<td class="text-center"><?php echo $i++; ?></td>
																				<td>{{$request -> document -> name}}</td>
																				<td>{{$request -> student -> last_name}}, {{$request -> student -> first_name}} {{$request -> student -> middle_name}}</td>
																				<td>{{$request -> student -> course -> abbreviation}}</td>
																				<td>{{$request -> purpose -> purpose}}</td>
																				<td>{{$requested_at}}</td>
																				<td>
																					<a href="{{ url('download',['file'=>$request->file]) }}" class="btn btn-primary">Download</a> 
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
																					<a class="btn btn-success btn-md" href="{{ url('viewfileDocument',['id'=>$request->id]) }}"><i class="fa-solid fa-eye"></i> View</a>
																					<a class="btn btn-warning btn-md" href="javascript:void(0)" onclick="editDoc12(this)" data-id="{{ $request->id }}" ><i class="fas fa-edit"></i> Update</a>
																				</td> 
																			</tr>
																			<!-- edit request -->
																			<div id="editModal12" class="modal fade" aria-hidden="true">
																				<div class="modal-dialog modal-lg" role="document">
																					<div class="modal-content border-start-lg border-start-yellow">
																						<div class="modal-header">
																							<h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update request</h1>
																							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																								<span aria-hidden="true">&times;</span>
																							</button>
																						</div>
																						<form method="POST" id="updateRequest12" name="updateRequest12" action="javascript:void(0)" class="form-horizontal">
																							<div class="modal-body">
																								<div id="whoops" class="alert alert-danger" style="display: none;">
																									<b>Whoops! There is a problem in your input</b> <br/>
																									<div id="validation-errors"></div>
																								</div>
																								<div class="row">
																									<input type="hidden" name="id" id="id" value="{{$request->id}}">
																									<div class="col-md-12">
																										<label style="font-size: 26px;">Full Name</label><input type="text" class="form-control"  style="font-size: 20px;" placeholder=" {{$request->student->last_name}}, {{$request->student->first_name}} {{$request->student->middle_name}} {{$request->student->suffix}}" value="" readonly> <br>
																									</div>
																									@if($request->gradelevel->gradelevel == 11 || $request->gradelevel->gradelevel == 12)
																										<div class="col-md-12">
																											<label style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 20px;" placeholder=" {{$request->gradelevel->gradelevel}} " value="" readonly> <br>
																										</div>
																									@else
																										<div class="col-md-12">
																											<label style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 18px;" placeholder=" Alumni" value="" readonly> <br>
																										</div>
																									@endif
																									<div class="col-md-12">
																										<label class="large mb-1" style="font-size: 20px;"><br><b>Document Needed: </b></label>
																										<span style="font-size: 20px;">{{$request -> document -> name}}</span>
																									</div>
																									<div class="col-md-12">
																										<label class="large mb-1" for="inputpurpose" style="font-size: 20px;"><b>Purpose: </b></label>
																										<span style="font-size: 20px;">{{$request->purpose->purpose}}</span>
																									</div>
																									<div class="col-md-12">
																										<label class="large mb-1" for="document_id" class="form-control @error('status') is-invalid @enderror" style="font-size: 20px;"><br><b>Status</b></label>
																										<div class="col-md-12" hidden><input class="form-control @error('status') is-invalid @enderror" id="inputstatus" type="text" placeholder="Enter status" name="status"  value="{{$request->status}}"></div>
																										<select id="status" name="status" class="form-control" value="{{$request->status}}"style="font-size: 18px;" >
																											<option value="" disabled selected>Change Status</option>
																											<option value="1" {{$request->status == "1" ?'selected' : ''}}>Pending</option>
																											<option value="2" {{$request->status == "2" ?'selected' : ''}}>On Process</option>
																											<option value="3" {{$request->status == "3" ?'selected' : ''}}>Completed</option>
																											<option value="4" {{$request->status == "4" ?'selected' : ''}}>Denied</option>
																										</select>
																										<div class="invalid-feedback">
																											Please choose status.
																										</div>
																									</div>  
																								</div>
																							</div>
																							<div class="modal-footer">
																								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																								<font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
																							</div>
																						</form>
																					</div>
																				</div>
																			</div>
																		@endif
																	@endforeach 
												           	</tbody>	
														</table>
													</div>	
												@endif  		
											</div>				
								    	</div>
									
									<input type="radio" name="tabs" id="tabthree">
								    <label for="tabthree">Alumni</label>
								    <div class="tab" style="height: auto;">
										<div style="margin: 20px;">
											<a class="btn btn-success" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofcompletedAlumni") }}'><i class="fas fa-tasks"></i> Completed</a>&ensp;
											<a class="btn btn-danger" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofrejectedAlumni") }}'><i class="fas fa-times-circle"></i> Denied</a>&ensp;
										</div>
								      	<div class="card-header"><b>Requested Documents</b></div>
										    <div class="card-body p-0">
											    <!-- Announcements table-->
											    @if($alumni->count() == 0)
													<br><br>
													<div class="alert alert-danger"><em>No records found.</em></div>
												@else 
											        <div class="table-responsive table-billing-history">
												        <table id="example4" class="display table-bordered table-striped table-hover" style="width:100%">
												            <thead class="table-success">
												                <tr>
																	<th class="border-gray-200" scope="col">#</th>
												                    <th class="border-gray-200" scope="col">Document</th>
												                    <th class="border-gray-200" scope="col">Student Name</th>
												                    <th class="border-gray-200" scope="col">Strand</th>
																	<th class="border-gray-200" scope="col">Purpose</th>
												                    <th class="border-gray-200" scope="col">Date Requested</th>
												                    <th class="border-gray-200" scope="col">Proof</th>
																	<th class="border-gray-200" scope="col">Status</th>
																	<th class="border-gray-200" scope="col">Action</th>
												                </tr>
												           	</thead>
												           	<tbody>
												                <?php 
												                    $i=1;
												                ?>
																	@foreach ($requests as $request)
																		@if($request->gradelevel_id == 4)
																			<tr>
																				<?php $requested_at = date('F d, Y', strtotime($request -> created_at)); ?>
																				<td class="text-center"><?php echo $i++; ?></td>
																				<td>{{$request -> document -> name}}</td>
																				<td>{{$request -> student -> last_name}}, {{$request -> student -> first_name}} {{$request -> student -> middle_name}} {{$request -> student -> suffix}}</td>
																				<td>{{$request -> student -> course -> abbreviation}}</td>
																				<td>{{$request -> purpose -> purpose}}</td>
																				<td>{{$requested_at}}</td>
																				<td>
																					<a href="{{ url('download',['file'=>$request->file]) }}" class="btn btn-primary">Download</a> 
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
																					<a class="btn btn-success btn-md" href="{{ url('viewfileDocument',['id'=>$request->id]) }}"><i class="fa-solid fa-eye"></i> View</a>
																					<a class="btn btn-warning btn-md" href="javascript:void(0)" onclick="editDoc13(this)" data-id="{{ $request->id }}" ><i class="fas fa-edit"></i> Update</a>
																				</td> 
																			</tr>
																			<!-- edit request -->
																			<div id="editModal13" class="modal fade" aria-hidden="true">
																				<div class="modal-dialog modal-lg" role="document">
																					<div class="modal-content border-start-lg border-start-yellow">
																						<div class="modal-header">
																							<h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update request</h1>
																							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																								<span aria-hidden="true">&times;</span>
																							</button>
																						</div>
																						<form method="POST" id="updateRequest13" name="updateRequest13" action="javascript:void(0)" class="form-horizontal">
																							<div class="modal-body">
																								<div id="whoops" class="alert alert-danger" style="display: none;">
																									<b>Whoops! There is a problem in your input</b> <br/>
																									<div id="validation-errors"></div>
																								</div>
																								<div class="row">
																									<input type="hidden" name="id" id="id" value="{{$request->id}}">
																									<div class="col-md-12">
																										<label style="font-size: 26px;">Full Name</label><input type="text" class="form-control"  style="font-size: 20px;" placeholder=" {{$request->student->last_name}}, {{$request->student->first_name}} {{$request->student->middle_name}} {{$request->student->suffix}}" value="" readonly> <br>
																									</div>
																									@if($request->gradelevel->gradelevel == 11 || $request->gradelevel->gradelevel == 12)
																										<div class="col-md-12">
																											<label style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 20px;" placeholder=" {{$request->gradelevel->gradelevel}} " value="" readonly> <br>
																										</div>
																									@else
																										<div class="col-md-12">
																											<label style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 18px;" placeholder=" Alumni" value="" readonly> <br>
																										</div>
																									@endif
																									<div class="col-md-12">
																										<label class="large mb-1" style="font-size: 20px;"><br><b>Document Needed: </b></label>
																										<span style="font-size: 20px;">{{$request -> document -> name}}</span>
																									</div>
																									<div class="col-md-12">
																										<label class="large mb-1" for="inputpurpose" style="font-size: 20px;"><b>Purpose: </b></label>
																										<span style="font-size: 20px;">{{$request->purpose->purpose}}</span>
																									</div>
																									<div class="col-md-12">
																										<label class="large mb-1" for="document_id" class="form-control @error('status') is-invalid @enderror" style="font-size: 20px;"><br><b>Status</b></label>
																										<div class="col-md-12" hidden><input class="form-control @error('status') is-invalid @enderror" id="inputstatus" type="text" placeholder="Enter status" name="status"  value="{{$request->status}}"></div>
																										<select id="status" name="status" class="form-control" value="{{$request->status}}"style="font-size: 18px;" >
																											<option value="" disabled selected>Change Status</option>
																											<option value="1" {{$request->status == "1" ?'selected' : ''}}>Pending</option>
																											<option value="2" {{$request->status == "2" ?'selected' : ''}}>On Process</option>
																											<option value="3" {{$request->status == "3" ?'selected' : ''}}>Completed</option>
																											<option value="4" {{$request->status == "4" ?'selected' : ''}}>Denied</option>
																										</select>
																										<div class="invalid-feedback">
																											Please choose status.
																										</div>
																									</div>  
																								</div>
																							</div>
																							<div class="modal-footer">
																								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																								<font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
																							</div>
																						</form>
																					</div>
																				</div>
																			</div>
																		@endif
																	@endforeach 
												           	</tbody>
												        </table>
											        </div>
												@endif   
										    </div>
										</div>
									</div>
				  				</div>
				  			</div>
				  		
				  	</div>
				</div>
		  		<!-- end of tables -->
		 	</div>

	</section>


	<script type="text/javascript">
		month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
		$(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#example1').DataTable({
            responsive: true,
            "bInfo" : false,
            ordering : true,
            pageLength : 10,
            processing: true,
            serverSide: true,
            ajax: "{{ url('/documentrequest') }}",
            columns: [
            {
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });
		$('#example5').DataTable({
            responsive: true,
            "bInfo" : false,
            ordering : true,
            pageLength : 10,
            processing: true,
            serverSide: true,
            ajax: "{{ url('/documentrequestpurpose') }}",
            columns: [
            {
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'purpose', name: 'purpose' },
			{ data: 'proof_needed', name: 'proof_needed' },
            { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });
    });

    function add(){
        $('#DocumentForm').trigger("reset");
        document.getElementById('whoops').style.display = 'none';
        $('#DocumentModal').html("Add Document");
        $('#Document-modal').modal('show');
        $('#id').val('');
    }   

	function viewFunc(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/viewdocument') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#DocumentModal-view').html("View Document");
                $('#Document-modal-view').modal('show');
                document.getElementById('document_name-view').innerHTML = res.name;
				var date = new Date(res.created_at);
                var created = month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
				document.getElementById('document_created-view').innerHTML = created;
            }
        });
    } 

    function editFunc(id){
        document.getElementById('whoops-update').style.display = 'none';
        $.ajax({
            type:"POST",
            url: "{{ url('/showdocument') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#DocumentModal-update').html("Edit Document");
                $('#Document-modal-update').modal('show');
                $('#id-update').val(res.id);
                $('#document_name-update').val(res.name);
            }
        });
    } 

    function deleteFunc(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/document/delete') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#Document-modal-delete').modal('show');
                $('#id-delete').val(res.id);
                document.getElementById('document-delete').innerHTML = res.name;
            }
        });
    }

    $('#DocumentForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/add/document')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Document-modal").modal('hide');
                var oTable = $('#example1').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Document has been added successfully',                      
                });
                $(":submit").removeAttr("disabled");
            },
            error: function(xhr){
                $('#validation-errors').html('');
                document.getElementById('whoops').style.display = 'block';
                if(xhr.responseJSON.error != undefined){
                    $("#validation-errors").html("");
                    $('#validation-errors').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                }
                $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                }); 
                $(":submit").removeAttr("disabled");
            }
        });
    });

    $('#DocumentFormUpdate').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/updatedocument')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Document-modal-update").modal('hide');
                var oTable = $('#example1').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Document has been updated successfully',                      
                });
                $(":submit").removeAttr("disabled");
            },
            error: function(xhr){
                $('#validation-errors-update').html('');
                document.getElementById('whoops-update').style.display = 'block';
                if(xhr.responseJSON.error != undefined){
                    $("#validation-errors-update").html("");
                    $('#validation-errors-update').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                }
                $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#validation-errors-update').append('&emsp;<li>'+value+'</li>');
                }); 
                $(":submit").removeAttr("disabled");
            }
        });
    });

    $('#DocumentFormDelete').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('/document/delete')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Document-modal-delete").modal('hide');
                var oTable = $('#example1').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Document has been deleted successfully',                      
                });
            },
            error: function(data){
                console.log(data);
            }
        });
    });

	// PURPOSE

    function addPurpose(){
        $('#PurposeForm').trigger("reset");
        document.getElementById('whoops').style.display = 'none';
        $('#PurposeModal').html("Add Purpose");
        $('#Purpose-modal').modal('show');
        $('#id').val('');
    }   

	function viewFuncPurpose(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/viewpurpose') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#PurposeModal-view').html("View Purpose");
                $('#Purpose-modal-view').modal('show');
                document.getElementById('purpose-view').innerHTML = res.purpose;
				document.getElementById('proof_needed-view').innerHTML = res.proof_needed;
				var date = new Date(res.created_at);
                var created = month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
				document.getElementById('created_at-purpose-view').innerHTML = created;
				var date = new Date(res.updated_at);
                var updated = month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
				document.getElementById('updated_at-purpose-view').innerHTML = updated;
            }
        });
    } 

    function editFuncPurpose(id){
        document.getElementById('whoops-update').style.display = 'none';
        $.ajax({
            type:"POST",
            url: "{{ url('/showpurpose') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#PurposeModal-update').html("Edit Purpose");
                $('#Purpose-modal-update').modal('show');
                $('#id-update-purpose').val(res.id);
                $('#purpose-update').val(res.purpose);
				$('#proof_needed-update').val(res.proof_needed);
            }
        });
    } 

	function editDoc11(e){
		$('#editModal').modal('show');
	}

	function editDoc12(e){
		$('#editModal12').modal('show');
	}

	function editDoc13(e){
		$('#editModal13').modal('show');
	}

		$('#updateRequest').submit(function(e) {
			$('#whoops').hide();
            var form_data = $("form#updateRequest").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",                                           
                url: '{{url("/updaterequestdocadmin/")}}/',              
                data:form_data,
                success: function(response) {                          
                        $("#editModal").removeClass("in");          
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal").hide();                     
                        $("#updateRequest")[0].reset();               
                        $(":submit").removeAttr("disabled");                                                                                
                        Swal.fire({                                                     
                            icon: 'success',                                              
                            title: 'Success.',                                                 
                            text: 'Document request has been updated successfully',                  
                        }).then(function() {
                            location.reload(true);
                        })
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    if(xhr.responseJSON.error != undefined){
                        $("#validation-errors").html("");
                        $('#validation-errors').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                    }
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    }); 
                    $(":submit").removeAttr("disabled");
                },
            });
		});

		$('#updateRequest12').submit(function(e) {
			$('#whoops').hide();
            var form_data = $("form#updateRequest12").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",                                           
                url: '{{url("/updaterequestdocadmin/")}}/',              
                data:form_data,
                success: function(response) {                          
                        $("#editModal").removeClass("in");          
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal12").hide();                     
                        $("#updateRequest12")[0].reset();               
                        $(":submit").removeAttr("disabled");                                                                                
                        Swal.fire({                                                     
                            icon: 'success',                                              
                            title: 'Success.',                                                 
                            text: 'Document request has been updated successfully',                  
                        }).then(function() {
                            location.reload(true);
                        })
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    if(xhr.responseJSON.error != undefined){
                        $("#validation-errors").html("");
                        $('#validation-errors').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                    }
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    }); 
                    $(":submit").removeAttr("disabled");
                },
            });
		});

		$('#updateRequest13').submit(function(e) {
			$('#whoops').hide();
            var form_data = $("form#updateRequest13").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",                                           
                url: '{{url("/updaterequestdocadmin/")}}/',              
                data:form_data,
                success: function(response) {                          
                        $("#editModal").removeClass("in");          
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal13").hide();                     
                        $("#updateRequest13")[0].reset();               
                        $(":submit").removeAttr("disabled");                                                                                
                        Swal.fire({                                                     
                            icon: 'success',                                              
                            title: 'Success.',                                                 
                            text: 'Document request has been updated successfully',                  
                        }).then(function() {
                            location.reload(true);
                        })
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    if(xhr.responseJSON.error != undefined){
                        $("#validation-errors").html("");
                        $('#validation-errors').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                    }
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    }); 
                    $(":submit").removeAttr("disabled");
                },
            });
		});

    function deleteFuncPurpose(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/deletedocumentpurpose') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#Purpose-modal-delete').modal('show');
                $('#id-delete-purpose').val(res.id);
                document.getElementById('purpose-delete').innerHTML = res.purpose;
            }
        });
    }

    $('#PurposeForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/add/purpose')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Purpose-modal").modal('hide');
                var oTable = $('#example5').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Purpose has been added successfully',                      
                });
                $(":submit").removeAttr("disabled");
            },
            error: function(xhr){
                $('#validation-errors').html('');
                document.getElementById('whoops').style.display = 'block';
                if(xhr.responseJSON.error != undefined){
                    $("#validation-errors").html("");
                    $('#validation-errors').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                }
                $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                }); 
                $(":submit").removeAttr("disabled");
            }
        });
    });

    $('#PurposeFormUpdate').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/updatepurpose')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Purpose-modal-update").modal('hide');
                var oTable = $('#example5').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Purpose has been updated successfully',                      
                });
                $(":submit").removeAttr("disabled");
            },
            error: function(xhr){
                $('#validation-errors-update').html('');
                document.getElementById('whoops-update').style.display = 'block';
                if(xhr.responseJSON.error != undefined){
                    $("#validation-errors-update").html("");
                    $('#validation-errors-update').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                }
                $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#validation-errors-update').append('&emsp;<li>'+value+'</li>');
                }); 
                $(":submit").removeAttr("disabled");
            }
        });
    });

    $('#PurposeFormDelete').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('/purpose/delete')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Purpose-modal-delete").modal('hide');
                var oTable = $('#example5').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Purpose has been deleted successfully',                      
                });
            },
            error: function(data){
                console.log(data);
            }
        });
    });
	</script>

	<script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
		  editDoc(e);
		  editPur(e);
          deleteItem(e);
		  deleteItemPurpose(e);
		  editDoc11(e);
		  editDoc12(e);
		  editDocAlumni(e);
        });
		function editDoc(e){
			id = e.getAttribute('data-id');
		}
		function editPur(e){
			id = e.getAttribute('data-id');
		}
        //delete document
		function deleteItem(e){
			id = e.getAttribute('data-id');
		}
		function deleteItemPurpose(e){
			id = e.getAttribute('data-id');
		}
    </script>

</main>
<br><br><br><br>