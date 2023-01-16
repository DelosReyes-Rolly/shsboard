<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update School Year</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateSchoolyear" class="needs-validation" novalidate>
    <div class="modal-body">
    @csrf
    @method('put')
    <div id="validation-errors"></div>
    <input type="hidden" id="id" name="id" value="{{$schoolyear->id}}"/>
        <div class="col-md-12">
            <input type="text" id="schoolyear" name="schoolyear" class="form-control @error('schoolyear') is-invalid @enderror" value="{{$schoolyear->schoolyear}}"style="font-size: 20px;"  onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" required>
            <div class="invalid-feedback">
                Please input valid school year.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>   
<script>
        $("#updateSchoolyear").submit(function(i) {
            i.preventDefault();

            var id = $("#id").val();
            var schoolyear = $("#schoolyear").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "PUT",
                url: '{{url("/updateschoolyear/")}}/' + id,
                data: {
                    id: id,
                    schoolyear: schoolyear,
                    _token: _token,
                },
                success: function(response) {
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updateSchoolyear")[0].reset();
                        $('#schoolyear' + response.id +' td:nth-child(2)').text(response.schoolyear);
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Schoolyear has been updated successfully',
                        })
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