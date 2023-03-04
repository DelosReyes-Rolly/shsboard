
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
    text-align: center;
    font-weight: bold;
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
        <?php date_default_timezone_set('Asia/Manila'); ?>
        <div style="float:right;"> Printed Date: <?php echo date('F d, Y'); ?></div>
        <br><br>
          
              <div class="text-center" style="font-size: 110%; text-align:center;">
              <div class="svnhs-logo">
                <img src="{{public_path('/img/svnhs-logo.png')}}" style="width: 100px; height: 100px;">
            </div>
            <div class="seniorhigh-logo">
                <img src="{{public_path('/img/shs.png')}}" style="width: 100px; height: 100px;">
            </div>
                <b>SIGNAL VILLAGE NATIONAL HIGH SCHOOL<br/>
                SENIOR HIGH SCHOOL</b><br/>
                Ballercer St., Central Signal Village, Taguig City<br/>
                <br/>
                <div style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 28px;"><b>RECORD OF GRADES</b><br/></div>
              </div>
              <hr style="border: 2px solid black; border-radius: 2px;">
              <div style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-weight:600; font-size: 20px;">
                <b>{{Auth::user()->LRN}}</b><br/>
                <b>{{Auth::user()->last_name}}, {{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->suffix}}</b>
              </div>
              @if($printreportcard->count() == 0)
                <br><br>
                <div class="alert alert-danger"><center><em>Sorry. You're not currently enrolled in any subjects. Please contact the administrator.</em></center></div>
              @else 
                <!-- Check if Enrolled in any grade 12 subjects -->
                @if($grade12->count() != 0)
                        

                                <!-- Grade 12 Second Semester -->   
                                @if($grade12secondsem->count() != 0)
                                <br><br>
                                                <div class="" style="font-size: 18px;">
                                                    Grade 12 - Second Semester
                                                </div>
                                                <table id="sample4" class="display table-bordered table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th width = 40%>Subject Name</th>
                                                            <th width = 15%>Third Quarter</th>
                                                            <th width = 18%>Fourth Quarter</th>
                                                            <th width = 13%>Average</th>
                                                            <th width = 14%>Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade12secondsem as $grade12second)
                                                                <tr>
                                                                    <td>{{$grade12second -> subject -> subjectname}}</td>
                                                                    <td class="text-center">{{$grade12second -> midterm}}</td>
                                                                    <td class="text-center">{{$grade12second -> finals}}</td>
                                                                    <td class="text-center">
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
                                                                                        echo 'Grades are not complete';
                                                                                        break;
                                                                                    }
                                                                                case ($grade12second -> finals !== 'NULL' && $grade12second -> midterm !== 'NULL'):
                                                                                    echo $ave;
                                                                                    break;
                                                                                default:
                                                                                    echo 'Unidentified';
                                                                                break;
                                                                            }
                                                                        @endphp
                                                                    </td>
                                                                    <td class="text-center">
                                                                        @php 
                                                                            switch ($ave && $grade12second -> finals && $grade12second -> midterm) {
                                                                                case ($grade12second -> finals === 'NULL' || $grade12second -> midterm === 'NULL'):
                                                                                    if($grade12second -> finals === 0 && $grade12second -> midterm !== 0){
                                                                                        echo 'Failed';
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade12second -> finals !== 0 && $grade12second -> midterm === 0){
                                                                                        echo 'Failed';
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade12second -> finals === 0 && $grade12second -> midterm === 0){
                                                                                        echo 'Failed';
                                                                                        break;
                                                                                    }
                                                                                    else{
                                                                                        echo 'No remarks';
                                                                                        break;
                                                                                    }
                                                                                case ($ave <= '74' && $grade12second -> finals !== 'NULL' && $grade12second -> midterm !== 'NULL'):
                                                                                    echo 'Failed';
                                                                                    break;
                                                                                case ($ave <= '100' && $grade12second -> finals !== 'NULL' && $grade12second -> midterm !== 'NULL'):
                                                                                    echo 'Passed';
                                                                                    break;
                                                                                default:
                                                                                    echo 'No remarks';
                                                                                break;
                                                                            }
                                                                        @endphp         
                                                                    </td>
                                                                </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
                                                            <b>General Weighted Average for the Semester: {{ $ave }} </b>
                                                        @else
                                                            <b>General Weighted Average for the Semester: {{ $ave }}</b>
                                                        @endif
                                                    @else
                                                        <b>General Weighted Average for the Semester: Grades are not complete</b>
                                                    @endif
                                            
                                        
                                @endif

                                <!-- GRADE 12 First Semester-->
                                @if($grade12firstsem->count() != 0)
                                <br><br>
                                                <div class="" style="font-size: 18px;">
                                                    Grade 12 - First Semester
                                                </div>
                                                <table id="sample3" class="display table-bordered table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th width = 40%>Subject Name</th>
                                                            <th width = 15%>First Quarter</th>
                                                            <th width = 18%>Second Quarter</th>
                                                            <th width = 13%>Average</th>
                                                            <th width = 14%>Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade12firstsem as $grade12first)
                                                                    <tr>
                                                                        <td>{{$grade12first -> subject -> subjectname}}</td>
                                                                        <td class="text-center">{{$grade12first -> midterm}}</td>
                                                                        <td class="text-center">{{$grade12first -> finals}}</td>
                                                                        <td class="text-center">
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
                                                                                            echo 'Grades are not complete';
                                                                                            break;
                                                                                        }
                                                                                    case ($grade12first -> finals !== 'NULL' && $grade12first -> midterm !== 'NULL'):
                                                                                        echo $ave;
                                                                                        break;
                                                                                    default:
                                                                                        echo 'Unidentified';
                                                                                    break;
                                                                                }
                                                                            @endphp
                                                                        </td>
                                                                        <td class="text-center">
                                                                            @php 
                                                                                switch ($ave && $grade12first -> finals && $grade12first -> midterm) {
                                                                                    case ($grade12first -> finals === 'NULL' || $grade12first -> midterm === 'NULL'):
                                                                                        if($grade12first -> finals === 0 && $grade12first -> midterm !== 0){
                                                                                            echo 'Failed';
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade12first -> finals !== 0 && $grade12first -> midterm === 0){
                                                                                            echo 'Failed';
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade12first -> finals === 0 && $grade12first -> midterm === 0){
                                                                                            echo 'Failed';
                                                                                            break;
                                                                                        }
                                                                                        else{
                                                                                            echo 'No remarks';
                                                                                            break;
                                                                                        }
                                                                                    case ($ave <= '74' && $grade12first -> finals !== 'NULL' && $grade12first -> midterm !== 'NULL'):
                                                                                        echo 'Failed';
                                                                                        break;
                                                                                    case ($ave <= '100' && $grade12first -> finals !== 'NULL' && $grade12first -> midterm !== 'NULL'):
                                                                                        echo 'Passed';
                                                                                        break;
                                                                                    default:
                                                                                        echo 'No remarks';
                                                                                    break;
                                                                                }
                                                                            @endphp
                                                                                    
                                                                        </td>
                                                                    </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
                                                            <b>General Weighted Average for the Semester: {{ $ave }} </b>
                                                        @else
                                                            <b>General Weighted Average for the Semester: {{ $ave }}</b>
                                                        @endif
                                                    @else
                                                        <b>General Weighted Average for the Semester: Grades are not complete</b>
                                                    @endif
                                            
                                    
                                @endif
                            
                    @endif

                    <!-- Check if Enrolled in any grade 11 subjects -->
                    @if($grade11->count() != 0)
                        

                            @if($grade11secondsem->count() != 0)
                                   
                                        
                                                <br><br>
                                                <div class="" style="font-size: 18px;">
                                                    Grade 11 - Second Semester
                                                </div>
                                                <table id="sample2" class="display table-bordered table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th width = 40%>Subject Name</th>
                                                            <th width = 15%>Third Quarter</th>
                                                            <th width = 18%>Fourth Quarter</th>
                                                            <th width = 13%>Average</th>
                                                            <th width = 14%>Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade11secondsem as $grade11second)
                                                                <tr>
                                                                    <td>{{$grade11second -> subject -> subjectname}}</td>
                                                                    <td class="text-center">{{$grade11second -> midterm}}</td>
                                                                    <td class="text-center">{{$grade11second -> finals}}</td>
                                                                    <td class="text-center">
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
                                                                                        echo 'Grades are not complete';
                                                                                        break;
                                                                                    }
                                                                                case ($grade11second -> finals !== 'NULL' && $grade11second -> midterm !== 'NULL'):
                                                                                    echo $ave;
                                                                                    break;
                                                                                default:
                                                                                    echo 'Unidentified';
                                                                                break;
                                                                            }
                                                                        @endphp
                                                                    </td>
                                                                    <td class="text-center">
                                                                        @php 
                                                                            switch ($ave && $grade11second -> finals && $grade11second -> midterm) {
                                                                                case ($grade11second -> finals === 'NULL' || $grade11second -> midterm === 'NULL'):
                                                                                    if($grade11second -> finals === 0 && $grade11second -> midterm !== 0){
                                                                                        echo 'Failed';
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade11second -> finals !== 0 && $grade11second -> midterm === 0){
                                                                                        echo 'Failed';
                                                                                        break;
                                                                                    }
                                                                                    elseif($grade11second -> finals === 0 && $grade11second -> midterm === 0){
                                                                                        echo 'Failed';
                                                                                        break;
                                                                                    }
                                                                                    else{
                                                                                        echo 'No remarks';
                                                                                        break;
                                                                                    }
                                                                                case ($ave <= '74' && $grade11second -> finals !== 'NULL' && $grade11second -> midterm !== 'NULL'):
                                                                                    echo 'Failed';
                                                                                    break;
                                                                                case ($ave <= '100' && $grade11second -> finals !== 'NULL' && $grade11second -> midterm !== 'NULL'):
                                                                                    echo 'Passed';
                                                                                    break;
                                                                                default:
                                                                                    echo 'No remarks';
                                                                                break;
                                                                            }
                                                                        @endphp         
                                                                    </td>
                                                                </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
                                                            <b>Semester's General Weighted Average: {{ $ave }} </b>
                                                        @else
                                                            <b>Semester's General Weighted Average: {{ $ave }}</b>
                                                        @endif
                                                    @else
                                                        <b>Semester's General Weighted Average: Grades are not complete</b>
                                                    @endif
                                       
                                    
                                @endif  

                                <!-- grade 11 - First Semester-->
                                @if($grade11firstsem->count() != 0)

                                    
                                                <br><br>
                                                <div class="" style="font-size: 18px;">
                                                    Grade 11 - First Semester
                                                </div>
                                                <table id="sample1" class="display table-bordered table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th width = 40%>Subject Name</th>
                                                            <th width = 15%>First Quarter</th>
                                                            <th width = 18%>Second Quarter</th>
                                                            <th width = 13%>Average</th>
                                                            <th width = 14%>Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade11firstsem as $grade11first)
                                                                    <tr>
                                                                        <td>{{$grade11first -> subject -> subjectname}}</td>
                                                                        <td class="text-center">{{$grade11first -> midterm}}</td>
                                                                        <td class="text-center">{{$grade11first -> finals}}</td>
                                                                        <td class="text-center">
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
                                                                                            echo 'Grades are not complete';
                                                                                            break;
                                                                                        }
                                                                                    case ($grade11first -> finals !== 'NULL' && $grade11first -> midterm !== 'NULL'):
                                                                                        echo $ave;
                                                                                        break;
                                                                                    default:
                                                                                        echo 'Unidentified';
                                                                                    break;
                                                                                }
                                                                            @endphp
                                                                        </td>
                                                                        <td class="text-center">
                                                                            @php 
                                                                                switch ($ave && $grade11first -> finals && $grade11first -> midterm) {
                                                                                    case ($grade11first -> finals === 'NULL' || $grade11first -> midterm === 'NULL'):
                                                                                        if($grade11first -> finals === 0 && $grade11first -> midterm !== 0){
                                                                                            echo 'Failed';
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade11first -> finals !== 0 && $grade11first -> midterm === 0){
                                                                                            echo 'Failed';
                                                                                            break;
                                                                                        }
                                                                                        elseif($grade11first -> finals === 0 && $grade11first -> midterm === 0){
                                                                                            echo 'Failed';
                                                                                            break;
                                                                                        }
                                                                                        else{
                                                                                            echo 'No remarks';
                                                                                            break;
                                                                                        }
                                                                                    case ($ave <= '74' && $grade11first -> finals !== 'NULL' && $grade11first -> midterm !== 'NULL'):
                                                                                        echo 'Failed';
                                                                                        break;
                                                                                    case ($ave <= '100' && $grade11first -> finals !== 'NULL' && $grade11first -> midterm !== 'NULL'):
                                                                                        echo 'Passed';
                                                                                        break;
                                                                                    default:
                                                                                        echo 'No remarks';
                                                                                    break;
                                                                                }
                                                                            @endphp
                                                                                    
                                                                        </td>
                                                                    </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
                                                            <b>Semester's General Weighted Average: {{ $ave }} </b>
                                                        @else
                                                            <b>Semester's General Weighted Average: {{ $ave }}</b>
                                                        @endif
                                                    @else
                                                        <b>Semester's General Weighted Average: Grades are not complete</b>
                                                    @endif
                                @endif  
                            
                    @endif
              @endif
          </div>
   
</body>
</html>