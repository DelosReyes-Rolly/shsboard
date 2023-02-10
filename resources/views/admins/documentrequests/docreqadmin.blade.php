<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update request</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateRequest{{$docreq->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv{{$docreq->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <div class="row">
            <div class="col-md-12">
                <label class="labels" style="font-size: 26px;">Full Name</label><input type="text" class="form-control"  style="font-size: 20px;" placeholder=" {{$docreq->student->last_name}}, {{$docreq->student->first_name}} {{$docreq->student->middle_name}} {{$docreq->student->suffix}}" value="" readonly> <br>
            </div>
            @if($docreq->gradelevel->gradelevel == 11 || $docreq->gradelevel->gradelevel == 12)
                <div class="col-md-12">
                    <label class="labels" style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 20px;" placeholder=" {{$docreq->gradelevel->gradelevel}} " value="" readonly> <br>
                </div>
            @else
                <div class="col-md-12">
                    <label class="labels" style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" Alumni" value="" readonly> <br>
                </div>
            @endif
            <div class="col-md-12">
                <label class="large mb-1" style="font-size: 20px;"><br><b>Document Needed: </b></label>
                <span style="font-size: 20px;">{{$docreq -> document -> name}}</span>
            </div>
            <div class="col-md-12">
                <label class="large mb-1" for="inputpurpose" style="font-size: 20px;"><b>Purpose: </b></label>
                <span style="font-size: 20px;">{{$docreq->purpose->purpose}}</span>
            </div>
            <div class="col-md-12">
                <label class="large mb-1" for="document_id" class="form-control @error('status') is-invalid @enderror" style="font-size: 20px;"><br><b>Status</b></label>
                <div class="col-md-12" hidden><input class="form-control @error('status') is-invalid @enderror" id="inputstatus" type="text" placeholder="Enter status" name="status"  value="{{$docreq->status}}"></div>
            	    <select id="status" name="status" class="form-control" value="{{$docreq->status}}"style="font-size: 16px;" >
            			<option value="" disabled selected>Change Status</option>
            			<option value="1" {{$docreq->status == "1" ?'selected' : ''}}>Pending</option>
            			<option value="2" {{$docreq->status == "2" ?'selected' : ''}}>On Process</option>
            			<option value="3" {{$docreq->status == "3" ?'selected' : ''}}>Completed</option>
            			<option value="4" {{$docreq->status == "4" ?'selected' : ''}}>Denied</option>
            		</select>
                    <div class="invalid-feedback">
                        Please choose status.
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
    var $loading = $('#loadingDiv'+ id);
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form_data = $("form#updateRequest"+ id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",                                            // PUT pang update
                url: '{{url("/updaterequestdocadmin/")}}/' + id,                // url mo kasama id
                data:form_data,
                success: function(response) {                           // kapag nagsuccess
                        $("#editModal"+id).removeClass("in");           //copy paste mo lang to. Pang hide lang to ng modal
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();                     // hanggang dito
                        $("#updateRequest"+ id)[0].reset();                // irereset niya yung form
                        // $('#expertise' + id +' td:nth-child(2)').text(response.expertise);               // copy paste mo lang to. Bale pinapalitan lang niya yung row. Yung "expertise" id siya ng tr
                        $(":submit").removeAttr("disabled");                                                                                 // yung response galing siya sa controller yung return response()->json($expertise). Yung td:nth-child(2) column bale 2nd column
                        Swal.fire({                                                             //sweetalert
                            icon: 'success',                                                    //
                            title: 'Success.',                                                  //
                            text: 'Document request has been updated successfully',                      //
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