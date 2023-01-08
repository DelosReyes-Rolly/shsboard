<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New subject of teacher</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="{{ route('subjectteacher.store') }}">
    <div class="modal-body">
        @csrf
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">       
            <div class="col-md-10">
                <div class="col-md-12"><label for="faculty_id" style="font-size: 20px;"><span style="color: red">*</span> Teacher</label>
                    <select id="faculty_id" name="faculty_id" class="form-control" value="{{ old('faculty_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Teacher</option>
                        @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}"  {{$faculty->faculty_id == $faculty->id  ? 'selected' : ''}}>{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->middle_name }}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <div class="col-md-12"><label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                    <select id="gradelevel_id" name="gradelevel_id" class="form-control" value="{{ old('gradelevel_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Gradelevel</option>
                        @foreach ($gradelevels as $gradelevel)
                        <option value="{{ $gradelevel->id }}">{{ $gradelevel->gradelevel }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <div class="col-md-12"><label for="semester_id" style="font-size: 20px;"><span style="color: red">*</span> Semester</label>
                    <select id="semester_id" name="semester_id" class="form-control" value="{{ old('semester_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Semester</option>
                        @foreach ($semesters as $semester)
                        <option value="{{ $semester->id }}">{{ $semester->sem}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <div class="col-md-12"><label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                    <select id="course_id" name="course_id" class="form-control" value="{{ old('course_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Course</option>
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->courseName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <div class="col-md-12"><label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                    <select id="section_id" name="section_id" class="form-control" value="{{ old('section_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Section</option>
                        @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->section}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <div class="col-md-12"><label for="subject_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                    <select id="subject_id" name="subject_id" class="form-control" value="{{ old('subject_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Subject</option>
                        @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subjectname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-10">
                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Select a time:</label><br>
                From: <input type="time" id="time_start" name="time_start" value="{{ old('time_start') }}" required>
                To: <input type="time" id="time_end" name="time_end" value="{{ old('time_end') }}" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>