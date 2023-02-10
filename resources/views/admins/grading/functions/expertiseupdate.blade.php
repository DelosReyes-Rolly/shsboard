<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Expertise</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updatedExpertise{{$expertise->id}}" class="needs-validation" novalidate>     <!-- may yung id na update expertise ilalagay mo sa baba sa script -->
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv{{$expertise->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$expertise->id}}"/>               <!-- lagay ka ng hidden. Yung id ng row o ng ieedit -->
        <div class="col-md-12">                                                         <!-- id ng input ay "expertise" -->
            <input type="text" id="expertise" name="expertise" class="form-control @error('expertise') is-invalid @enderror" value="{{$expertise->expertise}}" style="font-size: 20px;" onkeydown="return alphaOnly(event);" maxlength="255"  required>
            <div class="invalid-feedback">
                Please input valid expertise.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
        // $("#updatedExpertise").submit(function(i) {                         // dito bababa yung input kapag nagsubmit dahil sa input id sa form
        //     i.preventDefault();                                          // wala lang to

        //     var id = $("#id").val();                                     // yung variable na id lalagayan niya ng laman na galing sa input na may id na "id".  .val() = value
        //     var expertise = $("#expertise").val();                           // yung variable na expertise lalagayan niya ng laman na galing sa input na may id na "expertise".  .val() = value
        //     var _token = $("input[name=_token]").val();                  // wala lang to

            
        //     $("#saveBtn").click(function() {                                            // wala lang to
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
            });
            $('#whoops').hide();
            var form_data = $("form#updateExpertise"+ id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",                                            // PUT pang update
                url: '{{url("/updateexpertise/")}}/' + id,                // url mo kasama id
                data:form_data,
                success: function(response) {                           // kapag nagsuccess
                        $("#editModal"+id).removeClass("in");           //copy paste mo lang to. Pang hide lang to ng modal
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();                     // hanggang dito
                        $("#updateExpertise"+ id)[0].reset();                // irereset niya yung form
                        // $('#expertise' + id +' td:nth-child(2)').text(response.expertise);               // copy paste mo lang to. Bale pinapalitan lang niya yung row. Yung "expertise" id siya ng tr
                        $(":submit").removeAttr("disabled");                                                                                 // yung response galing siya sa controller yung return response()->json($expertise). Yung td:nth-child(2) column bale 2nd column
                        Swal.fire({                                                             //sweetalert
                            icon: 'success',                                                    //
                            title: 'Success.',                                                  //
                            text: 'Expertise has been updated successfully',                      //
                        }).then(function() {
                            location.reload(true);
                        })
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