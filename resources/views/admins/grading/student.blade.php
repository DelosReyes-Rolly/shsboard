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
    <!-- reports -->
    <div class="">
        <div class="px-2 mt-2">
            <!-- page navigation-->
            <h3 style="font-size: 28px;"><b>Print Student Report</b> </h3>
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="card mb-4">
                    <div class="border-start-lg border-start-yellow">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form action="{{route('admin.downloadpdfstu')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2">
                                        <b>From:</b>
                                        <input type="date" name="dateFrom" class="form-control" value="<?php echo date('Y-m-d'); ?>" /><br />
                                    </div>
                                    <div class="col-md-2">
                                        <b>To:</b>
                                        <input type="date" name="dateTo" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                                    </div>
                                    <div class="col-md-4">
                                        <br />
                                        <input type="submit" name="submit" class="btn btn-primary" value="Print" /></input>
                                    </div>
                                </div>
                            </form>
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
    </div></br></br>
    @endif
    <h3 style="font-size: 28px; font-weight: 800;">Table of Students </h3>
    <hr class="mt-0 mb-4">
    <div class="card mb-4 right-to-left border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
        <div class="card-header" style="background-color: white;">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <a class="btn btn-success" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/gradingalumni") }}'><i class="fas fa-user-graduate"></i> Alumni</a>
                    <a class="btn btn-danger" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/gradingdropped") }}'><i class="fas fa-user-slash"></i> Dropped</a><br /><br />
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12" style="float:right; text-align: right;">
                    <a class="btn btn-primary student-table" style="display: inline-block" onClick="batchAdd()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Student in Batch</a>
                    <a class="btn btn-primary" style="display: inline-block" onClick="add()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Student Manually</a>
                </div>
            </div>
        </div>
        <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
            <div class="table-responsive table-billing-history">
                <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                    <thead class="table-success">
                        <tr>
                            <th class="border-gray-200" scope="col">#</th>
                            <th class="border-gray-200" scope="col">LRN</th>
                            <th class="border-gray-200" scope="col">Student Name</th>
                            <th class="border-gray-200" scope="col">Phone Number</th>
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
                        <script src="{{ asset('assets/js/needs-validated.js') }}"></script>
                        <div class="modal-header">
                            <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Upload Batch of Students</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" id="bulkStudent" action="" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="modal-body">
                                @csrf
                                <div id="whoops" class="alert alert-danger" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <b>Whoops! There is a problem in your input</b> <br />
                                    @if ($message = Session::get('message'))
                                    <strong>{{ $message }}</strong>
                                    @endif
                                    <div id="validation-errors"></div>
                                </div>
                                <center><a href="{{ url('downloadStudentFileFormat') }}" class="btn btn-primary" style="font-size: 18px;"><i class="fas fa-download"></i> Download File Format</a></center>
                                <br />
                                <div class="mb-3" style="color: red">
                                    * required field
                                </div>
                                <div style="font-size: 20px;"><span style="color: red">*</span> Upload Excel file with the required format only</div>
                                <input type="file" name="select_file" id="select_field" class="form-control" style="font-size: 18px;" required>
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

            <!-- boostrap view model  -->
            <div class="modal fade" id="Student-modal-view" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-start-lg border-start-yellow">
                        <div class="modal-header">
                            <h1 class="modal-title" id="StudentModal-view" style="font-size: 20px;">New Student</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <span style="font-size: 26px;"><b> LRN:</b></span>
                                    <span id="lrn-view" style="font-size: 26px;"></span><br />
                                </div>
                                <div class="col-md-12"><br />
                                    <span style="font-size: 26px;"><b>Full Name: </b></span>
                                    <span style="font-size: 26px;"><span id="last_name-view"></span>, <span id="first_name-view"></span> <span id="middle_name-view"></span> <span id="suffix-view"></span></span><br />
                                </div>
                                <div class="col-md-12"><br />
                                    <span style="font-size: 26px;"><b>Phone Number: </b></span>
                                    <span style="font-size: 26px;" id="phone_number-view"></span><br />
                                </div>
                                <div class="col-md-12"><br />
                                    <span style="font-size: 26px;"><b>Sex: </b></span>
                                    <span style="font-size: 26px;" id="sex-view"></span><br />
                                </div>
                                <div class="col-md-12"><br />
                                    <span style="font-size: 26px;"><b>Grade Level: </b></span>
                                    <span id="gradelevel-view" style="font-size: 26px;"></span><br />
                                </div>
                                <div class="col-md-12"><br />
                                    <span style="font-size: 26px;"><b>Email Address: </b></span>
                                    <span id="email-view" style="font-size: 26px;"></span><br />
                                </div>
                                <div class="col-md-12"><br />
                                    <span style="font-size: 26px;"><b>Username: </b></span>
                                    <span id="username-view" style="font-size: 26px;"></span><br />
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
            <div class="modal fade" id="Student-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-start-lg border-start-yellow">
                        <div class="modal-header">
                            <h1 class="modal-title" id="StudentModal" style="font-size: 20px;">New Student</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="javascript:void(0)" id="StudentForm" name="StudentForm" class="form-horizontal needs-validation" novalidate method="POST">
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
                                        <label style="font-size: 20px;"><span style="color: red">*</span> LRN</label>
                                        <input id="lrn" type="text" name="LRN" class="form-control @error('LRN') is-invalid @enderror" value="{{ old('LRN') }}" style="font-size: 18px;" onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="12" required>
                                        <div class="invalid-feedback">
                                            Please input valid LRN.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                                        <input id="last_name" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                        <div class="invalid-feedback">
                                            Please input valid last name.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                                        <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                                        <div class="invalid-feedback">
                                            Please input valid first name.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label style="font-size: 20px;"> Middle Name</label>
                                        <input id="middle_name" type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                                        <div class="invalid-feedback">
                                            Please input valid middle name.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label style="font-size: 20px;">Suffix</label>
                                        <input id="suffix" type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{ old('suffix') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                                        <div class="invalid-feedback">
                                            Please input valid suffix.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="gender"><span style="color: red">*</span> Sex</label><br>
                                        <select id="gender" name="gender" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('gender') == "" ?'selected' : ''}} disabled> Please Select Sex </option>
                                            <option value="Male">Male </option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose sex.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="gradelevel_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Grade Level') }}</label><br>
                                        <select id="gradelevel_id" name="gradelevel_id" id="gradelevel_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('gradelevel_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                                            @foreach($gradelevels as $gradelevel_id)
                                            <option value="{{$gradelevel_id->id}}">{{$gradelevel_id->gradelevel}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input grade level.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="section_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Section') }}</label>
                                        <select id="section_id" name="section_id" id="section_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('section_id') == "" ?'selected' : ''}} disabled> Please Select section </option>
                                            @foreach($sections as $section_id)
                                            <option value="{{$section_id->id}}">{{$section_id->section}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input section.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="course_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Strand') }}</label>
                                        <select id="course_id" name="course_id" id="course_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('course_id') == "" ?'selected' : ''}} disabled> Please Select Strand </option>
                                            @foreach($courses as $course_id)
                                            <option value="{{$course_id->id}}">{{$course_id->courseName}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input strand.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" style="font-size: 18px;" required>
                                        <div class="invalid-feedback">
                                            Please input valid email address.
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
            <div class="modal fade" id="Student-modal-update" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-start-lg border-start-yellow">
                        <div class="modal-header">
                            <h1 class="modal-title" id="StudentModal-update" style="font-size: 20px;">New Student</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="javascript:void(0)" id="StudentFormUpdate" name="StudentFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
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
                                        <label style="font-size: 20px;"><span style="color: red">*</span> LRN</label>
                                        <input id="LRN-update" type="text" name="LRN" class="form-control @error('LRN') is-invalid @enderror" onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="12" style="font-size: 18px;" required>
                                        <div class="invalid-feedback">
                                            Please input valid LRN.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
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
                                        <label style="font-size: 20px;"> Middle Name</label>
                                        <input id="middlename-update" type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                                        <div class="invalid-feedback">
                                            Please input valid middle name.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label style="font-size: 20px;">Suffix</label>
                                        <input id="suffix-update" type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                                        <div class="invalid-feedback">
                                            Please input valid suffix.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                                        <input id="email-update" type="text" name="email" class="form-control @error('email') is-invalid @enderror" style="font-size: 18px;" required>
                                        <div class="invalid-feedback">
                                            Please input valid email address.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="gradelevel_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Grade Level') }}</label><br>
                                        <select id="gradelevel_id-update" name="gradelevel_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('gradelevel_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                                            @foreach($gradelevels as $gradelevel_id)
                                            <option value="{{$gradelevel_id->id}}">{{$gradelevel_id->gradelevel}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input grade level.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="section_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Section') }}</label>
                                        <select id="section_id-update" name="section_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('section_id') == "" ?'selected' : ''}} disabled> Please Select section </option>
                                            @foreach($sections as $section_id)
                                            <option value="{{$section_id->id}}">{{$section_id->section}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input section.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="course_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Strand') }}</label>
                                        <select id="course_id-update" name="course_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('course_id') == "" ?'selected' : ''}} disabled> Please Select Strand </option>
                                            @foreach($courses as $course_id)
                                            <option value="{{$course_id->id}}">{{$course_id->courseName}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input strand.
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
            <div class="modal fade" id="Student-modal-delete" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-start-lg border-start-yellow">
                        <div class="modal-header">
                            <h1 class="modal-title" id="StudentModalDelete" style="font-size: 20px;">Delete Student</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="javascript:void(0)" id="StudentFormDelete" name="StudentFormDelete" class="form-horizontal" method="POST">
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


            <!-- boostrap drop model  -->
            <div class="modal fade" id="Student-modal-drop" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-start-lg border-start-yellow">
                        <div class="modal-header">
                            <h1 class="modal-title" id="StudentModalDrop" style="font-size: 20px;">Drop Student</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="javascript:void(0)" id="StudentFormDrop" name="StudentFormDrop" class="form-horizontal" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" id="id-drop">
                                <p style="color: red; font-size:20px;">Are you sure you want to drop <span id="last-drop"></span>, <span id="first-drop"></span> <span id="middle-drop"></span> <span id="suffix-drop"></span>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <font face="Verdana" size="2"><input type="submit" class="btn btn-danger btn-md" value="Drop"></font>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end bootstrap model -->

            <!-- boostrap add subject model -->
            <div class="modal fade" id="Studentsubject-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-start-lg border-start-yellow">
                        <div class="modal-header">
                            <h1 class="modal-title" id="StudentsubjectModal" style="font-size: 20px;">New Student subject</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="javascript:void(0)" id="StudentsubjectForm" name="StudentsubjectForm" class="form-horizontal needs-validation" novalidate method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" id="id-addsub">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="whoops-subject" class="alert alert-danger" style="display: none;">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <b>Whoops! There is a problem in your input</b> <br />
                                            <div id="validation-errors-subject"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="gradelevel_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Grade Level') }}</label><br>
                                        <select id="gradelevel_id" name="gradelevel_id" id="gradelevel_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('gradelevel_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                                            @foreach($gradelevels as $gradelevel_id)
                                            <option value="{{$gradelevel_id->id}}">{{$gradelevel_id->gradelevel}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input grade level.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="subject_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Grade Level') }}</label><br>
                                        <select id="subject_id" name="subject_id" id="subject_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('subject_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                                            @foreach($subjects as $subject_id)
                                            <option value="{{$subject_id->id}}">{{$subject_id->subjectname}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input grade level.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="semester_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Grade Level') }}</label><br>
                                        <select id="semester_id" name="semester_id" id="semester_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('semester_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                                            @foreach($semesters as $semester_id)
                                            <option value="{{$semester_id->id}}">{{$semester_id->sem}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input grade level.
                                        </div>
                                    </div>
                                    <div class="col-md-12"><br />
                                        <label for="faculty_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span> {{ __('Grade Level') }}</label><br>
                                        <select id="faculty_id" name="faculty_id" id="faculty_id" class="form-control" style="font-size: 18px;" required>
                                            <option value="" {{old('faculty_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                                            @foreach($faculties as $faculty_id)
                                            <option value="{{$faculty_id->id}}">{{ $faculty_id->last_name }}, {{ $faculty_id->first_name }} {{ $faculty_id->middle_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please input grade level.
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

        </div>
    </div>
    </div>

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
                ajax: "{{ url('/gradingstudents') }}",
                columns: [{
                        "data": "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'LRN',
                        name: 'LRN'
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
                        data: 'phone_number',
                        name: 'phone_number'
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
            $('#StudentForm').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops').style.display = 'none';
            $('#StudentModal').html("Add Student");
            $('#Student-modal').modal('show');
            $('#id').val('');
        }

        function batchAdd() {
            $('#bulkStudent').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops').style.display = 'none';
            $('#StudentModal').html("Add Student");
            $('#batchModal').modal('show');
            $('#id').val('');
        }

        function viewFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/viewstudent') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#StudentModal-view').html("View Student");
                    $('#Student-modal-view').modal('show');
                    document.getElementById('lrn-view').innerHTML = res.LRN;
                    if (res.suffix == null && res.middle_name == null) {
                        document.getElementById('last_name-view').innerHTML = res.last_name;
                        document.getElementById('first_name-view').innerHTML = res.first_name;
                    } else if (res.suffix == null && res.middle_name != null) {
                        document.getElementById('last_name-view').innerHTML = res.last_name;
                        document.getElementById('first_name-view').innerHTML = res.first_name;
                        document.getElementById('middle_name-view').innerHTML = res.middle_name;
                    } else if (res.middle_name == null && res.suffix == null) {
                        document.getElementById('last_name-view').innerHTML = res.last_name;
                        document.getElementById('first_name-view').innerHTML = res.first_name;
                        document.getElementById('suffix-view').innerHTML = res.suffix;
                    } else {
                        document.getElementById('last_name-view').innerHTML = res.last_name;
                        document.getElementById('first_name-view').innerHTML = res.first_name;
                        document.getElementById('middle_name-view').innerHTML = res.middle_name;
                        document.getElementById('suffix-view').innerHTML = res.suffix;
                    }
                    document.getElementById('phone_number-view').innerHTML = res.phone_number;
                    document.getElementById('sex-view').innerHTML = res.gender;
                    if (res.gradelevel_id == 1) {
                        document.getElementById('gradelevel-view').innerHTML = "11";
                    } else if (res.gradelevel_id == 2) {
                        document.getElementById('gradelevel-view').innerHTML = "12";
                    } else {
                        document.getElementById('gradelevel-view').innerHTML = "Alumni";
                    }
                    document.getElementById('email-view').innerHTML = res.email;
                    document.getElementById('username-view').innerHTML = res.username;
                }
            });
        }

        function editFunc(id) {
            $('#StudentFormUpdate').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops-update').style.display = 'none';
            $.ajax({
                type: "POST",
                url: "{{ url('/showstudent') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#StudentModal-update').html("Edit Student");
                    $('#Student-modal-update').modal('show');
                    $('#id-update').val(res.id);
                    $('#LRN-update').val(res.LRN);
                    $('#lastname-update').val(res.last_name);
                    $('#firstname-update').val(res.first_name);
                    $('#middlename-update').val(res.middle_name);
                    $('#suffix-update').val(res.suffix);
                    $('#email-update').val(res.email);
                    $('#gradelevel_id-update').val(res.gradelevel_id);
                    $('#course_id-update').val(res.course_id);
                    $('#section_id-update').val(res.section_id);
                }
            });
        }

        function addsubFunc(id) {
            $('#StudentsubjectForm').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops-subject').style.display = 'none';
            $.ajax({
                type: "POST",
                url: "{{ url('/addsubject') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#StudentsubjectModal-update').html("Add Student Subject");
                    $('#Studentsubject-modal').modal('show');
                    $('#id-addsub').val(res.id);
                }
            });
        }

        function deleteFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/deletestudent') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#Student-modal-delete').modal('show');
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

        function dropFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/dropstudentone') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#Student-modal-drop').modal('show');
                    $('#id-drop').val(res.id);
                    if (res.suffix == null && res.middle_name == null) {
                        document.getElementById('last-drop').innerHTML = res.last_name;
                        document.getElementById('first-drop').innerHTML = res.first_name;
                    } else if (res.suffix == null && res.middle_name != null) {
                        document.getElementById('last-drop').innerHTML = res.last_name;
                        document.getElementById('first-drop').innerHTML = res.first_name;
                        document.getElementById('middle-drop').innerHTML = res.middle_name;
                    } else if (res.middle_name == null && res.suffix == null) {
                        document.getElementById('last-drop').innerHTML = res.last_name;
                        document.getElementById('first-drop').innerHTML = res.first_name;
                        document.getElementById('suffix-drop').innerHTML = res.suffix_name;
                    } else {
                        document.getElementById('last-drop').innerHTML = res.last_name;
                        document.getElementById('first-drop').innerHTML = res.first_name;
                        document.getElementById('middle-drop').innerHTML = res.middle_name;
                        document.getElementById('suffix-drop').innerHTML = res.suffix_name;
                    }

                }
            });
        }

        $('#StudentForm').submit(function(e) {
            e.preventDefault();
            if ($('#StudentForm')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/add/student')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Student-modal").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Student has been added successfully',
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
            $('#StudentForm').addClass('was-validated');

        });

        $('#StudentsubjectForm').submit(function(e) {
            e.preventDefault();
            if ($('#StudentsubjectForm')[0].checkValidity() === false) {
                event.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('studentsubjectadd.store') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Studentsubject-modal").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Student subject has been updated successfully',
                        });
                        $(":submit").removeAttr("disabled");
                    },
                    error: function(xhr) {
                        $('#validation-errors-subject').html('');
                        document.getElementById('whoops-subject').style.display = 'block';
                        if (xhr.responseJSON.error != undefined) {
                            $("#validation-errors-subject").html("");
                            $('#validation-errors-subject').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
                        }
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $('#validation-errors-subject').append('&emsp;<li>' + value + '</li>');
                        });
                        $(":submit").removeAttr("disabled");
                    }
                });
            }
            $('#StudentsubjectForm').addClass('was-validated');

        });

        $('#StudentFormDelete').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('/student/delete')}}/",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#Student-modal-delete").modal('hide');
                    var oTable = $('#example').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'Student has been deleted successfully',
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('#StudentFormDrop').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('/dropstudent')}}/",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#Student-modal-drop").modal('hide');
                    var oTable = $('#example').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'Student has been dropped successfully',
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('#StudentFormUpdate').submit(function(e) {
            e.preventDefault();
            if ($('#StudentFormUpdate')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/updatestudent')}}/",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Student-modal-update").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Student has been updated successfully',
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
            $('#StudentFormUpdate').addClass('was-validated');

        });

        $('#bulkStudent').submit(function(e) {
            e.preventDefault();
            if ($('#bulkStudent')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                $('#whoops').hide();
                var form = $('#bulkStudent')[0];
                var form_data = new FormData(form);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('studentBulk.store') }}",
                    data: form_data,
                    enctype: 'multipart/form-data',
                    processData: false, // Important!
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        if (response) {
                            $("#bulkStudent").modal('hide');
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
            $('#bulkStudent').addClass('was-validated');

        });
    </script>
</main>