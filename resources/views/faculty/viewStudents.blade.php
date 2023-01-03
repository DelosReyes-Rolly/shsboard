
@include('partials.facultyheader')
<main>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script> -->

    <div class="left-to-right"> 
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div></br></br>
        @endif
        <div style="margin: 20px;">
            <a class="btn btn-secondary btn-lg" href="javascript:history.back()" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to advisory list</a>
        </div>
        <h3 style="font-size: 28px; font-weight: 800;">Table of Students </h3>
        <br/>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 left-to-right border-start-lg border-start-success" style="padding: 10px 40px 10px 40px;">
            <div class="card-header">
                @if($releasegrades->grade_release == 1)
                    <div>
                        <a class="btn btn-primary btn-lg" href="{{route('releasemidterm',['gradelevel_id'=>$gradelevel_id, 'course_id'=>$course_id, 'section_id'=>$section_id])}}" style="float: right; font-size: 18px;"><i class="fas fa-file-alt"></i> Release 1st quarter grades</a>
                    </div>
                @elseif($releasegrades->grade_release == 2)
                    <div>
                        <a class="btn btn-primary btn-lg" href="{{route('releasefinals',['gradelevel_id'=>$gradelevel_id, 'course_id'=>$course_id, 'section_id'=>$section_id])}}" style="float: right; font-size: 18px;"><i class="fas fa-file-alt"></i> Release 2nd quarter grades</a>
                    </div>
                @elseif($releasegrades->grade_release == 3)
                    <div>
                        <a class="btn btn-primary btn-lg" href="{{route('releasemidterm',['gradelevel_id'=>$gradelevel_id, 'course_id'=>$course_id, 'section_id'=>$section_id])}}" style="float: right; font-size: 18px;"><i class="fas fa-file-alt"></i> Release 3rd quarter grades</a>
                    </div>
                @elseif($releasegrades->grade_release == 4)
                    <div>
                        <a class="btn btn-primary btn-lg" href="{{route('releasefinals',['gradelevel_id'=>$gradelevel_id, 'course_id'=>$course_id, 'section_id'=>$section_id])}}" style="float: right; font-size: 18px;"><i class="fas fa-file-alt"></i> Release 4th quarter grades</a>
                    </div>
                @endif
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                <!-- table-->
                <div class="col-lg-6 col-md-6 col-md-12">
                    <div style="font-size: 20px; font-weight:bold;">
                        <br/>MALE
                    </div>
                    @if($males->count() == 0)
                        <br><br>
                        <div class="alert alert-danger"><em>No records found.</em></div>
                    @else 
                    <br/>
                    <div class="table-responsive table-billing-history">
                            <table class="display nowrap table-bordered table-striped table-hover table " style="width:100%">
                                <thead class="table-success">
                                    <tr>
                                        <th class="border-gray-200" scope="col">Name</th>
                                        <th class="border-gray-200" scope="col">Action</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                        @foreach ($males as $male)
                                            <tr>
                                                <td>{{$male -> last_name}}, {{$male -> first_name}} {{$male -> middle_name}} {{$male -> suffix}}</td>
                                                <td>
                                                    <a class="btn btn-success btn-md" href="/viewstudentgrades/{{$male->id}}" style="font-size:14px;"><i class="fas fa-eye"></i> View Grades</a>
                                                </td> 
                                            </tr>
                                        @endforeach 
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-md-6 col-md-12">
                    <div style="font-size: 20px; font-weight:bold;">
                        <br/>FEMALE
                    </div>
                    @if($females->count() == 0)
                        <br><br>
                        <div class="alert alert-danger"><em>No records found.</em></div>
                    @else 
                    <br/>
                    <div class="table-responsive table-billing-history">
                            <table class="display nowrap table-bordered table-striped table-hover" style="width:100%">
                                <thead class="table-success">
                                    <tr>
                                        <th class="border-gray-200" scope="col">Name</th>
                                        <th class="border-gray-200" scope="col">Action</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                        @foreach ($females as $female)
                                            <tr>
                                                <td>{{$female -> last_name}}, {{$female -> first_name}} {{$female -> middle_name}} {{$female -> suffix}}</td>
                                                <td>
                                                    <a class="btn btn-success btn-md" href="/viewstudentgrades/{{$female->id}}" style="font-size:14px;"><i class="fas fa-eye"></i> View Grades</a>
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
    </div>

   
</main>
<br><br><br><br>