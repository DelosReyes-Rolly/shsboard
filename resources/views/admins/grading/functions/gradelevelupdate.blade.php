<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Gradelevel</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateGradelevel{{$gradelevel->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv{{$gradelevel->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <div class="col-md-12">
            <input type="hidden" id="id" name="id" value="{{$gradelevel->id}}"/>
            <input id="gradelevel" type="text" name="gradelevel" class="form-control @error('gradelevel') is-invalid @enderror" value="{{$gradelevel->gradelevel}}"style="font-size: 20px;"   onkeypress="return onlyNumberKey(event)" maxlength="2" minlength="2" required>
            <div class="invalid-feedback">
                Please input valid grade level.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
        // $("#updateGradelevel").submit(function(i) {
        //     i.preventDefault();

        //     var id = $("#id").val();
        //     var gradelevel = $("#gradelevel").val();
        //     var _token = $("input[name=_token]").val();

            
        //     $("#saveBtn").click(function() {
        //         $("#example").load("#example");
        //     });

        // });
        var $loading = $('#loadingDiv'+ id);
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form_data = $("form#updateGradelevel"+ id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updategradelevel/")}}/' + id,
                 data:form_data,
                success: function(response) {                           // kapag nagsuccess
                        $("#editModal"+id).removeClass("in");  
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updateGradelevel"+ id)[0].reset();
                        $('#gradelevel' + id +' td:nth-child(2)').text(response.gradelevel);
                        $(":submit").removeAttr("disabled");
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Gradelevel has been updated successfully',
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