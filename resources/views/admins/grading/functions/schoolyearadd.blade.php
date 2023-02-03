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
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
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
        var $loading = $('#loadingDiv').hide();
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form_data = $("form#createSchoolyear").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('schoolyear.store') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createSchoolyear")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Schoolyear has been added successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                        
                    }
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    if(xhr.responseJSON.error != undefined){
                        $("#validation-errors").html("");
                        $('#validation-errors').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                    }
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    });
                    $(":submit").removeAttr("disabled");
                },
            })
        }
</script>