@include('partials.facultyheader')
<main>
@php
    if($announcementCount != NULL){
        $pending = $announcementCount->where('approval', '=', '1')->count();
        $expired = $announcementCount->where('status', '=', '2')->count();
        $active = $announcementCount->where('status', '=', '1')->count();
    }
    else{
        $pending = 0;
        $expired = 0;
        $active = 0;
    }
@endphp
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
            table = $('#example').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
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
                            <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                                <div class="card-body">
                                    <div class="requesteddocument" style="color: white; font-size: 20px; font-weight: 800;">Expired Activity</div>
                                    <div class="h3" style="padding-left: 20px; padding-bottom: 10px; font-size:40px;"><i class="fas fa-calendar-times"> </i> <span id="reload2">{{ $expired }}</span> </div>
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
                                <div class="requesteddocument" style="color: white; font-size: 20px; font-weight: 800;">Active Annoucements</div>
                                <div class="h3 d-flex align-items-center" style="padding-left: 20px; padding-bottom: 10px; font-size:40px;"> <i class="fas fa-bullhorn"> </i> <span id="reload">{{ $active }}</span> </div>
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
                                                <b>Whoops! There is a problem in your input</b> <br/>
                                                <div id="validation-errors"></div>
                                            </div>
                                            <center><div id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3 requestdocument">
                                                <!-- Form Group (title)-->
                                                <br>
                                                <div class="col-md-6">
                                                    <label class="large mb-1" for="inputwhat" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Title</label>
                                                    <input class="form-control @error('inputwhat') is-invalid @enderror" id="inputwhat" type="text" style="font-size: 20px; padding: 20px;" placeholder="Enter the title" name="inputwhat"  value="{{ old('inputwhat') }}" required>
                                                    <div class="invalid-feedback">
                                                        Please input title.
                                                    </div>
                                                </div>
                                                <!-- Form Group whr-->
                                                <div class="col-lg-3">
                                                    <label class="large mb-1" for="inputexpired_at" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Activity Deadline</label>
                                                    <input type="date" class="form-control @error('inputexpired_at') is-invalid @enderror" id="inputexpired_at" style="font-size: 20px;padding: 20px;" placeholder="Enter the date" name="inputexpired_at"  value="{{ old('inputexpired_at') }}" required>
                                                    <div class="invalid-feedback">
                                                        Please input deadline date.
                                                    </div>
                                                </div>
                                                <!-- Form Group (content)-->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="appt" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Time</label><br>
                                                        <input type="time" id="whn_time" class="form-control" name="whn_time" value="{{ old('whn_time') }}" style="font-size: 20px; padding: 20px;"  required>
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
                                                    <label for="subject_id" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Subject</label><br/>
                                                    <select id="subject_id" name="subject_id" value="{{ old('subject_id') }}" style="font-size: 18px; padding: 12px; display: block; width: 100%;" required>
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
                                                    <label for="course_id" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Strand</label><br/>
                                                    <select id="course_id" name="course_id" value="{{ old('course_id') }}" style="font-size: 18px; padding: 12px; display: block; width: 100%;" required>
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
                                                    <label for="section_id" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Section</label><br/>
                                                    <select id="section_id" name="section_id" value="{{ old('section_id') }}" style="font-size: 18px; padding: 12px; display: block; width: 100%;" required>
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
                                                    <label for="gradelevel_id" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Grade Level</label><br/>
                                                    <select id="gradelevel_id" name="gradelevel_id" value="{{ old('gradelevel_id') }}" style="font-size: 18px; padding: 12px; display: block; width: 100%;" required>
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
                                                    <br/><label class="large mb-1" for="editors" style="font-size: 24px; font-weight: 400;"><span style="color: red">*</span> Content</label>
                                                    <textarea class="form-control @error('editors') is-invalid @enderror" rows="10" cols="80" id="editors" type="text" style="font-size: 20px;" placeholder="Enter your content" name="editors" required>{{ old('editors') }}</textarea>
                                                    <div class="invalid-feedback">
                                                        Please input content.
                                                    </div>
                                                </div>
                                                <br/><font face = "Verdana" size = "8"><input type="submit" class="btn btn-primary" value="Submit" style=" margin-right: 80px; font-size: 16px;"></font>
                                            </div>
                                                <br/>
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
                        @if($announcementCount == NULL)
							<div class="alert alert-danger"><em>No records found.</em></div>
						@else 
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
                                            <th class="border-gray-200" scope="col">Deadline: </th>
                                            <th class="border-gray-200" scope="col">Status</th>
                                            <th class="border-gray-200" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach ($announcementCount as $announcement)
                                            <tr id="announcement{{$announcement -> id}}">
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td> {{$announcement -> what}} </td>
                                                <td>{{$announcement -> gradelevel -> gradelevel}}</td>
                                                <td>{{$announcement -> course -> courseName}}</td>
                                                <td>{{$announcement -> section -> section}}</td>
                                                <td>{{$announcement -> subject -> subjectname}}</td>
                                                <td>{{$date  =   date('F d, Y', strtotime($announcement->created_at))}} , {{$time_start =  date('h:i A', strtotime($announcement->created_at))}}</td>
                                                <td>{{$date  =   date('F d, Y', strtotime($announcement->expired_at))}}</td>
                                                <td>
                                                    <?php 
                                                        switch ($announcement -> status) {
                                                            case '1':
                                                                echo '<span class="badge bg-success" style="color:#fff">Active</span>';
                                                                break;
                                                            case '2':
                                                                echo '<span class="badge bg-danger" style="color:#fff">Expired</span>';
                                                                break;
                                                            default:
                                                                echo '<span class="badge bg-secondary" style="color:#fff">Undetermined</span>';
                                                                break;
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-md" href="{{ url('viewfacultyannouncement',['id'=>$announcement->id]) }}" data-toggle="modal" data-target="#modal-view-{{$announcement->id}}" style="font-size: 18px;"><i class="fa-solid fa-eye"></i> View</a>
                                                    <a class="btn btn-warning btn-md" href="{{ url('showfacultyannouncement',['id'=>$announcement->id]) }}" data-toggle="modal" onclick="editItem(this)" data-id="{{ $announcement->id }}" data-target="#editModal{{ $announcement->id }}" style="font-size: 18px;"><i class="fas fa-edit"></i> Update</a>
                                                    <a class="btn btn-danger btn-md" href="{{ url('deleteannouncementfaculty',['id'=>$announcement->id]) }}" data-toggle="modal" onclick="deleteItem(this)" data-id="{{ $announcement->id }}" data-target="#deleteModal{{ $announcement->id }}" style="font-size: 18px;"><i class="fas fa-trash-alt"></i> Delete</a>
                                                </td> 
                                            </tr>
                                            <!-- modal view -->
                                            <div id="modal-view-{{ $announcement->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content border-start-lg border-start-yellow">
													</div>
												</div>
											</div>
                                            <!-- delete modal -->
                                            <div id="deleteModal{{ $announcement->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content border-start-lg border-start-yellow">
                                                    </div>
                                                </div>
                                            </div> 
                                            <!-- edit modal -->
                                            <div id="editModal{{ $announcement->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content border-start-lg border-start-yellow">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>    
					    @endif    
                    </div>
                </div> 
            </div>
        </div>
    </section> 
    <!-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editors' );
    </script> -->
    <script src="{{ asset('assets/js/needs-validated.js') }}"></script>
    <script>
        var $loading = $('#loadingDiv').hide();
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form_data = $("form#createFacultyannouncement").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('announcement.store') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createFacultyannouncement")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Activity has been added successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                        
                    }
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
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
        $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
        });
        editItem(e);
        deleteItem(e);

        });
        function editItem(e){
            id = e.getAttribute('data-id');
        }
        function deleteItem(e){
            id = e.getAttribute('data-id');
        }
        </script>
</main>