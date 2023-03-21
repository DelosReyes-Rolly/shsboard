@include('partials.adminheader')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
<main>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <!-- announcements -->
    <span style="font-size: 40px; font-weight: 800; color: green;">School Year {{ $schoolYear->schoolyear}}</span>
    <hr>
    <span style="font-size: 20px; font-weight: 800; color: green;">Open Early Registration for school year {{ $schoolYear->schoolyear}}</span>
    <input type="hidden" name="id" id="id" value="{{$schoolYear->id}}">
    <input type="hidden" name="isRegister" id="isRegister" value="{{$schoolYear->isRegister}}">
    <label class="switch">
        <input id="checkbox" type="checkbox">
        <span class="slider round"></span>
    </label>

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

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    var isRegisters = document.getElementById("isRegister").value;

    if (isRegisters == 1) {
        document.getElementById("checkbox").checked = true;

    } else {
        document.getElementById("checkbox").checked = false;
    }


    $('#checkbox').click(function() {
        var checked = $(this).is(':checked');
        var id = document.getElementById("id").value;
        if (checked == true) {
            var isRegister = 1;
        } else {
            var isRegister = null;
        }

        $.ajax({
            type: "POST",
            url: "{{ url('/isRegister') }}",
            data: {
                id: id,
                isRegister: isRegister,
            },
            dataType: 'json',
        });
    });
</script>