@include('partials.adminheader')
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
            var table = $('#example1').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
        $(document).ready(function() {
            var table = $('#example3').DataTable( {
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
	                            <div class="card border-start-lg border-start-yellow" style="color: white; background-color: #B9B32E;">
	                                <div class="card-header" style="font-size: 20px; font-weight: 800;">Requested Documents</div>
	                                <div class="card-body">
										<br>
	                                    <div style="padding: 40px 40px 10px 40px">
						                     <div style="font-size: 20px;" ><i class="fas fa-file-alt"></i>  {{ $requests->count() }} </div>
	                                    </div>
	                                </div>
	                            </div>
	                         </div>
	                     </div>
	                </div>
	            </div>
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
		        <!-- create new documents and print -->
	            <div class="container-xl px-4 mt-4 right-to-left">
	                <!-- page navigation-->
					<h3 style="font-size: 28px; font-weight: 800;">Document for Request</h3>
	                <hr class="mt-0 mb-4">
	                <div class="row">
	                    
	                        <!-- Account details card-->
	                        <div class="card mb-4">
	                            <div class="card border-start-lg border-start-yellow">
	                                <div class="card-header"></div>
	                                <div class="card-body">
										<br>
	                                    <div style="padding: 10px 40px 10px 40px">
	                                        <!-- print document -->
	                                        <div class="card-header" style="font-size: 20px;">Print Document Request Report</div><br>
	                                        <form action="{{route('admin.downloadpdfdoc')}}" method="POST">
												@csrf
												<b>From:</b>
												<input type="date" name="dateFrom" value="<?php echo date('Y-m-d'); ?>" />
												<b>To:</b>
												<input type="date" name="dateTo" value="<?php echo date('Y-m-d'); ?>" />
												<input type="submit" name="submit" class="btn btn-primary" value="Print"/></input>
											</form>
											<br><br>

	                                    	<form method="POST" action="{{ route('document.store') }}">
												@csrf
		                                        <div class="mb-3">
		                                            <label class="large" for="name" style="font-size: 20px;">Add document</label>
		                                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" style="font-size: 16px;" placeholder="Document Name" name="name" value="{{ old('name') }}">
		                                        </div><br>
		                                        <!-- Save changes button-->
		                                        <input type="submit" class="btn btn-primary" value="Submit">
	                                        </form><br>
	                                        <!-- Table of Documents  -->
	                                        <div class="card-header" style="font-size: 20px;">
	                                        	Table of Available Documents
	                                    	</div><br>

											@if ($message = Session::get('document'))
												<div class="alert alert-success alert-block">
													<button type="button" class="close" data-dismiss="alert">×</button>
													<strong>{{ $message }}</strong>
												</div>
											@endif
                                            @if($documents == NULL)
                                                <br><br>
                                                <div class="alert alert-danger"><em>No records found.</em></div>
                                            @else 
                                                <br>
                                                <div class="table-responsive table-billing-history">
                                                    <table id="example1" class="display nowrap" style="width:100%">
                                                        <thead>
                                                             <tr>
                                                                <th class="border-gray-200" scope="col">#</th>
                                                                <th class="border-gray-200" scope="col">Document Name</th>
                                                                <th class="border-gray-200" scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($documents as $document)
                                                                <?php $i=1;?>
                                                                    <tr>
                                                                        <td class="text-center">{{$document -> id}}</td>
                                                                        <td>{{$document -> name}}</td>
                                                                        <td>
																			<a class="btn btn-success btn-md" href="/viewdocument/{{$document->id}}"><i class="fas fa-eye"></i> View</a>
																			<a class="btn btn-warning btn-md" href="/showdocument/{{$document->id}}"><i class="fas fa-edit"></i> Update</a>
																			<a class="btn btn-danger btn-md" href="{{route('admin.deletedocument', $document->id)}}"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                        </td> 
                                                                    </tr>
                                                            @endforeach 
                                                        </tbody>
                                                    </table>
                                                </div>    
                                            @endif 
											<br><br>
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
	                        <div class="card mb-4 border-start-lg border-start-success">
								<div class="tabs">
								    <input type="radio" name="tabs" id="tabone" checked="checked">
								    <label for="tabone">Grade 11</label>
								    <div class="tab">
								      	<div class="card-header">Requested Documents</div>
										    <div class="card-body p-0">
											    <!-- Announcements table-->
											    @if($requests->count() == 0)
													<br><br>
													<div class="alert alert-danger"><em>No records found.</em></div>
												@else 
											        <div class="table-responsive table-billing-history">
												        <table id="example2" class="display nowrap" style="width:100%">
												            <thead>
												                <tr>
												                    <th class="border-gray-200" scope="col">#</th>
												                    <th class="border-gray-200" scope="col">Document</th>
												                    <th class="border-gray-200" scope="col">Student Name</th>
												                    <th class="border-gray-200" scope="col">Course</th>
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
																				<td>{{$requested_at}}</td>
																				<td>
																				{{$request -> file}}
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
																					<a class="btn btn-success btn-md" href="/viewdocument/{{$document->id}}"><i class="fas fa-eye"></i> View</a>
																					<a class="btn btn-warning btn-md" href="/showdocument/{{$document->id}}"><i class="fas fa-edit"></i> Update</a>	
																				</td> 
																			</tr>
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
										<div class="tab">
											<div class="card-header">Requested Documents</div>
											<div class="card-body p-0">
												<!-- Announcements table-->
												@if($requests->count() == 0)
													<br><br>
													<div class="alert alert-danger"><em>No records found.</em></div>
												@else
													<div class="table-responsive table-billing-history">
														<table id="example3" class="display nowrap" style="width:100%">
														<thead>
												                <tr>
												                    <th class="border-gray-200" scope="col">#</th>
												                    <th class="border-gray-200" scope="col">Document</th>
												                    <th class="border-gray-200" scope="col">Student Name</th>
												                    <th class="border-gray-200" scope="col">Course</th>
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
																				<td>{{$requested_at}}</td>
																				<td>
																				{{$request -> file}}
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
																					<a class="btn btn-success btn-md" href="/viewrequestadmin/{{$request->id}}"><i class="fas fa-eye"></i> View</a>
																					<a class="btn btn-warning btn-md" href="/showrequestadmin/{{$request->id}}"><i class="fas fa-edit"></i> Update</a>
																				</td> 
																			</tr>
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