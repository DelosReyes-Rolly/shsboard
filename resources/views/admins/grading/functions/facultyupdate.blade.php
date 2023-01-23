<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Faculty</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateFaculty" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div id="whoops" class="alert alert-danger" style="display: none;">
            <b>Whoops! There is a problem in your input</b> <br/>
            <div id="validation-errors"></div>
        </div>
        <input type="hidden" id="id" name="id" value="{{$faculty->id}}"/>
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
           <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                <input id="lastname" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{$faculty->last_name}}" onkeydown="return alphaOnly(event);" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid last name.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                <input id="firstname" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{$faculty->first_name}}"  onkeydown="return alphaOnly(event);"style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid first name.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;">Middle Name</label>
                <input id="middlename" type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{$faculty->middle_name}}"  onkeydown="return alphaOnly(event);"style="font-size: 14px;">
                <div class="invalid-feedback">
                    Please input valid middle name.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;">Suffix</label>
                <input id="suffix" type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{$faculty->suffix}}" onkeydown="return alphaOnly(event);" style="font-size: 14px;">
                <div class="invalid-feedback">
                    Please input valid suffix name.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$faculty->email}}" style="font-size: 14px;" required> 
                <div class="invalid-feedback">
                    Please input valid email address.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label for="expertise" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Expertise') }}</label><br>
                <select id="expertise" name="expertise" class="form-control" required>
                    <option value="" disabled> Please Select Expertise </option>
                    @foreach($expertises as $expertise)
                    <option value="{{$expertise->id}}"{{ $faculty->expertise_id === $expertise->id ? 'selected' : '' }}>{{$expertise->expertise}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please input expertises.
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" id="saveBtn" value="Submit"></font>
    </div>
</form>
<script>
        $("#updateFaculty").submit(function(i) {
            i.preventDefault();

            var id = $("#id").val();
            var last_name = $("#lastname").val();
            var first_name = $("#firstname").val();
            var middle_name = $("#middlename").val();
            var suffix = $("#suffix").val();
            var email = $("#email").val();
            var expertise_id = $("#expertise").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                type: "PUT",
                url: '{{url("/updatefaculty/")}}/' + id,
                data: {
                    id: id,
                    expertise_id: expertise_id,
                    last_name: last_name,
                    first_name: first_name,
                    middle_name: middle_name,
                    suffix: suffix,
                    email: email,
                    _token: _token
                },
                success: function(response) {
                        $("#editModal"+id).removeClass("in");
                        $(".modal-backdrop").remove();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '');
                        $("#editModal"+id).hide();
                        $("#updateFaculty")[0].reset();
                        // if(response.suffix == null && response.middle_name == null){
                        //     $('#faculty' + response.id +' td:nth-child(2)').text(function(n) {return response.last_name + ', ' + response.first_name;});
                        // }
                        // else if(response.suffix == null){
                        //     $('#faculty' + response.id +' td:nth-child(2)').text(function(n) {return response.last_name + ', ' + response.first_name + ' ' + response.middle_name;});
                        // }
                        // else if(response.middle_name == null){
                        //     $('#faculty' + response.id +' td:nth-child(2)').text(function(n) {return response.last_name + ', ' + response.first_name + ' ' + response.suffix;});
                        // }
                        // else{
                        //     $('#faculty' + response.id +' td:nth-child(2)').text(function(n) {return response.last_name + ', ' + response.first_name + ' ' + response.middle_name + ' ' + response.suffix;});
                        // }
                        // $('#faculty' + response.id +' td:nth-child(6)').text(response.email);
                        // $('#example').load(document.URL +  ' #example');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Strand has been updated successfully',
                        }).then(function() {
                            location.reload(true);
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