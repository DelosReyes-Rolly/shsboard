<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} {{$student->suffix}}</b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        @if($student->status==1)
            <center><a href="/studentaddsubject/{{$student->id}}" class="btn btn-primary"><i class="fas fa-book"> </i> Add Subject Manually</a></center>
        @endif
        <div style="font-size: 40px;;">
            <div class="card-body" style="padding: 10px 40px 10px 40px">
             
                    <span style="font-size: 26px;"><b> LRN:</b></span>
                    <span id="lrn" style="font-size: 26px;">{{$student->LRN}}</span><br/>
                    <span style="font-size: 26px;"><b>Full Name: </b></span>
                    <span style="font-size: 26px;"><span id="last_name">{{$student->last_name}}</span>, <span id="first_name">{{$student->first_name}}</span> <span id="middle_name">{{$student->middle_name}}</span> <span id="suffix">{{$student->suffix}}</span></span><br/>
                    <span style="font-size: 26px;"><b> Address:</b></span>
                    <span style="font-size: 26px;">{{$student->address->street}} {{$student->address->village}}, {{$student->address->city}}, {{$student->address->zip_code}}</span><br/>
                    <span style="font-size: 26px;"><b>Phone Number: </b></span>
                    <span style="font-size: 26px;">{{$student->phone_number}}</span><br/>
                    <span style="font-size: 26px;"><b>Sex: </b></span>
                    <span style="font-size: 26px;">{{$student->gender}}</span><br/>
                    <span style="font-size: 26px;"><b>Grade Level: </b></span>
                    @if($student->gradelevel->gradelevel == 11 || $student->gradelevel->gradelevel == 12)
                        <span id="gradelevel"  style="font-size: 26px;">{{$student->gradelevel->gradelevel}}</span><br/>
                    @else
                        <span id="gradelevel" style="font-size: 26px;">Alumni</span><br/>
                    @endif
                    <span style="font-size: 26px;"><b>Strand and Section: </b></span>
                    <span style="font-size: 26px;"><span id="course">{{$student->course->courseName}}</span> - <span id="section">{{$student->section->section}}</span> </span><br/>
                    <span style="font-size: 26px;"><b>Email Address: </b></span>
                    <span id="email" style="font-size: 26px;">{{$student->email}}</span><br/>
                    <span style="font-size: 26px;"><b>Username: </b></span>
                    <span style="font-size: 26px;">{{$student->username}}</span><br/>
              
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</main>