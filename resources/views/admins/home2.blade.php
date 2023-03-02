@include('partials.adminheader')
<main>
    <!-- announcements -->
    <span style="font-size: 40px; font-weight: 800; color: green;">School Year {{ $schoolYear->schoolyear}}</span>
    <hr>
    <section id="about" class="about">

        <div class=""> <!-- container  -->
            <div id="main-content" class="blog-page">
                <div class="">
                    <div class="row clearfix">


                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card card-hover border-start-lg border-start-success">
                                <div class="card-body" style="background-color: #FF6666;">
                                    <h5 class="card-title" style="font-size:28px; color: #184624;">Students</h5>
                                    <p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-regular fa-calendar"> </i> {{ $students->count() }} </p>
                                </div>
                                <a href='{{ url("/gradingstudents") }}' style="background-color:#FFCCCC;">
                                    <div class="card-footer" style="text-align: right;">
                                        <small style="color: #006600; font-size:20px;">View Students <i class="fa-solid fa-arrow-right"> </i></small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card card-hover border-start-lg border-start-success">
                                <div class="card-body" style="background-color: #FFB266;">
                                    <h5 class="card-title" style="font-size:28px; color: #184624;">Faculties</h5>
                                    <p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-solid fa-school-flag"> </i> {{ $faculties->count() }}</p>
                                </div>
                                <a href='{{ url("/gradingfaculty") }}' style="background-color:#FFE5CC;">
                                    <div class="card-footer" style="text-align: right;">
                                        <small style="color: #006600; font-size:20px;">View Faculties <i class="fa-solid fa-arrow-right"> </i></small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card card-hove border-start-lg border-start-success">
                                <div class="card-body" style="background-color: #B2FF66;">
                                    <h5 class="card-title" style="font-size:28px; color: #184624;">Strands</h5>
                                    <p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-solid fa-chalkboard-user"> </i>{{ $courses->count() }}</p>
                                </div>
                                <a href='{{ url("/gradingcourses") }}' title="Strands" style="background-color:#E5FFCC;">
                                    <div class="card-footer" style="text-align: right;">
                                        <small style="color: #006600; font-size:20px;">View Strands <i class="fa-solid fa-arrow-right"> </i></small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card card-hover border-start-lg border-start-success">
                                <div class="card-body" style="background-color: #66FFFF;">
                                    <h5 class="card-title" style="font-size:28px; color: #184624;">Sections</h5>
                                    <p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-solid fa-calendar-days"> </i> {{ $sections->count() }}</p>
                                </div>
                                <a href='{{ url("/gradingsections") }}' style="background-color:#CCE5FF;">
                                    <div class="card-footer" style="text-align: right;">
                                        <small style="color: #006600; font-size:20px;">View Sections <i class="fa-solid fa-arrow-right"> </i></small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card card-hover border-start-lg border-start-success">
                                <div class="card-body" style="background-color: #6666FF;">
                                    <h5 class="card-title" style="font-size:28px; color: #184624;">Subjects</h5>
                                    <p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-solid fa-book"> </i> {{ $subjects->count() }}</p>
                                </div>
                                <a href='{{ url("/gradingsubjects") }}' style="background-color:#CCCCFF;">
                                    <div class="card-footer" style="text-align: right;">
                                        <small style="color: #006600; font-size:20px;">View Subjects <i class="fa-solid fa-arrow-right"> </i></small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>