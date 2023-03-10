@include('partials.facultyheaderwithoutEwan')
<main>
    <!-- announcements -->
    <div class="announcement_body">
        <div class="announcement_text top-to-bottom">Announcements</div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    </div>
    <style>
        .fc-title {
            font-size: 20px;
        }

        .fc h2 {
            font-size: 40px;
        }
    </style>
    <section id="about" class="about">
        <div class=""> <!-- container  -->
            <div id="main-content" class="blog-page">
                <div class="">
                    <div style="padding:12px;" class="card mb-4 border-start-lg border-start-success" id="calendar"></div><br />
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
                                            <a class="btn btn-md btn-success" href="{{ url('seeAnnouncement',['id'=>$announcements->id]) }}"><em style="font-size: 20px;">read more...</em></a>
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

<script>
    $(document).ready(function() {
        var ann = @json($ann);
        var calendar = $('#calendar').fullCalendar({
            eventColor: "green",
            eventTextColor: "#ffffff",
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: ann,
            selectable: true,
            selectHelper: true,
            eventClick: function(events) {
                var id = events.id;
                window.location.href = "/seeAnnouncement/" + id;
                console.log(id);
            }
        });
    });
</script>