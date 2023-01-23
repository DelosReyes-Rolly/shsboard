@include('partials.adminheader')

<main>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
    <div class="left-to-right">
            <div class="container-xl px-4 mt-4 left-to-right">
                <div style="font-size: 20px;"><a href="/gradingfaculty"> Faculty</a>&emsp;<i class="fas fa-angle-right"></i>&emsp; view teacher</div><br/>
                <!-- page navigation-->
                <div style="margin: 20px;">
                    <a class="btn btn-secondary btn-lg" href="/gradingfaculty" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to faculty list</a>
                </div>
                <h3 style="font-size: 28px; font-weight: 800;">View Teacher</h3><br/>
                <hr class="mt-0 mb-4">
                <div class="row">
                   
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row">
                                        <!-- Form Group (title)-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Full Name: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$faculty->last_name}}, {{$faculty->first_name}} {{$faculty->middle_name}} {{$faculty->suffix}}</span>
                                        </div>
                                    
                                        <!-- Form Group whr-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Gender: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$faculty->gender}}</span>
                                        </div>

                                        <!-- Form Group whr-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Expertise: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$faculty->expertise->expertise}}</span>
                                        </div>
                                   
                                    
                                        <!-- Form Group whr-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Phone Number: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$faculty->phone_number}}</span>
                                        </div>
                                  
                                        <!-- Form Row -->
                                    
                                        <!-- Form Group whr-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Email Address: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$faculty->email}}</span>
                                        </div>
                                        
                                        <!-- Form Group whr-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Subject Load: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$faculty->subject_load}}</span>
                                        </div>

                                        <!-- Form Group whr-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Class Load: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$faculty->class_load}}</span>
                                        </div>
                                        
                                         <!-- Form Group whr-->
                                         <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Status: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">
                                                @if ($faculty->isMaster == null)
                                                    Master
                                                @else
                                                    Regular
                                                @endif
                                            </span>
                                        </div><br/><br/><br/><br/>
                                    </div>

                                    <div class="card-header" style="font-size: 20px;">{{$faculty->last_name}}'s Subjects</div>
                                    @if($subjectteachers->count() == 0) 
                                    <!-- find all subject of teachers then count if they have one. -->
                                        <div class="alert alert-danger"><em>No records found.</em></div>
                                    @else
                                        @foreach ($subjectteachers as $sy)
                                            <!-- collection to individual row -->
                                                <!-- accordion start -->
                                                <button class="accordion"><b>{{$sy->schoolyear->schoolyear}}</b></button>
                                                <!-- output schoolyear "" -->
                                                <div class="panel">
                                                    <div style="padding-bottom: 400px;">
                                                        <div class="card-header">Table of Subjects</div>
                                                        <div class="card-body p-0">
                                                            <!-- table-->
                                                                <br>
                                                                <div class="table-responsive table-billing-history">
                                                                    <table id="example" class="display nowrap" style="width:100%">
                                                                        <thead class="table-success">
                                                                            <tr>
                                                                                <th class="border-gray-200" scope="col">#</th>
                                                                                <th class="border-gray-200" scope="col">Subject Name</th>
                                                                                <th class="border-gray-200" scope="col">Grade Level</th>
                                                                                <th class="border-gray-200" scope="col">Semester</th>
                                                                                <th class="border-gray-200" scope="col">Course Name</th>
                                                                                <th class="border-gray-200" scope="col">Section</th>
                                                                                <th class="border-gray-200" scope="col">Time</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @php $count = 1; @endphp
                                                                        @foreach($subjects as $schoolyearsubject)
                                                                            @if($schoolyearsubject->schoolyear->schoolyear == $sy->schoolyear->schoolyear)
                                                                                    <tr id="{{$schoolyearsubject -> id}}">
                                                                                        <td>{{$count++}}</td>
                                                                                        <td>{{$schoolyearsubject -> subject -> subjectname}}</td>
                                                                                        <td>{{$schoolyearsubject -> gradelevel -> gradelevel}}</td>
                                                                                        <td>{{$schoolyearsubject -> semester -> sem}}</td>
                                                                                        <td>{{$schoolyearsubject -> course -> courseName}}</td>
                                                                                        <td>{{$schoolyearsubject -> section -> section}}</td>
                                                                                        <td>{{$time_start =  date('h:i A', strtotime($schoolyearsubject -> time_start))}} - {{$time_end =  date('h:i A', strtotime($schoolyearsubject -> time_end))}}</td>
                                                                                    </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>    
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                    @endif
                                    <hr>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            <!-- accordion -->
            <script>
                var acc = document.getElementsByClassName("accordion");
                var i;

                for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("actives");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                    } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                    } 
                });
                }
            </script>
        
</main>
<br><br><br><br>