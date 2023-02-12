<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Purpose </b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div><br/>
    <div class="modal-body">
        <div style="font-size: 40px;">
            <div class="card-body" style="padding: 10px 40px 10px 40px">
                <span><label class="large" for="name" style="font-size: 26px;"><b>Purpose: </b></label></span>
                <span style="font-size: 26px;">{{$purpose->purpose}}</span><br/>
                <span><label class="large" for="name" style="font-size: 26px;"><b>Proof Needed: </b></label></span>
                <span style="font-size: 26px;">{{$purpose->proof_needed}}</span>
                <span><label class="large" for="name" style="font-size: 26px;"><b>Created at: </b></label>
                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($purpose->created_at))}}</span><br/>
                <span><label class="large" for="name" style="font-size: 26px;"><b>Updated at: </b></label></span>
                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($purpose->updated_at))}}</span><br/>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</main>