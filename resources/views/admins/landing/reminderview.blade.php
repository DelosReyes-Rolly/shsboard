<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Reminder </b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <label style="font-size: 20px;"><b>Date Posted: </b></label>
        <span style="font-size: 20px;">{{$requested_at  =   date('F d, Y', strtotime($reminder->created_at))}}</span><br/>

        <label style="font-size: 20px;"><b>Expiry date: </b></label>
        <span style="font-size: 20px;">{{$requested_at  =   date('F d, Y', strtotime($reminder->expired_at))}}</span><br/>

        <label style="font-size: 20px;"><b>Content: </b></label>
        <span style="font-size: 20px;">{!!$reminder->content!!}</span><br/>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</main>