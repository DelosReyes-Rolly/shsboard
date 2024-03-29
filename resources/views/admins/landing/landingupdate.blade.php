<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update on Home</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateLanding{{$landing->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv{{$landing->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$landing->id}}"/>    
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="large mb-1" for="title" style="font-size: 20px;"><span style="color: red">*</span> Title</label>
                <input style="font-size: 18px;" class="form-control @error('title') is-invalid @enderror" id="title" type="text" placeholder="Enter the title" name="title"  value="{{$landing->title}}" required>
                <div class="invalid-feedback">
                    Please input title.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="editor3" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                <textarea class="form-control @error('editor3') is-invalid @enderror" id="editor3{{$landing->id}}" type="text" placeholder="Enter the information" name="editor3" rows="10" cols="80" required>{{$landing->content}}</textarea>
                <div class="invalid-feedback">
                    Please input content.
                </div>
            </div><br/>
        </div>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor3'+id);
    </script>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
 var $loading = $('#loadingDiv'+ id);
        function formPost(){
            CKupdate();
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
                $("#example").show();
            });
            var form_data = $("form#updateLanding"+id).serialize();
            // var id = $("#id").val();
            // var title = $("#title").val();
            // var content = $("#editor3"+id).val();
            // var _token = $("input[name=_token]").val();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatelanding/")}}/' + id,
                data:form_data,
                success: function(response) {
                        $("#example").hide();
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#reload").load(document.URL +  ' #reload');
                        $("#reload2").load(document.URL +  ' #reload2');
                        // $("#updateLanding"+ id)[0].reset();
                        // $('#landing' + response.id +' td:nth-child(2)').text(response.title);
                        $("#deleteModal"+id).find("#title").text(response.title);
                        // view
                        $(":submit").removeAttr("disabled");
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Landing has been updated successfully',
                        });
                        $('#example').DataTable().clear().destroy();
                            $('#example').load(document.URL +  ' #example');
                            $(function () {
                                table = $('#example').DataTable( {
                                    responsive: true,
                                    "bInfo" : false,
                                } );
                            } );
                        $("#reloadlanding2").load(location.href + " #reloadlanding2");
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