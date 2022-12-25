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

        <form method="POST" action="/updateadvisory/{{$advisory->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Update Class</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"><font face = "Bedrock" size = "6"><b>Update Teacher's Class</b></font></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="faculty_id" style="font-size: 20px;"><span style="color: red">*</span> Teacher</label>
                                                <select id="faculty_id" name="faculty_id" class="form-control" style="font-size: 14px;">
                                                    <option value="" disabled selected hidden>Choose Teacher</option>
                                                    @foreach ($faculties as $faculty)
                                                        <option value="{{ $faculty->id }}" {{($advisory->faculty->id==$faculty->id)? 'selected':'' }}>{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->middle_name }} {{$advisory -> faculty -> suffix}}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
                                    </div><br/>
                                    
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Subjects</label>
                                                <select id="gradelevel_id" name="gradelevel_id" class="form-control" value="{{ old('gradelevel_id') }}" style="font-size: 14px;">
                                                    <option value="" disabled selected hidden>Choose Grade Level</option>
                                                    @foreach ($gradelevels as $gradelevel)
                                                        <option value="{{ $gradelevel->id }}"{{($advisory->gradelevel->id==$gradelevel->id)? 'selected':'' }}>{{ $gradelevel->gradelevel}}</option>
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
                                                        <option value="{{ $course->id }}"{{($advisory->course->id==$course->id)? 'selected':'' }}>{{ $course->courseName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><br/>

                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Sections</label>
                                                <select id="section_id" name="section_id" class="form-control" value="{{ old('section_id') }}" style="font-size: 14px;">
                                                    <option value="" disabled selected hidden>Choose Section</option>
                                                    @foreach ($sections as $section)
                                                        <option value="{{ $section->id }}"{{($advisory->section->id==$section->id)? 'selected':'' }}>{{ $section->section}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><br/>
                                    
                                    <hr>
                                    <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                    <a href="/advisory" class="btn btn-secondary ml-2"><font face = "Verdana" size = "2">Cancel</font></a>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </form>

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