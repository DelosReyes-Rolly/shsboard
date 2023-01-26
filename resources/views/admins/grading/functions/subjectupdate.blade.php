<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Subject</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateSubject" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$subject->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Subject Code</label>
                <input id="subjectcode" type="text" name="subjectcode" class="form-control @error('subjectcode') is-invalid @enderror" value="{{$subject->subjectcode}}" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid subject code.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Subject Name</label>
                <input id="subjectname" type="text" name="subjectname" class="form-control @error('subjectname') is-invalid @enderror" value="{{$subject->subjectname}}" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid subject name.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Description</label>
                <textarea id="description" type="text" name="description" id="editor" class="form-control @error('description') is-invalid @enderror" style="font-size: 14px;" required>{{$subject->description}}</textarea>
                <div class="invalid-feedback">
                    Please input valid description.
                </div>
            </div>
            <div class="col-md-12">
                <label for="expertise_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                <select id="expertise" name="expertise_id" class="form-control" value="{{ old('expertise_id') }}" style="font-size: 14px;" required>
                    <option value="" disabled selected hidden>Choose Subject</option>
                    @foreach ($expertises as $expertise)
                    <option value="{{ $expertise->id }}"{{($subject->expertise->id==$expertise->id)? 'selected':'' }}>{{ $expertise->expertise}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please choose expertise.
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
            var form_data = $("form#updateSubject").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatesubject/")}}/' + id,
                data:form_data,
                success: function(response) {                           // kapag nagsuccess
                        $("#editModal"+response.id).removeClass("in"); 
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+response.id).hide();
                        $("#updateSubject")[0].reset();
                        $(":submit").removeAttr("disabled");
                        // $('#subject' + response.id +' td:nth-child(2)').text(response.subjectcode);
                        // $('#subject' + response.id +' td:nth-child(3)').text(response.subjectname);
                        // $('#subject' + response.id +' td:nth-child(4)').text(response.expertise_id);
                        // $('#subject' + response.id +' td:nth-child(5)').text(response.description);
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Subject has been updated successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('<div class="alert alert-danger"> <b>Whoops! There is a problem in your input</b> <br/> &emsp;'+value+'</div');
                    }); 
                    $(":submit").removeAttr("disabled");
                },
            });
        }
       
</script>