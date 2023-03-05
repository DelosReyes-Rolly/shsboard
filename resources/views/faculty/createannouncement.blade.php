@include('partials.facultyheaderwithoutEwan')
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
    <section>
        <div>
            <div>
                <!-- boxes -->
                <hr style="border: 1px solid grey;">
                <div class="px-2 mt-2">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <!-- Billing card 2-->
                            <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                                <div class="card-body">
                                    <div class="requesteddocument" style="color: white; font-size: 20px; font-weight: 800;">Expired Activity</div>
                                    <div class="h3" style="padding-left: 20px; padding-bottom: 10px; font-size:40px;"> <i class="fas fa-calendar-times"> </i> <span id="reload2"> </span> </div>
                                    <!-- <a class="text-arrow-icon small text-secondary" href="#!">
                                        View expired announcements
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <!-- Billing card 3-->
                            <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                                <div class="card-body">
                                    <div class="requesteddocument" style="color: white; font-size: 20px; font-weight: 800;">Active Activity</div>
                                    <div class="h3 d-flex align-items-center" style="padding-left: 20px; padding-bottom: 10px; font-size:40px;"> <i class="fas fa-bullhorn"> </i> <span id="reload"> </span> </div>
                                    <!-- <a class="text-arrow-icon small text-success" href="#!">
                                    View Active annoucements
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- form -->

                    <hr style="border: 1px solid grey;">
                    <form method="POST" id="createFacultyannouncement" class="needs-validation" novalidate>
                        @csrf
                        <div class="px-2 mt-2">
                            <!-- page navigation-->
                            <h3 style="font-size: 28px; font-weight: 800;">Create Activity </h3>
                            <hr class="mt-0 mb-4">
                            <div class="row">

                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="border-start-lg border-start-yellow">
                                        <div class="card-header"></div>
                                        <div class="card-body">
                                            <div class="mb-3" style="color: red">
                                                * required field
                                            </div>
                                            <div id="whoops" class="alert alert-danger" style="display: none;">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <b>Whoops! There is a problem in your input</b> <br />
                                                <div id="validation-errors"></div>
                                            </div>
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3 requestdocument">
                                            <!-- Form Group (title)-->
                                            <br>
                                            <div class="col-lg-6 col-md-12">
                                                <label class="large mb-1" for="inputwhat" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Title</label>
                                                <input class="form-control @error('inputwhat') is-invalid @enderror" id="inputwhat" type="text" style="font-size: 20px; " placeholder="Enter the title" name="inputwhat" value="{{ old('inputwhat') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input title.
                                                </div>
                                            </div>
                                            <!-- Form Group whr-->
                                            <div class="col-lg-3 col-md-12">
                                                <label class="large mb-1" for="inputexpired_at" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Deadline Date</label>
                                                <input type="date" class="form-control @error('inputexpired_at') is-invalid @enderror" id="inputexpired_at" style="font-size: 20px;" placeholder="Enter the date" name="inputexpired_at" value="{{ old('inputexpired_at') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input deadline date.
                                                </div>
                                            </div>
                                            <!-- Form Group (content)-->
                                            <div class="col-lg-3 col-md-12">
                                                <div class="form-group">
                                                    <label for="appt" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Deadline Time</label><br>
                                                    <input type="time" id="whn_time" class="form-control" name="whn_time" value="{{ old('whn_time') }}" style="font-size: 20px; " required>
                                                    <div class="invalid-feedback">
                                                        Please input time.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form Row -->
                                        <div class="row requestdocument">
                                            <!-- Form Group whr-->
                                            <div class="col-lg-6 col-md-12 form-group">
                                                <label for="subject_id" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Subject</label><br />
                                                <select id="subject_id" name="subject_id" value="{{ old('subject_id') }}" class="form-control" style="font-size: 20px; padding:0px; padding-left:16px;" required>
                                                    <option value="" disabled selected hidden>Choose Subject</option>
                                                    @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->subject->id }}">{{ $subject->subject->subjectname}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select subject.
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12 form-group">
                                                <label for="course_id" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Strand</label><br />
                                                <select id="course_id" class="form-control" name="course_id" value="{{ old('course_id') }}" style="font-size: 20px; padding:0px; padding-left:16px;" required>
                                                    <option value="" disabled selected hidden>Choose Strand</option>
                                                    @foreach ($courses as $course)
                                                    <option value="{{ $course->course->id }}">{{ $course->course->courseName}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select strand.
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row gx-3 mb-3 requestdocument">
                                            <!-- Form Row -->
                                            <div class="col-lg-4 col-md-12 form-group">
                                                <label for="section_id" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Section</label><br />
                                                <select id="section_id" name="section_id" value="{{ old('section_id') }}" class="form-control" style="font-size: 20px; padding:0px; padding-left:16px;" required>
                                                    <option value="" disabled selected hidden>Choose Section</option>
                                                    @foreach ($sections as $section)
                                                    <option value="{{ $section->section->id }}">{{ $section->section->section}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select section.
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 form-group">
                                                <label for="gradelevel_id" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Grade Level</label><br />
                                                <select id="gradelevel_id" name="gradelevel_id" value="{{ old('gradelevel_id') }}" class="form-control" style="font-size: 20px; padding:0px; padding-left:16px;" required>
                                                    <option value="" disabled selected hidden>Choose Gradelevel</option>
                                                    @foreach ($gradelevels as $gradelevel)
                                                    <option value="{{ $gradelevel->gradelevel->id }}">{{ $gradelevel->gradelevel->gradelevel }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select grade level.
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <br /><label class="large mb-1" for="editors" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Content</label>
                                                <textarea class="form-control @error('editors') is-invalid @enderror" rows="10" cols="80" id="editors" type="text" style="font-size: 20px;" placeholder="Enter your content" name="editors" required>{{ old('editors') }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please input content.
                                                </div>
                                            </div>
                                            <br />
                                            <font face="Verdana" size="8"><input type="submit" class="btn btn-primary" value="Submit" style=" margin-right: 80px; font-size: 16px;"></font>
                                        </div>
                                        <br />
                                        <!-- Save changes button-->

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                <hr style="border: 1px solid grey;">
                <!-- tables -->
                <h3 style="font-size: 28px; font-weight: 800;">Table of Activity</h3>
                <hr class="mt-0 mb-4">
                <div class="card mb-4 border-start-lg border-start-success" style="padding: 20px 20px 20px 20px;">
                    <div class="card-header"></div>
                    <div class="card-body p-0">
                        <!-- Activity table-->
                        <br>
                        <div class="table-responsive table-billing-history">
                            <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                                <thead class="table-success">
                                    <tr>
                                        <th class="border-gray-200" scope="col">#</th>
                                        <th class="border-gray-200" scope="col">Title</th>
                                        <th class="border-gray-200" scope="col">Grade Level</th>
                                        <th class="border-gray-200" scope="col">Course</th>
                                        <th class="border-gray-200" scope="col">Section</th>
                                        <th class="border-gray-200" scope="col">Subject Name</th>
                                        <th class="border-gray-200" scope="col">Posted at</th>
                                        <th class="border-gray-200" scope="col">Deadline</th>
                                        <th class="border-gray-200" scope="col">Status</th>
                                        <th class="border-gray-200" scope="col">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- boostrap view model  -->
                        <div class="modal fade" id="Activity-modal-view" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content border-start-lg border-start-yellow">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="ActivityModal-view" style="font-size: 20px;">New Activity</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <label style="font-size: 20px;"><b>Title: </b></label>
                                            <span id="what-view" style="font-size: 20px;"></span><br />
                                        </div>
                                        <div class="col-md-12">
                                            <label style="font-size: 20px;"><b>Posted at: </b></label>
                                            <span id="created_at-view" style="font-size: 20px;"></span><br />
                                        </div>
                                        <div class="col-md-12">
                                            <label style="font-size: 20px;"><b>Deadline: </b></label>
                                            <span id="expired_at-view" style="font-size: 20px;"></span> <span id="whn_time-view" style="font-size: 20px;"></span> <br />
                                        </div>
                                        <div class="col-md-12">
                                            <label style="font-size: 20px;"><b>Gradelevel: </b></label>
                                            <span id="gradelevel-view" style="font-size: 20px;"></span><br />
                                        </div>
                                        <div class="col-md-12">
                                            <label style="font-size: 20px;"><b>Strand: </b></label>
                                            <span id="course-view" style="font-size: 20px;"></span><br />
                                        </div>
                                        <div class="col-md-12">
                                            <label style="font-size: 20px;"><b>Section: </b></label>
                                            <span id="section-view" style="font-size: 20px;"></span><br />
                                        </div>
                                        <div class="col-md-12">
                                            <label style="font-size: 20px;"><b>Subject: </b></label>
                                            <span id="subject-view" style="font-size: 20px;"></span><br />
                                        </div>
                                        <div class="col-md-12">
                                            <label style="font-size: 20px;"><b>Content: </b></label>
                                            <span id="content-view" style="font-size: 20px;"></span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- boostrap update model  -->
                        <div class="modal fade" id="Activity-modal-update" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content border-start-lg border-start-yellow">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="ActivityModal-update" style="font-size: 20px;">New Activity</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="javascript:void(0)" id="ActivityFormUpdate" name="ActivityFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
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
                                                    <label class="large mb-1" for="inputwhat" style="font-size: 20px;"><span style="color: red">*</span> What</label>
                                                    <input type="text" class="form-control @error('what') is-invalid @enderror" id="what-update" placeholder="Enter the title" name="what" style="font-size: 20px;" required>
                                                    <div class="invalid-feedback">
                                                        Please input subject.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="slarge mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Deadline Date</label>
                                                    <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="expired_at-update" placeholder="Enter the date" name="expired_at" style="font-size: 16px; " required>
                                                    <div class="invalid-feedback">
                                                        Please input expiry date.
                                                    </div>
                                                </div>
                                                <!-- Form Group (content)-->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="slarge mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Deadline Time</label>
                                                        <input type="time" id="whn_time-update" class="form-control" name="whn_time" value="{{ old('whn_time-update') }}" style="font-size: 20px; " required>
                                                        <div class="invalid-feedback">
                                                            Please input time.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                                                    <select id="gradelevel_id-update" name="gradelevel_id" value="{{ old('gradelevel_id') }}" class="form-control" required>
                                                        <option value="" disabled selected hidden>Choose Gradelevel</option>
                                                        @foreach ($gradelevels as $gradelevel)
                                                        <option value="{{ $gradelevel->gradelevel->id }}">{{ $gradelevel->gradelevel->gradelevel }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please choose grade level.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                                                    <select id="course_id-update" class="form-control" name="course_id" value="{{ old('course_id') }}" required>
                                                        <option value="" disabled selected hidden>Choose Strand</option>
                                                        @foreach ($courses as $course)
                                                        <option value="{{ $course->course->id }}">{{ $course->course->courseName}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please choose strand.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                                                    <select id="section_id-update" name="section_id" value="{{ old('section_id') }}" class="form-control" required>
                                                        <option value="" disabled selected hidden>Choose Section</option>
                                                        @foreach ($sections as $section)
                                                        <option value="{{ $section->section->id }}">{{ $section->section->section}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please choose section.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="subject_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                                                    <select id="subject_id-update" name="subject_id" value="{{ old('subject_id') }}" class="form-control" required>
                                                        <option value="" disabled selected hidden>Choose Subject</option>
                                                        @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->subject->id }}">{{ $subject->subject->subjectname}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please choose subject.
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                                    <textarea class="form-control @error('content') is-invalid @enderror" id="editor2-update" type="text" placeholder="Enter the information" name="content" style="font-size: 16px;" rows="10" cols="80" required></textarea>
                                                    <div class="invalid-feedback">
                                                        Please input content.
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
                        <div class="modal fade" id="Activity-modal-delete" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content border-start-lg border-start-yellow">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="ActivityModalDelete" style="font-size: 20px;">Delete Activity</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="javascript:void(0)" id="ActivityFormDelete" name="ActivityFormDelete" class="form-horizontal" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="id-delete">
                                            <p style="color: red; font-size:20px;">Are you sure you want to delete <span id="activity-delete"></span>?</p>
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
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
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
                ajax: "{{ url('/createannouncement') }}",
                columns: [{
                        "data": "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'what',
                        name: 'what'
                    },
                    {
                        data: 'gradelevel',
                        name: 'gradelevel'
                    },
                    {
                        data: 'abbreviation',
                        name: 'abbreviation'
                    },
                    {
                        data: 'section',
                        name: 'section'
                    },
                    {
                        data: 'subjectname',
                        name: 'subjectname'
                    },
                    {
                        data: 'created_atAct',
                        name: 'created_atAct',
                        "render": function(data) {
                            var date = new Date(data);
                            return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                        }
                    },
                    {
                        data: 'expired_atAct',
                        name: 'expired_atAct',
                        "render": function(data) {
                            var date = new Date(data);
                            return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                        }
                    },
                    {
                        "data": "id",
                        "render": function(data, type, full, meta) {
                            if (full["status"] == 1)
                                return '<span class="badge bg-success" style="color:#fff">Active</span>';
                            else if (full["status"] == 2)
                                return '<span class="badge bg-danger" style="color:#fff">Expired</span>';
                            else
                                return '<span class="badge bg-secondary" style="color:#fff">Undetermined</span>';
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

            $.ajax({
                type: "POST",
                url: "{{ url('/countfacultyannouncement') }}",
                dataType: 'json',
                success: function(res) {
                    document.getElementById('reload').innerHTML = res.active;
                    document.getElementById('reload2').innerHTML = res.expired;
                }
            });
        });

        function viewFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/viewfacultyannouncement') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ActivityModal-view').html("View Activity");
                    $('#Activity-modal-view').modal('show');
                    document.getElementById('what-view').innerHTML = res.what;
                    document.getElementById('created_at-view').innerHTML = res.created_atAct;
                    document.getElementById('expired_at-view').innerHTML = res.expired_atAct;
                    document.getElementById('whn_time-view').innerHTML = res.whn_timeAct;
                    document.getElementById('gradelevel-view').innerHTML = res.gradelevel;
                    document.getElementById('course-view').innerHTML = res.courseName;
                    document.getElementById('section-view').innerHTML = res.section;
                    document.getElementById('subject-view').innerHTML = res.subjectname;
                    document.getElementById('content-view').innerHTML = res.content;
                }
            });
        }

        function editFunc(id) {
            $('#ActivityFormUpdate').trigger("reset").removeClass('was-validated');
            document.getElementById('whoops-update').style.display = 'none';
            $.ajax({
                type: "POST",
                url: "{{ url('/showfacultyannouncement') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ActivityModal-update').html("Edit Activity");
                    $('#Activity-modal-update').modal('show');
                    $('#id-update').val(res.id);
                    $('#what-update').val(res.what);
                    $('#expired_at-update').val(res.expired_at);
                    $('#whn_time-update').val(res.whn_time);
                    $('#gradelevel_id-update').val(res.gradelevel_id);
                    $('#course_id-update').val(res.course_id);
                    $('#section_id-update').val(res.section_id);
                    $('#subject_id-update').val(res.subject_id);
                    $('#editor2-update').val(res.content);
                }
            });
        }

        function deleteFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/deleteannouncementfaculty') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#Activity-modal-delete').modal('show');
                    $('#id-delete').val(res.id);
                    document.getElementById('activity-delete').innerHTML = res.what;
                }
            });
        }

        $('#ActivityFormUpdate').submit(function(e) {
            e.preventDefault();

            if ($('#ActivityFormUpdate')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/updatefacultyannouncement')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Activity-modal-update").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Activity has been updated successfully',
                        });
                        $(":submit").removeAttr("disabled");
                    },
                    complete: function() {
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/countfacultyannouncement') }}",
                            dataType: 'json',
                            success: function(res) {
                                document.getElementById('reload').innerHTML = res.active;
                                document.getElementById('reload2').innerHTML = res.expired;
                            }
                        });
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
            $('#ActivityFormUpdate').addClass('was-validated');

        });

        $('#ActivityFormDelete').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('/activitystream/delete')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#Activity-modal-delete").modal('hide');
                    var oTable = $('#example').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'Activity has been deleted successfully',
                    });
                },
                complete: function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/countfacultyannouncement') }}",
                        dataType: 'json',
                        success: function(res) {
                            document.getElementById('reload').innerHTML = res.active;
                            document.getElementById('reload2').innerHTML = res.expired;
                        }
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });


        $('#createFacultyannouncement').submit(function(e) {
            e.preventDefault();
            if ($('#createFacultyannouncement')[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                var formData = new FormData(this);
                $(":submit").attr("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('announcement.store') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response) {
                            var oTable = $('#example').dataTable();
                            oTable.fnDraw(false);
                            $("#btn-save").html('Submit');
                            $("#btn-save").attr("disabled", false);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success.',
                                text: 'Activity has been added successfully',
                            });
                            $("#reload").load(location.href + " #reload");
                            $("#reload2").load(location.href + " #reload2");
                            $(":submit").removeAttr("disabled");
                            $('#createFacultyannouncement').trigger("reset").removeClass('was-validated');
                        }
                    },
                    complete: function() {
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/countfacultyannouncement') }}",
                            dataType: 'json',
                            success: function(res) {
                                document.getElementById('reload').innerHTML = res.active;
                                document.getElementById('reload2').innerHTML = res.expired;
                            }
                        });
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
            $('#createFacultyannouncement').addClass('was-validated');

        });
    </script>

</main>