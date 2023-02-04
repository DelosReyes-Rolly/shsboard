@include('partials.adminheader')
<main>
    <br/><br/><br/><br/><br/><br/>
    <div class="container" style="padding: 10px 20px 10px 20px;">
        <div class="px-2 mt-2">
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-primary" style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
                        <div class="card-body">
                            <div class="card-header">Courses</div>
                            <div class="h3" style="padding: 0px 40px 10px 40px"> {{ $courseCount->count() }} </div>
                                <a class="text-arrow-icon small" href="/gradingcourses" style="padding-left: 20px;">
                                    View courses >
                                </a> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 2-->
                    <div class="card h-100 border-start-lg border-start-secondary" style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
                        <div class="card-body">
                            <div class="card-header">Teachers</div>
                            <div class="h3 padding" style="padding: 0px 40px 10px 40px"> {{ $facultyCount->count() }} </div>
                                <a class="text-arrow-icon small text-secondary" href="/gradingfaculty" style="padding-left: 20px;">
                                    View teachers >
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success" style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
                        <div class="card-body">
                            <div class="card-header">Students</div>
                            <div class="h3 padding" style="padding: 0px 40px 10px 40px"> {{ $studentCount->count() }} </div>
                                <a class="text-arrow-icon small text-success" href="/gradingstudents" style="padding-left: 20px;">
                                    View Students >
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 right-to-left">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success" style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
                        <div class="card-body">
                            <div class="card-header">Subjects</div>
                            <div class="h3 padding" style="padding: 0px 40px 10px 40px"> {{ $subjectCount->count() }} </div>
                            <a class="text-arrow-icon small text-success" href="/gradingsubjects" style="padding-left: 20px;">
                                View Subjects >
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 right-to-left">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-primary" style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
                        <div class="card-body">
                            <div class="card-header">School Years</div>
                            <div class="h3 padding" style="padding: 0px 40px 10px 40px"> {{ $yearCount->count() }} </div>
                                <a class="text-arrow-icon small" href="/gradingschoolyear" style="padding-left: 20px;">
                                        View school year >
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 right-to-left">
                    <!-- Billing card 2-->
                    <div class="card h-100 border-start-lg border-start-secondary" style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
                        <div class="card-body">
                            <div class="card-header">Gradelevels</div>
                            <div class="h3 padding" style="padding: 0px 40px 10px 40px"> {{ $levelCount->count() }} </div>
                                <a class="text-arrow-icon small text-secondary" href="/gradinggradelevels" style="padding-left: 20px;">
                                    View gradelevels >
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 2-->
                    <div class="card h-100 border-start-lg border-start-secondary" style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
                        <div class="card-body">
                            <div class="card-header">Sections</div>
                            <div class="h3 padding" style="padding: 0px 40px 10px 40px"> {{ $sectionCount->count() }} </div>
                                <a class="text-arrow-icon small text-secondary" href="/gradingsections" style="padding-left: 20px;">
                                    View sections >
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 2-->
                    <div class="card h-100 border-start-lg border-start-secondary" style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
                        <div class="card-body">
                            <div class="card-header">Classes</div>
                            <div class="h3 padding" style="padding: 0px 40px 10px 40px"> {{ $classCount->count() }} </div>
                                <a class="text-arrow-icon small text-secondary" href="/gradingfacultysubjects" style="padding-left: 20px;">
                                    View classes >
                                </a>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
</main>
<br><br><br><br>