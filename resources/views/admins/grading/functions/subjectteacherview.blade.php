@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
<div class="left-to-right">
        
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">View Schedule</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id" style="font-size: 26px;"><b>Teacher: </b></label>
                                                <span style="font-size: 26px;">{{$subjectteacher -> faculty -> last_name}}, {{$subjectteacher -> faculty -> first_name}} {{$subjectteacher -> faculty -> middle_name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id" style="font-size: 26px;"><b>Grade Level:</b> </label>
                                                <span style="font-size: 26px;">{{$subjectteacher -> gradelevel -> gradelevel}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id" style="font-size: 26px;"><b>Semester:</b> </label>
                                                <span style="font-size: 26px;">{{$subjectteacher -> semester -> sem}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id" style="font-size: 26px;"><b>Course:</b> </label>
                                                <span style="font-size: 26px;">{{$subjectteacher -> course -> courseName}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id" style="font-size: 26px;"><b>Section:</b> </label>
                                                <span style="font-size: 26px;">{{$subjectteacher -> section -> section}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="subject_id" style="font-size: 26px;"><b>Subject:</b> </label>
                                                <span style="font-size: 26px;">{{$subjectteacher -> subject -> subjectname}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3" style="padding-left: 20px;">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="appt" style="font-size: 26px;"><b>Time:</b> </label>
                                                <span style="font-size: 26px;">{{$time_start =  date('h:i A', strtotime($subjectteacher -> time_start))}} - {{$time_end =  date('h:i A', strtotime($subjectteacher -> time_end))}}</span>
                                            </div>
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-info btn-md" href="/gradingfacultysubjects"><i class="fas fa-arrow-left"></i> Back</a>
                                            <a class="btn btn-warning btn-md" href="/showsubjectteacher/{{$subjectteacher->id}}"><i class="fas fa-edit"></i> Update</a>
                                            <a class="btn btn-danger btn-md" href="{{route('admin.deletesubjectteacher', $subjectteacher->id)}}"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div><br/>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        
</main>
<br><br><br><br>