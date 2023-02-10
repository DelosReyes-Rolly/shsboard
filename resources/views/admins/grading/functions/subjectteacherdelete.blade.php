<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Delete Subject of Teacher </h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="deletedSubjectteacher{{$subjectteacher->id}}">   
    <div class="modal-body">
        @csrf
        @method('PUT')
        <p style="color: red; font-size:20px;">Are you sure you want to delete teacher's subject?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-danger btn-md" value="Delete"></font>
    </div>
</form>
<script>
        $("#deletedSubjectteacher"+id).submit(function(e) {
            e.preventDefault();
            $(":submit").attr("disabled", true);
            var _token = $("input[name=_token]").val();
            $.ajax({
                type:'PUT',
                url:'{{url("/subjectteacher/delete")}}/' +id,
                data:{
                    _token: _token,
                },
                success:function(data) {
                    $("#deleteModal"+id).removeClass("in"); 
                    $(".modal-backdrop").remove();
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '');
                    $("#deleteModal"+id).hide();
                    $("#deletedSubjectteacher"+ id)[0].reset();
                    $(":submit").removeAttr("disabled");
                    Swal.fire({                                                    
                        icon: 'success',                                               
                        title: 'Success.',                                                
                        text: 'Subject of teacher has been deleted successfully!',                      
                    })
                    $("#subjectteacher"+id+"").remove();
                }
            });
        });
</script>