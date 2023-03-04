
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
<title>Grades Report</title>
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
                <img src="{{public_path('/img/svnhs-logo.png')}}" style="width: 100px; height: 100px;">
            </div>
            <div class="seniorhigh-logo">
                <img src="{{public_path('/img/shs.png')}}" style="width: 100px; height: 100px;">
            </div>
              <b>SIGNAL VILLAGE NATIONAL HIGH SCHOOL<br/>
              SENIOR HIGH SCHOOL</b><br/>
              Ballercer St., Central Signal Village, Taguig City<br/>
              <br/><br/>
              <b>STUDENT GRADES REPORT</b><br/>
            </div>
            <br/><br/>
            <b>Date Created: </b>{{date("F  d, Y");}}<br/>
            <b>Subject Teacher: </b>{{$sem->faculty->last_name}}, {{$sem->faculty->first_name}} {{$sem->faculty->middle_name}} {{$sem->faculty->suffix}}<br/>
            <b>Subject: </b>{{$sem->subject->subjectname}}<br/><br/>
            @if($studentgrades->count() == 0)
              <br><br>
              <div class="alert alert-danger"><em>No records found.</em></div>
            @else 
              <table class="table table-bordered print">
                <thead>
                  <tr>
                    <th>LRN</th>
                    <th>STUDENT NAME</th>
                    @if($sem->semester_id == 1)
                      <th>1ST GRADING</th>
                      <th>2ND GRADING</th>
                    @elseif($sem->semester_id ==2)
                      <th>3RD GRADING</th>
                      <th>4RT GRADING</th>
                    @endif
                    <th>AVERAGE</th>
                    <th>REMARKS</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($studentgrades as $grade)
                        <tr style="text-align:left;">
                          {{$average = ($grade->midterm + $grade->finals)/2 }}
                          <td>{{$grade -> student -> LRN}}</td>
                          <td>{{$grade -> student -> last_name}}, {{$grade -> student -> first_name}} {{$grade -> student -> middle_name}} {{$grade -> student -> suffix}}</td>
                          <td>{{$grade -> midterm}}</td>
                          <td>{{$grade -> finals}}</td>
                          @if($grade->midterm != null && $grade->finals != null)
                            <td>{{$average}}</td>
                          @else
                            <td> </td>
                          @endif
                          @if($grade->midterm != null && $grade->finals != null)
                            @if($average > 74)
                              <td>Passed</td>
                            @elseif($average < 75)
                              <td>Failed</td>
                            @endif
                          @else
                            <td> </td>
                          @endif
                        </tr>
                      @endforeach
                  </tbody>
              </table>
            @endif
          
        </div>

</body>
</html>