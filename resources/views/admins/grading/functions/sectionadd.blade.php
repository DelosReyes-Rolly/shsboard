<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New section</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createSection" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Section Name</label>
                <input id="section" type="text" name="section"  class="form-control @error('section') is-invalid @enderror" value="{{ old('section') }}" style="font-size: 14px;"onkeydown="return alphaOnly(event);" maxlength="1" minlength="1"  required>
                <div class="invalid-feedback">
                    Please input valid section.
                </div>
            </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
    $("#createSection").submit(function(e) {
            e.preventDefault();

            var section = $("#section").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "POST",
                url: "{{ route('section.store') }}",
                data: {
                    section: section,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createSection")[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Section has been added successfully',
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