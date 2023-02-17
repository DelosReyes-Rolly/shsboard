

<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Subject </b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <label style="font-size: 20px;"><b>Subject Code: </b></label>
        <span id="subjectcode" style="font-size: 20px;">{{$subject->subjectcode}}</span><br/>

        <label style="font-size: 20px;"><b>Subject Name: </b></label>
        <span id="subjectname" style="font-size: 20px;">{{$subject->subjectname}}</span><br/>

        <label style="font-size: 20px;"><b>Description: </b></label>
        <span id="description" style="font-size: 20px;">{{$subject->description}}</span><br/>

        <label style="font-size: 20px;"><b>Expertise Needed: </b></label>
        <span id="expertise_id" style="font-size: 20px;">{{$subject->expertise->expertise}}</span><br/>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</main>