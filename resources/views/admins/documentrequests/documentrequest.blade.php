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

	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-jquery-1.12.1.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-rowreorder-1.2.8.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-responsive-2.3.0.css') }}">
	<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-jquery-1.12.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-rowreorder-1.2.8.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-responsive-2.3.0.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table1 = $('#example1').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table1 );
        } );
        $(document).ready(function() {
            var table2 = $('#example2').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table2 );
        } );
        $(document).ready(function() {
            var table3 = $('#example3').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table3 );
        } );
		$(document).ready(function() {
            var table4 = $('#example4').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table4 );
        } );
		$(document).ready(function() {
            var table5 = $('#example5').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table5 );
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
	                        <div class="card mb-4">
	                            <div class="border-start-lg border-start-yellow" style="color: white; background-color: #B9B32E; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
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
	            <div class="px-2 mt-2 right-to-left">
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
												<div class="card-header" style="font-size: 20px;">Print Document Request Report</div><br>
												<form action="{{route('admin.downloadpdfdoc')}}" method="POST">
													@csrf
													<div class="row" style="padding: 40px;">
														<div class="col-md-2">
															<b>From:</b>
															<input type="date" name="dateFrom" class="form-control" value="<?php echo date('Y-m-d'); ?>" /><br/>
														</div>
														<div class="col-md-2">
															<b>To:</b>
															<input type="date" name="dateTo" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
														</div>
														<div class="col-md-3">
															<br/>
															<input type="submit" name="submit" class="btn btn-primary" value="Print"/></input>
														</div>
													</div>
												</form>
											</div>
											<br><br>
	                                        <!-- Table of Documents  -->
	                                        <div class="card-header" style="font-size: 20px;">
	                                        	Table of Available Documents
												<a id="addDocument" href="{{route('document.add')}}" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#createModalDocument"><i class="fas fa-user-plus"></i> Add Document</a>
												<br/><br/>
												<div id="createModalDocument" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content border-start-lg border-start-yellow">
														</div>
													</div>
												</div>
											</div>
                                            @if($documents == NULL)
                                                <br><br>
                                                <div class="alert alert-danger"><em>No records found.</em></div>
                                            @else 
                                                <br>
                                                <div class="table-responsive table-billing-history">
                                                    <table id="example1" class="display table-bordered table-striped table-hover" style="width:100%">
                                                        <thead class="table-success">
                                                             <tr>
                                                                <th class="border-gray-200" scope="col">#</th>
                                                                <th class="border-gray-200" scope="col">Document Name</th>
                                                                <th class="border-gray-200" scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($documents as $document)
                                                                <?php $i=1;?>
                                                                    <tr id="document{{$document -> id}}">
                                                                        <td class="text-center">{{$document -> id}}</td>
                                                                        <td>{{$document -> name}}</td>
                                                                        <td>
																			<a class="btn btn-success btn-md" href="/viewdocument/{{$document->id}}" data-toggle="modal" data-target="#modal-view-{{$document->id}}"><i class="fa-solid fa-eye"></i> View</a>
																			<a class="btn btn-warning btn-md" href="/showdocument/{{$document->id}}" data-toggle="modal" onclick="editDoc(this)" data-id="{{ $document->id }}" data-target="#editModal{{ $document->id }}"><i class="fas fa-edit"></i> Update</a>
																			<button class="btn btn-danger btn-md" onclick="deleteItem(this)" data-id="{{ $document->id }}"><i class="fas fa-trash-alt"></i> Delete</button>
                                                                        </td> 
                                                                    </tr>
																	<!-- view document -->
																	<div id="modal-view-{{ $document->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
																		<div class="modal-dialog modal-lg" role="document">
																			<div class="modal-content border-start-lg border-start-yellow">
																			</div>
																		</div>
																	</div>
																	<!-- edit document -->
																	<div id="editModal{{ $document->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
																		<div class="modal-dialog modal-lg" role="document">
																			<div class="modal-content border-start-lg border-start-yellow">
																			</div>
																		</div>
																	</div>
                                                            @endforeach 
                                                        </tbody>
                                                    </table>
                                                </div>    
                                            @endif 
											<br><br>
											<!-- Table of Purposes -->
	                                        <div class="card-header" style="font-size: 20px;">
	                                        	Table of Purposes
												<a id="addPurpose" href="{{route('purpose.add')}}" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#createModalPurpose"><i class="fas fa-user-plus"></i> Add Purpose</a>
												<br/><br/>
												<div id="createModalPurpose" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content border-start-lg border-start-yellow">
														</div>
													</div>
												</div>
	                                    	</div>
                                            @if($documentpurposes == NULL)
                                                <br><br>
                                                <div class="alert alert-danger"><em>No records found.</em></div>
                                            @else 
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
                                                        <tbody>
                                                            @foreach ($documentpurposes as $documentpurpose)
                                                                <?php $i=1;?>
                                                                    <tr id="documentpurpose{{$documentpurpose -> id}}">
                                                                        <td class="text-center">{{$documentpurpose -> id}}</td>
                                                                        <td>{{$documentpurpose -> purpose}}</td>
																		<td>{{$documentpurpose -> proof_needed}}</td>
                                                                        <td>
																			<a class="btn btn-success btn-md" href="/viewpurpose/{{$documentpurpose->id}}" data-toggle="modal" data-target="#modal-view-{{$documentpurpose->id}}"><i class="fa-solid fa-eye"></i> View</a>
																			<a class="btn btn-warning btn-md" href="/showpurpose/{{$documentpurpose->id}}" data-toggle="modal" onclick="editPur(this)" data-id="{{ $documentpurpose->id }}" data-target="#editModal{{ $documentpurpose->id }}"><i class="fas fa-edit"></i> Update</a>
																			<button class="btn btn-danger btn-md" onclick="deleteItemPurpose(this)" data-id="{{ $documentpurpose->id }}"><i class="fas fa-trash-alt"></i> Delete</button>
                                                                        </td> 
                                                                    </tr>
																	<!-- view purpose -->
																	<div id="modal-view-{{ $documentpurpose->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
																		<div class="modal-dialog modal-lg" role="document">
																			<div class="modal-content border-start-lg border-start-yellow">
																			</div>
																		</div>
																	</div>
																	<!-- edit purpose -->
																	<div id="editModal{{ $documentpurpose->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
																		<div class="modal-dialog modal-lg" role="document">
																			<div class="modal-content border-start-lg border-start-yellow">
																			</div>
																		</div>
																	</div>
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
																					<a class="btn btn-success btn-md" href="/viewfileDocument/{{$request->id}}"><i class="fa-solid fa-eye"></i> View</a>
																					<a class="btn btn-warning btn-md" href="/showrequestadmin/{{$request->id}}" data-toggle="modal" data-target="#editModal{{ $request->id }}"><i class="fas fa-edit"></i> Update</a>
																				</td> 
																			</tr>
																			<!-- edit request -->
																			<div id="editModal{{ $request->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
																				<div class="modal-dialog modal-lg" role="document">
																					<div class="modal-content border-start-lg border-start-yellow">
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
																					<a class="btn btn-success btn-md" href="/viewfileDocument/{{$request->id}}"><i class="fa-solid fa-eye"></i> View</a>
																					<a class="btn btn-warning btn-md" href="/showrequestadmin/{{$request->id}}" data-toggle="modal" data-target="#editModal{{ $request->id }}"><i class="fas fa-edit"></i> Update</a>
																				</td> 
																			</tr>
																			<!-- edit request -->
																			<div id="editModal{{ $request->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
																				<div class="modal-dialog modal-lg" role="document">
																					<div class="modal-content border-start-lg border-start-yellow">
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
																					<a class="btn btn-success btn-md" href="/viewfileDocument/{{$request->id}}"><i class="fa-solid fa-eye"></i> View</a>
																					<a class="btn btn-warning btn-md" href="/showrequestadmin/{{$request->id}}" data-toggle="modal" data-target="#editModal{{ $request->id }}"><i class="fas fa-edit"></i> Update</a>
																				</td> 
																			</tr>
																			<!-- edit request -->
																			<div id="editModal{{ $request->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
																				<div class="modal-dialog modal-lg" role="document">
																					<div class="modal-content border-start-lg border-start-yellow">
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
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
		  editDoc(e);
		  editPur(e);
          deleteItem(e);
		  deleteItemPurpose(e);

        });
		function editDoc(e){
			id = e.getAttribute('data-id');
		}
		function editPur(e){
			id = e.getAttribute('data-id');
		}
        //delete document
        function deleteItem(e){

            let id = e.getAttribute('data-id');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    if (result.isConfirmed){

                        $.ajax({
                            type:'PUT',
                            url:'{{url("/document/delete")}}/' +id,
                            data:{
                                "_token": "{{ csrf_token() }}",
                            },
                            success:function(data) {
                                if (data.success){
                                    
                                    swalWithBootstrapButtons.fire(
                                        'Deleted!',
                                        'A document has been deleted successfully.',
                                        "success"
                                    );
									$("#reload").load(location.href + " #reload");
                                    $("#document"+id+"").remove();
                                }

                            }
                        });

                    }

                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        '',
                        'error'
                    );
                }
            });

            }

			//delete Purpose
			function deleteItemPurpose(e){

				let id = e.getAttribute('data-id');

				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
						confirmButton: 'btn btn-success',
						cancelButton: 'btn btn-danger'
					},
					buttonsStyling: true
				});

				swalWithBootstrapButtons.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Yes, delete it!',
					cancelButtonText: 'No, cancel!',
					reverseButtons: true
				}).then((result) => {
					if (result.value) {
						if (result.isConfirmed){

							$.ajax({
								type:'PUT',
								url:'{{url("/purpose/delete")}}/' +id,
								data:{
									"_token": "{{ csrf_token() }}",
								},
								success:function(data) {
									if (data.success){
										
										swalWithBootstrapButtons.fire(
											'Deleted!',
											'A purpose has been deleted successfully.',
											"success"
										);
										$("#documentpurpose"+id+"").remove();
									}

								}
							});

						}

					} else if (
						result.dismiss === Swal.DismissReason.cancel
					) {
						swalWithBootstrapButtons.fire(
							'Cancelled',
							'',
							'error'
						);
					}
				});

				}
    </script>

</main>
<br><br><br><br>