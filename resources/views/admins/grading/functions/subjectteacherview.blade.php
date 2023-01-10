<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Schedule </b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div style="font-size: 28px;">
            <div class="card-body" style="padding: 10px 40px 10px 40px">
                <span><b>Teacher:</b></span> <span><div style="font-size: 28px;">{{$subjectteacher-> faculty -> last_name}}, {{$subjectteacher -> faculty -> first_name}} {{$subjectteacher -> faculty -> middle_name}}</div></span><br/><br/>
                <span><b>Gradelevel:</b></span> <span> <div style="font-size: 28px;">{{$subjectteacher -> gradelevel -> gradelevel}}</div></span><br/><br/>
                <span><b>Semester:</b></span> <span> <div style="font-size: 28px;">{{$subjectteacher -> semester -> sem}}</div></span><br/><br/>
                <span><b>Strand:</b></span> <span> <div style="font-size: 28px;">{{$subjectteacher -> course -> courseName}}</div></span><br/><br/>
                <span><b>Section:</b></span> <span> <div style="font-size: 28px;">{{$subjectteacher -> section -> section}}</div></span><br/><br/>
                <span><b>Subject:</b></span> <span> <div style="font-size: 28px;">{{$subjectteacher -> subject -> subjectname}}</div></span><br/><br/>
                <span><b>Time:</b></span> <span> <div style="font-size: 28px;">{{$time_start =  date('h:i A', strtotime($subjectteacher -> time_start))}} - {{$time_end =  date('h:i A', strtotime($subjectteacher -> time_end))}}</div></span><br/><br/>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</main>