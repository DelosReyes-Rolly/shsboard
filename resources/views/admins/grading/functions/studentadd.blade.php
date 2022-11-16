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

        <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Create Student</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"><font face = "Bedrock" size = "6"><b><i class="fas fa-pencil-alt"></i> Add Student Information</b></font></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;">* LRN</label>
                                            <input type="text" name="LRN" class="form-control @error('LRN') is-invalid @enderror" value="{{ old('LRN') }}" style="font-size: 14px;">
                                        </div><br/><br/>
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;">* Last Name</label>
                                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" style="font-size: 14px;">
                                        </div><br/><br/>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;">* First Name</label>
                                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" style="font-size: 14px;">
                                        </div><br/><br/>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;">* Middle Name</label>
                                            <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}" style="font-size: 14px;">
                                        </div><br/><br/>
                                    </div>
                                    <div class="form-group">
                                        <label for ="gender">* Gender</label><br>
                                        <select name="gender">
                                            <option value="" hidden>  Please Select Gender </option>
                                            <option value="Male">Male </option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                            <option value="Prefer not to say">Prefer not to say</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="gradelevel_id" class="col-form-label text-md-end" style="font-size: 20px;">* {{ __('Grade Level') }}</label><br>
                                        <select name="gradelevel_id" id="gradelevel_id">
                                            <option value="" {{old('gradelevel_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                                            @foreach($level_data as $gradelevel_id)
                                                <option value="{{$gradelevel_id->id}}">{{$gradelevel_id->gradelevel}}</option>
                                             @endforeach
                                        </select>
                                    </div>
                                                
                                    <div class="form-group">
                                        <label for="section_id" class="col-form-label text-md-end" style="font-size: 20px;">* {{ __('Section') }}</label>
                                        <select name="section_id" id="section_id">
                                        <option value="" {{old('section_id') == "" ?'selected' : ''}} disabled> Please Select section </option>
                                            @foreach($section_data as $section_id)
                                                <option value="{{$section_id->id}}">{{$section_id->section}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="course_id" class="col-form-label text-md-end" style="font-size: 20px;">* {{ __('Strand') }}</label>
                                        <select name="course_id" id="course_id">
                                        <option value="" {{old('course_id') == "" ?'selected' : ''}} disabled> Please Select Strand </option>
                                            @foreach($courses_data as $course_id)
                                                <option value="{{$course_id->id}}">{{$course_id->courseName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;">* Email Address</label>
                                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" style="font-size: 14px;"> 
                                        </div><br/><br/>    
                                    </div>
                                    <hr>
                                    <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                    <div class="pull-right">
                                        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                    </div>
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