<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update School Year</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updateschoolyear/{{$schoolyear->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
    @csrf
    @method('put')
        <div class="col-md-12">
            <input type="text" name="schoolyear" class="form-control @error('schoolyear') is-invalid @enderror" value="{{$schoolyear->schoolyear}}"style="font-size: 20px;"  onkeypress="return onlyNumberKey(event)" maxlength="4" minlength="4" required>
            <div class="invalid-feedback">
                Please input valid school year.
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>   