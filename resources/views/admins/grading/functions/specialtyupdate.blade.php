<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Specialty</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateSpecialty" class="needs-validation" novalidate>     <!-- may yung id na update specialty ilalagay mo sa baba sa script -->
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <input type="hidden" id="id" name="id" value="{{$specialty->id}}"/>               <!-- lagay ka ng hidden. Yung id ng row o ng ieedit -->
        <div class="col-md-12">                                                         <!-- id ng input ay "specialty" -->
            <input type="text" id="specialty" name="specialty" class="form-control @error('specialty') is-invalid @enderror" value="{{$specialty->specialty}}" style="font-size: 20px;" onkeydown="return alphaOnly(event);" maxlength="255"  required>
            <div class="invalid-feedback">
                Please input valid specialty.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
        $("#updateSpecialty").submit(function(i) {                         // dito bababa yung input kapag nagsubmit dahil sa input id sa form
            i.preventDefault();                                          // wala lang to

            var id = $("#id").val();                                     // yung variable na id lalagayan niya ng laman na galing sa input na may id na "id".  .val() = value
            var specialty = $("#specialty").val();                           // yung variable na specialty lalagayan niya ng laman na galing sa input na may id na "specialty".  .val() = value
            var _token = $("input[name=_token]").val();                  // wala lang to

            $.ajax({
                type: "PUT",                                            // PUT pang update
                url: '{{url("/updatespecialty/")}}/' + id,                // url mo kasama id
                data: {                                 
                    id: id,                                             //
                    specialty: specialty,                                   // ito yung data na ipapasa sa controller
                    _token: _token,                                     //
                },
                success: function(response) {                           // kapag nagsuccess
                        $("#editModal"+id).removeClass("in");           //copy paste mo lang to. Pang hide lang to ng modal
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();                     // hanggang dito
                        $("#updateSpecialty")[0].reset();                // irereset niya yung form
                        $('#specialty' + response.id +' td:nth-child(2)').text(response.specialty);               // copy paste mo lang to. Bale pinapalitan lang niya yung row. Yung "specialty" id siya ng tr
                                                                                                            // yung response galing siya sa controller yung return response()->json($specialty). Yung td:nth-child(2) column bale 2nd column
                        Swal.fire({                                                             //sweetalert
                            icon: 'success',                                                    //
                            title: 'Success.',                                                  //
                            text: 'Specialty has been updated successfully',                      //
                        })
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    }); 
                },
            });
            $("#saveBtn").click(function() {                                            // wala lang to
                $("#example").load("#example");
            });

        });
       
</script>