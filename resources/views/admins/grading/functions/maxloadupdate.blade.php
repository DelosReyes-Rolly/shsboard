<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Master Load</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateMaxload{{$maxload->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
    @csrf
    @method('put')
    <div id="whoops" class="alert alert-danger" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <b>Whoops! There is a problem in your input</b> <br/>
        <div id="validation-errors"></div>
    </div>
    <center><div hidden id="loadingDiv{{$maxload->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
    <input type="hidden" id="id" name="id" value="{{$maxload->id}}"/>
        <div class="col-md-12">
            <input type="number" id="maxload" name="maxload" class="form-control @error('maxload') is-invalid @enderror" value="{{$maxload->master_load}}"style="font-size: 20px;"  onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" required>
            <div class="invalid-feedback">
                Please input valid maximum load.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>   
<script>
        var $loading = $('#loadingDiv'+ id);
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var id = $("#id").val();
            var master_load = $("#maxload").val();
            var _token = $("input[name=_token]").val();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatemaxload/")}}/' + id,
                data: {
                    id: id,
                    master_load: master_load,
                    _token: _token,
                },
                success: function(response) {
                        $("#editmax").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editmax").hide();
                        $("#updateMaxload"+ id)[0].reset();
                        $(":submit").removeAttr("disabled");
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Maximum load has been updated successfully',
                        }).then(function() {
                            $("#reload2").load(location.href + " #reload2");
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
            }).ajaxStop(function () {
                $loading.hide();
            });
        }
       
</script>