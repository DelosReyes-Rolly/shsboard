@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<br/><br/><br/><br/>
<div class="content">

        
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">View Announcement</div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwhat">What: </label>
                                            {{$announcement->what}}
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputwhn">When: </label>
                                            {{$requested_at  =   date('F d, Y', strtotime($announcement->whn))}}
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="appt">Time: </label>
                                                {{$time_start =  date('h:i A', strtotime($announcement->whn_time))}}
                                            </div>
                                        </div>
                                        <!-- Form Group whr-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputexpired_at">Expired at: </label>
                                            {{$requested_at  =   date('F d, Y', strtotime($announcement->expired_at))}}
                                        </div>
                                    </div><br/>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="gradelevel_id">Grade Level: </label>
                                                    {{$announcement -> gradelevel -> gradelevel}}
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="course_id">Course: </label>
                                                    {{$announcement -> course -> courseName}}
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="section_id">Section: </label>
                                                    {{$announcement -> section -> section}}
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="subject_id">Subject: </label>
                                                    {{$announcement -> subject -> subjectname}}
                                                </div>
                                            </div>
                                        </div><br/>
                                    </div>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor">Content: </label>
                                            {!!$announcement->content!!}
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Save changes button-->
                                            <div class="pull-right">
                                                <a class="btn btn-info btn-sm" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                                <a class="btn btn-warning btn-sm" href="/showfacultyannouncement/{{$announcement->id}}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-sm" href="{{route('faculty.deleteannouncement', $announcement->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
                                            </div>
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