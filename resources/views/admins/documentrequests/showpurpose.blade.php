<main>
<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Purpose</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST"  id="updatePurpose{{$purpose->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <center><div hidden id="loadingDiv{{$purpose->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$purpose->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="large" for="purpose" style="font-size: 20px;"><span style="color: red">*</span> Purpose:</label>
                <br>
                <input class="form-control @error('purpose') is-invalid @enderror" id="purpose" type="text" style="font-size: 18px;"  placeholder="Document purpose" name="purpose" value="{{$purpose->purpose}}" required>
                <div class="invalid-feedback">
                    Please input valid purpose.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large" for="proof_needed" style="font-size: 20px;"><span style="color: red">*</span> Proof needed:</label>
                <br>
                <input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed" type="text" style="font-size: 18px;"  placeholder="Proof Needed" name="proof_needed" value="{{$purpose->proof_needed}}" required>
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
        var $loading = $('#loadingDiv'+id);
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
                $("#example5").show();
            });
            $('#whoops').hide();
            var form_data = $("form#updatePurpose"+ id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatepurpose/")}}/' + id,
                data:form_data,
                success: function(response) {
                        $("#example5").hide();
                        $("#purposeeditModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#purposeeditModal"+id).hide();
                        $("#purposedeleteModal"+id).find("#purpose").text(response.purpose);
                        $("#purposedeleteModal"+id).find("#proof_needed").text(response.proof_needed);
                        $("#purposemodal-view-"+id).find("#purpose").text(response.purpose);
                        $("#purposemodal-view-"+id).find("#proof_needed").text(response.proof_needed);
                        // $("#updatePurpose"+id)[0].reset();
                        // $('#documentpurpose' + response.id +' td:nth-child(2)').text(response.purpose);
                        // $('#documentpurpose' + response.id +' td:nth-child(3)').text(response.proof_needed);
                        $(":submit").removeAttr("disabled");
                        // $('#example').load(purpose.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Purpose has been updated successfully',
                        });
                        $('#example5').DataTable().clear().destroy();
                        $('#example5').load(document.URL +  ' #example5');
                        $(function () {
                            table = $('#example5').DataTable( {
                                responsive: true,
                                "bInfo" : false,
                            } );
                        } );
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