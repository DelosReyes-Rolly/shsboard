
<main>
    <div class="modal-header">
        <div style="font-size: 28px; color: green;"><label><b><span id="last_name">{{$advisory -> faculty -> last_name}}</span>, <span id="first_name">{{$advisory -> faculty -> first_name}}</span> <span id="middle_name">{{$advisory -> faculty -> middle_name}}</span> <span id="suffix">{{$advisory -> faculty -> suffix}}</span>'s Class</b></label></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div style="font-size: 20px;">
            <div class="card-body" style="padding: 10px 40px 10px 40px">
                <span><span style="font-weight:bold; ">Gradelevel: </span> {{$advisory -> gradelevel -> gradelevel}}</span><br/>
                <span><span style="font-weight:bold; ">Strand: </span> {{$advisory -> course -> courseName}}</span><br/>
                <span><span style="font-weight:bold; ">Section: </span> {{$advisory -> section -> section}}</span><br/>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</main>