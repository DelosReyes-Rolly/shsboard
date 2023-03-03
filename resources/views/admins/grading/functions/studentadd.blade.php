<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New student</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createStudent" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <b>Whoops! There is a problem in your input</b> <br/>
            @if ($message = Session::get('message'))
                <strong>{{ $message }}</strong>
            @endif
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">       
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span>  LRN</label>
                <input id="lrn" type="text" name="LRN" class="form-control @error('LRN') is-invalid @enderror" value="{{ old('LRN') }}" style="font-size: 18px;" onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="12" required>
                <div class="invalid-feedback">
                    Please input valid LRN.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span>  Last Name</label>
                <input id="last_name" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                <div class="invalid-feedback">
                    Please input valid last name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span>  First Name</label>
                <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                <div class="invalid-feedback">
                    Please input valid first name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"> Middle Name</label>
                <input id="middle_name" type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}"  onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                <div class="invalid-feedback">
                    Please input valid middle name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;">Suffix</label>
                <input id="suffix" type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{ old('suffix') }}"  onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                <div class="invalid-feedback">
                    Please input valid suffix.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label for ="gender"><span style="color: red">*</span>  Sex</label><br>
                <select id="gender" name="gender" class="form-control" style="font-size: 18px;"  required>
                    <option value=""  {{old('gender') == "" ?'selected' : ''}} disabled>  Please Select Sex </option>
                    <option value="Male">Male </option>
                    <option value="Female">Female</option>
                </select>
                <div class="invalid-feedback">
                    Please choose sex.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label for="gradelevel_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Grade Level') }}</label><br>
                <select id="gradelevel_id" name="gradelevel_id" id="gradelevel_id" class="form-control" style="font-size: 18px;" required>
                    <option value="" {{old('gradelevel_id') == "" ?'selected' : ''}} disabled> Please Select Grade Level </option>
                    @foreach($level_data as $gradelevel_id)
                    <option value="{{$gradelevel_id->id}}">{{$gradelevel_id->gradelevel}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please input grade level.
                </div>
            </div>
            <div class="col-md-12"><br/>                              
                <label for="section_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Section') }}</label>
                <select id="section_id" name="section_id" id="section_id" class="form-control" style="font-size: 18px;" required>
                    <option value="" {{old('section_id') == "" ?'selected' : ''}} disabled> Please Select section </option>
                    @foreach($section_data as $section_id)
                    <option value="{{$section_id->id}}">{{$section_id->section}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please input section.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label for="course_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Strand') }}</label>
                <select id="course_id" name="course_id" id="course_id" class="form-control" style="font-size: 18px;" required>
                    <option value="" {{old('course_id') == "" ?'selected' : ''}} disabled> Please Select Strand </option>
                    @foreach($courses_data as $course_id)
                    <option value="{{$course_id->id}}">{{$course_id->courseName}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please input strand.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span>  Email Address</label>
                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" style="font-size: 18px;" required> 
                <div class="invalid-feedback">
                    Please input valid email address.
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
            var form_data = $("form#createStudent").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('student.store') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createStudent")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Student has been added successfully',
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
            });
        }
</script>