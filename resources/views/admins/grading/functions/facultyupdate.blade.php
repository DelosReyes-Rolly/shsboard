<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Faculty</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updatefaculty/{{$faculty->id}}">
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
           <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{$faculty->last_name}}" style="font-size: 14px;">
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{$faculty->first_name}}" style="font-size: 14px;">
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;">Middle Name</label>
                <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{$faculty->middle_name}}" style="font-size: 14px;">
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;">Suffix</label>
                <input type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{$faculty->suffix}}" style="font-size: 14px;">
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$faculty->email}}" style="font-size: 14px;"> 
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>