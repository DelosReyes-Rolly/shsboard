<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Student</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateStudent{{$student->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv{{$student->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$student->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-10">
                <label style="font-size: 20px;"><span style="color: red">*</span> LRN</label>
                <input id="LRNs" type="text" name="LRN" class="form-control @error('LRN') is-invalid @enderror" value="{{$student->LRN}}"  onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="12" style="font-size: 18px;" required>
                <div class="invalid-feedback">
                    Please input valid LRN.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                <input id="lastname" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{$student->last_name}}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                <div class="invalid-feedback">
                    Please input valid last name.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                <input id="firstname" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{$student->first_name}}" onkeydown="return alphaOnly(event);" style="font-size: 18px;" required>
                <div class="invalid-feedback">
                    Please input valid first name.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;"> Middle Name</label>
                <input id="middlename" type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{$student->middle_name}}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                <div class="invalid-feedback">
                    Please input valid middle name.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;">Suffix</label>
                <input id="suffix" type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{$student->suffix}}" onkeydown="return alphaOnly(event);" style="font-size: 18px;">
                <div class="invalid-feedback">
                    Please input valid suffix.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$student->email}}" style="font-size: 18px;" required> 
                <div class="invalid-feedback">
                    Please input valid email address.
                </div>
            </div>
            <div class="col-md-10"><br/>
                <div class="col-md-12"><label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                   <select id="gradelevel_id" name="gradelevel_id" class="form-control" value="{{ old('$student->gradelevel_id') }}" style="font-size: 18px;">
                        <option value="" disabled selected hidden>Choose Gradelevel</option>
                        @foreach ($gradelevels as $gradelevel)
                            <option value="{{ $gradelevel->id }}"{{($student->gradelevel->id==$gradelevel->id)? 'selected':'' }}>{{ $gradelevel->gradelevel}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please input grade level.
                    </div>
                </div>
            </div>
            <div class="col-md-10"><br/>
                <div class="col-md-12"><label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                   <select id="course_id" name="course_id" class="form-control" value="{{ old('$student->course_id') }}" style="font-size: 18px;">
                        <option value="" disabled selected hidden>Choose Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}"{{($student->course->id==$course->id)? 'selected':'' }}>{{ $course->courseName}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please input strand.
                    </div>
                </div>
            </div>
            <div class="col-md-10"><br/>
                <div class="col-md-12"><label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                    <select id="section_id" name="section_id" class="form-control" value="{{ old('$student->section_id') }}" style="font-size: 18px;">
                       <option value="" disabled selected hidden>Choose Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}"{{($student->section->id==$section->id)? 'selected':'' }}>{{ $section->section}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please input section.
                    </div>
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

        
        var $loading = $('#loadingDiv'+ id);
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
                $("#example").show();
            });
            $('#whoops').hide();
            var form_data = $("form#updateStudent"+ id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatestudent/")}}/' + id,
                data:form_data,
                success: function(response) {     
                        $("#example").hide();                  // kapag nagsuccess
                        $("#editModal"+id).removeClass("in"); 
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        // $("#updateStudent"+ id)[0].reset();
                        $("#deleteModal"+id).find("#first_name").text(response.first_name);
                        if(response.middle_name != null){
                            $("#deleteModal"+id).find("#middle_name").text(response.middle_name);
                        }
                        $("#deleteModal"+id).find("#last_name").text(response.last_name);
                        if(response.suffix != null){
                            $("#deleteModal"+id).find("#suffix_name").text(response.suffix_name);
                        }
                        // view
                        $("#modal-view-"+id).find("#first_name").text(response.first_name);
                        if(response.middle_name != null){
                            $("#modal-view-"+id).find("#middle_name").text(response.middle_name);
                        }
                        $("#modal-view-"+id).find("#last_name").text(response.last_name);
                        if(response.middle_name != null){
                            $("#modal-view-"+id).find("#suffix").text(response.suffix);
                        }
                        $("#modal-view-"+id).find("#lrn").text(response.lrn);
                        $("#modal-view-"+id).find("#email").text(response.email);
                        $("#modal-view-"+id).find("#gradelevel").text(response.gradelevel);
                        $("#modal-view-"+id).find("#course").text(response.course);
                        $("#modal-view-"+id).find("#section").text(response.section);

                        // $('#student' + id +' td:nth-child(2)').text(response.LRN);
                        // if(response.suffix == null && response.middle_name == null){
                        //     $('#student' + response.id +' td:nth-child(3)').text(function(n) {return response.last_name + ', ' + response.first_name;});
                        // }
                        // else if(response.suffix == null){
                        //     $('#student' + response.id +' td:nth-child(3)').text(function(n) {return response.last_name + ', ' + response.first_name + ' ' + response.middle_name;});
                        // }
                        // else if(response.middle_name == null){
                        //     $('#student' + response.id +' td:nth-child(3)').text(function(n) {return response.last_name + ', ' + response.first_name + ' ' + response.suffix;});
                        // }
                        // else{
                        //     $('#student' + response.id +' td:nth-child(3)').text(function(n) {return response.last_name + ', ' + response.first_name + ' ' + response.middle_name + ' ' + response.suffix;});
                        // }
                        // $('#student' + response.id +' td:nth-child(4)').text(response.gender);
                        // $('#student' + response.id +' td:nth-child(6)').text(response.email);
                        // $('#example').load(document.URL +  ' #example');
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Student has been updated successfully',
                        });
                        $('#example').DataTable().clear().destroy();
                        $('#example').load(document.URL +  ' #example');
                        $(function () {
                            table = $('#example').DataTable( {
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