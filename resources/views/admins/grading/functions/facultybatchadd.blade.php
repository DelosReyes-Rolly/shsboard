<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Upload Batch of Faculties</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="{{ route('facultyBulk.store') }}" enctype="multipart/form-data">
    <div class="modal-body">
        @csrf
        <center><a href="/downloadFacultyFileFormat" class="btn btn-primary"><i class="fas fa-download"></i> Download Required File Format</a></center>
        <br/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div style="font-size: 20px;"><span style="color: red">*</span> Upload Excel file with the required format only</div>
        <input type="file" name="select_file" class="form-control" style="font-size: 16px;" required>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>