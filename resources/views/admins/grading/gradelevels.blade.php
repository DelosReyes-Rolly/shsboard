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
    <link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-bootstrap-1.10.20.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-jquery-1.12.1.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-rowreorder-1.2.8.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-responsive-2.3.0.css') }}">
	<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-jquery-1.12.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-rowreorder-1.2.8.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-responsive-2.3.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-4.5.2.js') }}"></script>
    <div class="">
    <h3 style="font-size: 28px; font-weight: 800;">Table of Grade Level </h3>
      <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success">
            <div class="card-header" style="font-size: 20px; font-weight:bold; background-color: #ffffff;">
                <div class="row">
                    <div class="col-lg-9 col-md-6 col-md-8" style="border-radius: 10px;">
                        <div class="alert alert-primary"><i class="fas fa-info"> </i> | Example: 12 </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-4">
                        <a class="btn btn-primary" style="float: right;" onClick="add()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Record</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                    <br>
                    <div class="table-responsive table-billing-history" style="padding: 20px;">
                        <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="border-gray-200" scope="col">#</th>
                                    <th class="border-gray-200" scope="col">Grade Level</th>
                                    <th class="border-gray-200" scope="col">Action</th>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
            </div>
        </div>  
    </div>

    <!-- boostrap add model -->
    <div class="modal fade" id="Gradelevel-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="GradelevelModal" style="font-size: 20px;">New Gradelevel</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="GradelevelForm" name="GradelevelForm" class="form-horizontal" method="POST">
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
                                <label style="font-size: 20px;"><span style="color: red">*</span> Grade level</label>
                                <input id="gradelevel" type="text" name="gradelevel" class="form-control @error('gradelevel') is-invalid @enderror" style="font-size: 18px;"  onkeypress="return onlyNumberKey(event)" maxlength="2" minlength="2" required>
                                <div class="invalid-feedback">
                                    Please input valid grade level.
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
    <div class="modal fade" id="Gradelevel-modal-update" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="GradelevelModal-update" style="font-size: 20px;">New gradelevel</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="GradelevelFormUpdate" name="GradelevelFormUpdate" class="form-horizontal" method="POST">
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
                                <input id="gradelevel-update" type="text" name="gradelevel" class="form-control @error('gradelevel') is-invalid @enderror" style="font-size: 18px;"   onkeypress="return onlyNumberKey(event)" maxlength="2" minlength="2" required>
                                <div class="invalid-feedback">
                                    Please input valid grade level.
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
    <div class="modal fade" id="Gradelevel-modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="GradelevelModalDelete" style="font-size: 20px;">Delete Strand</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="GradelevelFormDelete" name="GradelevelFormDelete" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-delete">
                        <p style="color: red; font-size:20px;">Are you sure you want to delete <span id="gradelevel-delete"></span>?</p>
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

    <script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#example').DataTable({
            responsive: true,
            "bInfo" : false,
            ordering : true,
            pageLength : 10,
            processing: true,
            serverSide: true,
            ajax: "{{ url('/gradinggradelevels') }}",
            columns: [
            {
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'gradelevel', name: 'gradelevel' },
            { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });
    });

    function add(){
        $('#GradelevelForm').trigger("reset");
        document.getElementById('whoops').style.display = 'none';
        $('#GradelevelModal').html("Add Gradelevel");
        $('#Gradelevel-modal').modal('show');
        $('#id').val('');
    }   

    function editFunc(id){
        document.getElementById('whoops-update').style.display = 'none';
        $.ajax({
            type:"POST",
            url: "{{ url('/showgradelevel') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#GradelevelModal-update').html("Edit Gradelevel");
                $('#Gradelevel-modal-update').modal('show');
                $('#id-update').val(res.id);
                $('#gradelevel-update').val(res.gradelevel);
            }
        });
    } 

    function deleteFunc(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/deletegradelevel') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#Gradelevel-modal-delete').modal('show');
                $('#id-delete').val(res.id);
                document.getElementById('gradelevel-delete').innerHTML = res.gradelevel;
            }
        });
    }

    $('#GradelevelForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/add/gradelevel')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Gradelevel-modal").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Gradelevel has been added successfully',                      
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

    $('#GradelevelFormUpdate').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/updategradelevel')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Gradelevel-modal-update").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Gradelevel has been updated successfully',                      
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

    $('#GradelevelFormDelete').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('/gradelevel/delete')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Gradelevel-modal-delete").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Gradelevel has been deleted successfully',                      
                });
            },
            error: function(data){
                console.log(data);
            }
        });
    });
    </script>
</main>
<br><br><br><br>