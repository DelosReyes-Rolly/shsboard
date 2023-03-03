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

        <h3 style="font-size: 28px; font-weight: 800;">Table of Faculty Expertise </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
            <div class="card-header" style="background-color: #ffffff;"> <!-- ito yung button sa pagadd-->
                <a class="btn btn-primary" style="float: right;" onClick="add()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Record</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-billing-history">
                    <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                        <thead class="table-success">
                            <tr>
                                <th width="10%" class="border-gray-200" scope="col">#</th>
                                <th width="20%" class="border-gray-200" scope="col">Expertise</th>
                                <th width="40%" class="border-gray-200" scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- boostrap view-subject model  -->
    <div class="modal fade" id="ExpertiseSubject-modal-view" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="ExpertiseSubjectModal-view" style="font-size: 20px;">New Expertise Subject</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive table-billing-history">
                        <table id="subjectE" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th width="4%" class="border-gray-200" scope="col">#</th>
                                    <th width="96%" class="border-gray-200" scope="col">Subject Name</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- boostrap view-teacher model  -->
    <div class="modal fade" id="ExpertiseFaculty-modal-view" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="ExpertiseFacultyModal-view" style="font-size: 20px;">New Expertise Faculty</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive table-billing-history">
                        <table id="facultyE" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th width="4%" class="border-gray-200" scope="col">#</th>
                                    <th width="96%" class="border-gray-200" scope="col">Faculty Name</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- boostrap add model -->
    <div class="modal fade" id="Expertise-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="ExpertiseModal" style="font-size: 20px;">New Expertise</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="ExpertiseForm" name="ExpertiseForm" class="form-horizontal needs-validation" novalidate method="POST">
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
                                <label style="font-size: 20px;"><span style="color: red">*</span> Expertise Name</label>
                                <input id="expertise" type="text" name="expertise" class="form-control @error('expertise') is-invalid @enderror" style="font-size: 18px;" onkeydown="return alphaOnly(event);" maxlength="255" required>
                                <div class="invalid-feedback">
                                    Please input valid expertise.
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
    <div class="modal fade" id="Expertise-modal-update" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="ExpertiseModal-update" style="font-size: 20px;">New Expertise</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="ExpertiseFormUpdate" name="ExpertiseFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
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
                                <input type="text" id="expertise-update" name="expertise" class="form-control @error('expertise') is-invalid @enderror" style="font-size: 18px;" onkeydown="return alphaOnly(event);" maxlength="255" required>
                                <div class="invalid-feedback">
                                    Please input valid expertise.
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
    <div class="modal fade" id="Expertise-modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="ExpertiseModalDelete" style="font-size: 20px;">Delete Strand</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="ExpertiseFormDelete" name="ExpertiseFormDelete" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-delete">
                        <p style="color: red; font-size:20px;">Are you sure you want to delete <span id="expertise-delete"></span>?</p>
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
                "bInfo": false,
                ordering: true,
                pageLength: 10,
                processing: true,
                serverSide: true,
                ajax: "{{ url('/gradingexpertise') }}",
                columns: [{
                        "data": "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'expertise',
                        name: 'expertise'
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
            $('#ExpertiseForm').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops').style.display = 'none';
            $('#ExpertiseModal').html("Add Expertise");
            $('#Expertise-modal').modal('show');
            $('#id').val('');
        }

        function subjectFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/viewexpertise') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#subjectE > tr').empty();
                    $('#ExpertiseSubjectModal-view').html("View Expertise Subjects");
                    $('#ExpertiseSubject-modal-view').modal('show');
                    var trHTML = '';
                    $.each(res, function(i, item) {
                        trHTML += '<tr><td>' + ++i + '</td><td>' + item.subjectname + '</td>';
                    });
                    $('#subjectE').append(trHTML);
                }
            });
        }


        function teacherFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/viewteacherexpertise') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#facultyE > tr').empty();
                    $('#ExpertiseFacultyModal-view').html("View Expertise Faculty");
                    $('#ExpertiseFaculty-modal-view').modal('show');
                    var trHTML = '';
                    $.each(res, function(i, item) {
                        if (item.middle_name == null && item.suffix == null)
                            trHTML += '<tr><td>' + ++i + '</td><td>' + item.last_name + ', ' + item.first_name + '</td>';
                        else if (item.middle_name == null && item.suffix != null)
                            trHTML += '<tr><td>' + ++i + '</td><td>' + item.last_name + ', ' + item.first_name + ' ' + item.suffix + '</td>';
                        else if (item.middle_name != null && item.suffix == null)
                            trHTML += '<tr><td>' + ++i + '</td><td>' + item.last_name + ', ' + item.first_name + ' ' + item.middle_name + '</td>';
                        else
                            trHTML += '<tr><td>' + ++i + '</td><td>' + item.last_name + ', ' + item.first_name + ' ' + item.middle_name + ' ' + item.suffix + '</td>';
                    });
                    $('#facultyE').append(trHTML);
                }
            });
        }

        function editFunc(id) {
            $('#ExpertiseFormUpdate').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops-update').style.display = 'none';
            $.ajax({
                type: "POST",
                url: "{{ url('/showexpertise') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ExpertiseModal-update').html("Edit Expertise");
                    $('#Expertise-modal-update').modal('show');
                    $('#id-update').val(res.id);
                    $('#expertise-update').val(res.expertise);
                }
            });
        }

        function deleteFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/deleteexpertise') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#Expertise-modal-delete').modal('show');
                    $('#id-delete').val(res.id);
                    document.getElementById('expertise-delete').innerHTML = res.expertise;
                }
            });
        }

        $('#ExpertiseForm').submit(function(e) {
            e.preventDefault();
            if ($('#ExpertiseForm')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/add/expertise')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Expertise-modal").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Expertise has been added successfully',
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
            $('#ExpertiseForm').addClass('was-validated');

        });

        $('#ExpertiseFormUpdate').submit(function(e) {
            e.preventDefault();
            if ($('#ExpertiseFormUpdate')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/updateexpertise')}}/",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Expertise-modal-update").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Expertise has been updated successfully',
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
            $('#ExpertiseFormUpdate').addClass('was-validated');

        });

        $('#ExpertiseFormDelete').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('/expertise/delete')}}/",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#Expertise-modal-delete").modal('hide');
                    var oTable = $('#example').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'Expertise has been deleted successfully',
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