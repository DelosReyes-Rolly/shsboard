@include('partials.facultyheader')
@include('partials.facultySecondHeader')
<main>
     <!-- new tables -->
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
        <h3 style="font-size: 28px; font-weight: 800;">Grade Evaluation</h3> 
        <hr class="mt-0 mb-4">
                <!-- boxes -->
                <hr style="border: 1px solid grey;">
                <div class="container-xl px-4 mt-4 left-to-right">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 3-->
                        <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white;">
                            <div class="card-body">
                                <div class="requesteddocument" style="color: white;">Requested Grade Evaluations</div>
                                @if($gradeevaluationrequests->count() == 0)
                                    <br><br>
                                    <div class="alert alert-danger"><em>No records found.</em></div>
                                @else
                                    <div class="h3 d-flex align-items-center" style="padding:40px;"> {{ $gradeevaluationrequests->count() }} </div>
                                @endif
                                <!-- <a class="text-arrow-icon small text-success" href="#!">
                                    View Active requests
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>

                
                <hr style="border: 1px solid grey;">
                <!-- tables -->
                <h3 style="font-size: 28px; font-weight: 800;">Requested Grade Evaluations</h3> 
                <hr class="mt-0 mb-4">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                            
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mb-4 right-to-left border-start-lg border-start-success" style="padding: 20px 20px 20px 20px;">
                    <div class="card-header"></div>
                    <div class="card-body p-0">
                        <!-- table-->
                        @if($gradeevaluationrequests->count() == 0)
                            <br><br>
                            <div class="alert alert-danger"><em>No records found.</em></div>
                        @else 
                            <br>
                            <label class="large mb-1" for="inputcontent"> <div class="alert alert-primary"><em>- Upload only accepts DOCS, DOCX, and PDF files.</em></div></label><br>
                            <div class="table-responsive table-billing-history">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="border-gray-200" scope="col">#</th>
                                            <th class="border-gray-200" scope="col">Grade Level</th>
                                            <th class="border-gray-200" scope="col">Semester</th>
                                            <th class="border-gray-200" scope="col">Subject</th>
                                            <th class="border-gray-200" scope="col">Student</th>
                                            <th class="border-gray-200" scope="col">Date Requested</th>
                                            <th class="border-gray-200" scope="col">File</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                        <?php 
                                            $i=1;  
                                        ?>
                                            @foreach ($gradeevaluationrequests as $gradeevaluationrequest)
                                                <tr>
                                                <td class="text-center">{{$i++}}</td>
                                                    <td>{{$gradeevaluationrequest -> gradelevel -> gradelevel}}</td>
                                                    <td>{{$gradeevaluationrequest -> semester -> sem}}</td>
                                                    <td>{{$gradeevaluationrequest -> subject -> subjectname}}</td>
                                                    <td>{{$gradeevaluationrequest -> student -> last_name}}, {{$gradeevaluationrequest -> student -> first_name}} {{$gradeevaluationrequest -> student -> middle_name}} {{$gradeevaluationrequest -> student -> suffix}}</td>
                                                    <td>{{$date  =   date('F d, Y', strtotime($gradeevaluationrequest->created_at))}}</td>
                                                    <td>
                                                        <?php if($gradeevaluationrequest -> file == NULL):?>
                                                            <form method="POST" action="/uploadeval/{{$gradeevaluationrequest->id}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="file" name = "file" class="form-control" style="font-size: 12px;" >
                                                                <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                                            </form>
                                                        <?php else: ?>
                                                            {{$gradeevaluationrequest -> file}}<br>
                                                            <a href="/download/{{$gradeevaluationrequest -> file}}" class="btn btn-primary">Download</a> 
                                                        <?php endif; ?> 
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table> 
                            </div>
                        @endif  
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