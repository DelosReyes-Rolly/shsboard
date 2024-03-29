<main>
<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Activity</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:40px;">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="activityStreamupdate{{$announcement->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <input type="hidden" id="id" name="id" value="{{$announcement->id}}"/>            
        <div class="row">
            <div class="col-md-12">
                <label class="large mb-1" for="inputwhat" style="font-size: 20px;"><span style="color: red">*</span> What</label>
                <input type="text" class="form-control @error('what') is-invalid @enderror" id="inputwhat"  placeholder="Enter the title" name="what"  value="{{$announcement->what}}" style="font-size: 20px;" required>
                <div class="invalid-feedback">
                    Please input subject.
                </div>
            </div>
            <div class="col-md-12">
                <label class="slarge mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Deadline</label>
                <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{$announcement->expired_at}}" style="font-size: 16px; padding: 20px;" required>
                <div class="invalid-feedback">
                    Please input expiry date.
                </div>
            </div>
            <div class="col-md-12">
                <label for="gradelevel_id" style="font-size: 20px;"><span style="color: red">*</span> Grade Level</label>
                <select id="gradelevel_id" name="gradelevel_id" value="{{ old('gradelevel_id') }}" style="font-size: 16px; padding: 12px; display: block; width: 100%;" required>
                    <option value="" disabled selected hidden>Choose Gradelevel</option>
                    @foreach ($gradelevels as $gradelevel)
                    <option value="{{ $gradelevel->gradelevel->id }}" {{($announcement->gradelevel->id==$gradelevel->id)? 'selected':'' }}>{{ $gradelevel->gradelevel->gradelevel }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please choose grade level.
                </div>
            </div>
            <div class="col-md-12">
                <label for="course_id" style="font-size: 20px;"><span style="color: red">*</span> Strand</label>
                <select id="course_id" name="course_id" value="{{ old('course_id') }}" style="font-size: 16px; padding: 12px; display: block; width: 100%;" required>
                    <option value="" disabled selected hidden>Choose Strand</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->course->id }}" {{($announcement->course->id==$course->id)? 'selected':'' }}>{{ $course->course->courseName}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please choose strand.
                </div>
            </div>
            <div class="col-md-12">
                <label for="section_id" style="font-size: 20px;"><span style="color: red">*</span> Section</label>
                <select id="section_id" name="section_id" value="{{ old('section_id') }}" style="font-size: 16px; padding: 12px; display: block; width: 100%;" required>
                    <option value="" disabled selected hidden>Choose Section</option>
                    @foreach ($sections as $section)
                    <option value="{{ $section->section->id }}"{{($announcement->section->id==$section->id)? 'selected':'' }}>{{ $section->section->section}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please choose section.
                </div>
            </div>
            <div class="col-md-12">
                <label for="subject_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                <select id="subject_id" name="subject_id" value="{{ old('subject_id') }}" style="font-size: 16px; padding: 12px; display: block; width: 100%;" required>
                    <option value="" disabled selected hidden>Choose Subject</option>
                    @foreach ($subjects as $subject)
                    <option value="{{ $subject->subject->id }}"{{($announcement->subject->id==$subject->id)? 'selected':'' }}>{{ $subject->subject->subjectname}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please choose subject.
                </div>
            </div>  
            <div class="col-md-12">
                <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="editor2" type="text" placeholder="Enter the information" name="content" style="font-size: 16px;" rows="10" cols="80" required>{{$announcement->content}}</textarea>
                <div class="invalid-feedback">
                    Please input content.
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 16px;">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit" style="font-size: 16px;"></font>
    </div>
</form>
<!-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor2');
</script> -->

<script>
    function formPost(){
            $(document).ajaxStart(function () {

            })
            .ajaxStop(function () {
                $("#example").show();
            });
            $('#whoops').hide();
            var form_data = $("form#activityStreamupdate"+id).serialize();
            console.log(form_data);
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",                                            // PUT pang update
                url: '{{url("/updatefacultyannouncement/")}}/' + id,                // url mo kasama id
                data:form_data,
                success: function(response) {
                        $("#example").hide();                           // kapag nagsuccess
                        $("#editModal"+response.id).removeClass("in");           //copy paste mo lang to. Pang hide lang to ng modal
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+response.id).hide();   
                        $("#modal-view-"+id).find("#what").text(response.what);
                        $("#modal-view-"+id).find("#deadline").text(response.expired_at);
                        $("#modal-view-"+id).find("#gradelevel").text(response.gradelevel_id);
                        $("#modal-view-"+id).find("#course").text(response.course_id);
                        $("#modal-view-"+id).find("#section").text(response.section_id);
                        $("#modal-view-"+id).find("#subject").text(response.subject_id);
                        $("#modal-view-"+id).find("#contents").text(response.content);
                        $("#reload").load(document.URL +  ' #reload');
                        $("#reload2").load(document.URL +  ' #reload2');
                        // $("#activityStreamupdate"+ id)[0].reset();                // irereset niya yung form
                        // $('#section' + response.id +' td:nth-child(2)').text(response.section);    
                        $(":submit").removeAttr("disabled");               // copy paste mo lang to. Bale pinapalitan lang niya yung row. Yung "section" id siya ng tr                                                                        // yung response galing siya sa controller yung return response()->json($section). Yung td:nth-child(2) column bale 2nd column
                        Swal.fire({                                                             //sweetalert
                            icon: 'success',                                                    //
                            title: '<div style="font-size: 60px;">Success.</div>',                                                  //
                            text: 'Announcement has been updated successfully',                      //
                        });
                            $('#example').DataTable().clear().destroy();
                            $('#example').load(document.URL +  ' #example');
                            $(function () {
                                table = $('#example').DataTable( {
                                    responsive: true,
                                    "bInfo" : false,
                                    ordering : true,
                                    pageLength : 10,
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
</main>