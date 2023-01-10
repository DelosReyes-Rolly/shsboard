<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New subject</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="{{ route('subject.store') }}"class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label><span style="color: red">*</span> Subject Code</label>
                <input type="text" name="subjectcode" class="form-control @error('subjectcode') is-invalid @enderror" value="{{ old('subjectcode') }}" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid subject code.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label><span style="color: red">*</span> Subject Name</label>
                <input type="text" name="subjectname" class="form-control @error('subjectname') is-invalid @enderror" value="{{ old('subjectname') }}" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid subject name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label><span style="color: red">*</span> Description</label>
                <textarea type="text" name="description" id="editor2" class="form-control @error('description') is-invalid @enderror" style="font-size: 14px;" required>{{ old('description') }}</textarea>
                <div class="invalid-feedback">
                    Please input valid description.
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>