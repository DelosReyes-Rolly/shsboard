<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New advisory</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="createAdvisory" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input. Please recheck</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">       
            <div class="col-md-12">
                <div class="col-md-12"><label for="faculty_id" style="font-size: 20px;"><span style="color: red">*</span> Teacher</label>
                    <select id="faculty_id" name="faculty_id" class="form-control" value="{{ old('faculty_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Teacher</option>
                        @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}"}>{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->middle_name }}</option>
                        @endforeach 
                    </select>
                    <div class="invalid-feedback">
                        Please choose teacher.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-12"><label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                    <select id="gradelevel_id" name="gradelevel_id" class="form-control" value="{{ old('gradelevel_id') }}" style="font-size: 14px;" required>
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
            <div class="col-md-12">
                <div class="col-md-12"><label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                    <select id="course_id" name="course_id" class="form-control" value="{{ old('course_id') }}" style="font-size: 14px;" required>
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
            <div class="col-md-12">
                <div class="col-md-12"><label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                    <select id="section_id" name="section_id" class="form-control" value="{{ old('section_id') }}" style="font-size: 14px;" required>
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
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
    // $("#createAdvisory").submit(function(e) {
    //         e.preventDefault();

    //         var faculty = $("#faculty").val();
    //         var gradelevel = $("#gradelevel").val();
    //         var course = $("#course").val();
    //         var section = $("#section").val();
    //         var _token = $("input[name=_token]").val();

            
    //         $("#saveBtn").click(function() {
    //             $("#example").load("#example");
    //         });

    //     });
        function formPost(){
            var form_data = $("form#createAdvisory").serialize();

            $.ajax({
                type: "POST",
                url: "{{ route('advisory.store') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createAdvisory")[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Advisory class has been added successfully',
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
        }
</script>