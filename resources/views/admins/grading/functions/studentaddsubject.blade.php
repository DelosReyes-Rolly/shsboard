@include('partials.adminheader')
<main>
<div class="">
<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
        <!-- form -->
                    
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <div>  
    		<nav  aria-label = "breadcrumb">
                <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
                <ul class = "breadcrumb">
                   <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
                   <li class = "breadcrumb-item"><a class="bca" href='{{ url("/gradingstudents") }}'>Students</a></li>
                   <!--Add the "active" class to li element to represent the current page-->
                   <li class = "breadcrumb-item active" aria-current = "page">{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}}  {{$student->suffix}}</li>
                </ul>
             </nav>
    	</div>
    	<div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <a class="btn btn-secondary btn-lg back-button back-button1" href='{{ url("/gradingstudents") }}'><i class="fas fa-arrow-left"></i>   Back to students</a>
            </div>
        </div>
        <form method="POST" id="createSubjectStudent" class="needs-validation" novalidate>
            @csrf
            <div id="validation-errors"></div>
            <input type="hidden" name="student_id" value="{{$student->id}}">
            <div class="px-2 mt-2">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Add subject to {{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} {{$student->suffix}}</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row">
                                        <!-- Form Row -->
                                        <div class="col-md-12"><br/>
                                            <div class="col-md-12"><label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade level</label>
                                                <select id="gradelevel_id" name="gradelevel_id" class="form-control" value="{{ old('gradelevel_id') }}" style="font-size: 14px;" required>
                                                    <option value="" disabled selected hidden>Choose Grade level</option>
                                                    @foreach ($gradelevels as $gradelevel)
                                                        <option value="{{ $gradelevel->id }}">{{ $gradelevel->gradelevel}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please input valid grade level.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12"><br/>
                                            <div class="col-md-12"><label for="subject_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                                                <select id="subject_id" name="subject_id" class="form-control" value="{{ old('subject_id') }}" style="font-size: 14px;" required>
                                                    <option value="" disabled selected hidden>Choose Subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}">{{ $subject->subjectname}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please input valid subject.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12"><br/>
                                            <div class="col-md-12"><label for="semester_id" style="font-size: 20px;"><span style="color: red">*</span> Semester</label>
                                                <select id="semester_id" name="semester_id" class="form-control" value="{{ old('semester_id') }}" style="font-size: 14px;" required>
                                                    <option value="" disabled selected hidden>Choose Semester</option>
                                                    @foreach ($semesters as $semester)
                                                        <option value="{{ $semester->id }}">{{ $semester->sem}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please input valid semester.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12"><br/>
                                            <div class="col-md-12"><label for="faculty_id" style="font-size: 20px;"><span style="color: red">*</span> Teacher</label>
                                                <select id="faculty_id" name="faculty_id" class="form-control" value="{{ old('faculty_id') }}" style="font-size: 14px;" required>
                                                    <option value="" disabled selected hidden>Choose Teacher</option>
                                                    @foreach ($faculties as $faculty)
                                                        <option value="{{ $faculty->id }}">{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->middle_name }}</option>
                                                    @endforeach 
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please input valid teacher.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('assets/js/needs-validated.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });

        var $loading = $('#loadingDiv').hide();
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form_data = $("form#createSubjectStudent").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('studentsubjectadd.store') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createSubjectStudent")[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Subject of student has been added successfully',
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
</main>
<br><br><br><br>