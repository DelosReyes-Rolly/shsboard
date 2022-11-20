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
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
<section>
        <div>
            <div >
                <!-- boxes -->
                <hr style="border: 1px solid grey;">
                <div class="container-xl px-4 mt-4 left-to-right">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <!-- Billing card 2-->
                            <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white;" >
                                <div class="card-body">
                                    <div class="requesteddocument" style="color: white; font-size: 20px; font-weight: 800;">Expired Activity</div>
                                    <div class="h3" style="padding-left: 20px; padding-bottom: 10px;"><i class="fas fa-calendar-times"></i> {{ $expired }} </div>
                                    <!-- <a class="text-arrow-icon small text-secondary" href="#!">
                                        View expired announcements
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 3-->
                        <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white;">
                            <div class="card-body">
                                <div class="requesteddocument" style="color: white; font-size: 20px; font-weight: 800;">Active Annoucements</div>
                                <div class="h3 d-flex align-items-center" style="padding-left: 20px; padding-bottom: 10px;"><i class="fas fa-bullhorn"></i> {{ $active }} </div>
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
                <form method="POST" action="{{ route('announcement.store') }}">
                    @csrf
                    <div class="container-xl px-4 mt-4 right-to-left">
                        <!-- page navigation-->
                        <h3 style="font-size: 28px; font-weight: 800;">Create Activity </h3>
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card border-start-lg border-start-yellow">
                                        <div class="card-header"></div>
                                        <div class="card-body">
                                            <div class="mb-3" style="color: red">
                                                * required field
                                            </div>
                                            @if ($message = Session::get('message'))
                                                <div class="alert alert-success alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @endif
                                                        
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <strong>Whoops!</strong> There were some problems with your input.
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3 requestdocument">
                                                <!-- Form Group (title)-->
                                                <br>
                                                <div class="col-md-6">
                                                    <label class="large mb-1" for="inputwhat" style="font-size: 20px;"><span style="color: red">*</span> What</label>
                                                    <input class="form-control @error('what') is-invalid @enderror" id="inputwhat" type="text" style="font-size: 16px;" placeholder="Enter the title" name="what"  value="{{ old('what') }}">
                                                </div>
                                            </div>
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3 requestdocument">
                                                <!-- Form Group whr-->
                                                <div class="col-md-3">
                                                    <br>
                                                    <label class="large mb-1" for="inputwhn" style="font-size: 20px;"><span style="color: red">*</span> When</label>
                                                    <input type="date" class="form-control @error('whn') is-invalid @enderror" id="inputwhn" style="font-size: 16px;" placeholder="Enter the date" name="whn"  value="{{ old('whn') }}">
                                                </div>
                                                <!-- Form Group (content)-->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <br>
                                                        <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Select a time:</label><br>
                                                        <input type="time" id="whn_time" name="whn_time" value="{{ old('whn_time') }}">
                                                    </div>
                                                </div>
                                                <!-- Form Group whr-->
                                                <div class="col-md-3">
                                                    <br>
                                                    <label class="large mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Expired at</label>
                                                    <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" style="font-size: 16px;" placeholder="Enter the date" name="expired_at"  value="{{ old('expired_at') }}">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3 requestdocument">
                                                <!-- Form Row -->
                                                <div class="row gx-3 mb-3">
                                                    <!-- Form Group whr-->
                                                    <div class="col-md-10">
                                                        <div class="col-md-12"><label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                                                            <select id="gradelevel_id" name="gradelevel_id" class="form-control" value="{{ old('gradelevel_id') }}" style="font-size: 14px;">
                                                                <option value="" disabled selected hidden>Choose Gradelevel</option>
                                                                @foreach ($gradelevels as $gradelevel)
                                                                    <option value="{{ $gradelevel->id }}">{{ $gradelevel->gradelevel }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><br/>
                                                <!-- Form Row -->
                                                <div class="row gx-3 mb-3">
                                                    <!-- Form Group whr-->
                                                    <div class="col-md-10">
                                                        <div class="col-md-12"><label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                                                            <select id="course_id" name="course_id" class="form-control" value="{{ old('course_id') }}" style="font-size: 14px;">
                                                                <option value="" disabled selected hidden>Choose Strand</option>
                                                                @foreach ($courses as $course)
                                                                    <option value="{{ $course->id }}">{{ $course->courseName}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><br/>
                                                <!-- Form Row -->
                                                <div class="row gx-3 mb-3">
                                                    <!-- Form Group whr-->
                                                    <div class="col-md-10">
                                                        <div class="col-md-12"><label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                                                            <select id="section_id" name="section_id" class="form-control" value="{{ old('section_id') }}" style="font-size: 14px;">
                                                                <option value="" disabled selected hidden>Choose Section</option>
                                                                @foreach ($sections as $section)
                                                                    <option value="{{ $section->id }}">{{ $section->section}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><br/>
                                                <!-- Form Row -->
                                                <div class="row gx-3 mb-3">
                                                    <!-- Form Group whr-->
                                                    <div class="col-md-10">
                                                        <div class="col-md-12"><label for="subject_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                                                            <select id="subject_id" name="subject_id" class="form-control" value="{{ old('subject_id') }}" style="font-size: 14px;">
                                                                <option value="" disabled selected hidden>Choose Subject</option>
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{ $subject->id }}">{{ $subject->subjectname}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><br/>
                                            </div>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                    <br>
                                                    <label class="large mb-1" for="inputcontent" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                                    <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" style="font-size: 16px;" placeholder="Enter your purpose" name="content">{{ old('content') }}</textarea>
                                                    <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit" style=" margin-right: 80px;"></font>
                                                </div><br/>
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
                <div class="card mb-4 left-to-right border-start-lg border-start-success" style="padding: 20px 20px 20px 20px;">
                    <div class="card-header"></div>
                    <div class="card-body p-0">
                        <!-- Activity table-->
                        @if($announcementCount == NULL)
							<div class="alert alert-danger"><em>No records found.</em></div>
						@else 
                            <br>
                            <div class="table-responsive table-billing-history">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="border-gray-200" scope="col">#</th>
                                            <th class="border-gray-200" scope="col">Title</th>
                                            <th class="border-gray-200" scope="col">Grade Level</th>
                                            <th class="border-gray-200" scope="col">Course</th>
                                            <th class="border-gray-200" scope="col">Section</th>
                                            <th class="border-gray-200" scope="col">Subject Name</th>
                                            <th class="border-gray-200" scope="col">Date</th>
                                            <th class="border-gray-200" scope="col">Time</th>
                                            <th class="border-gray-200" scope="col">Expired at: </th>
                                            <th class="border-gray-200" scope="col">Status</th>
                                            <th class="border-gray-200" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach ($announcementCount as $announcement)
                                            <tr>
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td> {{$announcement -> what}} </td>
                                                <td>{{$announcement -> gradelevel -> gradelevel}}</td>
                                                <td>{{$announcement -> course -> courseName}}</td>
                                                <td>{{$announcement -> section -> section}}</td>
                                                <td>{{$announcement -> subject -> subjectname}}</td>
                                                <td>{{$date  =   date('F d, Y', strtotime($announcement->whn))}}</td>
                                                <td>{{$time_start =  date('h:i A', strtotime($announcement->whn_time))}}</td>
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
                                                    <a class="btn btn-success btn-md" href="/viewfacultyannouncement/{{$announcement->id}}"><i class="fas fa-eye"></i> View</a>
                                                    <a class="btn btn-warning btn-md" href="/showfacultyannouncement/{{$announcement->id}}"><i class="fas fa-edit"></i> Update</a>
                                                    <a class="btn btn-danger btn-md" href="{{route('faculty.deleteannouncement', $announcement->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
                                                </td> 
                                            </tr>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>

</main>