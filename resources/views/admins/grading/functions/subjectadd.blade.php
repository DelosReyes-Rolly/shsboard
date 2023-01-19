<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New subject</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createSubject" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label><span style="color: red">*</span> Subject Code</label>
                <input id="subjectcode" type="text" name="subjectcode" class="form-control @error('subjectcode') is-invalid @enderror" value="{{ old('subjectcode') }}" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid subject code.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label><span style="color: red">*</span> Subject Name</label>
                <input id="subjectname" type="text" name="subjectname" class="form-control @error('subjectname') is-invalid @enderror" value="{{ old('subjectname') }}" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid subject name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label><span style="color: red">*</span> Description</label>
                <textarea id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" style="font-size: 14px;" required>{{ old('description') }}</textarea>
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
<script>
    $("#createSubject").submit(function(e) {
            e.preventDefault();

            var subjectcode = $("#subjectcode").val();
            var subjectname = $("#subjectname").val();
            var description = $("#description").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "POST",
                url: "{{ route('subject.store') }}",
                data: {
                    subjectcode: subjectcode,
                    subjectname: subjectname,
                    description: description,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createSubject")[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Subject has been added successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                        
                    }
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    }); 
                },
            });
            $("#saveBtn").click(function() {
                $("#example").load("#example");
            });

        });
</script>