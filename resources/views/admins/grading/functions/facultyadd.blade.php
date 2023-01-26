<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New teacher</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createFaculty" class="needs-validation" novalidate>
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
                <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                <input id="lastname" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"  onkeydown="return alphaOnly(event);" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid last name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                <input id="firstname" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid first name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;">Middle Name</label>
                <input id="middlename" type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 14px;">
                <div class="invalid-feedback">
                    Please input valid middle name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;">Suffix</label>
                <input id="suffix" type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{ old('suffix') }}" onkeydown="return alphaOnly(event);" style="font-size: 14px;">
                <div class="invalid-feedback">
                    Please input valid suffix name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" style="font-size: 14px;" required> 
                <div class="invalid-feedback">
                    Please input valid email address.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="" {{old('isMaster') == "" ?'selected' : ''}} disabled> Please Select Status </option>
                    <option value="1">Regular</option>
                    <option value="NULL">Master</option>
                </select>
                <div class="invalid-feedback">
                    Please input valid status.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label for="expertise" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Expertises') }}</label><br>
                <select id="expertise_id" name="expertise_id" class="form-control" required>
                    <option value="" {{old('expertise') == "" ?'selected' : ''}} disabled> Please Select Expertise </option>
                    @foreach($expertises as $expertise)
                    <option value="{{$expertise->id}}">{{$expertise->expertise}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please input expertises.
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
    // $("#createFaculty").submit(function(e) {
    //         e.preventDefault();

    //         var last_name = $("#lastname").val();
    //         var first_name = $("#firstname").val();
    //         var middle_name = $("#middlename").val();
    //         var suffix = $("#suffix").val();
    //         var email = $("#email").val();
    //         var isMaster = $("#status").val();
    //         var expertise_id = $("#expertise").val();
    //         var _token = $("input[name=_token]").val();
            
    //         $("#saveBtn").click(function() {
    //             $("#example").load("#example");
    //         });

    //     });
        var $loading = $('#loadingDiv').hide();
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form_data = $("form#createFaculty").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('faculty.store') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createFaculty")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Faculty has been added successfully',
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