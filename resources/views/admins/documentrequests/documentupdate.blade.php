<main>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Document</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updatedocument/{{$document->id}}">
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="large" for="name" style="font-size: 20px;"><span style="color: red">*</span> Document name:</label>
                <br>
                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" style="font-size: 16px;" placeholder="Document Name" name="name" value="{{$document->name}}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
</main>