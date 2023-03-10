@include('partials.facultyheader')
<main>
    <!-- announcements -->
    <div class="announcement_body">
        <div class="announcement_text top-to-bottom">Announcements</div>
    </div>
    <section id="about" class="about">
        <div class=""> <!-- container  -->
            <div id="main-content" class="blog-page">
                <div class="">
                    <div class="row clearfix">
                        <div class="col-lg-9 col-md-12 left-box">
                            @if($announcement == NULL)
                            <div class="alert alert-danger"><em style="font-size: 20px;">No announcements for now.</em></div>
                            @else
                            <div class="row">
                                @foreach ($announcement as $announcements)
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card single_post">
                                        <div class="body">
                                            @if($announcements->image != NULL)
                                            <div class="img-post">
                                                <center><img class="d-block img-fluid announcement-image3" src="{{ asset('uploads/announcement/'.$announcements->image) }}" /></center>
                                            </div>
                                            @endif
                                            <h3 style="font-size: 28px;"><b>{!!$announcements -> what!!}</b></h3><br />
                                            <p>{!!\Illuminate\Support\Str::limit($announcements -> content, 100)!!}</p>
                                            <a class="btn btn-md btn-success" href="{{ url('seeAnnouncementStudent',['id'=>$announcements->id]) }}"><em style="font-size: 20px;">read more...</em></a>
                                            <div class="footer">
                                                <ul class="stats">
                                                    <?php $whn = date('F d, Y', strtotime($announcements->whn)); ?>
                                                    <li>From {{$announcements -> sender}}</li>
                                                    <li>To {{$announcements -> who}}</li>
                                                    <li>On {{$date =   date('F d, Y', strtotime($announcements->whn))}} , {{$time =   date('h:i a', strtotime($announcements->whn_time))}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border: 1px solid black">
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <br><br><br><br>
                        <div class="col-lg-3 col-md-12 right-box">
                            <div class="card">
                                <div class="header">
                                    <h2 style="font-size: 28px;">Reminders</h2><br>
                                    @if ($message = Session::get('reminder'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @endif
                                    @if($reminder == NULL)
                                    <br><br>
                                    <div class="alert alert-danger"><em style="font-size: 20px;">No reminders for now.</em></div>
                                    @else
                                    @foreach ($reminder as $reminders)
                                    <div class="single_post fade-in-text">
                                        <hr> {!!$reminders -> content!!}
                                    </div>
                                    <br>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<br><br><br><br>