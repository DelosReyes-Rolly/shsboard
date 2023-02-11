<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Announcement</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateAnnouncement{{$announcement->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <center><div hidden id="loadingDiv{{$announcement->id}}" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
        <input type="hidden" id="id" name="id" value="{{$announcement->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="large mb-1" for="what" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                <input id="what" class="form-control @error('subject') is-invalid @enderror" type="text" placeholder="Enter the title" name="what"  value="{{$announcement->what}}" required>
                <div class="invalid-feedback">
                    Please input subject.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="slarge mb-1" for="whn" style="font-size: 20px;"><span style="color: red">*</span> Date</label>
                <input id="whn" type="date" class="form-control @error('date') is-invalid @enderror" placeholder="Enter the date" name="whn"  value="{{$announcement->whn}}" required>
                <div class="invalid-feedback">
                    Please input date.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time:</label><br>
                <input id="whn_time" type="time" class="form-control" name="whn_time" value="{{$announcement->whn_time}}" required>
                <div class="invalid-feedback">
                    Please input time.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="sender" style="font-size: 20px;"><span style="color: red">*</span> From</label>
                <input id="sender" class="form-control @error('sender') is-invalid @enderror" type="text" placeholder="Enter the sender" name="sender"  value="{{$announcement->sender}}" required>
                <div class="invalid-feedback">
                    Please input recipient.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="recipient" style="font-size: 20px;"><span style="color: red">*</span> To</label>
                <input id="who" class="form-control @error('recipient') is-invalid @enderror" type="text" placeholder="Enter the recipients" name="who"  value="{{$announcement->who}}" required>
                <div class="invalid-feedback">
                    Please input sender.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="location" style="font-size: 20px;"><span style="color: red">*</span> Location</label>
                <input id="whr" class="form-control @error('location') is-invalid @enderror" type="text" placeholder="Enter the location" name="whr"  value="{{$announcement->whr}}" required>
                <div class="invalid-feedback">
                    Please input location.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="slarge mb-1" for="expired_at" style="font-size: 20px;"><span style="color: red">*</span> Expired at</label>
                <input id="expired_at" type="date" class="form-control @error('post_expiration') is-invalid @enderror" placeholder="Enter the date" name="expired_at"  value="{{$announcement->expired_at}}" required>
                <div class="invalid-feedback">
                    Please input expiry date.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="editor2" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                <textarea id="editor2{{$announcement->id}}" class="form-control @error('editor2') is-invalid @enderror" type="text" placeholder="Enter the information" name="editor2" rows="10" cols="80" required>{{$announcement->content}}</textarea>
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
        CKEDITOR.replace('editor2'+ id);
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
            });
            var id = $("#id").val();
            var what = $("#what").val();
            var who = $("#who").val();
            var whn = $("#whn").val();
            var whn_time = $("#whn_time").val();
            var whr = $("#whr").val();
            var sender = $("#sender").val();
            var content = $("#editor2"+id).val();
            var expired_at = $("#expired_at").val();
            var _token = $("input[name=_token]").val();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updateannouncement/")}}/' + id,
                data: {
                    id: id,
                    what: what,
                    who: who,
                    whn: whn,
                    whn_time: whn_time,
                    whr: whr,
                    sender: sender,
                    content: content,
                    expired_at: expired_at,
                    _token: _token,
                },
                success: function(response) {
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updateAnnouncement"+ id)[0].reset();
                        // $('#announcement' + response.id +' td:nth-child(2)').text(response.what);
                        $(":submit").removeAttr("disabled");
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Announcement has been updated successfully',
                        }).then(function() {
                            location.reload(true);
                        })
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