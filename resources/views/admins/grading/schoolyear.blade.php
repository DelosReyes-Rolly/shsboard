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
    <div class="">

        <h3 style="font-size: 28px; font-weight: 800;">Table of School Year </h3>
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div></br></br>
        @endif
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success">
            <div class="card-header" style="font-size: 20px; font-weight:bold; background-color: #ffffff;">

                <div class="row">
                    <div class="col-lg-9 col-md-6 col-md-8" style="border-radius: 10px;">
                        <div class="alert alert-primary"><i class="fas fa-info"> </i> | Example: 2022</div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-md-4">
                        <a class="btn btn-primary" style="float: right;" onClick="add()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Record</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-billing-history" style="padding: 20px;">
                    <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                        <thead class="table-success">
                            <tr>
                                <th class="border-gray-200" scope="col">School Year</th>
                                <th class="border-gray-200" scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- boostrap view model  -->
    <div class="modal fade" id="Schoolyear-modal-view" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SchoolyearModal-view" style="font-size: 20px;">New Schoolyear</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align:center;">
                    <div style="font-size: 40px; font-weight:bold; color: green;">
                        <div class="card-body" style="padding: 10px 40px 10px 40px">
                            <h1 style="font-size: 28px;"> <span id="schoolyear-view"> </span></h1>
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
    <div class="modal fade" id="Schoolyear-modal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SchoolyearModal" style="font-size: 20px;">New Schoolyear</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="SchoolyearForm" name="SchoolyearForm" class="form-horizontal needs-validation" novalidate method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="whoops" class="alert alert-danger" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <b>Whoops! There is a problem in your input</b> <br />
                                    <div id="validation-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div style="border-radius: 10px;">
                                    <div class="alert alert-primary"><i class="fas fa-info"> </i> | Once you added a new school year, the current school year would be updated to the new school year added.</div>
                                </div>
                                <label style="font-size: 20px;"><span style="color: red">*</span> School Year</label>
                                <input id="schoolyear" type="number" name="schoolyear" class="form-control @error('schoolyear') is-invalid @enderror" value="{{ old('schoolyear') }}" style="font-size: 18px;" onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" min="2023" max="2099" required>
                                <div class="invalid-feedback">
                                    Please input valid school year.
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
    <div class="modal fade" id="Schoolyear-modal-update" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SchoolyearModal-update" style="font-size: 20px;">New Schoolyear</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="SchoolyearFormUpdate" name="SchoolyearFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-update">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="whoops-update" class="alert alert-danger" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <b>Whoops! There is a problem in your input</b> <br />
                                    <div id="validation-errors-update"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input id="schoolyear-update" type="number" name="schoolyear" class="form-control @error('schoolyear') is-invalid @enderror" style="font-size: 20px;" onkeypress="return onlyNumberKey(event)" min="2023" max="2099" maxlength="4" minlength="4"  required>
                                <div class="invalid-feedback">
                                    Please input valid school year.
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
    <div class="modal fade" id="Schoolyear-modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SchoolyearModalDelete" style="font-size: 20px;">Delete Schoolyear</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="SchoolyearFormDelete" name="SchoolyearFormDelete" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-delete">
                        <p style="color: red; font-size:20px;">Are you sure you want to delete <span id="schoolyear-delete"></span>?</p>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#example').DataTable({
                responsive: true,
                "bInfo": true,
                ordering: true,
                pageLength: 10,
                processing: true,
                serverSide: true,
                ajax: "{{ url('/gradingschoolyear') }}",
                columns: [
                    {
                        data: 'schoolyear',
                        name: 'schoolyear'
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

        function add() {
            $('#SchoolyearForm').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops').style.display = 'none';
            $('#SchoolyearModal').html("Add Schoolyear");
            $('#Schoolyear-modal').modal('show');
            $('#id').val('');
        }

        function viewFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/viewschoolyear') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#SchoolyearModal-view').html("View Schoolyear");
                    $('#Schoolyear-modal-view').modal('show');
                    document.getElementById('schoolyear-view').innerHTML = res.schoolyear;
                }
            });
        }

        function editFunc(id) {
            $('#SchoolyearFormUpdate').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops-update').style.display = 'none';
            $.ajax({
                type: "POST",
                url: "{{ url('/showschoolyear') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#SchoolyearModal-update').html("Edit Schoolyear");
                    $('#Schoolyear-modal-update').modal('show');
                    $('#id-update').val(res.id);
                    $('#schoolyear-update').val(res.schoolyear);
                }
            });
        }

        function deleteFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/deleteschoolyear') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#Schoolyear-modal-delete').modal('show');
                    $('#id-delete').val(res.id);
                    document.getElementById('schoolyear-delete').innerHTML = res.schoolyear;
                }
            });
        }

        $('#SchoolyearForm').submit(function(e) {
            e.preventDefault();

            if ($('#SchoolyearForm')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/add/schoolyear')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Schoolyear-modal").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Schoolyear has been added successfully',
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
            $('#SchoolyearForm').addClass('was-validated');
        });

        $('#SchoolyearFormUpdate').submit(function(e) {
            e.preventDefault();
            if ($('#SchoolyearFormUpdate')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/updateschoolyear')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Schoolyear-modal-update").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Schoolyear has been updated successfully',
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
            $('#SchoolyearFormUpdate').addClass('was-validated');
        });

        $('#SchoolyearFormDelete').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('/schoolyear/delete')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#Schoolyear-modal-delete").modal('hide');
                    var oTable = $('#example').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'Schoolyear has been deleted successfully',
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</main>
<br><br><br><br>