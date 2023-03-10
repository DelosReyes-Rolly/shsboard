@include('partials.studentheader')
<main>
    <!-- announcements -->
    <div class="announcement_body">
        <div class="announcement_text">Activity Stream</div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <section id="about" class="about">
        <style>
            .fc-title {
                font-size: 20px;
            }

            .fc h2 {
                font-size: 40px;
            }
        </style>
        <div>
            <div id="main-content" class="blog-page">
                <div>
                <div style="padding:12px;" class="card mb-4 border-start-lg border-start-success" id="calendar"></div><br />
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 left-box">
                            <br><br>
                            @if($announcement == NULL)
                            <br><br>
                            <div class="alert alert-danger fade-in-text">
                                <center><em>No activity for now.</em></center>
                            </div>
                            @else
                            @foreach ($announcement as $announcements)
                            <div class="card single_post left-to-right">
                                <div class="body">
                                    <h4 style="font-size: 24px;"><b>Subject Name: </b>{{$announcements -> subject -> subjectname}}</h4><br />
                                    <h6 style="font-size: 24px;"><b>Teacher: </b>{{$announcements -> faculty -> last_name}}, {{$announcements -> faculty -> first_name}} {{$announcements -> faculty -> middle_name}}</h6><br /><br />
                                    <h3 style="font-size: 28px;"><b>{{$announcements -> what}}</b></h3><br />
                                    <?php $deadline = date('F d, Y', strtotime($announcements->expired_at)); ?>
                                    <?php $deadlinetime = date('h:i a', strtotime($announcements->whn_time)); ?>
                                    <div style="font-size: 24px;"><b>Deadline: </b>{{$deadline}} , {{$deadlinetime}}</div> <br />
                                    <div style="font-size: 22px;">{{$announcements -> content}}</div><br />
                                    <div class="footer">
                                        <ul class="stats">
                                            <?php $whn = date('F d, Y', strtotime($announcements->created_at)); ?>
                                            <?php $timeCreated = date('h:i a', strtotime($announcements->created_at)); ?>
                                            <div style="font-size: 24px;"><b>Posted at: </b>{{$whn}} , {{$timeCreated}}</div> <br />
                                        </ul>
                                    </div>
                                </div>
                                <hr style="border: 1px solid black">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

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
        });
    });
</script>