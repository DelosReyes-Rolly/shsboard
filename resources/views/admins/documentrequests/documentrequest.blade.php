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
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables-bootstrap-1.10.20.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables-jquery-1.12.1.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables-rowreorder-1.2.8.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables-responsive-2.3.0.css') }}">
	<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-jquery-1.12.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-rowreorder-1.2.8.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-responsive-2.3.0.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap-4.5.2.js') }}"></script>
	<script src="{{ asset('assets/js/needs-validated2.js') }}"></script>
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
												<div style="font-size: 40px;"><i class="fas fa-file-alt"></i> <span id="reload">{{ $requests->count() }}</span> </div>
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
															<input style="font-size: 20px;" type="date" name="dateFrom" class="form-control" value="<?php echo date('Y-m-d'); ?>" /><br />
														</div>
														<div class="col-md-2">
															<b>To:</b>
															<input style="font-size: 20px;" type="date" name="dateTo" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
														</div>
														<div class="col-md-3">
															<br />
															<input style="font-size: 20px;" type="submit" name="submit" class="btn btn-primary" value="Print" /></input>
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
											<br /><br />
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
																			<span id="document_name-view" style="font-size: 26px;"></span><br /><br />
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
														<form action="javascript:void(0)" id="DocumentForm" name="DocumentForm" class="form-horizontal needs-validation" novalidate method="POST">
															<div class="modal-body">
																<input type="hidden" name="id" id="id">
																<div class="row">
																	<div class="col-md-12">
																		<div id="whoops" class="alert alert-danger" style="display: none;">
																			<b>Whoops! There is a problem in your input</b> <br />
																			<div id="validation-errors"></div>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<label class="large" for="document_name-add" style="font-size: 20px;"><span style="color: red">*</span> Document Name</label>
																		<input class="form-control @error('name') is-invalid @enderror" id="document_name-add" type="text" style="font-size: 18px;" placeholder="Document Name" name="name" required>
																		<div class="invalid-feedback">
																			Please input document name.
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<font face="Verdana" size="2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
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
														<form action="javascript:void(0)" id="DocumentFormUpdate" name="DocumentFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
															<div class="modal-body">
																<input type="hidden" name="id" id="id-update">
																<div class="row">
																	<div class="col-md-12">
																		<div id="whoops-update" class="alert alert-danger" style="display: none;">
																			<b>Whoops! There is a problem in your input</b> <br />
																			<div id="validation-errors-update"></div>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<label class="large" for="document_name-update" style="font-size: 20px;"><span style="color: red">*</span> Document name:</label>
																		<br>
																		<input id="document_name-update" class="form-control @error('name') is-invalid @enderror" type="text" style="font-size: 18px;" placeholder="Document Name" name="nameq" required>
																		<div class="invalid-feedback">
																			Please input valid document name.
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<font face="Verdana" size="2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
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
																<font face="Verdana" size="2"><input type="submit" class="btn btn-danger btn-md" value="Delete"></font>
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
																<span id="purpose-view" style="font-size: 26px;"></span><br />
															</div>
															<div class="col-md-12">
																<span><label class="large" for="name" style="font-size: 26px;"><b>Proof Needed: </b></label></span>
																<span id="proof_needed-view" style="font-size: 26px;"></span>
															</div>
															<div class="col-md-12">
																<span><label class="large" for="name" style="font-size: 26px;"><b>Created at: </b></label></span>
																<span id="created_at-purpose-view" style="font-size: 26px;"></span><br />
															</div>
															<div class="col-md-12">
																<span><label class="large" for="name" style="font-size: 26px;"><b>Updated at: </b></label></span>
																<span id="updated_at-purpose-view" style="font-size: 26px;"></span><br />
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
											<form action="javascript:void(0)" id="PurposeForm" name="PurposeForm" class="form-horizontal needs-validation" novalidate method="POST">
												<div class="modal-body">
													<input type="hidden" name="id" id="id">
													<div class="row">
														<div class="col-md-12">
															<div id="whoops" class="alert alert-danger" style="display: none;">
																<b>Whoops! There is a problem in your input</b> <br />
																<div id="validation-errors"></div>
															</div>
														</div>
														<div class="col-lg-12">
															<label class="large" for="purpose" style="font-size: 20px;">Purpose</label>
															<input class="form-control @error('purpose') is-invalid @enderror" id="purpose" type="text" style="font-size: 18px;" placeholder="New purpose" name="purpose" value="{{ old('purpose') }}" required>
															<div class="invalid-feedback">
																Please input purpose.
															</div>
														</div>
														<div class="col-lg-12"><br />
															<label class="large" for="proof_needed" style="font-size: 20px;">Proof Needed</label>
															<input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed" type="text" style="font-size: 18px;" placeholder="Proof Needed" name="proof_needed" value="{{ old('proof_needed') }}" required>
															<div class="invalid-feedback">
																Please input proof needed.
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<font face="Verdana" size="2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
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
											<form action="javascript:void(0)" id="PurposeFormUpdate" name="PurposeFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
												<div class="modal-body">
													<input type="hidden" name="id" id="id-update-purpose">
													<div class="row">
														<div class="col-md-12">
															<div id="whoops-update" class="alert alert-danger" style="display: none;">
																<b>Whoops! There is a problem in your input</b> <br />
																<div id="validation-errors-update"></div>
															</div>
														</div>
														<div class="col-md-12">
															<label class="large" for="purpose" style="font-size: 20px;"><span style="color: red">*</span> Purpose:</label>
															<br>
															<input class="form-control @error('purpose') is-invalid @enderror" id="purpose-update" type="text" style="font-size: 18px;" placeholder="Document purpose" name="purpose" required>
															<div class="invalid-feedback">
																Please input valid purpose.
															</div>
														</div>
														<div class="col-md-12"><br />
															<label class="large" for="proof_needed" style="font-size: 20px;"><span style="color: red">*</span> Proof needed:</label>
															<br>
															<input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed-update" type="text" style="font-size: 18px;" placeholder="Proof Needed" name="proof_needed" required>
															<div class="invalid-feedback">
																Please input valid proof needed.
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<font face="Verdana" size="2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
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
													<font face="Verdana" size="2"><input type="submit" class="btn btn-danger btn-md" value="Delete"></font>
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
												</table>
											</div>
										</div>
									</div>

									<!-- boostrap update model  -->
									<div class="modal fade" id="Grade11-modal-update" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content border-start-lg border-start-yellow">
												<div class="modal-header">
													<h1 class="modal-title" id="Grade11Modal-update" style="font-size: 20px;">Update Grade11</h1>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form action="javascript:void(0)" id="Grade11FormUpdate" name="Grade11FormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
													<div class="modal-body">
														<input type="hidden" name="id" id="id-update-grade11">
														<div class="row">
															<div class="col-md-12">
																<div id="whoops-update" class="alert alert-danger" style="display: none;">
																	<b>Whoops! There is a problem in your input</b> <br />
																	<div id="validation-errors-update"></div>
																</div>
															</div>
															<div class="col-md-12">
																<span style="font-size: 26px;"><b>Full Name:</b></span> <br>
																&ensp;<span style="font-size: 26px;" id="grade11last_name" name="grade11first_name"> </span>,
																<span style="font-size: 26px;" id="grade11first_name" name="grade11first_name"> </span>
																<span style="font-size: 26px;" id="grade11middle_name" name="grade11first_name"> </span>
																<span style="font-size: 26px;" id="grade11suffix" name="grade11first_name"> </span>
															</div>
															<div class="col-md-12"><br />
																<span style="font-size: 26px;"><b>Grade Level</b></span><input type="text" class="form-control" id="grade11level" name="grade11level" style="font-size: 20px;" value="" readonly> <br>
															</div>
															<div class="col-md-12">
																<span style="font-size: 26px;"><b>Document Needed</b></span><input type="text" class="form-control" id="grade11document" name="grade11document" style="font-size: 20px;" value="" readonly> <br>
															</div>
															<div class="col-md-12">
																<span style="font-size: 26px;"><b>Purpose</b></span><input type="text" class="form-control" id="grade11purpose" name="grade11purpose" style="font-size: 20px;" value="" readonly>
															</div>

															<div class="col-md-12">
																<span class="large mb-1" for="document_id" class="form-control @error('grade11status') is-invalid @enderror" style="font-size: 26px;"><br><b>Status</b></span>
																<div class="col-md-12" hidden><input class="form-control @error('grade11status') is-invalid @enderror" type="text" placeholder="Enter grade11status" name="grade11status" value=""></div>
																<select id="grade11status" name="grade11status" class="form-control" style="font-size: 18px;">
																	<option value="" disabled>Change Status</option>
																	<option value="1" {{old('grade11status') == "1" ?'selected' : ''}}>Pending</option>
																	<option value="2" {{old('grade11status') == "2" ?'selected' : ''}}>On Process</option>
																	<option value="3" {{old('grade11status') == "3" ?'selected' : ''}}>Completed</option>
																	<option value="4" {{old('grade11status') == "4" ?'selected' : ''}}>Denied</option>
																</select>
																<div class="invalid-feedback">
																	Please choose status.
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<font face="Verdana" size="2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- end bootstrap model -->


									<input type="radio" name="tabs" id="tabtwo">
									<label for="tabtwo">Grade 12</label>
									<div class="tab" style="height: auto;">
										<div style="margin: 20px;">
											<a class="btn btn-success" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofcompleted12") }}'><i class="fas fa-tasks"></i> Completed</a>&ensp;
											<a class="btn btn-danger" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofrejected12") }}'><i class="fas fa-times-circle"></i> Denied</a>&ensp;
										</div>
										<div class="card-header"><b>Requested Documents</b></div>
										<div class="card-body p-0">
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
												</table>
											</div>
										</div>
									</div>

									<!-- boostrap update model  -->
									<div class="modal fade" id="Grade12-modal-update" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content border-start-lg border-start-yellow">
												<div class="modal-header">
													<h1 class="modal-title" id="Grade12Modal-update" style="font-size: 20px;">Update Grade12</h1>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form action="javascript:void(0)" id="Grade12FormUpdate" name="Grade12FormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
													<div class="modal-body">
														<input type="hidden" name="id" id="id-update-grade12">
														<div class="row">
															<div class="col-md-12">
																<div id="whoops-update" class="alert alert-danger" style="display: none;">
																	<b>Whoops! There is a problem in your input</b> <br />
																	<div id="validation-errors-update"></div>
																</div>
															</div>
															<div class="col-md-12">
																<span style="font-size: 26px;"><b>Full Name:</b></span> <br>
																&ensp;<span style="font-size: 26px;" id="grade12last_name" name="grade12first_name"> </span>,
																<span style="font-size: 26px;" id="grade12first_name" name="grade12first_name"> </span>
																<span style="font-size: 26px;" id="grade12middle_name" name="grade12first_name"> </span>
																<span style="font-size: 26px;" id="grade12suffix" name="grade12first_name"> </span>
															</div>
															<div class="col-md-12"><br />
																<span style="font-size: 26px;"><b>Grade Level</b></span><input type="text" class="form-control" id="grade12level" name="grade12level" style="font-size: 20px;" value="" readonly> <br>
															</div>
															<div class="col-md-12">
																<span style="font-size: 26px;"><b>Document Needed</b></span><input type="text" class="form-control" id="grade12document" name="grade12document" style="font-size: 20px;" value="" readonly> <br>
															</div>
															<div class="col-md-12">
																<span style="font-size: 26px;"><b>Purpose</b></span><input type="text" class="form-control" id="grade12purpose" name="grade12purpose" style="font-size: 20px;" value="" readonly>
															</div>

															<div class="col-md-12">
																<span class="large mb-1" for="document_id" class="form-control @error('grade12status') is-invalid @enderror" style="font-size: 26px;"><br><b>Status</b></span>
																<div class="col-md-12" hidden><input class="form-control @error('grade12status') is-invalid @enderror" type="text" placeholder="Enter grade12status" name="grade12status" value=""></div>
																<select id="grade12status" name="grade12status" class="form-control" style="font-size: 18px;">
																	<option value="" disabled>Change Status</option>
																	<option value="1" {{old('grade12status') == "1" ?'selected' : ''}}>Pending</option>
																	<option value="2" {{old('grade12status') == "2" ?'selected' : ''}}>On Process</option>
																	<option value="3" {{old('grade12status') == "3" ?'selected' : ''}}>Completed</option>
																	<option value="4" {{old('grade12status') == "4" ?'selected' : ''}}>Denied</option>
																</select>
																<div class="invalid-feedback">
																	Please choose status.
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<font face="Verdana" size="2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- end bootstrap model -->

									<input type="radio" name="tabs" id="tabthree">
									<label for="tabthree">Alumni</label>
									<div class="tab" style="height: auto;">
										<div style="margin: 20px;">
											<a class="btn btn-success" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofcompletedAlumni") }}'><i class="fas fa-tasks"></i> Completed</a>&ensp;
											<a class="btn btn-danger" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/tableofrejectedAlumni") }}'><i class="fas fa-times-circle"></i> Denied</a>&ensp;
										</div>
										<div class="table-responsive table-billing-history">
											<div class="card-header"><b>Requested Documents</b></div>
											<div class="card-body p-0">
												<!-- Announcements table-->
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
												</table>
											</div>
										</div>


										<!-- boostrap update model  -->
										<div class="modal fade" id="Alumni-modal-update" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content border-start-lg border-start-yellow">
													<div class="modal-header">
														<h1 class="modal-title" id="AlumniModal-update" style="font-size: 20px;">Update Alumni</h1>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form action="javascript:void(0)" id="AlumniFormUpdate" name="AlumniFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
														<div class="modal-body">
															<input type="hidden" name="id" id="id-update-alumni">
															<div class="row">
																<div class="col-md-12">
																	<div id="whoops-update" class="alert alert-danger" style="display: none;">
																		<b>Whoops! There is a problem in your input</b> <br />
																		<div id="validation-errors-update"></div>
																	</div>
																</div>
																<div class="col-md-12">
																	<span style="font-size: 26px;"><b>Full Name:</b></span> <br>
																	&ensp;<span style="font-size: 26px;" id="alumnilast_name" name="alumnifirst_name"> </span>,
																	<span style="font-size: 26px;" id="alumnifirst_name" name="alumnifirst_name"> </span>
																	<span style="font-size: 26px;" id="alumnimiddle_name" name="alumnifirst_name"> </span>
																	<span style="font-size: 26px;" id="alumnisuffix" name="alumnifirst_name"> </span>
																</div>
																<div class="col-md-12"><br />
																	<span style="font-size: 26px;"><b>Grade Level</b></span><input type="text" class="form-control" id="alumnilevel" name="alumnilevel" style="font-size: 20px;" value="" readonly> <br>
																</div>
																<div class="col-md-12">
																	<span style="font-size: 26px;"><b>Document Needed</b></span><input type="text" class="form-control" id="alumnidocument" name="alumnidocument" style="font-size: 20px;" value="" readonly> <br>
																</div>
																<div class="col-md-12">
																	<span style="font-size: 26px;"><b>Purpose</b></span><input type="text" class="form-control" id="alumnipurpose" name="alumnipurpose" style="font-size: 20px;" value="" readonly>
																</div>

																<div class="col-md-12">
																	<span class="large mb-1" for="document_id" class="form-control @error('alumnistatus') is-invalid @enderror" style="font-size: 26px;"><br><b>Status</b></span>
																	<div class="col-md-12" hidden><input class="form-control @error('alumnistatus') is-invalid @enderror" type="text" placeholder="Enter alumnistatus" name="alumnistatus" value=""></div>
																	<select id="alumnistatus" name="alumnistatus" class="form-control" style="font-size: 18px;">
																		<option value="" disabled>Change Status</option>
																		<option value="1" {{old('alumnistatus') == "1" ?'selected' : ''}}>Pending</option>
																		<option value="2" {{old('alumnistatus') == "2" ?'selected' : ''}}>On Process</option>
																		<option value="3" {{old('alumnistatus') == "3" ?'selected' : ''}}>Completed</option>
																		<option value="4" {{old('alumnistatus') == "4" ?'selected' : ''}}>Denied</option>
																	</select>
																	<div class="invalid-feedback">
																		Please choose status.
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<font face="Verdana" size="2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- end bootstrap model -->

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
			month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
			$(document).ready(function() {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$('#example1').DataTable({
					responsive: true,
					"bInfo": false,
					ordering: true,
					pageLength: 10,
					processing: true,
					serverSide: true,
					ajax: "{{ url('/documentrequest') }}",
					columns: [{
							"data": "id",
							render: function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							}
						},
						{
							data: 'name',
							name: 'name'
						},
						{
							data: 'action',
							name: 'action',
							orderable: false
						},
					],
					order: [
						[0, 'desc']
					]
				});
				$('#example5').DataTable({
					responsive: true,
					"bInfo": false,
					ordering: true,
					pageLength: 10,
					processing: true,
					serverSide: true,
					ajax: "{{ url('/documentrequestpurpose') }}",
					columns: [{
							"data": "id",
							render: function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							}
						},
						{
							data: 'purpose',
							name: 'purpose'
						},
						{
							data: 'proof_needed',
							name: 'proof_needed'
						},
						{
							data: 'action',
							name: 'action',
							orderable: false
						},
					],
					order: [
						[0, 'desc']
					]
				});
				$('#example2').DataTable({
					responsive: true,
					"bInfo": false,
					ordering: true,
					pageLength: 10,
					processing: true,
					serverSide: true,
					ajax: "{{ url('/documentrequestgrade11') }}",
					columns: [{
							"data": "id",
							render: function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							}
						},
						{
							data: 'name',
							name: 'documents.name'
						},
						{
							"data": "id",
							"render": function(data, type, full, meta) {
								if (full["middle_name"] == null && full["suffix"] == null)
									return full["last_name"] + ", " + full["first_name"];
								else if (full["suffix"] == null && full["middle_name"] != null)
									return full["last_name"] + ", " + full["first_name"] + " " + full["middle_name"];
								else if (full["middle_name"] == null && full["suffix"] != null)
									return full["last_name"] + ", " + full["first_name"] + " " + full["suffix"];
								else
									return full["last_name"] + ", " + full["first_name"] + " " + full["middle_name"] + " " + full["suffix"];
							}
						},
						{
							data: 'abbreviation',
							name: 'courses.abbreviation'
						},
						{
							data: 'purpose',
							name: 'document_purposes.purpose'
						},
						{
							data: 'created_atAct',
							name: 'created_at',
							"render": function(data) {
								var date = new Date(data);
								return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
							}
						},
						{
							data: 'download',
							name: 'download',
							orderable: false
						},
						{
							"data": "id",
							"render": function(data, type, full, meta) {
								if (full["status"] == 1)
									return '<span class="badge bg-secondary" style="color: white;">Pending</span>';
								else if (full["status"] == 2)
									return '<span class="badge bg-success" style="color: white;">On Process</span>';
								else if (full["status"] == 3)
									return '<span class="badge bg-success" style="color: white;">Completed</span>';
								else if (full["status"] == 4)
									return '<span class="badge bg-danger" style="color: white;">Denied</span>';
								else
									return '<span class="badge bg-secondary" style="color: white;">Undetermine</span>';
							}
						},
						{
							data: 'action',
							name: 'action',
							orderable: false
						},
					],
					order: [
						[0, 'desc']
					]
				});

				$('#example3').DataTable({
					responsive: true,
					"bInfo": false,
					ordering: true,
					pageLength: 10,
					processing: true,
					serverSide: true,
					ajax: "{{ url('/documentrequestgrade12') }}",
					columns: [{
							"data": "id",
							render: function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							}
						},
						{
							data: 'name',
							name: 'documents.name'
						},
						{
							"data": "id",
							"render": function(data, type, full, meta) {
								if (full["middle_name"] == null && full["suffix"] == null)
									return full["last_name"] + ", " + full["first_name"];
								else if (full["suffix"] == null && full["middle_name"] != null)
									return full["last_name"] + ", " + full["first_name"] + " " + full["middle_name"];
								else if (full["middle_name"] == null && full["suffix"] != null)
									return full["last_name"] + ", " + full["first_name"] + " " + full["suffix"];
								else
									return full["last_name"] + ", " + full["first_name"] + " " + full["middle_name"] + " " + full["suffix"];
							}
						},
						{
							data: 'abbreviation',
							name: 'courses.abbreviation'
						},
						{
							data: 'purpose',
							name: 'document_purposes.purpose'
						},
						{
							data: 'created_atAct',
							name: 'created_at',
							"render": function(data) {
								var date = new Date(data);
								return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
							}
						},
						{
							data: 'download',
							name: 'download',
							orderable: false
						},
						{
							"data": "id",
							"render": function(data, type, full, meta) {
								if (full["status"] == 1)
									return '<span class="badge bg-secondary" style="color: white;">Pending</span>';
								else if (full["status"] == 2)
									return '<span class="badge bg-success" style="color: white;">On Process</span>';
								else if (full["status"] == 3)
									return '<span class="badge bg-success" style="color: white;">Completed</span>';
								else if (full["status"] == 4)
									return '<span class="badge bg-danger" style="color: white;">Denied</span>';
								else
									return '<span class="badge bg-secondary" style="color: white;">Undetermine</span>';
							}
						},
						{
							data: 'action',
							name: 'action',
							orderable: false
						},
					],
					order: [
						[0, 'desc']
					]
				});

				$('#example4').DataTable({
					responsive: true,
					"bInfo": false,
					ordering: true,
					pageLength: 10,
					processing: true,
					serverSide: true,
					ajax: "{{ url('/documentrequestalumni') }}",
					columns: [{
							"data": "id",
							render: function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							}
						},
						{
							data: 'name',
							name: 'documents.name'
						},
						{
							"data": "id",
							"render": function(data, type, full, meta) {
								if (full["middle_name"] == null && full["suffix"] == null)
									return full["last_name"] + ", " + full["first_name"];
								else if (full["suffix"] == null && full["middle_name"] != null)
									return full["last_name"] + ", " + full["first_name"] + " " + full["middle_name"];
								else if (full["middle_name"] == null && full["suffix"] != null)
									return full["last_name"] + ", " + full["first_name"] + " " + full["suffix"];
								else
									return full["last_name"] + ", " + full["first_name"] + " " + full["middle_name"] + " " + full["suffix"];
							}
						},
						{
							data: 'abbreviation',
							name: 'courses.abbreviation'
						},
						{
							data: 'purpose',
							name: 'document_purposes.purpose'
						},
						{
							data: 'created_atAct',
							name: 'created_at',
							"render": function(data) {
								var date = new Date(data);
								return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
							}
						},
						{
							data: 'download',
							name: 'download',
							orderable: false
						},
						{
							"data": "id",
							"render": function(data, type, full, meta) {
								if (full["status"] == 1)
									return '<span class="badge bg-secondary" style="color: white;">Pending</span>';
								else if (full["status"] == 2)
									return '<span class="badge bg-success" style="color: white;">On Process</span>';
								else if (full["status"] == 3)
									return '<span class="badge bg-success" style="color: white;">Completed</span>';
								else if (full["status"] == 4)
									return '<span class="badge bg-danger" style="color: white;">Denied</span>';
								else
									return '<span class="badge bg-secondary" style="color: white;">Undetermine</span>';
							}
						},
						{
							data: 'action',
							name: 'action',
							orderable: false
						},
					],
					order: [
						[0, 'desc']
					]
				});
			});



			function editFuncgrade11(id) {
				$('#Grade11FormUpdate').trigger("reset").removeClass('was-validated');
				document.getElementById('whoops-update').style.display = 'none';
				$.ajax({
					type: "POST",
					url: "{{ url('/showrequestadmin/') }}",
					data: {
						id: id
					},
					dataType: 'json',
					success: function(res) {
						$('#Grade11Modal-update').html("Edit Grade 11 Document");
						$('#Grade11-modal-update').modal('show');
						$('#id-update-grade11').val(res.id);
						if (res.suffix == null && res.middle_name == null) {
							document.getElementById('grade11last_name').innerHTML = res.last_name;
							document.getElementById('grade11first_name').innerHTML = res.first_name;
						} else if (res.suffix == null && res.middle_name != null) {
							document.getElementById('grade11last_name').innerHTML = res.last_name;
							document.getElementById('grade11first_name').innerHTML = res.first_name;
							document.getElementById('grade11middle_name').innerHTML = res.middle_name;
						} else if (res.middle_name == null && res.suffix == null) {
							document.getElementById('grade11last_name').innerHTML = res.last_name;
							document.getElementById('grade11first_name').innerHTML = res.first_name;
							document.getElementById('grade11suffix').innerHTML = res.suffix;
						} else {
							document.getElementById('grade11last_name').innerHTML = res.last_name;
							document.getElementById('grade11first_name').innerHTML = res.first_name;
							document.getElementById('grade11middle_name').innerHTML = res.middle_name;
							document.getElementById('grade11suffix').innerHTML = res.suffix;
						}
						$('#grade11level').val(res.gradelevel);
						$('#grade11document').val(res.name);
						$('#grade11purpose').val(res.purpose);
						$('#grade11status').val(res.status);
					}
				});
			}

			$('#Grade11FormUpdate').submit(function(e) {
				e.preventDefault();
				if ($('#Grade11FormUpdate')[0].checkValidity() === false) {
					e.stopPropagation();
				} else {
					var formData = new FormData(this);
					$(":submit").attr("disabled", true);
					$.ajax({
						type: 'POST',
						url: "{{ url('/updaterequestdocadmingrade11')}}/",
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success: (data) => {
							$("#Grade11-modal-update").modal('hide');
							var oTable = $('#example2').dataTable();
							oTable.fnDraw(false);
							$("#btn-save").html('Submit');
							$("#btn-save").attr("disabled", false);
							Swal.fire({
								icon: 'success',
								title: 'Success.',
								text: 'Grade 11 document has been updated successfully',
							});
							$(":submit").removeAttr("disabled");
						},
						error: function(xhr) {
							$('#validation-errors-update').html('');
							document.getElementById('whoops-update').style.display = 'block';
							if (xhr.responseJSON.error != undefined) {
								$("#validation-errors-update").html("");
								$('#validation-errors-update').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
							}
							$.each(xhr.responseJSON.errors, function(key, value) {
								$('#validation-errors-update').append('&emsp;<li>' + value + '</li>');
							});
							$(":submit").removeAttr("disabled");
						}
					});
				}
				$('#Grade11FormUpdate').addClass('was-validated');

			});

			function editFuncgrade12(id) {
				$('#Grade12FormUpdate').trigger("reset").removeClass('was-validated');
				document.getElementById('whoops-update').style.display = 'none';
				$.ajax({
					type: "POST",
					url: "{{ url('/showrequestadmin/') }}",
					data: {
						id: id
					},
					dataType: 'json',
					success: function(res) {
						$('#Grade12Modal-update').html("Edit Grade 12 Document");
						$('#Grade12-modal-update').modal('show');
						$('#id-update-grade12').val(res.id);
						if (res.suffix == null && res.middle_name == null) {
							document.getElementById('grade12last_name').innerHTML = res.last_name;
							document.getElementById('grade12first_name').innerHTML = res.first_name;
						} else if (res.suffix == null && res.middle_name != null) {
							document.getElementById('grade12last_name').innerHTML = res.last_name;
							document.getElementById('grade12first_name').innerHTML = res.first_name;
							document.getElementById('grade12middle_name').innerHTML = res.middle_name;
						} else if (res.middle_name == null && res.suffix == null) {
							document.getElementById('grade12last_name').innerHTML = res.last_name;
							document.getElementById('grade12first_name').innerHTML = res.first_name;
							document.getElementById('grade12suffix').innerHTML = res.suffix;
						} else {
							document.getElementById('grade12last_name').innerHTML = res.last_name;
							document.getElementById('grade12first_name').innerHTML = res.first_name;
							document.getElementById('grade12middle_name').innerHTML = res.middle_name;
							document.getElementById('grade12suffix').innerHTML = res.suffix;
						}
						$('#grade12level').val(res.gradelevel);
						$('#grade12document').val(res.name);
						$('#grade12purpose').val(res.purpose);
						$('#grade12status').val(res.status);
					}
				});
			}

			$('#Grade12FormUpdate').submit(function(e) {
				e.preventDefault();
				if ($('#Grade12FormUpdate')[0].checkValidity() === false) {
					e.stopPropagation();
				} else {
					var formData = new FormData(this);
					$(":submit").attr("disabled", true);
					$.ajax({
						type: 'POST',
						url: "{{ url('/updaterequestdocadmingrade12')}}/",
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success: (data) => {
							$("#Grade12-modal-update").modal('hide');
							var oTable = $('#example3').dataTable();
							oTable.fnDraw(false);
							$("#btn-save").html('Submit');
							$("#btn-save").attr("disabled", false);
							Swal.fire({
								icon: 'success',
								title: 'Success.',
								text: 'Grade 12 document has been updated successfully',
							});
							$(":submit").removeAttr("disabled");
						},
						error: function(xhr) {
							$('#validation-errors-update').html('');
							document.getElementById('whoops-update').style.display = 'block';
							if (xhr.responseJSON.error != undefined) {
								$("#validation-errors-update").html("");
								$('#validation-errors-update').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
							}
							$.each(xhr.responseJSON.errors, function(key, value) {
								$('#validation-errors-update').append('&emsp;<li>' + value + '</li>');
							});
							$(":submit").removeAttr("disabled");
						}
					});
				}
				$('#Grade12FormUpdate').addClass('was-validated');

			});


			function editFuncalumni(id) {
				$('#AlumniFormUpdate').trigger("reset").removeClass('was-validated');
				document.getElementById('whoops-update').style.display = 'none';
				$.ajax({
					type: "POST",
					url: "{{ url('/showrequestadmin/') }}",
					data: {
						id: id
					},
					dataType: 'json',
					success: function(res) {
						$('AlumniModal-update').html("Edit Grade 12 Document");
						$('Alumni-modal-update').modal('show');
						$('#id-update-alumni').val(res.id);
						if (res.suffix == null && res.middle_name == null) {
							document.getElementById('alumnilast_name').innerHTML = res.last_name;
							document.getElementById('alumnifirst_name').innerHTML = res.first_name;
						} else if (res.suffix == null && res.middle_name != null) {
							document.getElementById('alumnilast_name').innerHTML = res.last_name;
							document.getElementById('alumnifirst_name').innerHTML = res.first_name;
							document.getElementById('alumnimiddle_name').innerHTML = res.middle_name;
						} else if (res.middle_name == null && res.suffix == null) {
							document.getElementById('alumnilast_name').innerHTML = res.last_name;
							document.getElementById('alumnifirst_name').innerHTML = res.first_name;
							document.getElementById('alumnisuffix').innerHTML = res.suffix;
						} else {
							document.getElementById('alumnilast_name').innerHTML = res.last_name;
							document.getElementById('alumnifirst_name').innerHTML = res.first_name;
							document.getElementById('alumnimiddle_name').innerHTML = res.middle_name;
							document.getElementById('alumnisuffix').innerHTML = res.suffix;
						}
						$('#alumnilevel').val(res.gradelevel);
						$('#alumnidocument').val(res.name);
						$('#alumnipurpose').val(res.purpose);
						$('#alumnistatus').val(res.status);
					}
				});
			}

			$('#AlumniFormUpdate').submit(function(e) {
				e.preventDefault();
				if ($('#AlumniFormUpdate')[0].checkValidity() === false) {
					e.stopPropagation();
				} else {
					var formData = new FormData(this);
					$(":submit").attr("disabled", true);
					$.ajax({
						type: 'POST',
						url: "{{ url('/updaterequestdocadminalumni')}}/",
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success: (data) => {
							$("Alumni-modal-update").modal('hide');
							var oTable = $('#example4').dataTable();
							oTable.fnDraw(false);
							$("#btn-save").html('Submit');
							$("#btn-save").attr("disabled", false);
							Swal.fire({
								icon: 'success',
								title: 'Success.',
								text: 'Alumni document has been updated successfully',
							});
							$(":submit").removeAttr("disabled");
						},
						error: function(xhr) {
							$('#validation-errors-update').html('');
							document.getElementById('whoops-update').style.display = 'block';
							if (xhr.responseJSON.error != undefined) {
								$("#validation-errors-update").html("");
								$('#validation-errors-update').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
							}
							$.each(xhr.responseJSON.errors, function(key, value) {
								$('#validation-errors-update').append('&emsp;<li>' + value + '</li>');
							});
							$(":submit").removeAttr("disabled");
						}
					});
				}
				$('#AlumniFormUpdate').addClass('was-validated');

			});

			function add() {
				$('#DocumentForm').trigger("reset").removeClass('was-validated');
				document.getElementById('whoops').style.display = 'none';
				$('#DocumentModal').html("Add Document");
				$('#Document-modal').modal('show');
				$('#id').val('');
			}

			function viewFunc(id) {
				$.ajax({
					type: "POST",
					url: "{{ url('/viewdocument') }}",
					data: {
						id: id
					},
					dataType: 'json',
					success: function(res) {
						$('#DocumentModal-view').html("View Document");
						$('#Document-modal-view').modal('show');
						document.getElementById('document_name-view').innerHTML = res.name;
						var date = new Date(res.created_at);
						var created = month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
						document.getElementById('document_created-view').innerHTML = created;
					}
				});
			}

			function editFunc(id) {
				$('#DocumentFormUpdate').trigger("reset").removeClass('was-validated');
				document.getElementById('whoops-update').style.display = 'none';
				$.ajax({
					type: "POST",
					url: "{{ url('/showdocument') }}",
					data: {
						id: id
					},
					dataType: 'json',
					success: function(res) {
						$('#DocumentModal-update').html("Edit Document");
						$('#Document-modal-update').modal('show');
						$('#id-update').val(res.id);
						$('#document_name-update').val(res.name);
					}
				});
			}

			function deleteFunc(id) {
				$.ajax({
					type: "POST",
					url: "{{ url('/document/delete') }}",
					data: {
						id: id
					},
					dataType: 'json',
					success: function(res) {
						$('#Document-modal-delete').modal('show');
						$('#id-delete').val(res.id);
						document.getElementById('document-delete').innerHTML = res.name;
					}
				});
			}

			$('#DocumentForm').submit(function(e) {
				e.preventDefault();
				if ($('#DocumentForm')[0].checkValidity() === false) {
					e.stopPropagation();
				} else {
					var formData = new FormData(this);
					$(":submit").attr("disabled", true);
					$.ajax({
						type: 'POST',
						url: "{{ url('/add/document')}}",
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success: (data) => {
							$("#Document-modal").modal('hide');
							var oTable = $('#example1').dataTable();
							oTable.fnDraw(false);
							$("#btn-save").html('Submit');
							$("#btn-save").attr("disabled", false);
							Swal.fire({
								icon: 'success',
								title: 'Success.',
								text: 'Document has been added successfully',
							});
							$(":submit").removeAttr("disabled");
						},
						error: function(xhr) {
							$('#validation-errors').html('');
							document.getElementById('whoops').style.display = 'block';
							if (xhr.responseJSON.error != undefined) {
								$("#validation-errors").html("");
								$('#validation-errors').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
							}
							$.each(xhr.responseJSON.errors, function(key, value) {
								$('#validation-errors').append('&emsp;<li>' + value + '</li>');
							});
							$(":submit").removeAttr("disabled");
						}
					});
				}
				$('#DocumentForm').addClass('was-validated');

			});

			$('#DocumentFormUpdate').submit(function(e) {
				e.preventDefault();
				if ($('#DocumentFormUpdate')[0].checkValidity() === false) {
					e.stopPropagation();
				} else {
					var formData = new FormData(this);
					$(":submit").attr("disabled", true);
					$.ajax({
						type: 'POST',
						url: "{{ url('/updatedocument')}}/",
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success: (data) => {
							$("#Document-modal-update").modal('hide');
							var oTable = $('#example1').dataTable();
							oTable.fnDraw(false);
							$("#btn-save").html('Submit');
							$("#btn-save").attr("disabled", false);
							Swal.fire({
								icon: 'success',
								title: 'Success.',
								text: 'Document has been updated successfully',
							});
							$(":submit").removeAttr("disabled");
						},
						error: function(xhr) {
							$('#validation-errors-update').html('');
							document.getElementById('whoops-update').style.display = 'block';
							if (xhr.responseJSON.error != undefined) {
								$("#validation-errors-update").html("");
								$('#validation-errors-update').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
							}
							$.each(xhr.responseJSON.errors, function(key, value) {
								$('#validation-errors-update').append('&emsp;<li>' + value + '</li>');
							});
							$(":submit").removeAttr("disabled");
						}
					});
				}
				$('#DocumentFormUpdate').addClass('was-validated');

			});

			$('#DocumentFormDelete').submit(function(e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					type: 'POST',
					url: "{{ url('/document/delete')}}/",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: (data) => {
						$("#Document-modal-delete").modal('hide');
						var oTable = $('#example1').dataTable();
						oTable.fnDraw(false);
						$("#btn-save").html('Submit');
						$("#btn-save").attr("disabled", false);
						Swal.fire({
							icon: 'success',
							title: 'Success.',
							text: 'Document has been deleted successfully',
						});
					},
					error: function(data) {
						console.log(data);
					}
				});
			});

			// PURPOSE

			function addPurpose() {
				$('#PurposeForm').trigger("reset").removeClass('was-validated');
				document.getElementById('whoops').style.display = 'none';
				$('#PurposeModal').html("Add Purpose");
				$('#Purpose-modal').modal('show');
				$('#id').val('');
			}

			function viewFuncPurpose(id) {
				$.ajax({
					type: "POST",
					url: "{{ url('/viewpurpose') }}",
					data: {
						id: id
					},
					dataType: 'json',
					success: function(res) {
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

			function editFuncPurpose(id) {
				$('#PurposeFormUpdate').trigger("reset").removeClass('was-validated');
				document.getElementById('whoops-update').style.display = 'none';
				$.ajax({
					type: "POST",
					url: "{{ url('/showpurpose') }}",
					data: {
						id: id
					},
					dataType: 'json',
					success: function(res) {
						$('#PurposeModal-update').html("Edit Purpose");
						$('#Purpose-modal-update').modal('show');
						$('#id-update-purpose').val(res.id);
						$('#purpose-update').val(res.purpose);
						$('#proof_needed-update').val(res.proof_needed);
					}
				});
			}

			function deleteFuncPurpose(id) {
				$.ajax({
					type: "POST",
					url: "{{ url('/deletedocumentpurpose') }}",
					data: {
						id: id
					},
					dataType: 'json',
					success: function(res) {
						$('#Purpose-modal-delete').modal('show');
						$('#id-delete-purpose').val(res.id);
						document.getElementById('purpose-delete').innerHTML = res.purpose;
					}
				});
			}

			$('#PurposeForm').submit(function(e) {
				e.preventDefault();
				if ($('#PurposeForm')[0].checkValidity() === false) {
					e.stopPropagation();
				} else {
					var formData = new FormData(this);
					$(":submit").attr("disabled", true);
					$.ajax({
						type: 'POST',
						url: "{{ url('/add/purpose')}}",
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success: (data) => {
							$("#Purpose-modal").modal('hide');
							var oTable = $('#example5').dataTable();
							oTable.fnDraw(false);
							$("#btn-save").html('Submit');
							$("#btn-save").attr("disabled", false);
							Swal.fire({
								icon: 'success',
								title: 'Success.',
								text: 'Purpose has been added successfully',
							});
							$(":submit").removeAttr("disabled");
						},
						error: function(xhr) {
							$('#validation-errors').html('');
							document.getElementById('whoops').style.display = 'block';
							if (xhr.responseJSON.error != undefined) {
								$("#validation-errors").html("");
								$('#validation-errors').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
							}
							$.each(xhr.responseJSON.errors, function(key, value) {
								$('#validation-errors').append('&emsp;<li>' + value + '</li>');
							});
							$(":submit").removeAttr("disabled");
						}
					});
				}
				$('#PurposeForm').addClass('was-validated');

			});

			$('#PurposeFormUpdate').submit(function(e) {
				e.preventDefault();
				if ($('#PurposeFormUpdate')[0].checkValidity() === false) {
					e.stopPropagation();
				} else {
					var formData = new FormData(this);
					$(":submit").attr("disabled", true);
					$.ajax({
						type: 'POST',
						url: "{{ url('/updatepurpose')}}/",
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success: (data) => {
							$("#Purpose-modal-update").modal('hide');
							var oTable = $('#example5').dataTable();
							oTable.fnDraw(false);
							$("#btn-save").html('Submit');
							$("#btn-save").attr("disabled", false);
							Swal.fire({
								icon: 'success',
								title: 'Success.',
								text: 'Purpose has been updated successfully',
							});
							$(":submit").removeAttr("disabled");
						},
						error: function(xhr) {
							$('#validation-errors-update').html('');
							document.getElementById('whoops-update').style.display = 'block';
							if (xhr.responseJSON.error != undefined) {
								$("#validation-errors-update").html("");
								$('#validation-errors-update').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
							}
							$.each(xhr.responseJSON.errors, function(key, value) {
								$('#validation-errors-update').append('&emsp;<li>' + value + '</li>');
							});
							$(":submit").removeAttr("disabled");
						}
					});
				}
				$('#PurposeFormUpdate').addClass('was-validated');

			});

			$('#PurposeFormDelete').submit(function(e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					type: 'POST',
					url: "{{ url('/purpose/delete')}}/",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: (data) => {
						$("#Purpose-modal-delete").modal('hide');
						var oTable = $('#example5').dataTable();
						oTable.fnDraw(false);
						$("#btn-save").html('Submit');
						$("#btn-save").attr("disabled", false);
						Swal.fire({
							icon: 'success',
							title: 'Success.',
							text: 'Purpose has been deleted successfully',
						});
					},
					error: function(data) {
						console.log(data);
					}
				});
			});
		</script>
</main>