<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Drop Student </h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="droppedStudent{{$student->id}}">   
    <div class="modal-body">
        @csrf
        @method('PUT')
        <p style="color: red; font-size:20px;">Are you sure you want to drop <b><span id="last_name">{{$student->last_name}}<span>,  <span id="first_name"> {{$student->first_name}}</span>  <span id="middle_name"> {{$student->middle_name}}</span>  <span id="suffix"> {{$student->suffix}} </span></b>?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-danger btn-md" value="Delete"></font>
    </div>
</form>
<script>
        $("#droppedStudent"+id).submit(function(e) {
            e.preventDefault();
            $(":submit").attr("disabled", true);
            var _token = $("input[name=_token]").val();
            $.ajax({
                type:'PUT',
                url:'{{url("/dropstudent")}}/' +id,
                data:{
                    _token: _token,
                },
                success:function(data) {
                    $("#dropModal"+id).removeClass("in"); 
                    $(".modal-backdrop").remove();
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '');
                    $("#dropModal"+id).hide();
                    $("#droppedStudent"+ id)[0].reset();
                    $(":submit").removeAttr("disabled");
                    Swal.fire({                                                    
                        icon: 'success',                                               
                        title: 'Success.',                                                
                        text: 'Student has been dropped successfully!',                      
                    })
                    $("#student"+id+"").remove();
                }
            });
        });
</script>