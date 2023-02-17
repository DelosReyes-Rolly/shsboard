<main>
<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Document</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST"  id="updateDocument{{$document->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <center><div hidden id="loadingDiv{{$document->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$document->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="large" for="name" style="font-size: 20px;"><span style="color: red">*</span> Document name:</label>
                <br>
                <input id="nameq" class="form-control @error('name') is-invalid @enderror"  type="text" style="font-size: 18px;"  placeholder="Document Name" name="nameq" value="{{$document->name}}" required>
                <div class="invalid-feedback">
                    Please input valid document name.
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
                $("#example1").show();
            });
            $('#whoops').hide();
            var form_data = $("form#updateDocument"+ id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatedocument/")}}/' + id,
                data:form_data,
                success: function(response) {
                        $("#example1").hide();
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        // $("#updateDocument"+id)[0].reset();
                        $("#deleteModal"+id).find("#name").text(response.name);
                        $("#modal-view-"+id).find("#name").text(response.name);
                        // $('#document' + response.id +' td:nth-child(2)').text(response.name);
                        $(":submit").removeAttr("disabled");
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Document has been updated successfully',
                        });
                        $('#example1').DataTable().clear().destroy();
                        $('#example1').load(document.URL +  ' #example1');
                        $(function () {
                            table = $('#example1').DataTable( {
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