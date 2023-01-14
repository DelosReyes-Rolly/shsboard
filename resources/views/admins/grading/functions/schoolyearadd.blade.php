<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New school year</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createSchoolyear"  class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 28px;"><span style="color: red">*</span> School Year</label>
                <input  id="schoolyear" type="text" name="schoolyear" class="form-control @error('schoolyear') is-invalid @enderror" value="{{ old('schoolyear') }}" style="font-size: 14px;"  onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" required>
                <div class="invalid-feedback">
                    Please input valid school year.
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
    $("#createSchoolyear").submit(function(e) {
            e.preventDefault();

            var schoolyear = $("#schoolyear").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "POST",
                url: "{{ route('schoolyear.store') }}",
                data: {
                    schoolyear: schoolyear,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createSchoolyear")[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Schoolyear has been added successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                        
                    }
                }
            });
            $("#saveBtn").click(function() {
                $("#example").load("#example");
            });

        });
</script>