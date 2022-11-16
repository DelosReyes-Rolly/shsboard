@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
        <div>
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">View Event </h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwhat" style="font-size: 26px;"><b>What: </b></label>
                                                <span style="font-size: 26px;">{{$event->what}}</span>
                                        </div>
                                        <!-- Form Group date-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwho" style="font-size: 26px;"><b>Who: </b></label>
                                                <span style="font-size: 26px;">{{$event->who}}</span>
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-3">
                                                <label class="slarge mb-1" for="inputwhn" style="font-size: 26px;"><b>When: </b></label>
                                                    <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($event->whn))}}</span>
                                            </div>
                                            <!-- Form Group (content)-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="appt" style="font-size: 26px;"><b>Time: </b></label>
                                                        <span style="font-size: 26px;">{{$time_start =  date('h:i A', strtotime($event->whn_time))}}</span>
                                                </div>
                                            </div>
                                            <!-- Form Group whr-->
                                            <div class="col-md-3">
                                                <label class="slarge mb-1" for="inputexpired_at" style="font-size: 26px;"><b>Expired at: </b></label>
                                                    <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($event->expired_at))}}</span>
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputwhr" style="font-size: 26px;"><b>Where: </b></label>
                                                    <span style="font-size: 26px;">{{$event->whr}}</span>
                                            </div>
                                        </div><br/>
                                        @if($event->image != NULL)
                                            <div class="mb-3">
                                                <center><img class="d-block img-fluid" src="{{ asset('uploads/event/'.$event->image) }}" style="width: 400px; height: 400px;"/></center>
                                            </div><br/>
                                        @endif
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 26px;"><b>Content: </b></label>
                                                <span style="font-size: 26px;">{!!$event->content!!}</span>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Save changes button-->
                                            <div class="pull-right">
                                                <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                                <a class="btn btn-warning btn-md" href="/showevent/{{$event->id}}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="/deleteadminannouncement/{{$event->id}}"><i class="far fa-trash-alt"></i> Delete</a>  
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