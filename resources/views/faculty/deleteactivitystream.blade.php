<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Delete Activity </h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 20px;">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="deletedActivity{{$activitystream->id}}">   
    <div class="modal-body">
        @csrf
        @method('PUT')
        <p style="color: red; font-size:20px;">Are you sure you want to delete this activity ?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 20px;">Close</button>
        <font face = "Verdana"><input type="submit" class="btn btn-danger btn-md" value="Delete" style="font-size: 20px;"></font>
    </div>
</form>
<script>
        $("#deletedActivity"+id).submit(function(e) {
            e.preventDefault();
            $(":submit").attr("disabled", true);
            var _token = $("input[name=_token]").val();
            $.ajax({
                type:'PUT',
                url:'{{url("/activitystream/delete")}}/' +id,
                data:{
                    _token: _token,
                },
                success:function(data) {
                    $("#deleteModal"+id).removeClass("in"); 
                    $(".modal-backdrop").remove();
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '');
                    $("#deleteModal"+id).hide();
                    $("#deletedActivity"+ id)[0].reset();
                    $(":submit").removeAttr("disabled");
                    Swal.fire({                                                    
                        icon: 'success',                                               
                        title: 'Success.',                                                
                        text: 'Activity has been deleted successfully!',                      
                    })
                    $("#announcement"+id+"").remove();
                    $("#reload").load(document.URL +  ' #reload');
                    $("#reload2").load(document.URL +  ' #reload2');
                }
            });
        });
</script>