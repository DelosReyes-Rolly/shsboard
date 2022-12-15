@include('partials.facultyheader')
@include('partials.facultySecondHeader')
<main>
<div>     
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">View Announcement</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 40px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwhat" style="font-size: 26px;"><b>What: </b></label>
                                                <span style="font-size: 26px;">{{$announcement->what}}</span>
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputwhn" style="font-size: 26px;"><b>When: </b></label>
                                                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($announcement->whn))}}</span>
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="appt" style="font-size: 26px;"><b>Time: </b></label>
                                                    <span style="font-size: 26px;">{{$time_start =  date('h:i A', strtotime($announcement->whn_time))}}</span>
                                            </div>
                                        </div>
                                        <!-- Form Group whr-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputexpired_at" style="font-size: 26px;"><b>Expired at: </b></label>
                                                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($announcement->expired_at))}}</span>
                                        </div>
                                    </div><br/>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="gradelevel_id" style="font-size: 26px;"><b>Grade: </b></label>
                                                    <span style="font-size: 26px;">{{$announcement -> gradelevel -> gradelevel}}</span>
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="course_id" style="font-size: 26px;"><b>Course: </b></label>
                                                    <span style="font-size: 26px;">{{$announcement -> course -> courseName}}</span>
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-12">
                                                <div class="col-md-12"><label for="section_id" style="font-size: 26px;"><b>Section: </b></label><br>
                                                    <span style="font-size: 26px;">{{$announcement -> section -> section}}</span>
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="subject_id" style="font-size: 26px;"><b>Subject: </b></label>
                                                    <span style="font-size: 26px;">{{$announcement -> subject -> subjectname}}</span>
                                                </div>
                                            </div>
                                        </div><br/>
                                    </div>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 26px;"><b>Content: </b></label>
                                                <span style="font-size: 26px;">{!!$announcement->content!!}</span>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Save changes button-->
                                            <div class="pull-right">
                                                <a class="btn btn-info btn-md" href="{{ url()->previous() }}" style="font-size: 16px;"><i class="fas fa-arrow-left"></i> Back</a>
                                                <a class="btn btn-warning btn-md" href="/showfacultyannouncement/{{$announcement->id}}" style="font-size: 16px;"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="{{route('faculty.deleteannouncement', $announcement->id)}}" style="font-size: 16px;"><i class="far fa-trash-alt"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
       
</main>
<br><br><br><br>