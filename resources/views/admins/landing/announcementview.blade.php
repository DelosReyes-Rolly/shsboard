@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
    <div>



        
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">View Annoucement</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4 left-to-right">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwhat" style="font-size: 26px;"><b>Subject: </b></label>
                                            <span style="font-size: 26px;">{{$announcement->what}}</span>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputwhn" style="font-size: 26px;"><b>When: </b></label>
                                            <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($announcement->whn))}}</span>
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                            <label for="appt" style="font-size: 26px;"><b>Time: </b></label>
                                            <span style="font-size: 26px;">{{$time_start =  date('h:i A', strtotime($announcement->whn_time))}}</span>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                        <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                            <div class="col-md-4">
                                                <label class="large mb-1" for="inputwho" style="font-size: 26px;"><b>Sender: </b></label>
                                                <span style="font-size: 26px;">{{$announcement->sender}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="large mb-1" for="inputwho" style="font-size: 26px;"><b>Recipient: </b></label>
                                                <span style="font-size: 26px;">{{$announcement->who}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="large mb-1" for="inputwhr" style="font-size: 26px;"><b>Location: </b></label>
                                                <span style="font-size: 26px;">{{$announcement->whr}}</span>
                                            </div>
                                            <!-- Form Group (location)-->
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-3">
                                                <label class="slarge mb-1" for="inputwhn" style="font-size: 26px;"><b>Expiry: </b></label>
                                                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($announcement->expired_at))}}</span>
                                            </div>
                                        </div><br/><br/>
                                        <!-- Form Group (content)-->
                                        @if($announcement->image != NULL)
                                            <div class="mb-3">
                                                <center><img class="d-block img-fluid" src="{{ asset('uploads/announcement/'.$announcement->image) }}" style="height:auto; width: auto;"/></center>
                                            </div><br/>
                                        @endif
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 26px;"><b>Content: </b></label>
                                                <span style="font-size: 26px;">{!!$announcement->content!!}</span>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group privacy-->
                                            <!-- Save changes button-->
                                            <div>
                                                <a class="btn btn-info btn-md" href="/createAnnoucement"><i class="fas fa-arrow-left"></i> Back</a>
                                                <a class="btn btn-warning btn-md" href="/showannouncement/{{$announcement->id}}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="/deleteadminannouncement/{{$announcement->id}}"><i class="fas fa-trash-alt"></i> Delete</a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        
</main>
<br><br><br><br>