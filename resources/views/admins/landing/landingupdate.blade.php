<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update on Home</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateLanding" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <input type="hidden" id="id" name="id" value="{{$landing->id}}"/>    
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="large mb-1" for="title" style="font-size: 20px;"><span style="color: red">*</span> Title</label>
                <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" placeholder="Enter the title" name="title"  value="{{$landing->title}}" required>
                <div class="invalid-feedback">
                    Please input title.
                </div>
            </div>
            <div class="col-md-12">
                <label class="large mb-1" for="editor2" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                <textarea class="form-control @error('editor2') is-invalid @enderror" id="editor2" type="text" placeholder="Enter the information" name="editor2" rows="10" cols="80" required>{{$landing->content}}</textarea>
                <div class="invalid-feedback">
                    Please input content.
                </div>
            </div><br/>
        </div>
    </div>
    <!-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor2');
    </script> -->
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
        $("#updateLanding").submit(function(i) {
            i.preventDefault();

            var id = $("#id").val();
            var title = $("#title").val();
            var content = $("#editor2").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "PUT",
                url: '{{url("/updatelanding/")}}/' + id,
                data: {
                    id: id,
                    title: title,
                    content: content,
                    _token: _token,
                },
                success: function(response) {
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updateLanding")[0].reset();
                        $('#landing' + response.id +' td:nth-child(2)').text(response.title);
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Landing has been updated successfully',
                        });
                        $("#reloadlanding").load(location.href + " #reloadlanding");
                        $("#reloadlanding2").load(location.href + " #reloadlanding2");
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