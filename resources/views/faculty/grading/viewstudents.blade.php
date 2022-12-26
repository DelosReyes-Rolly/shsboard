@include('partials.facultyheader')
@include('partials.facultySecondHeader')
<main>
    <script src="{{ asset('assets/js/jquery-2.2.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-3.3.6.js') }}"></script>
    <script src="{{ asset('assets/js/tableedit.js') }}"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->
    
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
    <div class="left-to-right">
        <h3 style="font-size: 28px; font-weight: 800;">Table of Students </h3>
      <hr class="mt-0 mb-4"><br/>
            <div style="background-color: #ffffff; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                <div class="card-header bg-primary" style="font-size: 20px;"><b>Male</b></div>
                <div>  
                
                    <div class="table-responsive border-start-lg border-start-primary" style=" box-shadow: 0 4px 16px rgba(0,0,0,0.6);">  
                    @if($male->count() == 0) 
                        <!-- find all subject of teachers then count if they have one. -->
                        <div class="alert alert-danger"><em>No male records found.</em></div>
                    @else
                        @csrf
                        @if($female->count() == 0) 
                            <table id="editable2" class="table table-bordered table-striped table-hover">
                        @else
                            <table id="editable1" class="table table-bordered table-striped table-hover">
                        @endif
                            <thead class="thead-dark">
                                <tr>
                                    <th style="font-size: 20px;">#</th>
                                    <th style="font-size: 20px;">Student name</th>
                                    <th style="font-size: 20px;">
                                        @php
                                            switch ($sem) {
                                                case ($sem == 1):
                                                    echo '1st Grading';
                                                    break;
                                                case ($sem == 2):
                                                    echo '3rd Grading';
                                                    break;
                                                default:
                                                    echo 'Undefined';
                                                break;
                                            }
                                        @endphp
                                    </th>
                                    <th style="font-size: 20px;">
                                        @php
                                            switch ($sem) {
                                                case ($sem == 1):
                                                    echo '2nd Grading';
                                                    break;
                                                case ($sem == 2):
                                                    echo '4th Grading';
                                                    break;
                                                default:
                                                    echo 'Undefined';
                                                break;
                                            }
                                        @endphp
                                    </th>
                                    <th style="font-size: 20px;">Average</th>
                                    <th style="font-size: 20px;">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>   
                                @php
                                    $count=1; 
                                    $ave=0;
                                @endphp
                                @foreach ($male as $student)        
                                        <tr>
                                            <td class="d-none">{{$student -> id}}</td>
                                            <td style="font-size: 20px;">{{$count++;}}</td>
                                            <td style="font-size: 20px;">{{$student -> student -> last_name}}, {{$student -> student -> first_name}} {{$student -> student -> middle_name}} {{$student -> student -> suffix}}</td>
                                            <td style="font-size: 20px;">{{$student -> midterm}}</td>
                                            <td style="font-size: 20px;">{{$student -> finals}}</td>
                                            <td style="font-size: 20px;">
                                                @php
                                                    switch ($student -> finals && $student -> midterm) {
                                                        case ($student -> finals === 'NULL' || $student -> midterm === 'NULL'):
                                                            if($student -> finals === 0 && $student -> midterm !== 0){
                                                                echo $ave = ($student -> midterm + $student -> finals) / 2;;
                                                                break;
                                                            }
                                                            elseif($student -> finals !== 0 && $student -> midterm === 0){
                                                                echo $ave = ($student -> midterm + $student -> finals) / 2;;
                                                                break;
                                                            }
                                                            elseif($student -> finals === 0 && $student -> midterm === 0){
                                                                echo $ave = ($student -> midterm + $student -> finals) / 2;;
                                                                break;
                                                            }
                                                            else{
                                                                <!-- @endphp<div id="notComplete">@php -->
                                                                    echo '<span class="badge bg-danger" style="color: white;">Grades are not complete</span>';
                                                                <!-- @endphp</div>@php -->
                                                                break;
                                                            }
                                                        case ($student -> finals !== 'NULL' && $student -> midterm !== 'NULL'):
                                                            echo '<h3 style="font-size: 20px;" id="ave"></h3 >';
                                                            @endphp<div id="php">@php
                                                                echo $ave = ($student -> midterm + $student -> finals) / 2;
                                                            @endphp</div>@php
                                                            break;
                                                        default:
                                                            echo '<span class="badge bg-danger" style="color: white;">Unidentified</span>';
                                                        break;
                                                    }
                                                @endphp
                                            </td>
                                            <td style="font-size: 20px;">
                                                @php 
                                                    $ave = ($student -> midterm + $student -> finals) / 2;
                                                    switch ($ave && $student -> finals && $student -> midterm) {
                                                        case ($student -> finals === 'NULL' || $student -> midterm === 'NULL'):
                                                            if($student -> finals === 0 && $student -> midterm !== 0){
                                                                echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                break;
                                                            }
                                                            elseif($student -> finals !== 0 && $student -> midterm === 0){
                                                                echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                break;
                                                            }
                                                            elseif($student -> finals === 0 && $student -> midterm === 0){
                                                                echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                break;
                                                            }
                                                            else{
                                                                echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                                break;
                                                            }
                                                        case ($ave <='100' && $ave >'74' && $student -> finals !== 'NULL' && $student -> midterm !== 'NULL'):
                                                            echo '<span class="badge bg-success" style="color: white;">Passed</span>';
                                                            break;
                                                        default:
                                                            echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                        break;
                                                    }
                                                @endphp
                                                        
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    @endif
                    </div>  
                </div> 
            </div>
            <br/><br/>
            <div style="background-color: #ffffff; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                <div class="card-header bg-primary" style="font-size: 20px;"><b>Female</b></div>
                <div>  
                    <div class="table-responsive border-start-lg border-start-primary" style="background-color: #ffffff; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">  
                    @if($female->count() == 0) 
                        <!-- find all subject of teachers then count if they have one. -->
                        <div class="alert alert-danger"><em>No female records found.</em></div>
                    @else
                        @csrf
                        <table id="editable2" class="display nowrap table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="font-size: 20px;">#</th>
                                    <th style="font-size: 20px;">Student name</th>
                                    <th style="font-size: 20px;">
                                        @php
                                            switch ($sem) {
                                                case ($sem == 1):
                                                    echo '1st Grading';
                                                    break;
                                                case ($sem == 2):
                                                    echo '3rd Grading';
                                                    break;
                                                default:
                                                    echo 'Undefined';
                                                break;
                                            }
                                        @endphp
                                    </th>
                                    <th style="font-size: 20px;">
                                        @php
                                            switch ($sem) {
                                                case ($sem == 1):
                                                    echo '2nd Grading';
                                                    break;
                                                case ($sem == 2):
                                                    echo '4th Grading';
                                                    break;
                                                default:
                                                    echo 'Undefined';
                                                break;
                                            }
                                        @endphp
                                    </th>
                                    <th style="font-size: 20px;">Average</th>
                                    <th style="font-size: 20px;">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>   
                                @php
                                    $count=1; 
                                    $ave=0;
                                @endphp
                                @foreach ($female as $student)        
                                        <tr>
                                            <td class="d-none">{{$student -> id}}</td>
                                            <td style="font-size: 20px;">{{$count++;}}</td>
                                            <td style="font-size: 20px;">{{$student -> student -> last_name}}, {{$student -> student -> first_name}} {{$student -> student -> middle_name}} {{$student -> student -> suffix}}</td>
                                            <td style="font-size: 20px;">{{$student -> midterm}}</td>
                                            <td style="font-size: 20px;">{{$student -> finals}}</td>
                                            <td style="font-size: 20px;">
                                                @php
                                                    switch ($student -> finals && $student -> midterm) {
                                                        case ($student -> finals === 'NULL' || $student -> midterm === 'NULL'):
                                                            if($student -> finals === 0 && $student -> midterm !== 0){
                                                                echo $ave = ($student -> midterm + $student -> finals) / 2;;
                                                                break;
                                                            }
                                                            elseif($student -> finals !== 0 && $student -> midterm === 0){
                                                                echo $ave = ($student -> midterm + $student -> finals) / 2;;
                                                                break;
                                                            }
                                                            elseif($student -> finals === 0 && $student -> midterm === 0){
                                                                echo $ave = ($student -> midterm + $student -> finals) / 2;;
                                                                break;
                                                            }
                                                            else{
                                                                echo '<span class="badge bg-danger" style="color: white;">Grades are not complete</span>';
                                                                break;
                                                            }
                                                        case ($student -> finals !== 'NULL' && $student -> midterm !== 'NULL'):
                                                            echo '<h3 style="font-size: 20px;" id="ave"></h3 >';
                                                            @endphp<div id="php">@php
                                                                echo $ave = ($student -> midterm + $student -> finals) / 2;
                                                            @endphp</div>@php
                                                            break;
                                                        default:
                                                            echo '<span class="badge bg-danger" style="color: white;">Unidentified</span>';
                                                        break;
                                                    }
                                                @endphp
                                            </td>
                                            <td style="font-size: 20px;">
                                                @php 
                                                    $ave = ($student -> midterm + $student -> finals) / 2;
                                                    switch ($ave && $student -> finals && $student -> midterm) {
                                                        case ($student -> finals === 'NULL' || $student -> midterm === 'NULL'):
                                                            if($student -> finals === 0 && $student -> midterm !== 0){
                                                                echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                break;
                                                            }
                                                            elseif($student -> finals !== 0 && $student -> midterm === 0){
                                                                echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                break;
                                                            }
                                                            elseif($student -> finals === 0 && $student -> midterm === 0){
                                                                echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                                break;
                                                            }
                                                            else{
                                                                echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                                break;
                                                            }
                                                        case ($ave <='100' && $ave >'74' && $student -> finals !== 'NULL' && $student -> midterm !== 'NULL'):
                                                            echo '<span class="badge bg-success" style="color: white;">Passed</span>';
                                                            break;
                                                        default:
                                                            echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                        break;
                                                    }
                                                @endphp
                                                        
                                                        
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>  
                </div>  
            </div>   
    </div> 

    
    <script type="text/javascript">
        $(document).ready(function(){
        
        $.ajaxSetup({
            headers:{
            'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });
        
        $('#editable2').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dateType:"json",
            columns:{
            identifier:[0, 'id'],
            editable:[[3, 'midterm'], [4, 'finals']]
            },
            restoreButton:true,
            onSuccess:function(data, textStatus, jqXHR)
            {
            if(data.action == 'delete')
            {
                $('#'+data.id).show();
            }

            var midterm = data.midterm /2;
            var finals = data.finals/2;
            var ave =(midterm + finals);
            // document.getElementById('notComplete').style.display = 'none';
            document.getElementById("ave").innerHTML = ave; 
            document.getElementById('php').style.display = 'none';
           

            }        
        });

        
        $('#editable1').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dateType:"json",
            columns:{
            identifier:[0, 'id'],
            editable:[[3, 'midterm'], [4, 'finals']]
            },
            restoreButton:true,
            onSuccess:function(data, textStatus, jqXHR)
            {
            if(data.action == 'delete')
            {
                $('#'+data.id).show();
            }

            
            var midterm = data.midterm /2;
            var finals = data.finals/2;
            var ave =(midterm + finals);
            
            document.getElementById("ave").innerHTML = ave; 
            document.getElementById('php').style.display = 'none';
            document.getElementById('grades').style.display = 'none';
            }
        });

        });  
    </script>
  
    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
</main>