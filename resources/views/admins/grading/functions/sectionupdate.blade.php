<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Section</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateSection" class="needs-validation" novalidate>     <!-- may yung id na update section ilalagay mo sa baba sa script -->
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <input type="hidden" id="id" name="id" value="{{$section->id}}"/>               <!-- lagay ka ng hidden. Yung id ng row o ng ieedit -->
        <div class="col-md-12">                                                         <!-- id ng input ay "section" -->
            <input type="text" id="section" name="section" class="form-control @error('section') is-invalid @enderror" value="{{$section->section}}" style="font-size: 20px;" onkeydown="return alphaOnly(event);" maxlength="1" minlength="1"  required>
            <div class="invalid-feedback">
                Please input valid section.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
        $("#updateSection").submit(function(i) {                         // dito bababa yung input kapag nagsubmit dahil sa input id sa form
            i.preventDefault();                                          // wala lang to

            var id = $("#id").val();                                     // yung variable na id lalagayan niya ng laman na galing sa input na may id na "id".  .val() = value
            var section = $("#section").val();                           // yung variable na section lalagayan niya ng laman na galing sa input na may id na "section".  .val() = value
            var _token = $("input[name=_token]").val();                  // wala lang to

            $.ajax({
                type: "PUT",                                            // PUT pang update
                url: '{{url("/updatesection/")}}/' + id,                // url mo kasama id
                data: {                                 
                    id: id,                                             //
                    section: section,                                   // ito yung data na ipapasa sa controller
                    _token: _token,                                     //
                },
                success: function(response) {                           // kapag nagsuccess
                        $("#editModal"+id).removeClass("in");           //copy paste mo lang to. Pang hide lang to ng modal
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();                     // hanggang dito
                        $("#updateSection")[0].reset();                // irereset niya yung form
                        $('#section' + response.id +' td:nth-child(2)').text(response.section);               // copy paste mo lang to. Bale pinapalitan lang niya yung row. Yung "section" id siya ng tr
                                                                                                            // yung response galing siya sa controller yung return response()->json($section). Yung td:nth-child(2) column bale 2nd column
                        Swal.fire({                                                             //sweetalert
                            icon: 'success',                                                    //
                            title: 'Success.',                                                  //
                            text: 'Section has been updated successfully',                      //
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