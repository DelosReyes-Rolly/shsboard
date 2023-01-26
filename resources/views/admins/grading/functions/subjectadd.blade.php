<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New subject</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createSubject" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label><span style="color: red">*</span> Subject Code</label>
                <input id="subjectcode" type="text" name="subjectcode" class="form-control @error('subjectcode') is-invalid @enderror" value="{{ old('subjectcode') }}" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid subject code.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label><span style="color: red">*</span> Subject Name</label>
                <input id="subjectname" type="text" name="subjectname" class="form-control @error('subjectname') is-invalid @enderror" value="{{ old('subjectname') }}" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid subject name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label><span style="color: red">*</span> Description</label>
                <textarea id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" style="font-size: 14px;" required>{{ old('description') }}</textarea>
                <div class="invalid-feedback">
                    Please input valid description.
                </div>
            </div>
            <div class="col-md-12"><br/>                              
                <label for="expertise_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Expertise Needed') }}</label>
                <select id="expertise_id" name="expertise_id" id="expertise_id" class="form-control" required>
                    <option value="" {{old('expertise_id') == "" ?'selected' : ''}} disabled> Please Select Expertise Needed </option>
                    @foreach($expertises as $expertise_id)
                    <option value="{{$expertise_id->id}}">{{$expertise_id->expertise}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please input expertise.
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
            var form_data = $("form#createSubject").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('subject.store') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createSubject")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Subject has been added successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                        
                    }
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    }); 
                    $(":submit").removeAttr("disabled");
                },
            });
        }
</script>