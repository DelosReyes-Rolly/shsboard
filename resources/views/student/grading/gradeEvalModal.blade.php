<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New Evaluation</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="{{ route('grade-evalModal',['student_id'=> Auth::user()->id , 'gradelevel_id'=> $gradelevel_id, 
            'course_id'=> Auth::user()->course_id, 'section_id'=> Auth::user()->section_id,
            'semester_id'=> $semester_id, 'faculty_id'=> $faculty_id,
            'subject_id'=> $subject_id]) }}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Reason for request</label>
                <textarea class="form-control @error('reason') is-invalid @enderror" id="editor2" type="text" placeholder="Enter the information" name="reason"  rows="10" cols="80" required></textarea>
                <div class="invalid-feedback">
                    Please input a reason for request.
                </div>
            </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>