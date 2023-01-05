@include('partials.facultyheader')
@include('partials.facultySecondHeader')
<main>
<div>

        <form method="POST" action="/updatefacultyannouncement/{{$announcement->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <div style="margin: 20px;">
                    <a class="btn btn-secondary btn-lg" href="/createannouncement" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to activity stream</a>
                </div>
                <h3 style="font-size: 28px; font-weight: 800;">Update Activity</h3><br/>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">
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
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwhat" style="font-size: 20px;"><span style="color: red">*</span> What</label>
                                            <input class="form-control @error('what') is-invalid @enderror" id="inputwhat" type="text" placeholder="Enter the title" name="what"  value="{{$announcement->what}}" style="font-size: 20px;">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputwhn" style="font-size: 20px;"><span style="color: red">*</span> When</label>
                                            <input type="date" class="form-control @error('whn') is-invalid @enderror" id="inputwhn" placeholder="Enter the date" name="whn"  value="{{$announcement->whn}}" style="font-size: 20px;">
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                            <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time:</label><br>
                                            <input type="time" id="whn_time" name="whn_time" value="{{$announcement->whn_time}}">
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row">
                                        <!-- Form Row -->
                                        <!-- Form Group whr-->
                                        <div class="col-lg-2 col-md-12">
                                            <label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                                            <select id="gradelevel_id" name="gradelevel_id" value="{{ old('gradelevel_id') }}" style="font-size: 16px; padding: 12px; display: block; width: 100%;">
                                                <option value="" disabled selected hidden>Choose Gradelevel</option>
                                                @foreach ($gradelevels as $gradelevel)
                                                    <option value="{{ $gradelevel->gradelevel->id }}" {{($gradelevel->gradelevel->id==$gradelevel->id)? 'selected':'' }}>{{ $gradelevel->gradelevel->gradelevel }}</option>
                                                @endforeach
                                            </select>
                                        </div><br/>
                                        <div class="col-lg-4 col-md-12">
                                            <label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                                            <select id="course_id" name="course_id" value="{{ old('course_id') }}" style="font-size: 16px; padding: 12px; display: block; width: 100%;">
                                                <option value="" disabled selected hidden>Choose Course</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->course->id }}"{{($course->course->id==$course->id)? 'selected':'' }}>{{ $course->course->courseName}}</option>
                                                @endforeach
                                            </select>
                                        </div><br/>
                                        <div class="col-lg-2 col-md-12">
                                            <label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                                            <select id="section_id" name="section_id" value="{{ old('section_id') }}" style="font-size: 16px; padding: 12px; display: block; width: 100%;">
                                                <option value="" disabled selected hidden>Choose Section</option>
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->section->id }}"{{($section->section->id==$section->id)? 'selected':'' }}>{{ $section->section->section}}</option>
                                                @endforeach
                                            </select>
                                        </div><br/>
                                        <div class="col-lg-4 col-md-12">
                                            <label for="subject_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                                                <select id="subject_id" name="subject_id" value="{{ old('subject_id') }}" style="font-size: 16px; padding: 12px; display: block; width: 100%;">
                                                    <option value="" disabled selected hidden>Choose Subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->subject->id }}"{{($subject->subject->id==$subject->id)? 'selected':'' }}>{{ $subject->subject->subjectname}}</option>
                                                    @endforeach
                                                </select>
                                         </div>
                                        <!-- Form Row -->
                                    </div><br/>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Expired at</label>
                                            <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{$announcement->expired_at}}" style="font-size: 20px; padding: 20px;">
                                        </div>
                                    </div><br/>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80">{{$announcement->content}}</textarea>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Save changes button-->
                                            <a class="btn btn-info btn-md" href="{{ url()->previous() }}" style="font-size: 16px;"><i class="fas fa-arrow-left"></i> Back</a> &emsp;
                                            <font face = "Verdana" size = "4"><input type="submit" class="btn btn-primary" value="Submit" style="font-size: 16px;"></font>
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