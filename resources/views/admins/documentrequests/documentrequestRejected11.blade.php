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
		<nav  aria-label = "breadcrumb">
            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
            <ul class = "breadcrumb">
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class = "breadcrumb-item"><a class="bca" href = "{{ url('documentrequest') }}">Document Requests</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class = "breadcrumb-item active" aria-current = "page">Completed requests</li>
            </ul>
         </nav>
	</div>
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
				<div class="px-2 mt-2">
					<hr class="mt-0 mb-4">
	                <div class="row">
					
	                        <!-- Account details card-->
	                        <div class="card border-start-lg border-start-success">
								<div class="tabs">
								    <input type="radio" name="tabs" id="tabone" checked="checked">
								    <label for="tabone">Grade 11</label>
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
																					<a href="{{ url('download',['file'=>$request -> file]) }}" class="btn btn-primary">Download</a> 
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
<script>
	 $(document).ready(function(){
		$('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
		  editDoc11(e);
    });
	function editDoc11(e){
		$('#editModal').modal('show');
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
</script>