@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
<div class="left-to-right">

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
            <form method="POST" action="{{ route('advisory.store') }}" enctype="multipart/form-data">
                 @csrf
                 <h3 style="font-size: 28px; font-weight: 800;">Create Advisory Class</h3>
                <hr class="mt-0 mb-4">
                <div class="card mb-4">
                    <div class="card border-start-lg border-start-yellow">
                        <div class="card-header"><font face = "Bedrock" size = "6"><b>New Teacher's Class</b></font></div>
                        <div class="card-body" style="padding: 0px 40px 10px 40px;">
                            <div class="mb-3" style="color: red">
                                * required field
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                
                                <!-- Form Group (title)-->
                                <div class="col-md-10">
                                    <div class="col-md-12"><label for="faculty_id" style="font-size: 20px;"><span style="color: red">*</span> Teacher</label>
                                        <select id="faculty_id" name="faculty_id" class="form-control" value="{{ old('faculty_id') }}" style="font-size: 14px;">
                                            <option value="" disabled selected hidden>Choose Teacher</option>
                                            @foreach ($faculties as $faculty)
                                                <option value="{{ $faculty->id }}"}>{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->middle_name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                            </div><br/>
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
                                            <option value="" disabled selected hidden>Choose Course</option>
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
                            <hr>
                            <a class="btn btn-info btn-md" href="/advisory"><i class="fas fa-arrow-left"></i> Back</a>
                            <div class="pull-right">
                                <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>

        <script>
            CKEDITOR.replace('editor');
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