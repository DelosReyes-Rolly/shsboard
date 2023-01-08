<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Document </b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div><br/>
    <div class="modal-body">
        <div style="font-size: 40px; font-weight:bold;">
            <div class="card-body" style="padding: 10px 40px 10px 40px">
                <span><label class="large" for="name" style="font-size: 26px;"><b>Document Name: </b></label></span>
                <span style="font-size: 26px;">{{$document->name}}</span><br/><br/>
                <span><label class="large" for="name" style="font-size: 26px;"><b>Created at: </b></label></span>
                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($document->created_at))}}</span><br/><br/>
                <span><label class="large" for="name" style="font-size: 26px;"><b>Updated at: </b></label></span>
                <span><span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($document->updated_at))}}</span><br/>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</main>