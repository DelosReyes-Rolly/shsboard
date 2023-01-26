<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New Evaluation</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id ="createReason" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="student_id" name="student_id" value="{{Auth::user()->id}}"/>
        <input type="hidden" id="gradelevel_id" name="gradelevel_id" value="{{$gradelevel_id}}"/>
        <input type="hidden" id="course_id" name="course_id" value="{{Auth::user()->course_id}}"/>
        <input type="hidden" id="section_id" name="section_id" value="{{Auth::user()->section_id}}"/>
        <input type="hidden" id="semester_id" name="semester_id" value="{{$semester_id}}"/>
        <input type="hidden" id="faculty_id" name="faculty_id" value="{{$faculty_id}}"/>
        <input type="hidden" id="subject_id" name="subject_id" value="{{$subject_id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Reason for request</label>
                <textarea class="form-control @error('reason') is-invalid @enderror" id="reason" type="text" placeholder="Enter the information" name="reason"  rows="10" cols="80" required></textarea>
                <div class="invalid-feedback">
                    Please input a reason for request.
                </div>
            </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
    // $("#createReason").submit(function(e) {
    //         e.preventDefault();

    //         var student_id = $("#student_id").val();
    //         var gradelevel_id = $("#gradelevel_id").val();
    //         var course_id = $("#course_id").val();
    //         var section_id = $("#section_id").val();
    //         var semester_id = $("#semester_id").val();
    //         var faculty_id = $("#faculty_id").val();
    //         var subject_id = $("#subject_id").val();
    //         var reason = $("#reason").val();
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
            var form_data = $("form#createReason").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url : "{{ route('grade-eval') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#createReason")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Reason has been added successfully',
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