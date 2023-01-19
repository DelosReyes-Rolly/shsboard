
<!DOCTYPE html>
<html>

<style>

  /* .svnhs-logo{
    position: fixed;
    padding-left: 68px; 
    top:26;
  }
  .seniorhigh-logo{
    position: fixed;
    right: 46px;  
    top:28;
  } */
  thead{
    color: Black;
    background-color: #e5c841 !important;
    font-weight: bold;
  }

  table, td, th {
  border: 1px solid !important;
}

table {
  width: 100%;
  border-collapse: collapse !important;
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
        

                <div class="text-center"><b>REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</b></div>
              @if($printreportcard->count() == 0)
                <div class="alert alert-danger"><center><em>Sorry. You're not currently enrolled in any subjects. Please contact the administrator.</em></center></div>
              @else 
                    <!-- Check if Enrolled in any grade 11 subjects -->
                    @if($grade12->count() != 0)
                                <!-- GRADE 12 First Semester-->
                                @if($grade12firstsem->count() != 0)
                                    <div class="table-responsive table-billing-history">
                                        <div style="font-size: 20px; font-weight:800; font-family: 'Times New Roman', Times, serif;">
                                            First Semester
                                         </div>
                                                <table id="sample1" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" rowspan="2" width="16%" class="text-center"></th>
                                                            <th scope="col" rowspan="2" width="38%" class="text-center">SUBJECTS</th>
                                                            <th scope="col" colspan="2" width="18%" class="text-center">QUARTER</th>
                                                            <th scope="col" rowspan="2" width="14%" class="text-center">FINAL GRADE</th>
                                                            <th scope="col" rowspan="2" width="14%" class="text-center">Remarks</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="text-center">1</th>
                                                            <th scope="col" class="text-center">2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade12firstsem as $grade12first)
                                                                    <tr>
                                                                        <td class="text-center">SPECIALIZED</td>
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
                                                                                            echo '';
                                                                                            break;
                                                                                        }
                                                                                    case ($grade12first -> finals !== 'NULL' && $grade12first -> midterm !== 'NULL'):
                                                                                        echo $ave;
                                                                                        break;
                                                                                    default:
                                                                                        echo '';
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
                                                                                            echo '';
                                                                                            break;
                                                                                        }
                                                                                    case ($ave <= '74' && $grade12first -> finals !== 'NULL' && $grade12first -> midterm !== 'NULL'):
                                                                                        echo 'Failed';
                                                                                        break;
                                                                                    case ($ave <= '100' && $grade12first -> finals !== 'NULL' && $grade12first -> midterm !== 'NULL'):
                                                                                        echo 'Passed';
                                                                                        break;
                                                                                    default:
                                                                                        echo '';
                                                                                    break;
                                                                                }
                                                                            @endphp
                                                                                    
                                                                        </td>
                                                                    </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div style="background-color: #e5c841;">
                                                    <table
                                                        <thead>
                                                            <tr>
                                                                <th width="72%" style="text-align:right;">General Average for the Semester&nbsp;</th>
                                                                <th width="14%" class="text-center">
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
                                                                            <b>{{ $ave }}</b>
                                                                        @else
                                                                            <b>{{ $ave }}</b>
                                                                        @endif
                                                                    @else
                                                                        <b></b>
                                                                    @endif
                                                                </th>
                                                                <th width="14%"></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            
                                        </div>
                                    </div>
                                <br>
                                @endif
                                <!-- Grade 12 Second Semester -->   
                                @if($grade12secondsem->count() != 0)
                                <br>
                                    <div class="table-responsive table-billing-history">
                                            <div style="font-size: 20px; font-weight:800; font-family: 'Times New Roman', Times, serif;">
                                                Second Semester
                                            </div>
                                                <table id="sample2" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" rowspan="2" width="16%" class="text-center"></th>
                                                            <th scope="col" rowspan="2" width="38%" class="text-center">SUBJECTS</th>
                                                            <th scope="col" colspan="2" width="18%" class="text-center">QUARTER</th>
                                                            <th scope="col" rowspan="2" width="14%" class="text-center">FINAL GRADE</th>
                                                            <th scope="col" rowspan="2" width="14%" class="text-center">Remarks</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="text-center">3</th>
                                                            <th scope="col" class="text-center">4</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($grade12secondsem as $grade12second)
                                                                <tr>
                                                                    <td class="text-center">SPECIALIZED</td>
                                                                    <td class="text-center">{{$grade12second -> subject -> subjectname}}</td>
                                                                    <td>{{$grade12second -> midterm}}</td>
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
                                                                                        echo '';
                                                                                        break;
                                                                                    }
                                                                                case ($grade12second -> finals !== 'NULL' && $grade12second -> midterm !== 'NULL'):
                                                                                    echo $ave;
                                                                                    break;
                                                                                default:
                                                                                    echo '';
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
                                                                                        echo '';
                                                                                        break;
                                                                                    }
                                                                                case ($ave <= '74' && $grade12second -> finals !== 'NULL' && $grade12second -> midterm !== 'NULL'):
                                                                                    echo 'Failed';
                                                                                    break;
                                                                                case ($ave <= '100' && $grade12second -> finals !== 'NULL' && $grade12second -> midterm !== 'NULL'):
                                                                                    echo 'Passed';
                                                                                    break;
                                                                                default:
                                                                                    echo '';
                                                                                break;
                                                                            }
                                                                        @endphp         
                                                                    </td>
                                                                </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div style="background-color: #e5c841;">
                                                    <table
                                                        <thead>
                                                            <tr>
                                                                <th width="72%" style="text-align:right;">General Average for the Semester&nbsp;</th>
                                                                <th width="14%" class="text-center">
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
                                                                            <b>{{ $ave }}</b>
                                                                        @else
                                                                            <b>{{ $ave }}</b>
                                                                        @endif
                                                                    @else
                                                                        <b></b>
                                                                    @endif
                                                                    </th>
                                                                <th width="14%"></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                    </div>
                                                                
                                            
                                        
                                @else
                                <div class="table-responsive table-billing-history">
                                        
                                            <div style="font-size: 20px; font-weight:800; font-family: 'Times New Roman', Times, serif;">
                                                Second Semester
                                            </div>
                                                <table id="sample1" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" rowspan="2" width="16%" class="text-center"></th>
                                                            <th scope="col" rowspan="2" width="38%" class="text-center">SUBJECTS</th>
                                                            <th scope="col" colspan="2" width="18%" class="text-center">QUARTER</th>
                                                            <th scope="col" rowspan="2" width="14%" class="text-center">FINAL GRADE</th>
                                                            <th scope="col" rowspan="2" width="14%" class="text-center">Remarks</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col" class="text-center">3</th>
                                                            <th scope="col" class="text-center">4</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for($q=1; $q<10; $q++)
                                                            <tr>
                                                                <td style="padding: 10px;" class="text-center"></td>
                                                                <td style="padding: 10px;" class="text-center"></td>
                                                                <td style="padding: 10px;" class="text-center"></td>
                                                                <td style="padding: 10px;" class="text-center"></td>
                                                                <td style="padding: 10px;" class="text-center"></td>
                                                                <td style="padding: 10px;" class="text-center"></td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                                <div style="background-color: #e5c841;">
                                                    <table
                                                        <thead>
                                                            <tr>
                                                                <th width="72%" style="text-align:right;">General Average for the Semester&nbsp;</th>
                                                                <th width="14%" class="text-center"></th>
                                                                <th width="14%"></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            
                                        
                                    </div>
                                @endif  
                                <span style="font-weight:bold; font-family:cursive; font-size:20px; padding-right:330px;">General Average for the School Year</span>
                                <span class="text-center"> _ </span>
                                <br/><br/>
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <table class="text-center">
                                            <tr>
                                                <td rowspan="6" width="20%"><b>HOMEROOM GUIDANCE</b></td>
                                                <td width="60%"><b>FIRST SEMESTER</b></td>
                                                <td width="10%"><b>Remarks</b></td>
                                            </tr>
                                            <tr>
                                                <td width="60%">1st Quarter</td>
                                                <td width="10%">SD</td>
                                            </tr>
                                            <tr>
                                                <td width="60%">2nd Quarter</td>
                                                <td width="10%"></td>
                                            </tr>
                                            <tr>
                                                <td width="60%"><b>SECOND SEMESTER</b></td>
                                                <td width="10%"><b>Remarks</b></td>
                                            </tr>
                                            <tr>
                                                <td width="60%">3rd Quarter</td>
                                                <td width="10%"></td>
                                            </tr>
                                            <tr>
                                                <td width="60%">4th Quarter</td>
                                                <td width="10%"></td>
                                            </tr>
                                        </table>
                                    </div><br/>
                                    <div class="col-sm-5">
                                        <table>
                                            <tr>
                                                <th class="text-center"><b>Marking</b></th>
                                                <th><b>Description</b></th>
                                            </tr>
                                            <tr>
                                                <td class="text-center">NO</td>
                                                <td>No chance to Observe</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">NI</td>
                                                <td>Needs Improvement</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">D</td>
                                                <td>Developing</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">SD</td>
                                                <td>Sufficiently Developed</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">DC</td>
                                                <td>Developed and Commendable</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div> -->
                    @endif
              @endif
         
   
</body>
</html>