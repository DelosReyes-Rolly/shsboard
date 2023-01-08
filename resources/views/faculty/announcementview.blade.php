<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Activity</b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <label style="font-size: 20px;"><b>Title: </b></label>
        <span style="font-size: 20px;">{{$announcement->what}}</span><br/>

        <label style="font-size: 20px;"><b>When: </b></label>
        <span style="font-size: 20px;">{{$requested_at  =   date('F d, Y', strtotime($announcement->whn))}}</span><br/>

        <label style="font-size: 20px;"><b>Time: </b></label>
        <span style="font-size: 20px;">{{$time_start =  date('h:i A', strtotime($announcement->whn_time))}}</span><br/>

        <label style="font-size: 20px;"><b>Expiry date: </b></label>
        <span style="font-size: 20px;">{{$requested_at  =   date('F d, Y', strtotime($announcement->expired_at))}}</span><br/>

        <label style="font-size: 20px;"><b>Gradelevel: </b></label>
        <span style="font-size: 20px;">{{$announcement -> gradelevel -> gradelevel}}</span><br/>

        <label style="font-size: 20px;"><b>Strand: </b></label>
        <span style="font-size: 20px;">{{$announcement -> course -> courseName}}</span><br/>

        <label style="font-size: 20px;"><b>Section: </b></label>
        <span style="font-size: 20px;">{{$announcement -> section -> section}}</span><br/>

        <label style="font-size: 20px;"><b>Subject: </b></label>
        <span style="font-size: 20px;">{{$announcement -> subject -> subjectname}}</span><br/>

        <label style="font-size: 20px;"><b>Content: </b></label>
        <span style="font-size: 20px;">{!!$announcement->content!!}</span><br/>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 16px;">Close</button>
    </div>
</main>