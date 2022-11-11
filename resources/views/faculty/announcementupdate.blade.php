@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<br/><br/><br/><br/>
<div class="content">

        <!-- form -->
                    
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

        <form method="POST" action="/updatefacultyannouncement/{{$announcement->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">Update Announcement</div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwhat">What</label>
                                            <input class="form-control @error('what') is-invalid @enderror" id="inputwhat" type="text" placeholder="Enter the title" name="what"  value="{{$announcement->what}}">
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputwhn">When</label>
                                                <input type="date" class="form-control @error('whn') is-invalid @enderror" id="inputwhn" placeholder="Enter the date" name="whn"  value="{{$announcement->whn}}">
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="appt">Select a time:</label><br>
                                                <input type="time" id="whn_time" name="whn_time" value="{{$announcement->whn_time}}">
                                            </div>
                                        </div>
                                        <!-- Form Group whr-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputexpired_at">Expired at</label>
                                                <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{$announcement->expired_at}}">
                                        </div>
                                    </div><br/>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="gradelevel_id">Grade Level</label>
                                                    <select id="gradelevel_id" name="gradelevel_id" class="form-control" value="{{ old('gradelevel_id') }}" style="font-size: 14px;">
                                                        <option value="" disabled selected hidden>Choose Gradelevel</option>
                                                        @foreach ($gradelevels as $gradelevel)
                                                            <option value="{{ $gradelevel->id }}" {{($announcement->gradelevel->id==$gradelevel->id)? 'selected':'' }}>{{ $gradelevel->gradelevel }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="course_id">Course</label>
                                                    <select id="course_id" name="course_id" class="form-control" value="{{ old('course_id') }}" style="font-size: 14px;">
                                                        <option value="" disabled selected hidden>Choose Course</option>
                                                        @foreach ($courses as $course)
                                                            <option value="{{ $course->id }}"{{($announcement->course->id==$course->id)? 'selected':'' }}>{{ $course->courseName}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="section_id">Section</label>
                                                    <select id="section_id" name="section_id" class="form-control" value="{{ old('section_id') }}" style="font-size: 14px;">
                                                        <option value="" disabled selected hidden>Choose Section</option>
                                                        @foreach ($sections as $section)
                                                            <option value="{{ $section->id }}"{{($announcement->section->id==$section->id)? 'selected':'' }}>{{ $section->section}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-10">
                                                <div class="col-md-12"><label for="subject_id">Subject</label>
                                                    <select id="subject_id" name="subject_id" class="form-control" value="{{ old('subject_id') }}" style="font-size: 14px;">
                                                        <option value="" disabled selected hidden>Choose Subject</option>
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{ $subject->id }}"{{($announcement->subject->id==$subject->id)? 'selected':'' }}>{{ $subject->subjectname}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div><br/>
                                    </div>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor">Content</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80">{{$announcement->content}}</textarea>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Save changes button-->
                                            <font face = "Bedrock" size = "3"><input type="submit" class="btn btn-primary" value="Submit" style="float: right;"></font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'editor' );
        </script>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });
    </script>
</main>
<br><br><br><br>