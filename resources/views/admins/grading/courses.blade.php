@include('partials.adminheader')
<main>
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
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div></br></br>
        @endif
        <h3 style="font-size: 28px; font-weight: 800;">Table of Strands </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
            <div class="card-header" style="background-color: #ffffff;">
                <a class="btn btn-primary" style="float: right;" onClick="add()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Record</a>
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                <!-- table-->
                <br />
                <div class="table-responsive table-billing-history">
                    <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                        <thead class="table-success">
                            <tr>
                                <th style="width:4%" class="border-gray-200" scope="col">#</th>
                                <th style="width:10%" class="border-gray-200" scope="col">Strand Name</th>
                                <th style="width:10%" class="border-gray-200" scope="col">Abbreviation</th>
                                <th style="width:10%" class="border-gray-200" scope="col">Code</th>
                                <th style="width:20%" class="border-gray-200" scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- boostrap view model  -->
    <div class="modal fade" id="Course-modal-view" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="CourseModal-view" style="font-size: 20px;">New Course</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="text-align: center;">
                        <div class="col-md-12" style="font-size: 26px;">
                            <center><span id="image-view"></span></center>
                        </div><br /><br />
                        <div class="col-md-12">
                            <center><span id="courseName-view" style="font-size: 26px;"></span></center>
                        </div><br /><br />
                        <div class="col-md-12">
                            <br /><label style="font-size: 26px;"><b>Strand Description: </b></label>
                            <span id="description-view" style="font-size: 20px;"></span>
                        </div><br /><br />
                        <div class="col-md-12">
                            <br /> <label style="font-size: 26px;">Code: </label><br />
                            <b><span id="code-view" style="font-size: 26px;"></span></b>
                        </div><br><br />
                        <div class="col-md-12">
                            <div id="video-view" width="100%" height="600"></div>
                        </div><br /><br />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- boostrap add model -->
    <div class="modal fade" id="Course-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="CourseModal" style="font-size: 20px;">New strand</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="CourseForm" name="CourseForm" class="form-horizontal needs-validation" novalidate method="POST" enctype="multipart/form-data">
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
                                <label style="font-size: 20px;"><span style="color: red">*</span> Strand Name</label>
                                <input id="courseName" type="text" name="courseName" class="form-control @error('courseName') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid strand name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Abbreviation</label>
                                <input id="abbreviation" type="text" name="abbreviation" class="form-control @error('abbreviation') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid abbreviation.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Strand Description</label>
                                <textarea id="description" name="description" type=text class="form-control @error('description') is-invalid @enderror" style="font-size: 18px;" rows="10" cols="60" required></textarea>
                                <div class="invalid-feedback">
                                    Please input valid description.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Code</label>
                                <input id="code" type="text" name="code" class="form-control @error('code') is-invalid @enderror" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid strand code.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;">Video Link (Copy embed link on youtube and paste it here) </label>
                                <input id="link" type="text" name="link" class="form-control @error('link') is-invalid @enderror" style="font-size: 18px;">
                            </div>
                            <div id="hide-file" class="col-md-12"><br />
                                <label class="large mb-1" for="inputcontent" style="font-size: 20px;">Image (Only png and jpg files are allowed)</label>
                                <input id="file" type="file" name="image" class="form-control">
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
    <div class="modal fade" id="Course-modal-update" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="CourseModal" style="font-size: 20px;">New strand</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="CourseFormUpdate" name="CourseFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
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
                                <label style="font-size: 20px;"><span style="color: red">*</span> Strand Name</label>
                                <input id="courseName-update" type="text" name="courseName" class="form-control @error('courseName') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid strand name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Abbreviation</label>
                                <input id="abbreviation-update" type="text" name="abbreviation" class="form-control @error('abbreviation') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid abbreviation.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Strand Description</label>
                                <textarea id="description-update" name="description" type=text class="form-control @error('description') is-invalid @enderror" style="font-size: 18px;" rows="10" cols="60" required></textarea>
                                <div class="invalid-feedback">
                                    Please input valid description.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Code</label>
                                <input id="code-update" type="text" name="code" class="form-control @error('code') is-invalid @enderror" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid strand code.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;">Video Link (Copy embed link on youtube and paste it here) </label>
                                <input id="link-update" type="text" name="link" class="form-control @error('link') is-invalid @enderror" style="font-size: 18px;">
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
    <div class="modal fade" id="Course-modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="CourseModalDelete" style="font-size: 20px;">Delete Strand</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="CourseFormDelete" name="CourseFormDelete" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-delete">
                        <p style="color: red; font-size:20px;">Are you sure you want to delete <span id="courseName-delete"></span>?</p>
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
                ajax: "{{ url('/gradingcourses') }}",
                columns: [{
                        "data": "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'courseName',
                        name: 'courseName'
                    },
                    {
                        data: 'abbreviation',
                        name: 'abbreviation'
                    },
                    {
                        data: 'code',
                        name: 'code'
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
            $('#CourseForm').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops').style.display = 'none';
            $('#CourseModal').html("Add Course");
            $('#Course-modal').modal('show');
            $('#id').val('');
        }

        function viewFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/viewcourse') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#CourseModal-view').html("View Course");
                    $('#Course-modal-view').modal('show');
                    $('#image-view').html('<img src="img/' + res.image + '"style="width: auto; height: auto;"/>');
                    document.getElementById('courseName-view').innerHTML = res.courseName;
                    document.getElementById('description-view').innerHTML = res.description;
                    document.getElementById('code-view').innerHTML = res.code;
                    $('#video-view').html('<iframe id="video' + res.id + '" width="100%" height="600" box-shadow = "0 5px 20px rgba(0,0,0,2)" src="' + res.link + '" title="ABM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
                }
            });
            $('#Course-modal-view').on('hide.bs.modal', () => {
                $('#video' + id).attr('src', $("#video" + id).attr("src"));
            });
        }

        function editFunc(id) {
            $('#CourseFormUpdate').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops-update').style.display = 'none';
            $.ajax({
                type: "POST",
                url: "{{ url('/showcourse') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#CourseModal').html("Edit Course");
                    $('#Course-modal-update').modal('show');
                    $('#id-update').val(res.id);
                    $('#courseName-update').val(res.courseName);
                    $('#description-update').val(res.description);
                    $('#abbreviation-update').val(res.abbreviation);
                    $('#code-update').val(res.code);
                    $('#link-update').val(res.link);
                }
            });
        }

        function deleteFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/deletecourse') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#Course-modal-delete').modal('show');
                    $('#id-delete').val(res.id);
                    document.getElementById('courseName-delete').innerHTML = res.courseName;
                }
            });
        }

        $('#CourseForm').submit(function(e) {
            e.preventDefault();
            if ($('#CourseForm')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/add/course')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Course-modal").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Strand has been added successfully',
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
            $('#CourseForm').addClass('was-validated');

        });

        $('#CourseFormUpdate').submit(function(e) {
            e.preventDefault();

            if ($('#CourseFormUpdate')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/updatecourse')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Course-modal-update").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Strand has been updated successfully',
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
            $('#CourseFormUpdate').addClass('was-validated');

        });

        $('#CourseFormDelete').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('/course/delete')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#Course-modal-delete").modal('hide');
                    var oTable = $('#example').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'Strand has been deleted successfully',
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</main>