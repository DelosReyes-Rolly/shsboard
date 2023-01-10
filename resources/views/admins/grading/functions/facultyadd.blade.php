<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">New teacher</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="{{ route('faculty.store') }}"class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"  onkeydown="return alphaOnly(event);" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid last name.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 14px;" required>
                <div class="invalid-feedback">
                    Please input valid first name.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;">Middle Name</label>
                <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}" onkeydown="return alphaOnly(event);" style="font-size: 14px;">
                <div class="invalid-feedback">
                    Please input valid middle name.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;">Suffix</label>
                <input type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{ old('suffix') }}" onkeydown="return alphaOnly(event);" style="font-size: 14px;">
                <div class="invalid-feedback">
                    Please input valid suffix name.
                </div>
            </div>
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" style="font-size: 14px;" required> 
                <div class="invalid-feedback">
                    Please input valid email address.
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>