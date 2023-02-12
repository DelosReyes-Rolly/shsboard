<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Upload Batch of Faculties</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="bulkFaculty" action="" enctype="multipart/form-data"  class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <center><a href="{{ url('downloadFacultyFileFormat') }}" class="btn btn-primary" style="font-size: 18px;"><i class="fas fa-download"></i> Download File Format</a></center>
        <br/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div style="font-size: 20px;"><span style="color: red">*</span> Select file - Upload Excel file with the required format only</div>
        <input type="file" name="select_file" id="select_file" class="form-control" style="font-size: 18px;" required>
        <div class="invalid-feedback">
            Please input a file.
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
            var form = $('#bulkFaculty')[0];
            var form_data =  new FormData(form);
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('facultyBulk.store') }}",
                data:form_data,
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response) {
                        $("#createModal").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#createModal").hide();
                        $("#bulkFaculty")[0].reset();
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