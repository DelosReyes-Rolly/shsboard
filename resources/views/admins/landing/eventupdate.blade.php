<main>
<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Event</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateEvent{{$event->id}}"  class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv{{$event->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$event->id}}"/>    
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="large mb-1" for="what" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                <input class="form-control @error('subject') is-invalid @enderror" id="what" type="text" placeholder="Enter the title" name="what"  value="{{$event->what}}" required>
                <div class="invalid-feedback">
                    Please input subject.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="slarge mb-1" for="whn" style="font-size: 20px;"><span style="color: red">*</span> Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="whn" placeholder="Enter the date" name="whn"  value="{{$event->whn}}" required>
                <div class="invalid-feedback">
                    Please input date.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time:</label><br>
                <input type="time" id="whn_time" class="form-control" name="whn_time" value="{{$event->whn_time}}" required>
                <div class="invalid-feedback">
                    Please input time.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="sender" style="font-size: 20px;"><span style="color: red">*</span> From</label>
                <input class="form-control @error('sender') is-invalid @enderror" id="sender" type="text" placeholder="Enter the sender" name="sender"  value="{{$event->sender}}" required>
                <div class="invalid-feedback">
                    Please input sender.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="who" style="font-size: 20px;"><span style="color: red">*</span> To</label>
                <input class="form-control @error('recipient') is-invalid @enderror" id="who" type="text" placeholder="Enter the recipients" name="who"  value="{{$event->who}}" required>
                <div class="invalid-feedback">
                    Please input recipient.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="whr" style="font-size: 20px;"><span style="color: red">*</span> Location</label>
                <input class="form-control @error('location') is-invalid @enderror" id="whr" type="text" placeholder="Enter the location" name="whr"  value="{{$event->whr}}" required>
                <div class="invalid-feedback">
                    Please input location.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="slarge mb-1" for="expired_at" style="font-size: 20px;"><span style="color: red">*</span> Expired at</label>
                <input type="date" class="form-control @error('post_expiration') is-invalid @enderror" id="expired_at" placeholder="Enter the date" name="expired_at"  value="{{$event->expired_at}}" required>
                <div class="invalid-feedback">
                    Please input expiry date.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="editor2" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                <textarea class="form-control @error('editor2') is-invalid @enderror" id="editor2{{$event->id}}" type="text" placeholder="Enter the information" name="editor2"  rows="10" cols="80" required>{{$event->content}}</textarea>
                <div class="invalid-feedback">
                    Please input content.
                </div>
            </div><br/>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor2'+id);
</script>
<script>
        var $loading = $('#loadingDiv'+ id);
        function formPost(){
            CKupdate();
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
                $("#example").show();
            });
            // var id = $("#id").val();
            // var what = $("#what").val();
            // var who = $("#who").val();
            // var whn = $("#whn").val();
            // var whn_time = $("#whn_time").val();
            // var whr = $("#whr").val();
            // var sender = $("#sender").val();
            // var content = $("#editor2"+id).val();
            // var expired_at = $("#expired_at").val();
            // var _token = $("input[name=_token]").val();
            var form_data = $("form#updateEvent"+id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updateevent/")}}/' + id,
                data:form_data,
                success: function(response) {
                        $("#example").hide();
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        // $("#updateEvent"+ id)[0].reset();
                        // $('#event' + response.id +' td:nth-child(2)').text(response.what);
                        $(":submit").removeAttr("disabled");
                        $("#reload").load(document.URL +  ' #reload');
                        $("#reload2").load(document.URL +  ' #reload2');
                        $("#deleteModal"+id).find("#what").text(response.what);
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Event has been updated successfully',
                        });
                        $('#example').DataTable().clear().destroy();
                            $('#example').load(document.URL +  ' #example');
                            $(function () {
                                table = $('#example').DataTable( {
                                    responsive: true,
                                    "bInfo" : false,
                                } );
                            } );
                        // $("#reloadlanding2").load(location.href + " #reloadlanding2");
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
</main>