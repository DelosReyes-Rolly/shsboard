<main>
<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Event</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updateevent/{{$event->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="mb-3" style="color: red">
            * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label class="large mb-1" for="inputsubject" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                <input class="form-control @error('subject') is-invalid @enderror" id="inputsubject" type="text" placeholder="Enter the title" name="what"  value="{{$event->what}}" required>
                <div class="invalid-feedback">
                    Please input subject.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="slarge mb-1" for="inputdate" style="font-size: 20px;"><span style="color: red">*</span> Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="inputdate" placeholder="Enter the date" name="whn"  value="{{$event->whn}}" required>
                <div class="invalid-feedback">
                    Please input date.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time:</label><br>
                <input type="time" id="time" class="form-control" name="whn_time" value="{{$event->whn_time}}" required>
                <div class="invalid-feedback">
                    Please input time.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="inputsender" style="font-size: 20px;"><span style="color: red">*</span> From</label>
                <input class="form-control @error('sender') is-invalid @enderror" id="inputsender" type="text" placeholder="Enter the sender" name="sender"  value="{{$event->sender}}" required>
                <div class="invalid-feedback">
                    Please input sender.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="inputrecipient" style="font-size: 20px;"><span style="color: red">*</span> To</label>
                <input class="form-control @error('recipient') is-invalid @enderror" id="inputrecipient" type="text" placeholder="Enter the recipients" name="who"  value="{{$event->who}}" required>
                <div class="invalid-feedback">
                    Please input recipient.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="inputlocation" style="font-size: 20px;"><span style="color: red">*</span> Location</label>
                <input class="form-control @error('location') is-invalid @enderror" id="inputlocation" type="text" placeholder="Enter the location" name="whr"  value="{{$event->whr}}" required>
                <div class="invalid-feedback">
                    Please input location.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="slarge mb-1" for="inputpost_expiration" style="font-size: 20px;"><span style="color: red">*</span> Expired at</label>
                <input type="date" class="form-control @error('post_expiration') is-invalid @enderror" id="inputpost_expiration" placeholder="Enter the date" name="expired_at"  value="{{$event->expired_at}}" required>
                <div class="invalid-feedback">
                    Please input expiry date.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="editor2" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80" required>{{$event->content}}</textarea>
                <div class="invalid-feedback">
                    Please input content.
                </div>
            </div><br/>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor2');
</script>
</main>