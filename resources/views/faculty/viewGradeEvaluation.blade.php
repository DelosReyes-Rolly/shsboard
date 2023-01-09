<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>View Evaluation</b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 20px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div style="font-size: 40px;">
            <div class="card-body" style="padding: 10px 40px 10px 40px">
                <span style="font-size: 28px;" ><b>Grade level:</b> {{$view -> gradelevel -> gradelevel}}</span><br/>
                <span style="font-size: 28px;" ><b>Semester:</b> {{$view -> semester -> sem}}</span><br/>
                <span style="font-size: 28px;" ><b>Subject:</b> {{$view -> subject -> subjectname}}</span><br/>
                <span style="font-size: 28px;" ><b>Student name:</b> {{$view -> student -> last_name}}, {{$view -> student -> first_name}} {{$view -> student -> middle_name}} {{$view -> student -> suffix}}</span><br/>
                <span style="font-size: 28px;" ><b>Date Requested:</b> {{$date  =   date('F d, Y', strtotime($view->created_at))}}</span><br/>
                <span style="font-size: 28px;" ><b>Reason for request:</b><br/> {{$view -> reason}}</span><br/>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 20px;">Close</button>
    </div>
</main>