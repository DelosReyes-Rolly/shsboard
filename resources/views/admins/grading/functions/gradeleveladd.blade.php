<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New grade level</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createGradelevel"  class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div id="validation-errors"></div>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 28px;"><span style="color: red">*</span> Grade level</label>
                <input id="gradelevel" type="text" name="gradelevel" class="form-control @error('gradelevel') is-invalid @enderror" value="{{ old('gradelevel') }}" style="font-size: 14px;"   onkeypress="return onlyNumberKey(event)" maxlength="2" minlength="2" required>
                <div class="invalid-feedback">
                    Please input valid grade level.
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
    $("#createGradelevel").submit(function(e) {
            e.preventDefault();

            var gradelevel = $("#gradelevel").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "POST",
                url: "{{ route('gradelevel.store') }}",
                data: {
                    gradelevel: gradelevel,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createGradelevel")[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Gradelevel has been added successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                        
                    }
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('<div class="alert alert-danger"> <b>Whoops! There is a problem in your input</b> <br/> &emsp;'+value+'</div');
                    }); 
                },
            });
            $("#saveBtn").click(function() {
                $("#example").load("#example");
            });

        });
</script>