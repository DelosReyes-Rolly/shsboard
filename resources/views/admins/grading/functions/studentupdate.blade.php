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

        <form method="POST" action="/updatestudent/{{$student->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Update Student</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">
                                    @if($student->status==1)
                                        <div class="pull-right">
                                            <a href="/studentaddsubject/{{$student->id}}" class="btn btn-primary"><i class="fas fa-book"> </i> Add Subject Manually</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><span style="color: red">*</span> LRN</label>
                                            <input type="text" name="LRN" class="form-control @error('LRN') is-invalid @enderror" value="{{$student->LRN}}" style="font-size: 14px;">
                                        </div><br/><br/>
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{$student->last_name}}" style="font-size: 14px;">
                                        </div><br/><br/>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{$student->first_name}}" style="font-size: 14px;">
                                        </div><br/><br/>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"> Middle Name</label>
                                            <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{$student->middle_name}}" style="font-size: 14px;">
                                        </div><br/><br/>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;">Suffix</label>
                                            <input type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{$student->suffix}}" style="font-size: 14px;">
                                        </div>
                                    </div><br/><br/>
                                    <!-- Form Row -->
                                    <div class="row">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$student->email}}" style="font-size: 14px;"> 
                                        </div><br/><br/><br/><br/>
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                                                <select id="gradelevel_id" name="gradelevel_id" class="form-control" value="{{ old('$student->gradelevel_id') }}" style="font-size: 14px;">
                                                    <option value="" disabled selected hidden>Choose Gradelevel</option>
                                                    @foreach ($gradelevels as $gradelevel)
                                                        <option value="{{ $gradelevel->id }}" {{ old('gradelevel', $gradelevel->id) || $student->gradelevel_id === $gradelevel->id ? 'selected' : '' }}>{{ $gradelevel->gradelevel }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><br/><br/>
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                                                <select id="course_id" name="course_id" class="form-control" value="{{ old('$student->course_id') }}" style="font-size: 14px;">
                                                    <option value="" disabled selected hidden>Choose Course</option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}" {{ old('course', $course->id) || $student->course_id === $course->id ? 'selected' : '' }}>{{ $course->courseName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><br/><br/>
                                        <div class="col-md-10">
                                            <div class="col-md-12"><label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                                                <select id="section_id" name="section_id" class="form-control" value="{{ old('$student->section_id') }}" style="font-size: 14px;">
                                                    <option value="" disabled selected hidden>Choose Section</option>
                                                    @foreach ($sections as $section)
                                                        <option value="{{ $section->id }}"  {{ old('section', $section->id) || $student->section_id === $section->id ? 'selected' : '' }}>{{ $section->section}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <a class="btn btn-info btn-md" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
                                    <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
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