<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Maximum Load</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateMaxload" class="needs-validation" novalidate>
    <div class="modal-body">
    @csrf
    @method('put')
    <div id="whoops" class="alert alert-danger" style="display: none;">
        <b>Whoops! There is a problem in your input</b> <br/>
        <div id="validation-errors"></div>
    </div>
    <input type="hidden" id="id" name="id" value="{{$maxload->id}}"/>
        <div class="col-md-12">
            <input type="number" id="maxload" name="maxload" class="form-control @error('maxload') is-invalid @enderror" value="{{$maxload->max_load}}"style="font-size: 20px;"  onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" required>
            <div class="invalid-feedback">
                Please input valid maximum load.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>   
<script>
        $("#updateMaxload").submit(function(i) {
            i.preventDefault();

            var id = $("#id").val();
            var max_load = $("#maxload").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "PUT",
                url: '{{url("/updatemaxload/")}}/' + id,
                data: {
                    id: id,
                    max_load: max_load,
                    _token: _token,
                },
                success: function(response) {
                        $("#editmax").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editmax").hide();
                        $("#updateMaxload")[0].reset();
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Maximum load has been updated successfully',
                        }).then(function() {
                            $("#reload2").load(location.href + " #reload2");
                        })
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    }); 
                },
            });
            $("#saveBtn").click(function() {
                $("#example").load("#example");
            });

        });
       
</script>