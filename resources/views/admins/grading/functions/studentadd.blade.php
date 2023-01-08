<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New student</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="{{ route('student.store') }}">
    <div class="modal-body">
        @csrf
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">       
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span>  LRN</label>
                <input type="text" name="LRN" class="form-control @error('LRN') is-invalid @enderror" value="{{ old('LRN') }}" style="font-size: 14px;">
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span>  Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" style="font-size: 14px;">
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span>  First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" style="font-size: 14px;">
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"> Middle Name</label>
                <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}" style="font-size: 14px;">
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;">Suffix</label>
                <input type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{ old('suffix') }}" style="font-size: 14px;">
            </div>
            <div class="col-md-12">
                <label for ="gender"><span style="color: red">*</span>  Sex</label><br>
                <select name="gender" class="form-control">
                    <option value=""  {{old('gender') == "" ?'selected' : ''}} disabled>  Please Select Sex </option>
                    <option value="Male">Male </option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="gradelevel_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Grade Level') }}</label><br>
                <select name="gradelevel_id" id="gradelevel_id" class="form-control">
                    <option value="" {{old('gradelevel_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                    @foreach($level_data as $gradelevel_id)
                    <option value="{{$gradelevel_id->id}}">{{$gradelevel_id->gradelevel}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">                                   
                <label for="section_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Section') }}</label>
                <select name="section_id" id="section_id" class="form-control">
                    <option value="" {{old('section_id') == "" ?'selected' : ''}} disabled> Please Select section </option>
                    @foreach($section_data as $section_id)
                    <option value="{{$section_id->id}}">{{$section_id->section}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label for="course_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Strand') }}</label>
                <select name="course_id" id="course_id" class="form-control">
                    <option value="" {{old('course_id') == "" ?'selected' : ''}} disabled> Please Select Strand </option>
                    @foreach($courses_data as $course_id)
                    <option value="{{$course_id->id}}">{{$course_id->courseName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span>  Email Address</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" style="font-size: 14px;"> 
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>