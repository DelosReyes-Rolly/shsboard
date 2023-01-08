<main>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Purpose</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updatepurpose/{{$purpose->id}}">
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="large" for="purpose" style="font-size: 20px;"><span style="color: red">*</span> Purpose:</label>
                <br>
                <input class="form-control @error('purpose') is-invalid @enderror" id="purpose" type="text" style="font-size: 16px;" placeholder="Document purpose" name="purpose" value="{{$purpose->purpose}}">
            </div>
            <div class="col-md-12">
                <label class="large" for="proof_needed" style="font-size: 20px;"><span style="color: red">*</span> Proof needed:</label>
                <br>
                <input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed" type="text" style="font-size: 16px;" placeholder="Proof Needed" name="proof_needed" value="{{$purpose->proof_needed}}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
</main>