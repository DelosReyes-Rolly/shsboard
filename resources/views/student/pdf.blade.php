
<!DOCTYPE html>
<html>

<style>

  .svnhs-logo{
    position: fixed;
    padding-left: 68px; 
    top:26;
  }
  .seniorhigh-logo{
    position: fixed;
    right: 46px;  
    top:28;
  }
  thead{
    color: white;
    background-color: #086404 !important;
    text-align: center;
    font-weight: bold;
  }

    thead {
      background-image: url('green.png') !important;
      -webkit-print-color-adjust: exact; 
    }

    thead{
      background-image: url('green.png') !important;
      color: white !important;
    }

    .page-break {
      page-break-after: always;
    }

</style>


<head>
  <title>Grades</title>
  <!-- <link rel="stylesheet" href="{{ asset('.\assets\css\bootstrap.min.css') }}"/> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="{{ asset('.\assets\js\jquery-3.3.1.min.js') }}"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
</head>
<body>
   
          <script type="text/php">
              if (isset($pdf)) {
                  $x = 460;
                  $y = 40;
                  $text = "Page: {PAGE_NUM} of {PAGE_COUNT}";
                  $font = null;
                  $size = 10;
                  $color = array(0,0,0);
                  $word_space = 0.0;  //  default
                  $char_space = 0.0;  //  default
                  $angle = 0.0;   //  default
                  $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
              }
          </script>
        
          <div class="row">
              <br/><br/>
              <div class="text-center" style="font-size: 110%; text-align:center;">
                <div class="svnhs-logo">
                  <img src="{{ public_path('img/svnhs-logo.png') }}" style="width: 100px; height: 100px;">
              </div>
              <div class="seniorhigh-logo">
                  <img src="{{ public_path('img/shs.png') }}" style="width: 100px; height: 100px;">
              </div>
                <b>SIGNAL VILLAGE NATIONAL HIGH SCHOOL<br/>
                SENIOR HIGH SCHOOL</b><br/>
                Ballercer St., Central Signal Village, Taguig City<br/>
                <br/><br/>
                <b>STUDENT GRADES</b><br/>
              </div>
              <br/><br/>
              <b>Name: {{Auth::user()->last_name}}, {{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->suffix}}</b><br/><br/>
              @if($printreportcard->count() == 0)
                <div class="alert alert-danger"><center><em>Sorry. You're not currently enrolled in any subjects. Please contact the administrator.</em></center></div>
              @else 
                <!-- Check if Enrolled in any grade 12 subjects -->
                @if($grade12->count() != 0)
                        

                                <!-- Grade 12 Second Semester -->   
                                @if($grade12secondsem->count() != 0)
                                <br>
                                    <div class="table-responsive table-billing-history">
                                        <div class="mb-4">
                                            
                                                <div class="card-header titled" style="font-size: 18px;">
                                                    Grade 12 - Second Semester
                                                    <div class="pull-right">
                                                        <!-- print -->
                                                    </div>
                                                </div>
                                                <br>
                                                <table id="sample4" class="display table-bordered table-striped table-hover" style="width:100%">

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
                                                    <thead>
                                                        <tr>
                                                            <th class="border-gray-200" scope="col">Subject Name</th>
                                                            <th class="border-gray-200" scope="col"><center>Third Quarter</center></th>
                                                            <th class="border-gray-200" scope="col"><center>Fourth Quarter</center></th>
                                                            <th class="border-gray-200" scope="col">Average</th>
                                                            <th class="border-gray-200" scope="col">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade12secondsem as $grade12second)
                                                                <tr>
                                                                    <td>{{$grade12second -> subject -> subjectname}}</td>
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
                                @endif

                                <!-- GRADE 12 First Semester-->
                                @if($grade12firstsem->count() != 0)
                                    <br>
                                    <div class="table-responsive table-billing-history">
                                        <div class="mb-4">
                                            
                                                <div class="card-header titled" style="font-size: 18px;">
                                                    Grade 12 - First Semester
                                                   
                                                </div>
                                                <br>
                                                <table id="sample3" class="display table-bordered table-striped table-hover" style="width:100%">

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
                                                    <thead>
                                                        <tr>
                                                            <th class="border-gray-200" scope="col">Subject Name</th>
                                                            <th class="border-gray-200" scope="col"><center>First Quarter</center></th>
                                                            <th class="border-gray-200" scope="col"><center>Second Quarter</center></th>
                                                            <th class="border-gray-200" scope="col">Average</th>
                                                            <th class="border-gray-200" scope="col">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade12firstsem as $grade12first)
                                                                    <tr>
                                                                        <td>{{$grade12first -> subject -> subjectname}}</td>
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
                                <br>
                                @endif
                            
                    @endif

                    <!-- Check if Enrolled in any grade 11 subjects -->
                    @if($grade11->count() != 0)
                        

                            @if($grade11secondsem->count() != 0)
                                <br>
                                    <div class="table-responsive table-billing-history">
                                        <div class="mb-4">
                                            
                                                <div class="card-header titled" style="font-size: 18px;">
                                                    Grade 11 - Second Semester
                                                    <div class="pull-right">
                                                        <!-- print grades -->
                                                    </div>
                                                </div>
                                                <br>
                                                <table id="sample2" class="display table-bordered table-striped table-hover" style="width:100%">
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
                                                    <thead>
                                                        <tr>
                                                            <th class="border-gray-200" scope="col">Subject Name</th>
                                                            <th class="border-gray-200" scope="col">Third Quarter</th>
                                                            <th class="border-gray-200" scope="col">Fourth Quarter</th>
                                                            <th class="border-gray-200" scope="col">Average</th>
                                                            <th class="border-gray-200" scope="col">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade11secondsem as $grade11second)
                                                                <tr>
                                                                    <td>{{$grade11second -> subject -> subjectname}}</td>
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
                                @endif  

                                <!-- grade 11 - First Semester-->
                                @if($grade11firstsem->count() != 0)
                                    <br>
                                    <div class="table-responsive table-billing-history">
                                        <div class="mb-4">
                                            
                                                <div class="card-header titled" style="font-size: 18px;">
                                                    Grade 11 - First Semester
                                                </div>
                                                <br>
                                                <table id="sample1" class="display table-bordered table-striped table-hover" style="width:100%">
                                                    
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
                                                    <thead>
                                                        <tr>
                                                            <th class="border-gray-200" scope="col">Subject Name</th>
                                                            <th class="border-gray-200" scope="col">First Quarter</th>
                                                            <th class="border-gray-200" scope="col">Second Quarter</th>
                                                            <th class="border-gray-200" scope="col">Average</th>
                                                            <th class="border-gray-200" scope="col">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade11firstsem as $grade11first)
                                                                    <tr>
                                                                        <td>{{$grade11first -> subject -> subjectname}}</td>
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
                                <br>
                                @endif  
                            
                    @endif
              @endif
          </div>
   
</body>
</html>