@include('partials.facultyheader')
<main>
    <!-- new tables -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script> -->

	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-jquery-1.12.1.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-rowreorder-1.2.8.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-responsive-2.3.0.css') }}">
	<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-jquery-1.12.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-rowreorder-1.2.8.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-responsive-2.3.0.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#sample1').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
        $(document).ready(function() {
            var table = $('#sample2').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
        $(document).ready(function() {
            var table = $('#sample3').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
        $(document).ready(function() {
            var table = $('#sample4').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
    <div class="left-to-right">
        @if (session('alert'))
            <br/><br/>
            <div class="alert alert-success">
                {{ session('alert') }}
            </div>
        @endif  
        <div style="margin: 20px;">
            <a class="btn btn-secondary btn-lg" href="javascript:history.back()" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to student list</a>
        </div>
        <h3 style="font-size: 28px; font-weight: 800;">Subject Grades</h3>
        <br/>
        <hr class="mt-0 mb-4">
        <div class="mb-4">
            <div class="card border-start-lg border-start-yellow">
                <div class="card-header" style="color: green; text-transform: uppercase; font-size: 20px;">{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}}  {{$student->suffix}} - {{($student->LRN)}} - </div>

                <!-- check if enrolled in any subjects in any grade -->
                @if($allsubjects->count() == 0)
                   <div class="alert alert-danger"><center><em>Sorry. You're not currently enrolled in any subjects. Please contact the administrator.</em></center></div>
                @else 
                    <!-- Check if Enrolled in any grade 12 subjects -->
                    @if($grade12->count() != 0)
                        <div class="card-header">
                            <div class="card-body p-0">

                                <!-- Grade 12 Second Semester -->   
                                @if($grade12secondsem->count() != 0)
                                <br>
                                    <div class="table-responsive table-billing-history">
                                        <div class="mb-4">
                                            <div class="card">
                                                <div class="card-header titled" style="font-size: 18px;">
                                                    Grade 12 - Second Semester
                                                    <div class="pull-right">
                                                        <!-- print -->
                                                    </div>
                                                </div>
                                                <br>
                                                <table id="sample4" class="display nowrap table-bordered table-striped table-hover" style="width:100%">

                                                    @if($grade12secondsemungraded->count() == 0)
                                                        @php
                                                            $initials = 0;
                                                            $initial = 0;
                                                            $ave = 0;
                                                        @endphp
                                                        @foreach($grade12secondsem  as $ave)
                                                            @if($ave->midterm != 'NULL' || $ave->finals !='NULL')
                                                                @php $initials = ($ave->midterm + $ave->finals) / 2; @endphp
                                                                @php $initial = $initials+$initial; @endphp
                                                            @endif
                                                        @endforeach
                                                        @if ($initial > 0)
                                                            @php $ave = $initial / $grade12secondsem ->count(); @endphp
                                                        @else
                                                            @php $ave = 0; @endphp
                                                        @endif
                                                        @if($ave>=75)
                                                            <b>General Weighted Average for the Semester: <span class="badge bg-success"  style="color: white;font-size: 16px;"> {{ $ave }} </span></b>
                                                        @else
                                                            <b>General Weighted Average for the Semester: <span class="badge bg-danger" style="color: white;font-size: 16px;"> {{ $ave }}</span></b>
                                                        @endif
                                                    @else
                                                        <b>General Weighted Average for the Semester: <span class="badge bg-danger" style="color: white;">Grades are not complete</span></b>
                                                    @endif
                                                    <br>
                                                    <br>
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th class="border-gray-200" scope="col">Code</th>
                                                            <th class="border-gray-200" scope="col">Subject Name</th>
                                                            <th class="border-gray-200" scope="col">Teacher Name</th>
                                                            <th class="border-gray-200" scope="col">Time</th>
                                                            <th class="border-gray-200" scope="col"><center>Third Quarter</center></th>
                                                            <th class="border-gray-200" scope="col"><center>Fourth Quarter</center></th>
                                                            <th class="border-gray-200" scope="col">Average</th>
                                                            <th class="border-gray-200" scope="col">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade12secondsem as $grade12second)
                                                                <tr>
                                                                    <td>{{$grade12second -> subject -> subjectcode}}</td>
                                                                    <td>{{$grade12second -> subject -> subjectname}}</td>
                                                                    <td>{{$grade12second -> faculty -> last_name}}, {{$grade12second -> faculty -> second_name}} {{$grade12second -> faculty -> middle_name}} {{$grade12second -> faculty -> suffix}}</td>
                                                                    <td>{{$time_start= date('h:i A', strtotime($grade12second->time_start))}} - {{$time_end= date('h:i A', strtotime($grade12second->time_end))}}</td>
                                                                    <td><center>{{$grade12second -> midterm}}</center></td>
                                                                    <td><center>{{$grade12second -> finals}}</center></td>
                                                                    <td>
                                                                        @php
                                                                            $ave = ($grade12second->midterm + $grade12second->finals) / 2;
                                                                            switch ($grade12second -> finals && $grade12second -> midterm) {
                                                                                case ($grade12second -> finals ==='NULL' || $grade12second -> midterm === 'NULL'):
                                                                                    if($grade12second -> finals === 0 && $grade12second -> midterm !== 0){
                                                                                        echo $ave = ($grade12second -> midterm + $grade12second -> finals) / 2;;
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade12second -> finals !== 0 && $grade12second -> midterm === 0){
                                                                                        echo $ave = ($grade12second -> midterm + $grade12second -> finals) / 2;;
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade12second -> finals === 0 && $grade12second -> midterm === 0){
                                                                                        echo $ave = ($grade12second -> midterm + $grade12second -> finals) / 2;;
                                                                                        break;
                                                                                    }
                                                                                    else{
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Grades are not complete</span>';
                                                                                        break;
                                                                                    }
                                                                                case ($grade12second -> finals !== 'NULL' && $grade12second -> midterm !== 'NULL'):
                                                                                    echo $ave;
                                                                                    break;
                                                                                default:
                                                                                    echo '<span class="badge bg-danger" style="color: white;">Unidentified</span>';
                                                                                break;
                                                                            }
                                                                        @endphp
                                                                    </td>
                                                                    <td>
                                                                        @php 
                                                                            switch ($ave && $grade12second -> finals && $grade12second -> midterm) {
                                                                                case ($grade12second -> finals === 'NULL' || $grade12second -> midterm === 'NULL'):
                                                                                    if($grade12second -> finals === 0 && $grade12second -> midterm !== 0){
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade12second -> finals !== 0 && $grade12second -> midterm === 0){
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade12second -> finals === 0 && $grade12second -> midterm === 0){
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                        break;
                                                                                    }
                                                                                    else{
                                                                                        echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                                                        break;
                                                                                    }
                                                                                case ($ave <= '74' && $grade12second -> finals !== 'NULL' && $grade12second -> midterm !== 'NULL'):
                                                                                    echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                    break;
                                                                                case ($ave <= '100' && $grade12second -> finals !== 'NULL' && $grade12second -> midterm !== 'NULL'):
                                                                                    echo '<span class="badge bg-success" style="color: white;">Passed</span>';
                                                                                    break;
                                                                                default:
                                                                                    echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                                                break;
                                                                            }
                                                                        @endphp         
                                                                    </td>
                                                                </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- GRADE 12 First Semester-->
                                @if($grade12firstsem->count() != 0)
                                    <br>
                                    <div class="table-responsive table-billing-history">
                                        <div class="mb-4">
                                            <div class="card">
                                                <div class="card-header titled" style="font-size: 18px;">
                                                    Grade 12 - First Semester
                                                    <div class="pull-right">
                                                        <!-- print -->
                                                    </div>
                                                </div>
                                                <br>
                                                <table id="sample3" class="display nowrap table-bordered table-striped table-hover" style="width:100%">

                                                    @if($grade12firstsemungraded->count() == 0)
                                                        @php
                                                            $initials = 0;
                                                            $initial = 0;
                                                            $ave = 0;
                                                        @endphp
                                                        @foreach($grade12firstsem  as $ave)
                                                            @if($ave->midterm != 'NULL' || $ave->finals !='NULL')
                                                                @php $initials = ($ave->midterm + $ave->finals) / 2; @endphp
                                                                @php $initial = $initials+$initial; @endphp
                                                            @endif
                                                        @endforeach
                                                        @if ($initial > 0)
                                                            @php $ave = $initial / $grade12firstsem ->count(); @endphp
                                                        @else
                                                            @php $ave = 0; @endphp
                                                        @endif
                                                        @if($ave>=75)
                                                            <b>General Weighted Average for the Semester: <span class="badge bg-success"   style="color: white;font-size: 16px;"> {{ $ave }} </span></b>
                                                        @else
                                                            <b>General Weighted Average for the Semester: <span class="badge bg-danger"   style="color: white;font-size: 16px;"> {{ $ave }}</span></b>
                                                        @endif
                                                    @else
                                                        <b>General Weighted Average for the Semester: <span class="badge bg-danger" style="color: white;">Grades are not complete</span></b>
                                                    @endif
                                                        <br>
                                                        <br>
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th class="border-gray-200" scope="col">Code</th>
                                                            <th class="border-gray-200" scope="col">Subject Name</th>
                                                            <th class="border-gray-200" scope="col">Teacher Name</th>
                                                            <th class="border-gray-200" scope="col">Time</th>
                                                            <th class="border-gray-200" scope="col"><center>First Quarter</center></th>
                                                            <th class="border-gray-200" scope="col"><center>Second Quarter</center></th>
                                                            <th class="border-gray-200" scope="col">Average</th>
                                                            <th class="border-gray-200" scope="col">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade12firstsem as $grade12first)
                                                                    <tr>
                                                                        <td>{{$grade12first -> subject -> subjectcode}}</td>
                                                                        <td>{{$grade12first -> subject -> subjectname}}</td>
                                                                        <td>{{$grade12first -> faculty -> last_name}}, {{$grade12first -> faculty -> first_name}} {{$grade12first -> faculty -> middle_name}} {{$grade12first -> faculty -> suffix}}</td>
                                                                        <td>{{$time_start= date('h:i A', strtotime($grade12first->time_start))}} - {{$time_end= date('h:i A', strtotime($grade12first->time_end))}}</td>
                                                                        <td><center>{{$grade12first -> midterm}}</center></td>
                                                                        <td><center>{{$grade12first -> finals}}</center></td>
                                                                        <td>
                                                                            @php
                                                                                $ave = ($grade12first->midterm + $grade12first->finals) / 2;
                                                                                switch ($grade12first -> finals && $grade12first -> midterm) {
                                                                                    case ($grade12first -> finals ==='NULL' || $grade12first -> midterm === 'NULL'):
                                                                                        if($grade12first -> finals === 0 && $grade12first -> midterm !== 0){
                                                                                            echo $ave = ($grade12first -> midterm + $grade12first -> finals) / 2;;
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade12first -> finals !== 0 && $grade12first -> midterm === 0){
                                                                                            echo $ave = ($grade12first -> midterm + $grade12first -> finals) / 2;;
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade12first -> finals === 0 && $grade12first -> midterm === 0){
                                                                                            echo $ave = ($grade12first -> midterm + $grade12first -> finals) / 2;;
                                                                                            break;
                                                                                        }
                                                                                        else{
                                                                                            echo '<span class="badge bg-danger" style="color: white;">Grades are not complete</span>';
                                                                                            break;
                                                                                        }
                                                                                    case ($grade12first -> finals !== 'NULL' && $grade12first -> midterm !== 'NULL'):
                                                                                        echo $ave;
                                                                                        break;
                                                                                    default:
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Unidentified</span>';
                                                                                    break;
                                                                                }
                                                                            @endphp
                                                                        </td>
                                                                        <td>
                                                                            @php 
                                                                                switch ($ave && $grade12first -> finals && $grade12first -> midterm) {
                                                                                    case ($grade12first -> finals === 'NULL' || $grade12first -> midterm === 'NULL'):
                                                                                        if($grade12first -> finals === 0 && $grade12first -> midterm !== 0){
                                                                                            echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade12first -> finals !== 0 && $grade12first -> midterm === 0){
                                                                                            echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade12first -> finals === 0 && $grade12first -> midterm === 0){
                                                                                            echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                            break;
                                                                                        }
                                                                                        else{
                                                                                            echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                                                            break;
                                                                                        }
                                                                                    case ($ave <= '74' && $grade12first -> finals !== 'NULL' && $grade12first -> midterm !== 'NULL'):
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                        break;
                                                                                    case ($ave <= '100' && $grade12first -> finals !== 'NULL' && $grade12first -> midterm !== 'NULL'):
                                                                                        echo '<span class="badge bg-success" style="color: white;">Passed</span>';
                                                                                        break;
                                                                                    default:
                                                                                        echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                                                    break;
                                                                                }
                                                                            @endphp
                                                                                    
                                                                        </td>
                                                                    </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <br>
                                @endif
                            </div>              
                        </div>
                    @endif

                    <!-- Check if Enrolled in any grade 11 subjects -->
                    @if($grade11->count() != 0)
                        <div class="card-header">
                            <div class="card-body p-0">

                            @if($grade11secondsem->count() != 0)
                                <br>
                                    <div class="table-responsive table-billing-history">
                                        <div class="mb-4">
                                            <div class="card">
                                                <div class="card-header titled" style="font-size: 18px;">
                                                    Grade 11 - Second Semester
                                                    <div class="pull-right">
                                                        <!-- print grades -->
                                                    </div>
                                                </div>
                                                <br>
                                                <table id="sample2" class="display nowrap table-bordered table-striped table-hover" style="width:100%">
                                                    <!-- /*check if there is an ungraded subject*/ -->

                                                    @if($grade11secondsemungraded->count() == 0)
                                                        @php
                                                            $initials = 0;
                                                            $initial = 0;
                                                            $ave = 0;
                                                        @endphp
                                                        @foreach($grade11secondsem  as $ave)
                                                            @if($ave->midterm != 'NULL' || $ave->finals !='NULL')
                                                                @php $initials = ($ave->midterm + $ave->finals) / 2; @endphp
                                                                @php $initial = $initials+$initial; @endphp
                                                            @endif
                                                        @endforeach
                                                        @if ($initial > 0)
                                                            @php $ave = $initial / $grade11secondsem ->count(); @endphp
                                                        @else
                                                            @php $ave = 0; @endphp
                                                        @endif
                                                        @if($ave>=75)
                                                            <b>General Weighted Average for the Semester: <span class="badge bg-success"  style="color: white;font-size: 16px;"> {{ $ave }} </span></b>
                                                        @else
                                                            <b>General Weighted Average for the Semester: <span class="badge bg-danger"  style="color: white;font-size: 16px;"> {{ $ave }}</span></b>
                                                        @endif
                                                    @else
                                                        <b>General Weighted Average for the Semester: <span class="badge bg-danger" style="color: white;">Grades are not complete</span></b>
                                                    @endif

                                                    <br>
                                                    <br>
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th class="border-gray-200" scope="col">Code</th>
                                                            <th class="border-gray-200" scope="col">Subject Name</th>
                                                            <th class="border-gray-200" scope="col">Teacher Name</th>
                                                            <th class="border-gray-200" scope="col">Time</th>
                                                            <th class="border-gray-200" scope="col">Third Quarter</th>
                                                            <th class="border-gray-200" scope="col">Fourth Quarter</th>
                                                            <th class="border-gray-200" scope="col">Average</th>
                                                            <th class="border-gray-200" scope="col">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade11secondsem as $grade11second)
                                                                <tr>
                                                                    <td>{{$grade11second -> subject -> subjectcode}}</td>
                                                                    <td>{{$grade11second -> subject -> subjectname}}</td>
                                                                    <td>{{$grade11second -> faculty -> last_name}}, {{$grade11second -> faculty -> second_name}} {{$grade11second -> faculty -> middle_name}} {{$grade11second -> faculty -> suffix}}</td>
                                                                    <td>{{$time_start= date('h:i A', strtotime($grade11second->time_start))}} - {{$time_end= date('h:i A', strtotime($grade11second->time_end))}}</td>
                                                                    <td>{{$grade11second -> midterm}}</td>
                                                                    <td>{{$grade11second -> finals}}</td>
                                                                    <td>
                                                                        @php
                                                                            $ave = ($grade11second->midterm + $grade11second->finals) / 2;
                                                                            switch ($grade11second -> finals && $grade11second -> midterm) {
                                                                                case ($grade11second -> finals ==='NULL' || $grade11second -> midterm === 'NULL'):
                                                                                    if($grade11second -> finals === 0 && $grade11second -> midterm !== 0){
                                                                                        echo $ave = ($grade11second -> midterm + $grade11second -> finals) / 2;;
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade11second -> finals !== 0 && $grade11second -> midterm === 0){
                                                                                        echo $ave = ($grade11second -> midterm + $grade11second -> finals) / 2;;
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade11second -> finals === 0 && $grade11second -> midterm === 0){
                                                                                        echo $ave = ($grade11second -> midterm + $grade11second -> finals) / 2;;
                                                                                        break;
                                                                                    }
                                                                                    else{
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Grades are not complete</span>';
                                                                                        break;
                                                                                    }
                                                                                case ($grade11second -> finals !== 'NULL' && $grade11second -> midterm !== 'NULL'):
                                                                                    echo $ave;
                                                                                    break;
                                                                                default:
                                                                                    echo '<span class="badge bg-danger">Unidentified</span>';
                                                                                break;
                                                                            }
                                                                        @endphp
                                                                    </td>
                                                                    <td>
                                                                        @php 
                                                                            switch ($ave && $grade11second -> finals && $grade11second -> midterm) {
                                                                                case ($grade11second -> finals === 'NULL' || $grade11second -> midterm === 'NULL'):
                                                                                    if($grade11second -> finals === 0 && $grade11second -> midterm !== 0){
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade11second -> finals !== 0 && $grade11second -> midterm === 0){
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade11second -> finals === 0 && $grade11second -> midterm === 0){
                                                                                        echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                        break;
                                                                                    }
                                                                                    else{
                                                                                        echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                                                        break;
                                                                                    }
                                                                                case ($ave <= '74' && $grade11second -> finals !== 'NULL' && $grade11second -> midterm !== 'NULL'):
                                                                                    echo '<span class="badge bg-danger">Failed</span>';
                                                                                    break;
                                                                                case ($ave <= '100' && $grade11second -> finals !== 'NULL' && $grade11second -> midterm !== 'NULL'):
                                                                                    echo '<span class="badge bg-success">Passed</span>';
                                                                                    break;
                                                                                default:
                                                                                    echo '<span class="badge bg-danger">No remarks</span>';
                                                                                break;
                                                                            }
                                                                        @endphp         
                                                                    </td>
                                                                </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif  

                                <!-- grade 11 - First Semester-->
                                @if($grade11firstsem->count() != 0)
                                    <br>
                                    <div class="table-responsive table-billing-history">
                                        <div class="mb-4">
                                            <div class="card">
                                                <div class="card-header titled" style="font-size: 18px;">
                                                    Grade 11 - First Semester
                                                </div>
                                                <br>
                                                <table id="sample1" class="display nowrap table-bordered table-striped table-hover" style="width:100%">
                                                    
                                                    @if($grade11firstsemungraded->count() == 0)
                                                        @php
                                                            $initials = 0;
                                                            $initial = 0;
                                                            $ave = 0;
                                                        @endphp
                                                        @foreach($grade11firstsem as $ave)
                                                            @if($ave->midterm != 'NULL' || $ave->finals !='NULL')
                                                                @php $initials = ($ave->midterm + $ave->finals) / 2; @endphp
                                                                @php $initial = $initials+$initial; @endphp
                                                            @endif
                                                        @endforeach
                                                        @if ($initial > 0)
                                                            @php $ave = $initial / $grade11firstsem->count(); @endphp
                                                        @else
                                                            @php $ave = 0; @endphp
                                                        @endif
                                                        @if($ave>=75)
                                                            <b>General Weighted Average for the Semester: <span class="badge bg-success"  style="color: white;font-size: 16px;"> {{ $ave }} </span></b>
                                                        @else
                                                            <b>General Weighted Average for the Semester: <span class="badge bg-danger"  style="color: white;font-size: 16px;"> {{ $ave }}</span></b>
                                                        @endif
                                                    @else
                                                        <b>General Weighted Average for the Semester: <span class="badge bg-danger" style="color: white;">Grades are not complete</span></b>
                                                    @endif

                                                    <br>
                                                    <br>
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th class="border-gray-200" scope="col">Code</th>
                                                            <th class="border-gray-200" scope="col">Subject Name</th>
                                                            <th class="border-gray-200" scope="col">Teacher Name</th>
                                                            <th class="border-gray-200" scope="col">Time</th>
                                                            <th class="border-gray-200" scope="col">First Quarter</th>
                                                            <th class="border-gray-200" scope="col">Second Quarter</th>
                                                            <th class="border-gray-200" scope="col">Average</th>
                                                            <th class="border-gray-200" scope="col">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade11firstsem as $grade11first)
                                                                    <tr>
                                                                        <td>{{$grade11first -> subject -> subjectcode}}</td>
                                                                        <td>{{$grade11first -> subject -> subjectname}}</td>
                                                                        <td>{{$grade11first -> faculty -> last_name}}, {{$grade11first -> faculty -> first_name}} {{$grade11first -> faculty -> middle_name}} {{$grade11first -> faculty -> suffix}}</td>
                                                                        <td>{{$time_start= date('h:i A', strtotime($grade11first->time_start))}} - {{$time_end= date('h:i A', strtotime($grade11first->time_end))}}</td>
                                                                        <td>{{$grade11first -> midterm}}</td>
                                                                        <td>{{$grade11first -> finals}}</td>
                                                                        <td>
                                                                            @php
                                                                                $ave = ($grade11first->midterm + $grade11first->finals) / 2;
                                                                                switch ($grade11first -> finals && $grade11first -> midterm) {
                                                                                    case ($grade11first -> finals ==='NULL' || $grade11first -> midterm === 'NULL'):
                                                                                        if($grade11first -> finals === 0 && $grade11first -> midterm !== 0){
                                                                                            echo $ave = ($grade11first -> midterm + $grade11first -> finals) / 2;;
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade11first -> finals !== 0 && $grade11first -> midterm === 0){
                                                                                            echo $ave = ($grade11first -> midterm + $grade11first -> finals) / 2;;
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade11first -> finals === 0 && $grade11first -> midterm === 0){
                                                                                            echo $ave = ($grade11first -> midterm + $grade11first -> finals) / 2;;
                                                                                            break;
                                                                                        }
                                                                                        else{
                                                                                            echo '<span class="badge bg-danger" style="color: white;">Grades are not complete</span>';
                                                                                            break;
                                                                                        }
                                                                                    case ($grade11first -> finals !== 'NULL' && $grade11first -> midterm !== 'NULL'):
                                                                                        echo $ave;
                                                                                        break;
                                                                                    default:
                                                                                        echo '<span class="badge bg-danger">Unidentified</span>';
                                                                                    break;
                                                                                }
                                                                            @endphp
                                                                        </td>
                                                                        <td>
                                                                            @php 
                                                                                switch ($ave && $grade11first -> finals && $grade11first -> midterm) {
                                                                                    case ($grade11first -> finals === 'NULL' || $grade11first -> midterm === 'NULL'):
                                                                                        if($grade11first -> finals === 0 && $grade11first -> midterm !== 0){
                                                                                            echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade11first -> finals !== 0 && $grade11first -> midterm === 0){
                                                                                            echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade11first -> finals === 0 && $grade11first -> midterm === 0){
                                                                                            echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                                            break;
                                                                                        }
                                                                                        else{
                                                                                            echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                                                            break;
                                                                                        }
                                                                                    case ($ave <= '74' && $grade11first -> finals !== 'NULL' && $grade11first -> midterm !== 'NULL'):
                                                                                        echo '<span class="badge bg-danger">Failed</span>';
                                                                                        break;
                                                                                    case ($ave <= '100' && $grade11first -> finals !== 'NULL' && $grade11first -> midterm !== 'NULL'):
                                                                                        echo '<span class="badge bg-success">Passed</span>';
                                                                                        break;
                                                                                    default:
                                                                                        echo '<span class="badge bg-danger">No remarks</span>';
                                                                                    break;
                                                                                }
                                                                            @endphp
                                                                                    
                                                                        </td>
                                                                    </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div> 
                                        </div>
                                    </div>
                                <br>
                                @endif  
                            </div>
                        </div>
                    @endif

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

    <script>
        document.addEventListener("DOMContentLoaded", function(){
          document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
            
            element.addEventListener('click', function (e) {

              let nextEl = element.nextElementSibling;
              let parentEl  = element.parentElement;    

                if(nextEl) {
                    e.preventDefault(); 
                    let mycollapse = new bootstrap.Collapse(nextEl);
                    
                    if(nextEl.classList.contains('show')){
                      mycollapse.hide();
                    } else {
                        mycollapse.show();
                        // find other submenus with class=show
                        var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                        // if it exists, then close all of them
                        if(opened_submenu){
                          new bootstrap.Collapse(opened_submenu);
                        }
                    }
                }
            }); // addEventListener
          }) // forEach
        }); 
    </script>
</main>
<br><br><br><br>