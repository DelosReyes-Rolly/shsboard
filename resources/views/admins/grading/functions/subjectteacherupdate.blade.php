<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Schedule</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateSubjectteacher" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$subjectteacher->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12"><label for="faculty_id" style="font-size: 20px;"><span style="color: red">*</span> Teacher</label>
                    <select id="faculty" name="faculty_id" class="form-control" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Teacher</option>
                        @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}" {{($subjectteacher->faculty->id==$faculty->id)? 'selected':'' }}>{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->middle_name }} {{$subjectteacher -> faculty -> suffix}}</option>
                        @endforeach 
                    </select>
                    <div class="invalid-feedback">
                        Please choose teacher.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-12"><label for="subject_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                    <select id="subject" name="subject_id" class="form-control" value="{{ old('subject_id') }}" style="font-size: 14px;" required>
                        <option value="" disabled selected hidden>Choose Subject</option>
                        @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"{{($subjectteacher->subject->id==$subject->id)? 'selected':'' }}>{{ $subject->subjectname}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please choose subject.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Select a time:</label><br>
                <span class="col-md-4">From: <input type="time" class="form-control" id="time_start" name="time_start" value={{$subjectteacher->time_start}} required width="20%"></span>
                <span class="invalid-feedback">
                    Please choose starting time.
                </span>
                <span class="col-md-4">To: <input type="time" class="form-control" id="time_end" name="time_end" value={{$subjectteacher->time_end}} required width="20%"></span>
                <span class="invalid-feedback">
                    Please choose end time.
                </span>
            </div>
            <div class="col-md-12"><br/>
                <label for="weekday" style="font-size: 20px;"><span style="color: red">*</span> Days of week</label><br/>
                <span class="col-md-4">
                    @if ($subjectteacher -> monday != null)
                        <input style="font-size: 20px;" type="checkbox" id="monday" name="monday" value="1" checked>
                    @else
                        <input style="font-size: 20px;" type="checkbox" id="monday" name="monday" value="1">
                    @endif
                    <label style="font-size: 20px;" for="monday"> Monday</label>
                </span>
                <span class="col-md-4">
                    @if ($subjectteacher -> tuesday != null)
                        <input style="font-size: 20px;" type="checkbox" id="tuesday" name="tuesday" value="1" checked>
                    @else
                        <input style="font-size: 20px;" type="checkbox" id="tuesday" name="tuesday" value="1">
                    @endif
                    <label style="font-size: 20px;" for="tuesday"> Tuesday</label>
                </span>
                <span class="col-md-4">
                    @if ($subjectteacher -> wednesday != null)
                        <input style="font-size: 20px;" type="checkbox" id="wednesday" name="wednesday" value="1" checked>
                    @else
                        <input style="font-size: 20px;" type="checkbox" id="wednesday" name="wednesday" value="1">
                    @endif
                    <label style="font-size: 20px;" for="wednesday"> Wednesday</label>
                </span>
                <span class="col-md-4">
                    @if ($subjectteacher -> thursday != null)
                        <input style="font-size: 20px;" type="checkbox" id="thursday" name="thursday" value="1" checked>
                    @else
                        <input style="font-size: 20px;" type="checkbox" id="thursday" name="thursday" value="1">
                    @endif
                    <label style="font-size: 20px;" for="thursday"> Thursday</label>
                </span>
                <span class="col-md-4">
                    @if ($subjectteacher -> friday != null)
                        <input style="font-size: 20px;" type="checkbox" id="friday" name="friday" value="1" checked>
                    @else
                        <input style="font-size: 20px;" type="checkbox" id="friday" name="friday" value="1">
                    @endif
                    <label style="font-size: 20px;" for="friday"> Friday</label>
                </span>
                <span class="col-md-4">
                    @if ($subjectteacher -> saturday != null)
                        <input style="font-size: 20px;" type="checkbox" id="saturday" name="saturday" value="1" checked>
                    @else
                        <input style="font-size: 20px;" type="checkbox" id="saturday" name="saturday" value="1">
                    @endif
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

var $loading = $('#loadingDiv').hide();
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var checked = $("#updateSubjectteacher input:checked").length > 0;
            if (!checked){
                $(".weekday").show();
                return false;
            }
            else{
                var id = $("#id").val();
                var faculty = $("#faculty").val();
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
                $(":submit").attr("disabled", true);
                $.ajax({
                    type: "PUT",
                    url: '{{url("/updatesubjectteacher/")}}/' + id,
                    data: {
                        id: id,
                        faculty_id: faculty,
                        subject_id: subject,
                        time_start: time_start,
                        time_end: time_end,
                        monday: monday,
                        tuesday: tuesday,
                        wednesday: wednesday,
                        thursday: thursday,
                        friday: friday,
                        saturday: saturday,
                        _token: _token,
                    },
                    success: function(response) {
                            $("#editModal"+id).removeClass("in");
                            $(".modal-backdrop").remove();
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '');
                            $("#editModal"+id).hide();
                            $("#updateSubjectteacher")[0].reset();
                            $(":submit").removeAttr("disabled");
                            // $('#example').load(document.URL +  ' #example');
                            Swal.fire({
                                icon: 'success',
                                title: 'Success.',
                                text: 'Subject of teacher has been updated successfully',
                            }).then(function() {
                                location.reload(true);
                            })
                    },error: function (xhr) {
                        $('#validation-errors').html('');
                        document.getElementById('whoops').style.display = 'block';
                        if(xhr.responseJSON.error != undefined){
                            $('#validation-errors').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                        }
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                        }); 
                        $(":submit").removeAttr("disabled");
                    },
                });
            }
        }
       
</script>