@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<div class="left-to-right">

        <!-- form -->
                    
       
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">View Reminder </h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (content)-->
                                        <div class="col-md-6">
                                            <label class="slarge mb-1" for="inputwhn" style="font-size: 26px;"><b>Date Posted: </b></label>
                                                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($reminder->created_at))}}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="slarge mb-1" for="inputwhn" style="font-size: 26px;"><b>Expiry Date: </b></label>
                                                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($reminder->expired_at))}}</span>
                                            </div>
                                        </div><br/>
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 26px;"><b>Content: </b></label>
                                                <span style="font-size: 26px;">{!!$reminder->content!!}</span>
                                        </div><br/>
                                        <!-- Form Group privacy-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Save changes button-->
                                            <div class="pull-right">
                                                <a class="btn btn-info btn-md" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
                                                <a class="btn btn-warning btn-md" href="/showreminder/{{$reminder->id}}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="/deleteadminannouncement/{{$reminder->id}}"><i class="far fa-trash-alt"></i> Delete</a>  
                                            </div>
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