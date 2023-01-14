<main>
<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Document</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST"  id="updateDocument" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <input type="hidden" id="id" name="id" value="{{$document->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="large" for="name" style="font-size: 20px;"><span style="color: red">*</span> Document name:</label>
                <br>
                <input id="nameq" class="form-control @error('name') is-invalid @enderror"  type="text" style="font-size: 16px;" placeholder="Document Name" name="name" value="{{$document->name}}" required>
                <div class="invalid-feedback">
                    Please input valid document name.
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
        $("#updateDocument").submit(function(i) {
            i.preventDefault();

            var id = $("#id").val();
            var name = $("#nameq").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "PUT",
                url: '{{url("/updatedocument/")}}/' + id,
                data: {
                    id: id,
                    name: name,
                    _token: _token,
                },
                success: function(response) {
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updateDocument")[0].reset();
                        $('#document' + response.id +' td:nth-child(2)').text(response.name);
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Document has been updated successfully',
                        })
                }
            });
            $("#saveBtn").click(function() {
                $("#example").load("#example");
            });

        });
       
</script>
</main>