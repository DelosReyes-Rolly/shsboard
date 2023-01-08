<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Gradelevel</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updategradelevel/{{$gradelevel->id}}">
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="col-md-12">
            <input type="number" name="gradelevel" class="form-control @error('gradelevel') is-invalid @enderror" value="{{$gradelevel->gradelevel}}"style="font-size: 20px;" min="11" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>