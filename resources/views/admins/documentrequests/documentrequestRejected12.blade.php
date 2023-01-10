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
            var table = $('#example1').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
</head>

<body style="font-family: Arial;"> 

	
	<section>
		<div>
			<div>
		        <!-- boxes -->
		        <div class="container-xl px-4 mt-4 left-to-right">
	                <!-- page navigation-->
	                <hr class="mt-0 mb-4">
	                <div class="row">
	                    <div class="col-lg-4 mb-4">	
	                        <!-- Account details card-->
	                        <div class="card mb-4">
	                            <div class="border-start-lg border-start-success" style="color: white; background-color: red; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
	                                <div class="card-header" style="font-size: 20px; font-weight: 800;">Denied Document Request</div>
	                                <div class="card-body">
										<br>
	                                    <div style="padding: 0px 40px 10px 40px">
						                     <div style="font-size: 40px;" ><i class="fas fa-file-alt"></i>  {{ $requests->count() }} </div>
	                                    </div>
	                                </div>
	                            </div>
	                         </div>
	                     </div>
	                </div>
	            </div>
				
		        
				<!-- tables need join -->
				<!-- tables -->
				<div class="container-xl px-4 mt-4 left-to-right">
					<hr class="mt-0 mb-4">
	                <div class="row">
					
	                        <!-- Account details card-->
	                        <div class="card border-start-lg border-start-success">
								<div class="tabs">
								    <input type="radio" name="tabs" id="tabone" checked="checked">
								    <label for="tabone">Grade 12</label>
								    <div class="tab" style="height: auto;">
								      	<div class="card-header"><b>Requested Documents</b></div>
										    <div class="card-body p-0">
											    <!-- Announcements table-->
											    @if($requests->count() == 0)
													<br><br>
													<div class="alert alert-danger"><em>No records found.</em></div>
												@else 
											        <div class="table-responsive table-billing-history">
												        <table id="example1" class="display table-bordered table-striped table-hover" style="width:100%">
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
																					<a class="btn btn-success btn-md" href="/viewfileDocument/{{$request->id}}"><i class="fas fa-eye"></i> View</a>
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
</main>
<br><br><br><br>