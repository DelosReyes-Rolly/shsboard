<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New strand</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="{{ route('course.store') }}">
    <div class="modal-body">
        @csrf
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Strand Name</label>
                <input type="text" name="courseName"  class="form-control @error('courseName') is-invalid @enderror" value="{{ old('courseName') }}" style="font-size: 14px;" >
            </div>
        </div><br/>
        <div class="col-md-12">
            <label style="font-size: 20px;"><span style="color: red">*</span> Abbreviation</label>
            <input type="text" name="abbreviation"  class="form-control @error('abbreviation') is-invalid @enderror" value="{{ old('abbreviation') }}" style="font-size: 14px;">
        </div>
        <div class="col-md-12">
            <label style="font-size: 20px;"><span style="color: red">*</span> Strand Description</label>
            <textarea name="description" id="editor2" type=text class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea style="font-size: 14px;">
        </div>
        <div class="col-md-12">
            <label style="font-size: 20px;"><span style="color: red">*</span> Code</label>
            <input type="text" name="code"  class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}"style="font-size: 14px;">
        </div>
        <div class="col-md-12">
            <label style="font-size: 20px;">Video Link (Copy embed link on youtube and paste it here) </label>
            <input type="text" name="link"  class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}" style="font-size: 14px;">
        </div>
        <div class="col-md-12">
            <label class="large mb-1" for="inputcontent" style="font-size: 20px;">* Image (Only png and jpg files are allowed)</label>
            <input type="file" name = "image" class="form-control">
        </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor2' );
</script>