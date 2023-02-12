<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New section</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createPurpose" class="needs-validation" novalidate>
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
		    <div class="col-lg-12">
				<label class="large" for="purpose" style="font-size: 20px;">Purpose</label>
				<input class="form-control @error('purpose') is-invalid @enderror" id="purpose" type="text" style="font-size: 18px;"  placeholder="New purpose" name="purpose" value="{{ old('purpose') }}" required>
                <div class="invalid-feedback">
                    Please input purpose.
                </div>
            </div>
			<div class="col-lg-12"><br/>
				<label class="large" for="proof_needed" style="font-size: 20px;">Proof Needed</label>
				<input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed" type="text" style="font-size: 18px;"  placeholder="Proof Needed" name="proof_needed" value="{{ old('proof_needed') }}" required>
                <div class="invalid-feedback">
                    Please input proof needed.
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
        var form_data = $("form#createPurpose").serialize();
        $(":submit").attr("disabled", true);
        $.ajax({
                type: "POST",
                url: "{{ route('purpose.store') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createModalPurpose").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModalPurpose").hide();
                        $("#createPurpose")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Purpose has been added successfully',
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