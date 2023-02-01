<main>
<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Purpose</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST"  id="updatePurpose" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <center><div id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$purpose->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="large" for="purpose" style="font-size: 20px;"><span style="color: red">*</span> Purpose:</label>
                <br>
                <input class="form-control @error('purpose') is-invalid @enderror" id="purpose" type="text" style="font-size: 16px;" placeholder="Document purpose" name="purpose" value="{{$purpose->purpose}}" required>
                <div class="invalid-feedback">
                    Please input valid purpose.
                </div>
            </div>
            <div class="col-md-12">
                <label class="large" for="proof_needed" style="font-size: 20px;"><span style="color: red">*</span> Proof needed:</label>
                <br>
                <input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed" type="text" style="font-size: 16px;" placeholder="Proof Needed" name="proof_needed" value="{{$purpose->proof_needed}}" required>
                <div class="invalid-feedback">
                    Please input valid proof needed.
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
            var id = $("#id").val();
            var purpose = $("#purpose").val();
            var proof_needed = $("#proof_needed").val();
            var _token = $("input[name=_token]").val();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatepurpose/")}}/' + id,
                data: {
                    id: id,
                    purpose: purpose,
                    proof_needed: proof_needed,
                    _token: _token,
                },
                success: function(response) {
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updatePurpose")[0].reset();
                        $('#documentpurpose' + response.id +' td:nth-child(2)').text(response.purpose);
                        $('#documentpurpose' + response.id +' td:nth-child(3)').text(response.proof_needed);
                        $(":submit").removeAttr("disabled");
                        // $('#example').load(purpose.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Purpose has been updated successfully',
                        })
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
            });
        }
</script> 
</main>