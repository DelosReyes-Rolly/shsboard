<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update dExpertise</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updatedExpertise" class="needs-validation" novalidate>     <!-- may yung id na update expertise ilalagay mo sa baba sa script -->
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
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

        function formPost(){
            var form_data = $("form#updateExpertise").serialize();

            $.ajax({
                type: "PUT",                                            // PUT pang update
                url: '{{url("/updateexpertise/")}}/' + id,                // url mo kasama id
                data:form_data,
                success: function(response) {                           // kapag nagsuccess
                        $("#editModal"+response.id).removeClass("in");           //copy paste mo lang to. Pang hide lang to ng modal
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+response.id).hide();                     // hanggang dito
                        $("#updatedExpertise")[0].reset();                // irereset niya yung form
                        $('#expertise' + response.id +' td:nth-child(2)').text(response.expertise);               // copy paste mo lang to. Bale pinapalitan lang niya yung row. Yung "expertise" id siya ng tr
                                                                                                            // yung response galing siya sa controller yung return response()->json($expertise). Yung td:nth-child(2) column bale 2nd column
                        Swal.fire({                                                             //sweetalert
                            icon: 'success',                                                    //
                            title: 'Success.',                                                  //
                            text: 'Expertise has been updated successfully',                      //
                        })
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