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
        
        <h3 style="font-size: 28px; font-weight: 800;">Table of Sections </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
            <div class="card-header" style="background-color: #ffffff;">
                <a class="btn btn-primary" style="float: right;" onClick="add()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Record</a>
            </div>
            <div class="card-body p-0">
                    <br>
                    <div class="table-responsive table-billing-history">
                        <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th width="10%" class="border-gray-200" scope="col">#</th>
                                    <th width="20%" class="border-gray-200" scope="col">Sections</th>
                                    <th width="40%" class="border-gray-200" scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>


    <!-- boostrap add model -->
    <div class="modal fade" id="Section-modal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SectionModal" style="font-size: 20px;">New Section</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="SectionForm" name="SectionForm" class="form-horizontal" method="POST">
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
                                <label style="font-size: 20px;"><span style="color: red">*</span> Section Name</label>
                                <input id="section" type="text" name="section" class="form-control @error('section') is-invalid @enderror" style="font-size: 18px;" onkeydown="return alphaOnly(event);" maxlength="1" minlength="1"  required>
                                <div class="invalid-feedback">
                                    Please input valid section.
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
    <div class="modal fade" id="Section-modal-update" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SectionModal-update" style="font-size: 20px;">New Section</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="SectionFormUpdate" name="SectionFormUpdate" class="form-horizontal" method="POST">
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
                                <input type="text" id="section-update" name="section" class="form-control @error('section') is-invalid @enderror" style="font-size: 18px;" onkeydown="return alphaOnly(event);" maxlength="1" minlength="1"  required>
                                <div class="invalid-feedback">
                                    Please input valid section.
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
    <div class="modal fade" id="Section-modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SectionModalDelete" style="font-size: 20px;">Delete Strand</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="SectionFormDelete" name="SectionFormDelete" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-delete">
                        <p style="color: red; font-size:20px;">Are you sure you want to delete <span id="section-delete"></span>?</p>
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
            ajax: "{{ url('/gradingsections') }}",
            columns: [
            {
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'section', name: 'section' },
            { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });
    });

    function add(){
        $('#SectionForm').trigger("reset");
        document.getElementById('whoops').style.display = 'none';
        $('#SectionModal').html("Add Section");
        $('#Section-modal').modal('show');
        $('#id').val('');
    }   

    function editFunc(id){
        document.getElementById('whoops-update').style.display = 'none';
        $.ajax({
            type:"POST",
            url: "{{ url('/showsection') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#SectionModal-update').html("Edit Section");
                $('#Section-modal-update').modal('show');
                $('#id-update').val(res.id);
                $('#section-update').val(res.section);
            }
        });
    } 

    function deleteFunc(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/deletesection') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#Section-modal-delete').modal('show');
                $('#id-delete').val(res.id);
                document.getElementById('section-delete').innerHTML = res.section;
            }
        });
    }

    $('#SectionForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/add/section')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Section-modal").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Section has been added successfully',                      
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

    $('#SectionFormUpdate').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/updatesection')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Section-modal-update").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Section has been updated successfully',                      
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

    $('#SectionFormDelete').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('/section/delete')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Section-modal-delete").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Section has been deleted successfully',                      
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