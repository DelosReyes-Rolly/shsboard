<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Strand</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateCourse{{$course->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv{{$course->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$course->id}}"/>
        <div class="mb-3" style="color: red">
           * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Strand Name</label>
                <input id="courseName" type="text" name="courseName"  class="form-control @error('courseName') is-invalid @enderror" value="{{$course->courseName}}" onkeydown="return alphaOnly(event);" style="font-size: 14px;"  required>
                <div class="invalid-feedback">
                    Please input valid strand name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Abbreviation</label>
                <input id="abbreviation" type="text" name="abbreviation"  class="form-control @error('abbreviation') is-invalid @enderror" value="{{$course->abbreviation}}" onkeydown="return alphaOnly(event);" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid abbreviation.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Strand Description</label>
                <textarea id="descriptionupdate{{$course->id}}" name="descriptionupdate" type=text class="form-control @error('descriptionupdate') is-invalid @enderror" rows="10" cols="60" style="font-size: 14px;" required>{!!$course->description!!}</textarea>
                <div class="invalid-feedback">
                    Please input valid description.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Code</label>
                <input id="code" type="text" name="code"  class="form-control @error('code') is-invalid @enderror" value="{{$course->code}}"style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid strand code.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;">Video Link (Copy embed link on youtube and paste it here) </label>
                <input id="link" type="text" name="link"  class="form-control @error('link') is-invalid @enderror" value="{{$course->link}}" style="font-size: 14px;">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'descriptionupdate' + id);
</script> 
<script>

    var $loading = $('#loadingDiv'+ id);
        function formPost(){
            CKupdate();
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form_data = $("form#updateCourse"+id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatecourse/")}}/' + id,
                data:form_data,
                success: function(response) {
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updateCourse"+id)[0].reset();
                        // $('#course' + id +' td:nth-child(1)').text(response.courseName);
                        // $('#course' + id +' td:nth-child(2)').text(response.abbreviation);
                        // $('#course' + id +' td:nth-child(3)').text(response.code);
                        $(":submit").removeAttr("disabled");
                        // $('#example').load(document.URL +  ' #example');
                            Swal.fire({
                                icon: 'success',
                                title: 'Success.',
                                text: 'Strand has been updated successfully',
                            }).then(function() {
                                location.reload(true);
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