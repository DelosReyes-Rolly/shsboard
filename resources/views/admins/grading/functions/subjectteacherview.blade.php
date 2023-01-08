<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Schedule </b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div style="font-size: 28px; font-weight:bold; color: green;">
            <div class="card-body" style="padding: 10px 40px 10px 40px">
                <span>Teacher:</span> <span><h1 style="font-size: 28px;">{{$subjectteacher-> faculty -> last_name}}, {{$subjectteacher -> faculty -> first_name}} {{$subjectteacher -> faculty -> middle_name}}</h1></span><br/><br/>
                <span>Gradelevel:</span> <span> <h1 style="font-size: 28px;">{{$subjectteacher -> gradelevel -> gradelevel}}</h1></span><br/><br/>
                <span>Semester:</span> <span> <h1 style="font-size: 28px;">{{$subjectteacher -> semester -> sem}}</h1></span><br/><br/>
                <span>Strand:</span> <span> <h1 style="font-size: 28px;">{{$subjectteacher -> course -> courseName}}</h1></span><br/><br/>
                <span>Section:</span> <span> <h1 style="font-size: 28px;">{{$subjectteacher -> section -> section}}</h1></span><br/><br/>
                <span>Subject:</span> <span> <h1 style="font-size: 28px;">{{$subjectteacher -> subject -> subjectname}}</h1></span><br/><br/>
                <span>Time:</span> <span> <h1 style="font-size: 28px;">{{$time_start =  date('h:i A', strtotime($subjectteacher -> time_start))}} - {{$time_end =  date('h:i A', strtotime($subjectteacher -> time_end))}}</h1></span><br/><br/>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</main>