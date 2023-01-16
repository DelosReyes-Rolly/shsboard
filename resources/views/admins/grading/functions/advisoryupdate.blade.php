<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Class</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateAdvisory" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="validation-errors"></div>
        <input type="hidden" id="id" name="id" value="{{$advisory->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div style="font-size: 26px; font-family:'Times New Roman', Times, serif; padding: 20px;">
                <b>CLASS:</b> {{$advisory->gradelevel->gradelevel}} {{$advisory->faculty->facultyName}} - {{$advisory->section->section}} ({{$advisory->faculty->abbreviation}} - {{$advisory->section->section}})
            </div>
            <div class="col-md-12">
                <div class="col-md-12"><label for="faculty_id" style="font-size: 20px;"><span style="color: red">*</span> Teacher</label>
                    <select id="faculty" name="faculty_id" class="form-control" style="font-size: 14px;" required>    
                        <option value="" disabled selected hidden>Choose Teacher</option>
                        @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}" {{($advisory->faculty->id==$faculty->id)? 'selected':'' }}>{{ $faculty->last_name }}, {{ $faculty->first_name }} {{ $faculty->middle_name }} {{$advisory -> faculty -> suffix}}</option>
                        @endforeach 
                    </select>
                    <div class="invalid-feedback">
                        Please choose teacher.
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
        $("#updateAdvisory").submit(function(i) {
            i.preventDefault();

            var id = $("#id").val();
            var faculty = $("#faculty").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "PUT",
                url: '{{url("/updateadvisory/")}}/' + id,
                data: {
                    id: id,
                    faculty_id: faculty,
                    _token: _token
                },
                success: function(response) {
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updateAdvisory")[0].reset();
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Advisory class has been updated successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('<div class="alert alert-danger"> <b>Whoops! There is a problem in your input</b> <br/> &emsp;'+value+'</div');
                    }); 
                },
            });
            $("#saveBtn").click(function() {
                $("#example").load("#example");
            });

        });
       
</script>