
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
  <title>Document Requests Report</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
              <b>DOCUMENT REQUEST REPORT</b><br/>
                FROM {{$from = date('F d, Y', strtotime($from))}} TO {{$to = date('F d, Y', strtotime($to))}}
            </div>
            <br/><br/>
            <b>Date Created: {{date("F  d, Y");}}</b><br/><br/>
            <table class="table table-bordered print">
              <thead>
                <tr>
                  <th>STUDENT NAME</th>
                  <th>DOCUMENT TYPE</th>
                  <th>REQUEST DATE</th>
                </tr>
              </thead>
                <tbody>
                  @foreach ($users as $user)
                      {{$requestdate = date('m-d-Y', strtotime($user -> created_at))}}
                      <tr style="text-align:center;">
                        <td>{{$user -> student -> last_name}}, {{$user -> student -> first_name}} {{$user -> student -> middle_name}} {{$user -> student -> suffix}}</td>
                        <td>{{$user -> document -> name}}</td>
                        <td>{{$requestdate}}</td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
          
        </div>

</body>
</html>