<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Student</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updatestudent/{{$student->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-10">
                <label style="font-size: 20px;"><span style="color: red">*</span> LRN</label>
                <input type="text" name="LRN" class="form-control @error('LRN') is-invalid @enderror" value="{{$student->LRN}}"  onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="12" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid LRN.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{$student->last_name}}" onkeydown="return alphaOnly(event);" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid last name.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{$student->first_name}}" onkeydown="return alphaOnly(event);" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid first name.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;"> Middle Name</label>
                <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{$student->middle_name}}" onkeydown="return alphaOnly(event);" style="font-size: 14px;">
                <div class="invalid-feedback">
                    Please input valid middle name.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;">Suffix</label>
                <input type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{$student->suffix}}" onkeydown="return alphaOnly(event);" style="font-size: 14px;">
                <div class="invalid-feedback">
                    Please input valid suffix.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$student->email}}" style="font-size: 14px;" required> 
                <div class="invalid-feedback">
                    Please input valid email address.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <div class="col-md-12"><label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                   <select id="gradelevel_id" name="gradelevel_id" class="form-control" value="{{ old('$student->gradelevel_id') }}" style="font-size: 14px;">
                        <option value="" disabled selected hidden>Choose Gradelevel</option>
                        @foreach ($gradelevels as $gradelevel)
                            <option value="{{ $gradelevel->id }}" {{ old('gradelevel', $gradelevel->id) || $student->gradelevel_id === $gradelevel->id ? 'selected' : '' }}>{{ $gradelevel->gradelevel }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please input grade level.
                    </div>
                </div>
            </div>
            <div class="col-md-10"><br/>
                <div class="col-md-12"><label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                   <select id="course_id" name="course_id" class="form-control" value="{{ old('$student->course_id') }}" style="font-size: 14px;">
                        <option value="" disabled selected hidden>Choose Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course', $course->id) || $student->course_id === $course->id ? 'selected' : '' }}>{{ $course->courseName}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please input strand.
                    </div>
                </div>
            </div>
            <div class="col-md-10"><br/>
                <div class="col-md-12"><label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                    <select id="section_id" name="section_id" class="form-control" value="{{ old('$student->section_id') }}" style="font-size: 14px;">
                       <option value="" disabled selected hidden>Choose Section</option>
                        @foreach ($sections as $section)
                           <option value="{{ $section->id }}"  {{ old('section', $section->id) || $student->section_id === $section->id ? 'selected' : '' }}>{{ $section->section}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please input section.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>