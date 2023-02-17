@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
    <div>



        
            <div class="px-2 mt-2">
                @if($announcement->privacy == 1)
                    <div>
                        <nav  aria-label = "breadcrumb">
                            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
                            <ul class = "breadcrumb">
                            <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
                            <li class = "breadcrumb-item"><a class="bca" href = "{{ url('/createAnnouncement') }}">Announcements</a></li>
                            <!--Add the "active" class to li element to represent the current page-->
                            <li class = "breadcrumb-item active" aria-current = "page">view announcement</li>
                            </ul>
                        </nav>
                    </div>
                @elseif($announcement->privacy == 2)
                    <div>
                        <nav  aria-label = "breadcrumb">
                            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
                            <ul class = "breadcrumb">
                            <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
                            <li class = "breadcrumb-item"><a class="bca" href = "{{ url('/tableofannouncement') }}">Announcements</a></li>
                            <!--Add the "active" class to li element to represent the current page-->
                            <li class = "breadcrumb-item active" aria-current = "page">view announcement</li>
                            </ul>
                        </nav>
                    </div>
                    @endif
                <!-- page navigation-->
                <div style="margin: 20px;">
                    @if($announcement->privacy == 1)
                        <a class="btn btn-secondary btn-lg back-button back-button1" href="{{ url('createAnnouncement') }}"><i class="fas fa-arrow-left"></i>   Back to announcement</a>
                    @elseif($announcement->privacy == 2)
                        <a class="btn btn-secondary btn-lg back-button back-button1" href="{{ url('/tableofannouncement') }}"><i class="fas fa-arrow-left"></i>   Back to announcement</a>
                    @endif
                </div>
                <h3 style="font-size: 28px; font-weight: 800;">View Annoucement</h3><br/>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4 left-to-right" id="reloadlanding2">
                            <div class="border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-4">
                                            <label class="large mb-1" for="inputwhat" style="font-size: 26px;"><b>Subject: </b></label>
                                            <span style="font-size: 26px;">{{$announcement->what}}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="slarge mb-1" for="inputwhn" style="font-size: 26px;"><b>When: </b></label>
                                            <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($announcement->whn))}}</span>
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-4">
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
                                            <label class="large mb-1" for="editor" style="font-size: 26px;"><b>Content: </b></label><br>
                                                <span style="font-size: 26px;">{!!$announcement->content!!}</span>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group privacy-->
                                            <!-- Save changes button-->
                                            <div>
                                            <a class="btn btn-warning btn-md" href="{{ url('showannouncement',['id'=>$announcement->id]) }}" onclick="editItem(this)" data-id="{{ $announcement->id }}" data-toggle="modal" data-target="#editModal{{ $announcement->id }}"><i class="fas fa-edit"></i> Update</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- edit modal -->
                            <div id="editModal{{ $announcement->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content border-start-lg border-start-yellow">
                                    </div>
                                </div>
                            </div>   
                        </div>
                </div>
            </div>
        <script type="text/javascript">
            $(document).ready(function(){
                editItem(e);
            });
            function editItem(e){
                id = e.getAttribute('data-id');
            }
        </script>
</main>
<br><br><br><br>