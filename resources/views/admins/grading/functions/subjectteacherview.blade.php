@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
<div class="left-to-right">
        
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 20px;">View Schedule</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">View Teacher's Subject</div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id">Teacher: </label>
                                                {{$subjectteacher -> faculty -> last_name}}, {{$subjectteacher -> faculty -> first_name}} {{$subjectteacher -> faculty -> middle_name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id">Grade Level: </label>
                                                {{$subjectteacher -> gradelevel -> gradelevel}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id">Semester: </label>
                                                {{$subjectteacher -> semester -> sem}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id">Course: </label>
                                                {{$subjectteacher -> course -> courseName}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id">Section: </label>
                                                {{$subjectteacher -> section -> section}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="subject_id">Subject: </label>
                                                {{$subjectteacher -> subject -> subjectname}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3" style="padding-left: 20px;">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="appt">Time: </label>
                                                    {{$time_start =  date('h:i A', strtotime($subjectteacher -> time_start))}} - {{$time_end =  date('h:i A', strtotime($subjectteacher -> time_end))}}
                                            </div>
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-info btn-sm" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                            <a class="btn btn-warning btn-sm" href="/showsubjectteacher/{{$subjectteacher->id}}"><i class="fas fa-edit"></i> Update</a>
                                            <a class="btn btn-danger btn-sm" href="{{route('admin.deletesubjectteacher', $subjectteacher->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
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