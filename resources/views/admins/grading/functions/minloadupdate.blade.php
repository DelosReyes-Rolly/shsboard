<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Regular Load</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateMinload" class="needs-validation" novalidate>
    <div class="modal-body">
    @csrf
    @method('put')
    <div id="whoops" class="alert alert-danger" style="display: none;">
        <b>Whoops! There is a problem in your input</b> <br/>
        <div id="validation-errors"></div>
    </div>
    <input type="hidden" id="id" name="id" value="{{$minload->id}}"/>
        <div class="col-md-12">
            <input type="number" id="minload" name="minload" class="form-control @error('minload') is-invalid @enderror" value="{{$minload->regular_load}}"style="font-size: 20px;"  onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" required>
            <div class="invalid-feedback">
                Please input valid load.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>   
<script>
        $("#updateMinload").submit(function(i) {
            i.preventDefault();

            var id = $("#id").val();
            var min_load = $("#minload").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "PUT",
                url: '{{url("/updateminload/")}}/' + id,
                data: {
                    id: id,
                    min_load: min_load,
                    _token: _token,
                },
                success: function(response) {
                        $("#editmin").removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editmin").hide();
                        $("#updateMinload")[0].reset();
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Minimum load has been updated successfully',
                        }).then(function() {
                            $("#reload").load(location.href + " #reload");
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