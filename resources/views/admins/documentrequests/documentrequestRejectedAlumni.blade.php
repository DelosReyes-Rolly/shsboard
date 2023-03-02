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
	</head>

	<body style="font-family: Arial;">


		<section>
			<div>
				<nav aria-label="breadcrumb">
					<!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
					<ul class="breadcrumb">
						<!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
						<li class="breadcrumb-item"><a class="bca" href="{{ url('documentrequest') }}">Document Requests</a></li>
						<!--Add the "active" class to li element to represent the current page-->
						<li class="breadcrumb-item active" aria-current="page">rejected requests</li>
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
												<div style="font-size: 40px;"><i class="fas fa-file-alt"></i> {{ $requests->count() }} </div>
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
									<label for="tabone">Alumni</label>
									<div class="tab" style="height: auto;">
										<div class="card-header"><b>Requested Documents</b></div>
										<div class="card-body p-0">
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
												</table>
											</div>
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
			ajax: "{{ url('/documentrequestdalumnirejected') }}",
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

	function editFuncalumni(id) {
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

	$('AlumniFormUpdate').submit(function(e) {
		e.preventDefault();
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
	});
</script>