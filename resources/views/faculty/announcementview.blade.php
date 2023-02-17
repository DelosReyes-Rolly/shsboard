<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Activity</b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:40px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <label style="font-size: 20px;"><b>Title: </b></label>
        <span id="what" style="font-size: 20px;">{{$announcement->what}}</span><br/>

        <label style="font-size: 20px;"><b>Posted at: </b></label>
        <span style="font-size: 20px;">{{$requested_at  =   date('F d, Y', strtotime($announcement->created_at))}} ; {{$time_start =  date('h:i A', strtotime($announcement->created_at))}}</span><br/>

        <label style="font-size: 20px;"><b>Deadline: </b></label>
        <span id="deadline" style="font-size: 20px;">{{$requested_at  =   date('F d, Y', strtotime($announcement->expired_at))}}</span><br/>

        <label style="font-size: 20px;"><b>Gradelevel: </b></label>
        <span id="gradelevel" style="font-size: 20px;">{{$announcement -> gradelevel -> gradelevel}}</span><br/>

        <label style="font-size: 20px;"><b>Strand: </b></label>
        <span id="course" style="font-size: 20px;">{{$announcement -> course -> courseName}}</span><br/>

        <label style="font-size: 20px;"><b>Section: </b></label>
        <span id="section" style="font-size: 20px;">{{$announcement -> section -> section}}</span><br/>

        <label style="font-size: 20px;"><b>Subject: </b></label>
        <span id="subject" style="font-size: 20px;">{{$announcement -> subject -> subjectname}}</span><br/>

        <label style="font-size: 20px;"><b>Content: </b></label>
        <span id="contents" style="font-size: 20px;">{{$announcement->content}}</span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 16px;">Close</button>
    </div>
</main>