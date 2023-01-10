<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Schedule</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updatesubjectteacher/{{$subjectteacher->id}}"class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="col-md-12"><label for="faculty_id" style="font-size: 20px;"><span style="color: red">*</span> Teacher</label>
                    <select id="faculty_id" name="faculty_id" class="form-control" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Teacher</option>
                        @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}" {{($subjectteacher->faculty->id==$faculty->id)? 'selected':'' }}>{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->middle_name }} {{$subjectteacher -> faculty -> suffix}}</option>
                        @endforeach 
                    </select>
                    <div class="invalid-feedback">
                        Please choose teacher.
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="col-md-12"><label for="subject_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                    <select id="subject_id" name="subject_id" class="form-control" value="{{ old('subject_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Subject</option>
                        @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"{{($subjectteacher->subject->id==$subject->id)? 'selected':'' }}>{{ $subject->subjectname}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please choose subject.
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Select a time:</label><br>
                From: <input type="time" id="time_start" name="time_start" value={{$subjectteacher->time_start}} required>
                To: <input type="time" id="time_end" name="time_end" value={{$subjectteacher->time_end}} required>
                <div class="invalid-feedback">
                    Please choose time.
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>