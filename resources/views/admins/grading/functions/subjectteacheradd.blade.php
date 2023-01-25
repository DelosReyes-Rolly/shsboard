<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New subject of teacher</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createSubjectteacher" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div style="border-radius: 10px; background-color: #ffffff;">
            <label class="large mb-1" for="inputcontent"> <div class="alert alert-primary"><em><i class="fas fa-info"> </i> | <b> Reminder:</b> Assign advisory teacher to the class first before assigning subjects to a class.</em></div></label><br>
        </div>  
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input. Please recheck.</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">       
            
            <div class="col-md-12"><br/>
                <div class="col-md-12"><label for="subject_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                    <select id="subject" name="subject_id" class="form-control" value="{{ old('subject_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Subject</option>
                        @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subjectname}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please choose subject.
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="secondfac"><br/>
                <div class="col-md-12"><label for="secondfaculty_id" style="font-size: 20px;"><span style="color: red">*</span> Teacher</label>
                    <select id="secondfaculty_id" name="secondfaculty_id" class="form-control" value="{{ old('secondfaculty_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Teacher</option>
                    </select>
                    <div class="invalid-feedback">
                        Please choose teacher.
                    </div>
                </div>
            </div>
            <div class="col-md-12"><br/>
                <div class="col-md-12"><label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                    <select id="gradelevel" name="gradelevel_id" class="form-control" value="{{ old('gradelevel_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Gradelevel</option>
                        @foreach ($gradelevels as $gradelevel)
                        <option value="{{ $gradelevel->id }}">{{ $gradelevel->gradelevel }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please choose grade level.
                    </div>
                </div>
            </div>
            <div class="col-md-12"><br/>
                <div class="col-md-12"><label for="semester_id" style="font-size: 20px;"><span style="color: red">*</span> Semester</label>
                    <select id="semester" name="semester_id" class="form-control" value="{{ old('semester_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Semester</option>
                        @foreach ($semesters as $semester)
                        <option value="{{ $semester->id }}">{{ $semester->sem}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please choose semester.
                    </div>
                </div>
            </div>
            <div class="col-md-12"><br/>
                <div class="col-md-12"><label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                    <select id="course" name="course_id" class="form-control" value="{{ old('course_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Course</option>
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->courseName}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please choose strand.
                    </div>
                </div>
            </div>
            <div class="col-md-12"><br/>
                <div class="col-md-12"><label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                    <select id="section" name="section_id" class="form-control" value="{{ old('section_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Section</option>
                        @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->section}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please choose section.
                    </div>
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Select a time:</label><br>
                <span class="col-md-4">From: <input class="form-control" type="time" id="time_start" name="time_start" value="{{ old('time_start') }}" required width="20%"></span>
                <span class="invalid-feedback">
                    Please choose starting time.
                </span>
                <span class="col-md-4">To: <input class="form-control" type="time" id="time_end" name="time_end" value="{{ old('time_end') }}" required width="20%"></span>
                <span class="invalid-feedback">
                    Please choose end time.
                </span>
            </div>
            <div class="col-md-12"><br/>
                <label for="weekday" style="font-size: 20px;"><span style="color: red">*</span> Days of week</label><br/>
                <span class="col-md-4">
                    <input style="font-size: 20px;" type="checkbox" id="monday" name="monday" value="1">
                    <label style="font-size: 20px;" for="monday"> Monday</label>
                </span>
                <span class="col-md-4">
                    <input style="font-size: 20px;" type="checkbox" id="tuesday" name="tuesday" value="1">
                    <label style="font-size: 20px;" for="tuesday"> Tuesday</label>
                </span>
                <span class="col-md-4">
                    <input style="font-size: 20px;" type="checkbox" id="wednesday" name="wednesday" value="1">
                    <label style="font-size: 20px;" for="wednesday"> Wednesday</label>
                </span>
                <span class="col-md-4">
                    <input style="font-size: 20px;" type="checkbox" id="thursday" name="thursday" value="1">
                    <label style="font-size: 20px;" for="thursday"> Thursday</label>
                </span>
                <span class="col-md-4">
                    <input style="font-size: 20px;" type="checkbox" id="friday" name="friday" value="1">
                    <label style="font-size: 20px;" for="friday"> Friday</label>
                </span>
                <span class="col-md-4">
                    <input style="font-size: 20px;" type="checkbox" id="saturday" name="saturday" value="1">
                    <label style="font-size: 20px;" for="saturday"> Saturday</label>
                </span>
                <span class="invalid-feedback weekday">
                    Please choose day(s) in a week.
                </span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>

    function removeOptions(selectElement) {
    var i, L = selectElement.options.length - 1;
    for(i = L; i >= 0; i--) {
        selectElement.remove(i);
    }
    }


    // document.getElementById('subject').onchange = function() {
    //     document.getElementById('subject_id').disabled = !this.checked;
    //     if (!this.checked) {
    //         document.getElementById('secondfac').style.display = 'none';
    //         document.getElementById('firstfac').style.display = 'block';
    //     }
    //     else{
    //         document.getElementById('secondfac').style.display = 'block';
    //         document.getElementById('firstfac').style.display = 'none';
    //     }
    // };

    // document.getElementById('subject').onclick = function() {

    // }


        $('#subject').change(function(){
        removeOptions(document.getElementById('secondfaculty_id'));
        var subject_id = $("#subject").val();
        var _token = $("input[name=_token]").val();
            $.ajax({
            type: "POST",
            url: "{{ route('subject.search') }}",
                    data: {
                        subject_id: subject_id,
                        _token: _token
                    },
                    success: function(response) {
                        if (response) {
                            var expertise_id = response.expertise_id;
                            $.ajax({
                                type: "POST",
                                url: "{{ route('teacher.search') }}",
                                        data: {
                                            expertise_id: expertise_id,
                                            _token: _token
                                        },
                                        success: function(response) {
                                            if (response) {
                                                for(i = 0; i<response.length; i++){
                                                    if(response[i].middle_name != null &&  response[i].suffix != null){
                                                        $('#secondfaculty_id').append('<option value="' + response[i].id + '">' + response[i].last_name + ', ' + response[i].first_name + ' ' + response[i].middle_name + ' ' + response[i].suffix + '</option>');
                                                    }
                                                    else if(response[i].middle_name == null &&  response[i].suffix != null){
                                                        $('#secondfaculty_id').append('<option value="' + response[i].id + '">' + response[i].last_name + ', ' + response[i].first_name + ' ' + response[i].suffix  + '</option>');
                                                    }
                                                    else if(response[i].middle_name != null &&  response[i].suffix == null){
                                                        $('#secondfaculty_id').append('<option value="' + response[i].id + '">' + response[i].last_name + ', ' + response[i].first_name + ' ' + response[i].middle_name + '</option>');
                                                    }
                                                    else if(response[i].middle_name == null &&  response[i].suffix == null){
                                                        $('#secondfaculty_id').append('<option value="' + response[i].id + '">' + response[i].last_name + ', ' + response[i].first_name + '</option>');
                                                    }
                                                }
                                            }
                                        }
                            });
                        }
                    }
            });
        });

        function formPost(){
            var checked = $("#createSubjectteacher input:checked").length > 0;
            if (!checked){
                $(".weekday").show();
                return false;
            }
            else{
                var faculty = $("#secondfaculty_id").val();
                var gradelevel = $("#gradelevel").val();
                var semester = $("#semester").val();
                var course = $("#course").val();
                var section = $("#section").val();
                var subject = $("#subject").val();
                var time_start = $("#time_start").val();
                var time_end = $("#time_end").val();
                var mon=$("#monday").is(":checked");
                if (!mon){
                    var monday = null;
                }
                else{
                    var monday = $("#monday").val();
                }
                var tue=$("#tuesday").is(":checked");
                if (!tue){
                    var tuesday = null;
                }
                else{
                    var tuesday = $("#tuesday").val();
                }
                var wed=$("#wednesday").is(":checked");
                if (!wed){
                    var wednesday = null;
                }
                else{
                    var wednesday = $("#wednesday").val();
                }
                var thurs=$("#thursday").is(":checked");
                if (!thurs){
                    var thursday = null;
                }
                else{
                    var thursday = $("#thursday").val();
                }
                var fri=$("#friday").is(":checked");
                if (!fri){
                    var friday = null;
                }
                else{
                    var friday = $("#friday").val();
                }
                var sat=$("#saturday").is(":checked");
                if (!sat){
                    var saturday = null;
                }
                else{
                    var saturday = $("#saturday").val();
                }
                var _token = $("input[name=_token]").val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('subjectteacher.store') }}",
                    data: {
                        faculty_id: faculty,
                        gradelevel_id: gradelevel,
                        semester_id: semester,
                        course_id: course,
                        section_id: section,
                        subject_id: subject,
                        time_start: time_start,
                        time_end: time_end,
                        monday: monday,
                        tuesday: tuesday,
                        wednesday: wednesday,
                        thursday: thursday,
                        friday: friday,
                        saturday: saturday,
                        _token: _token
                    },
                    success: function(response) {
                        if (response) {
                            $("#createModal").removeClass("in");
                            $(".modal-backdrop").remove();
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '');
                            $("#createModal").hide();
                            $("#createSubjectteacher")[0].reset();
                            Swal.fire({
                                icon: 'success',
                                title: 'Success.',
                                text: 'Subject of teacher has been added successfully',
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
                },
                });
                $("#saveBtn").click(function() {
                    $("#example").load("#example");
                });
            }
        }
</script>