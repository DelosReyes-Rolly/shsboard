<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Strand</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updatecourse/{{$course->id}}">
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="mb-3" style="color: red">
           * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Strand Name</label>
                <input type="text" name="courseName"  class="form-control @error('courseName') is-invalid @enderror" value="{{$course->courseName}}" style="font-size: 14px;"  required>
            </div><br/><br/>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Abbreviation</label>
                <input type="text" name="abbreviation"  class="form-control @error('abbreviation') is-invalid @enderror" value="{{$course->abbreviation}}" style="font-size: 14px;" required>
            </div><br/><br/>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Strand Description</label>
                <textarea name="description" type=text id="editor"  class="form-control @error('description') is-invalid @enderror">{!!$course->description!!}</textarea style="font-size: 14px;" required>
            </div><br/><br/>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Code</label>
                <input type="text" name="code"  class="form-control @error('code') is-invalid @enderror" value="{{$course->code}}"style="font-size: 14px;" required>
            </div><br/><br/>
            <div class="col-md-12">
                <label style="font-size: 20px;">Video Link (Copy embed link on youtube and paste it here) </label>
                <input type="text" name="link"  class="form-control @error('link') is-invalid @enderror" value="{{$course->link}}" style="font-size: 14px;">
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
    CKEDITOR.replace( 'editor' );
</script> 