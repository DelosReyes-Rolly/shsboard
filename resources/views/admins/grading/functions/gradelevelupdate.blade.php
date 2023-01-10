<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Gradelevel</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updategradelevel/{{$gradelevel->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="col-md-12">
            <input type="text" name="gradelevel" class="form-control @error('gradelevel') is-invalid @enderror" value="{{$gradelevel->gradelevel}}"style="font-size: 20px;"   onkeypress="return onlyNumberKey(event)" maxlength="2" minlength="2" required>
            <div class="invalid-feedback">
                Please input valid grade level.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>