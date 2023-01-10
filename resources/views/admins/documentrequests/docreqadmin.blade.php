<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update request</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" action="/updaterequestdocadmin/{{$docreq->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <label class="labels" style="font-size: 26px;">Full Name</label><input type="text" class="form-control"  style="font-size: 20px;" placeholder=" {{$docreq->student->last_name}}, {{$docreq->student->first_name}} {{$docreq->student->middle_name}} {{$docreq->student->suffix}}" value="" readonly> <br>
            </div>
            @if($docreq->gradelevel->gradelevel == 11 || $docreq->gradelevel->gradelevel == 12)
                <div class="col-md-12">
                    <label class="labels" style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 20px;" placeholder=" {{$docreq->gradelevel->gradelevel}} " value="" readonly> <br>
                </div>
            @else
                <div class="col-md-12">
                    <label class="labels" style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" Alumni" value="" readonly> <br>
                </div>
            @endif
            <div class="col-md-12">
                <label class="large mb-1" style="font-size: 20px;"><br><b>Document Needed: </b></label>
                <span style="font-size: 20px;">{{$docreq -> document -> name}}</span>
            </div>
            <div class="col-md-12">
                <label class="large mb-1" for="inputpurpose" style="font-size: 20px;"><b>Purpose: </b></label>
                <span style="font-size: 20px;">{{$docreq->purpose->purpose}}</span>
            </div>
            <div class="col-md-12">
                <label class="large mb-1" for="document_id" class="form-control @error('status') is-invalid @enderror" style="font-size: 20px;"><br><b>Status</b></label>
                <div class="col-md-12" hidden><input class="form-control @error('status') is-invalid @enderror" id="inputstatus" type="text" placeholder="Enter status" name="status"  value="{{$docreq->status}}"></div>
            	    <select id="status" name="status" class="form-control" value="{{$docreq->status}}"style="font-size: 16px;" >
            			<option value="" disabled selected>Change Status</option>
            			<option value="1" {{$docreq->status == "1" ?'selected' : ''}}>Pending</option>
            			<option value="2" {{$docreq->status == "2" ?'selected' : ''}}>On Process</option>
            			<option value="3" {{$docreq->status == "3" ?'selected' : ''}}>Completed</option>
            			<option value="4" {{$docreq->status == "4" ?'selected' : ''}}>Denied</option>
            		</select>
                    <div class="invalid-feedback">
                        Please choose status.
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>