<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update School Year</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateSchoolyear{{$schoolyear->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
    @csrf
    @method('put')
    <div id="whoops" class="alert alert-danger" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <b>Whoops! There is a problem in your input</b> <br/>
        <div id="validation-errors"></div>
    </div>
    <center><div hidden id="loadingDiv{{$schoolyear->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
    <input type="hidden" id="id" name="id" value="{{$schoolyear->id}}"/>
        <div class="col-md-12">
            <input id="schoolyear" type="text" name="schoolyear" class="form-control @error('schoolyear') is-invalid @enderror" value="{{$schoolyear->schoolyear}}"style="font-size: 20px;"  onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" required>
            <div class="invalid-feedback">
                Please input valid school year.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>   
<script>
        // $("#updateSchoolyear").submit(function(i) {
        //     i.preventDefault();

        //     var id = $("#id").val();
        //     var schoolyear = $("#schoolyear").val();
        //     var _token = $("input[name=_token]").val();

            
        //     $("#saveBtn").click(function() {
        //         $("#example").load("#example");
        //     });

        // });
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
            var form_data = $("form#updateSchoolyear"+id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updateschoolyear/")}}/' + id,
                data:form_data,
                success: function(response) {
                        $("#example").hide();
                        $("#editModal"+response.id).removeClass("in");  
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        // $("#updateSchoolyear"+id)[0].reset();
                        // $('#schoolyear' + id +' td:nth-child(2)').text(response.schoolyear);
                        $("#deleteModal"+id).find("#schoolyear").text(response.schoolyear);
                        $("#modal-view-"+id).find("#schoolyear").text(response.schoolyear);
                        $("#editModal"+id).find("#schoolyear").html(response);
                        $(":submit").removeAttr("disabled");
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Schoolyear has been updated successfully',
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
            }).ajaxStop(function () {
                $loading.hide();
            });
        }
       
</script>