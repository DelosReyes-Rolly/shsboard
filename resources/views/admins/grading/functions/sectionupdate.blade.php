<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Section</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateSection" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <input type="hidden" id="id" name="id" value="{{$section->id}}"/>
        <div class="col-md-12">
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
        $("#updateSection").submit(function(i) {
            i.preventDefault();

            var id = $("#id").val();
            var section = $("#section").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "PUT",
                url: '{{url("/updatesection/")}}/' + id,
                data: {
                    id: id,
                    section: section,
                    _token: _token,
                },
                success: function(response) {
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updateSection")[0].reset();
                        $('#section' + response.id +' td:nth-child(2)').text(response.section);
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Section has been updated successfully',
                        })
                }
            });
            $("#saveBtn").click(function() {
                $("#example").load("#example");
            });

        });
       
</script>