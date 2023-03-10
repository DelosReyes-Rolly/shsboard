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
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <h3 style="font-size: 28px; font-weight: 800;">Table of Teachers </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
            <div class="card-header" style="background-color: #ffffff;">
                <div class="row">
                    <div class="col-lg-4 col-md-12" style="font-size: 20px;">
                        Max Regular Load: <span id="reload">{{$load->regular_load}}</span> <a class="btn btn-warning btn-sm" onClick="regular()" href="javascript:void(0)"><i class="fas fa-edit"></i> Change</a><br /><br />
                        Max Master Load: <span id="reload2">{{$load->master_load}}</span> <a class="btn btn-warning btn-sm" onClick="master()" href="javascript:void(0)"><i class="fas fa-edit"></i> Change</a>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div style="float:right; text-align: right;">
                            <a class="btn btn-primary student-table" style="display: inline-block" onClick="batchAdd()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Faculty in Batch</a>
                            <a class="btn btn-primary student-table" style="display: inline-block" onClick="add()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Faculty Manually</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                <br>
                <div class="table-responsive table-billing-history">
                    <table id="example" class="display table-bordered table-striped table-hover table-lg table" style="width:100%">
                        <thead class="table-success">
                            <tr>
                                <th class="border-gray-200" scope="col">Name</th>
                                <th class="border-gray-200" scope="col">Subject Load</th>
                                <th class="border-gray-200" scope="col">Class Load</th>
                                <th class="border-gray-200" scope="col">Expertise</th>
                                <th class="border-gray-200" scope="col">Status</th>
                                <th class="border-gray-200" scope="col">Email Address</th>
                                <th class="border-gray-200" scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- batch modal -->
                <div id="batchModal" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content border-start-lg border-start-yellow">
                            <div class="modal-header">
                                <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Upload Batch of Faculties</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" id="bulkFaculty" action="" enctype="multipart/form-data" class="form-horizontal needs-validation" novalidate>
                                <div class="modal-body">
                                    @csrf
                                    <div id="whoops" class="alert alert-danger" style="display: none;">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <b>Whoops! There is a problem in your input</b> <br />
                                        <div id="validation-errors"></div>
                                    </div>
                                    <center><a href="{{ url('downloadFacultyFileFormat') }}" class="btn btn-primary" style="font-size: 18px;"><i class="fas fa-download"></i> Download File Format</a></center>
                                    <br />
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <div style="font-size: 20px;"><span style="color: red">*</span> Select file - Upload Excel file with the required format only</div>
                                    <input type="file" name="select_file" id="select_file" class="form-control" style="font-size: 18px;" required>
                                    <div class="invalid-feedback">
                                        Please input a file.
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
                <!--min -->
                <div id="editmin" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content border-start-lg border-start-yellow">
                            <div class="modal-header">
                                <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Regular Load</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="javascript:void(0)" method="POST" name="updateMinload" class="form-horizontal needs-validation" novalidate id="updateMinload">
                                <div class="modal-body">
                                    <div id="whoops" class="alert alert-danger" style="display: none;">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <b>Whoops! There is a problem in your input</b> <br />
                                        <div id="validation-errors"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" id="minload" name="minload" class="form-control @error('minload') is-invalid @enderror" style="font-size: 20px;" onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" required>
                                        <div class="invalid-feedback">
                                            Please input valid load.
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
                <!--max-->
                <div id="editmax" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content border-start-lg border-start-yellow">
                            <div class="modal-header">
                                <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Master Load</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="javascript:void(0)" method="POST" name="updateMaxload" class="form-horizontal needs-validation" novalidate id="updateMaxload">
                                <div class="modal-body">
                                    <div id="whoops" class="alert alert-danger" style="display: none;">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <b>Whoops! There is a problem in your input</b> <br />
                                        <div id="validation-errors"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" id="maxload" name="maxload" class="form-control @error('maxload') is-invalid @enderror" style="font-size: 20px;" onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" required>
                                        <div class="invalid-feedback">
                                            Please input valid maximum load.
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
            </div>
        </div>
    </div>


    <!-- boostrap add model -->
    <div class="modal fade" id="Faculty-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="FacultyModal" style="font-size: 20px;">New Faculty</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="FacultyForm" name="FacultyForm" class="form-horizontal needs-validation" novalidate method="POST">
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
                                <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                                <input id="lastname" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid last name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                                <input id="firstname" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid first name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;">Middle Name</label>
                                <input id="middlename" type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                                <div class="invalid-feedback">
                                    Please input valid middle name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;">Suffix</label>
                                <input id="suffix" type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                                <div class="invalid-feedback">
                                    Please input valid suffix name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid email address.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Status</label>
                                <select id="isMaster" name="isMaster" class="form-control" style="font-size: 18px;" required>
                                    <option value="" {{old('isMaster') == "" ?'selected' : ''}} disabled> Please Select Status </option>
                                    <option value="1">Regular</option>
                                    <option value="0">Master</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please input valid status.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label for="expertise" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Expertises') }}</label><br>
                                <select id="expertise_id" name="expertise_id" class="form-control" style="font-size: 18px;" required>
                                    <option value="" {{old('expertise') == "" ?'selected' : ''}} disabled> Please Select Expertise </option>
                                    @foreach($expertises as $expertise)
                                    <option value="{{$expertise->id}}">{{$expertise->expertise}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please input expertises.
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
    <div class="modal fade" id="Faculty-modal-update" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="FacultyModal-update" style="font-size: 20px;">New Faculty</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="FacultyFormUpdate" name="FacultyFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
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
                                <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                                <input id="lastname-update" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid last name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                                <input id="firstname-update" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid first name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;">Middle Name</label>
                                <input id="middlename-update" type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                                <div class="invalid-feedback">
                                    Please input valid middle name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;">Suffix</label>
                                <input id="suffix-update" type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                                <div class="invalid-feedback">
                                    Please input valid suffix name.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                                <input id="email-update" type="email" name="email" class="form-control @error('email') is-invalid @enderror" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid email address.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><span style="color: red">*</span> Status</label>
                                <select id="isMaster-update" name="isMaster" class="form-control" style="font-size: 18px;" required>
                                    <option value="" {{old('isMaster') == "" ?'selected' : ''}} disabled> Please Select Status </option>
                                    <option value="1">Regular</option>
                                    <option value="0">Master</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please input valid status.
                                </div>
                            </div>
                            <div class="col-md-12"><br />
                                <label for="expertise" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Expertises') }}</label><br>
                                <select id="expertise_id-update" name="expertise_id" class="form-control" style="font-size: 18px;" required>
                                    <option value="" {{old('expertise') == "" ?'selected' : ''}} disabled> Please Select Expertise </option>
                                    @foreach($expertises as $expertise)
                                    <option value="{{$expertise->id}}">{{$expertise->expertise}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please input expertises.
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
    <div class="modal fade" id="Faculty-modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="FacultyModalDelete" style="font-size: 20px;">Delete Faculty</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="FacultyFormDelete" name="FacultyFormDelete" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-delete">
                        <p style="color: red; font-size:20px;">Are you sure you want to delete <span id="last-delete"></span>, <span id="first-delete"></span> <span id="middle-delete"></span> <span id="suffix-delete"></span>?</p>
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
                ajax: "{{ url('/gradingfaculty') }}",
                columns: [
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
                        data: 'subject_load',
                        name: 'subject_load'
                    },
                    {
                        data: 'class_load',
                        name: 'class_load'
                    },
                    {
                        data: 'expertise',
                        name: 'expertises.expertise'
                    },
                    {
                        "data": "id",
                        "render": function(data, type, full, meta) {
                            if (full["isMaster"] == "0")
                                return "Master";
                            else if (full["isMaster"] == "1")
                                return "Regular";
                        }
                    },
                    {
                        data: 'email',
                        name: 'email'
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

            $('#FacultyForm').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops').style.display = 'none';
            $('#FacultyModal').html("Add Faculty");
            $('#Faculty-modal').modal('show');
            $('#id').val('');
        }

        function editFunc(id) {
            $('#FacultyFormUpdate').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops-update').style.display = 'none';
            $.ajax({
                type: "POST",
                url: "{{ url('/showfaculty') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#FacultyModal-update').html("Edit Faculty");
                    $('#Faculty-modal-update').modal('show');
                    $('#id-update').val(res.id);
                    $('#lastname-update').val(res.last_name);
                    $('#firstname-update').val(res.first_name);
                    $('#middlename-update').val(res.middle_name);
                    $('#suffix-update').val(res.suffix);
                    $('#email-update').val(res.email);
                    $('#isMaster-update').val(res.isMaster);
                    $('#expertise_id-update').val(res.expertise_id);
                }
            });
        }

        function regular() {
            $('#updateMinload').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops-update').style.display = 'none';
            $.ajax({
                type: "POST",
                url: "{{ url('/showminload') }}",
                dataType: 'json',
                success: function(res) {
                    $('#editmin').modal('show');
                    $('#id-minload').val(res.id);
                    $('#minload').val(res.regular_load);
                }
            });
        }

        function master() {
            $('#updateMaxload').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops-update').style.display = 'none';
            $.ajax({
                type: "POST",
                url: "{{ url('/showmaxload') }}",
                dataType: 'json',
                success: function(res) {
                    $('#editmax').modal('show');
                    $('#id-maxload').val(res.id);
                    $('#maxload').val(res.master_load);
                }
            });
        }

        function deleteFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/deletefaculty') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#Faculty-modal-delete').modal('show');
                    $('#id-delete').val(res.id);
                    if (res.suffix == null && res.middle_name == null) {
                        document.getElementById('last-delete').innerHTML = res.last_name;
                        document.getElementById('first-delete').innerHTML = res.first_name;
                    } else if (res.suffix == null && res.middle_name != null) {
                        document.getElementById('last-delete').innerHTML = res.last_name;
                        document.getElementById('first-delete').innerHTML = res.first_name;
                        document.getElementById('middle-delete').innerHTML = res.middle_name;
                    } else if (res.middle_name == null && res.suffix == null) {
                        document.getElementById('last-delete').innerHTML = res.last_name;
                        document.getElementById('first-delete').innerHTML = res.first_name;
                        document.getElementById('suffix-delete').innerHTML = res.suffix_name;
                    } else {
                        document.getElementById('last-delete').innerHTML = res.last_name;
                        document.getElementById('first-delete').innerHTML = res.first_name;
                        document.getElementById('middle-delete').innerHTML = res.middle_name;
                        document.getElementById('suffix-delete').innerHTML = res.suffix_name;
                    }
                }
            });
        }


        $('#FacultyForm').submit(function(e) {
            e.preventDefault();
            if ($('#FacultyForm')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/add/faculty')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Faculty-modal").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Faculty has been added successfully',
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
            $('#FacultyForm').addClass('was-validated');

        });

        $('#FacultyFormUpdate').submit(function(e) {
            e.preventDefault();
            if ($('#FacultyFormUpdate')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/updatefaculty')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Faculty-modal-update").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Faculty has been updated successfully',
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
            $('#FacultyFormUpdate').addClass('was-validated');

        });

        $('#FacultyFormDelete').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('/faculty/delete')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#Faculty-modal-delete").modal('hide');
                    var oTable = $('#example').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'Faculty has been deleted successfully',
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('#updateMinload').submit(function(e) {
            $('#whoops').hide();
            e.preventDefault();
            if ($('#updateMinload')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var regular_load = $("#minload").val();
                var _token = $("input[name=_token]").val();
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: "POST",
                    url: '{{url("/updateminload")}}',
                    data: {
                        regular_load: regular_load,
                        _token: _token,
                    },
                    success: function(response) {
                        $("#editmin").modal('hide');
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Minimum load has been updated successfully',
                        }).then(function() {
                            location.reload(true);
                        })
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
                    },
                })
            }
            $('#updateMinload').addClass('was-validated');

        });


        $('#updateMaxload').submit(function(e) {
            $('#whoops').hide();
            e.preventDefault();
            if ($('#updateMaxload')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var master_load = $("#maxload").val();
                var _token = $("input[name=_token]").val();
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: "POST",
                    url: '{{url("/updatemaxload")}}',
                    data: {
                        master_load: master_load,
                        _token: _token,
                    },
                    success: function(response) {
                        $("#editmax").modal('hide');
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Maximum load has been updated successfully',
                        }).then(function() {
                            location.reload(true);
                        })
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
                    },
                })
            }
            $('#updateMaxload').addClass('was-validated');

        });

        function batchAdd() {
            $('#bulkFaculty').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops').style.display = 'none';
            $('#FacultyModal').html("Add Faculty");
            $('#batchModal').modal('show');
            $('#id').val('');
        }


        $('#bulkFaculty').submit(function(e) {
            e.preventDefault();
            $('#whoops').hide();
            if ($('#bulkFaculty')[0].checkValidity() === false) {
                event.stopPropagation();
            } else {
                var form = $('#bulkFaculty')[0];
                var form_data = new FormData(form);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('facultyBulk.store') }}",
                    data: form_data,
                    enctype: 'multipart/form-data',
                    processData: false, // Important!
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        if (response) {
                            $("#bulkFaculty").modal('hide');
                            $(":submit").removeAttr("disabled");
                            Swal.fire({
                                icon: 'success',
                                title: 'Success.',
                                text: 'Excel Data Imported successfully.',
                            }).then(function() {
                                location.reload(true);
                            })
                        }
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
                    },
                });
            }
            $('#bulkFaculty').addClass('was-validated');

        });
    </script>
</main>
<br><br><br><br>