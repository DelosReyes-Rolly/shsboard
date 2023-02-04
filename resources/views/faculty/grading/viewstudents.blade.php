@include('partials.facultyheader')
@include('partials.facultySecondHeader')
<main>
    <script src="{{ asset('assets/js/jquery-2.2.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-3.3.6.js') }}"></script>
    <script src="{{ asset('assets/js/tableedit.js') }}"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->
    <div style="font-size: 20px;">  
		<nav  aria-label = "breadcrumb">
            <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
            <ul class = "breadcrumb">
               <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
               <li class = "breadcrumb-item"><a class="bca" href = "javascript:history.back()">Subjects</a></li>
               <!--Add the "active" class to li element to represent the current page-->
               <li class = "breadcrumb-item active" aria-current = "page">View students</li>
            </ul>
         </nav>
	</div>
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
        <div style="margin: 20px;">
            <a class="btn btn-secondary btn-lg" href="javascript:history.back()" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to subject list</a><br/><br/>
        </div>
        <h3 style="font-size: 28px; font-weight: 800;">Table of Students </h3><br/>
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
                                            <td style="font-size: 20px;"><div id="gradingGrades21{{$student->id}}">{{$student -> midterm}}</div></td>
                                            <td style="font-size: 20px;"><div id="gradingGrades22{{$student->id}}">{{$student -> finals}}</div></td>
                                            <td style="font-size: 20px;">
                                                <h3 style="font-size: 20px;" id="ave2{{$student->id}}"></h3>
                                                <span class="badge bg-danger" id="remarksnoave2{{$student->id}}" style="display:none;">Grades are not complete</span>
                                                @php
                                                    switch ($student -> finals && $student -> midterm) {
                                                        case ($student -> finals === 'NULL' || $student -> midterm === 'NULL'):
                                                            echo '<p style="font-size: 20px;" id="ave2{{$student->id}}"></p>';
                                                            @endphp<div id="notComplete2{{$student->id}}">@php
                                                                echo '<span class="badge bg-danger" style="color: white;">Grades are not complete</span>';
                                                            @endphp</div>@php
                                                            break;
                                                        case ($student -> finals !== 'NULL' && $student -> midterm !== 'NULL'):
                                                            echo '<p style="font-size: 20px;" id="ave2{{$student->id}}"></p>';
                                                            @endphp<div id="notComplete2{{$student->id}}">@php
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
                                                <span id="remarks2{{$student->id}}" style="display:none;"></span>
                                                <span class="badge bg-danger" id="remarksnoremarks2{{$student->id}}" style="display:none;">No remarks</span>
                                                @php 
                                                    $ave = ($student -> midterm + $student -> finals) / 2;
                                                    switch ($ave && $student -> finals && $student -> midterm) {
                                                        case ($student -> finals === 'NULL' || $student -> midterm === 'NULL'):
                                                            @endphp<div id="notCompleteRemarks2{{$student->id}}">@php
                                                                echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                            @endphp</div>@php
                                                            break;
                                                        case ($ave <='100' && $ave >'74' && $student -> finals !== 'NULL' && $student -> midterm !== 'NULL'):
                                                            @endphp<div id="notCompleteRemarks2{{$student->id}}">@php
                                                                echo '<span class="badge bg-success" style="color: white;">Passed</span>';
                                                            @endphp</div>@php
                                                            break;
                                                        default:
                                                            @endphp<div id="notCompleteRemarks2{{$student->id}}">@php
                                                                echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                            @endphp</div>@php
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
                        <table id="editable2" class="table table-bordered table-striped table-hover">
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
                                            <td style="font-size: 20px;"><div id="gradingGrades1{{$student->id}}">{{$student -> midterm}}</div></td>
                                            <td style="font-size: 20px;"><div id="gradingGrades2{{$student->id}}">{{$student -> finals}}</div></td>
                                            <td style="font-size: 20px;">
                                                <h3 style="font-size: 20px;" id="ave{{$student->id}}"></h3>
                                                <span class="badge bg-danger" id="remarksnoave{{$student->id}}" style="display:none;">Grades are not complete</span>
                                                @php
                                                    switch ($student -> finals && $student -> midterm) {
                                                        case ($student -> finals === 'NULL' || $student -> midterm === 'NULL'):
                                                            echo '<p style="font-size: 20px;" id="ave{{$student->id}}"></p>';
                                                            @endphp<div id="notComplete{{$student->id}}">@php
                                                                echo '<span class="badge bg-danger" style="color: white;">Grades are not complete</span>';
                                                            @endphp</div>@php
                                                            break;
                                                        case ($student -> finals !== 'NULL' && $student -> midterm !== 'NULL'):
                                                            echo '<p style="font-size: 20px;" id="ave{{$student->id}}"></p>';
                                                            @endphp<div id="notComplete{{$student->id}}">@php
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
                                                <span id="remarks{{$student->id}}" style="display:none;"></span>
                                                <span class="badge bg-danger" id="remarksnoremarks{{$student->id}}" style="display:none;">No remarks</span>
                                                @php 
                                                    $ave = ($student -> midterm + $student -> finals) / 2;
                                                    switch ($ave && $student -> finals && $student -> midterm) {
                                                        case ($student -> finals === 'NULL' || $student -> midterm === 'NULL'):
                                                            @endphp<div id="notCompleteRemarks{{$student->id}}">@php
                                                                echo '<span class="badge bg-danger" style="color: white;">No remarks</span>';
                                                            @endphp</div>@php
                                                            break;
                                                        case ($ave <='100' && $ave >'74' && $student -> finals !== 'NULL' && $student -> midterm !== 'NULL'):
                                                            @endphp<div id="notCompleteRemarks{{$student->i}}"d>@php
                                                                echo '<span class="badge bg-success" style="color: white;">Passed</span>';
                                                            @endphp</div>@php
                                                            break;
                                                        default:
                                                            @endphp<div id="notCompleteRemarks{{$student->i}}"d>@php
                                                                echo '<span class="badge bg-danger" style="color: white;">Failed</span>';
                                                            @endphp</div>@php
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
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
            if(data.action == 'delete')
            {
                $('#'+data.id).show();
            }

            var midterm = data.midterm /2;
            var finals = data.finals/2;
            var ave =(midterm + finals);
            if(Number.isNaN(ave)=== true){
                document.getElementById('notComplete'+data.id).style.display = 'block';
                document.getElementById('remarks'+data.id).style.display = 'none';
                document.getElementById('ave'+data.id).style.display = 'none';
                document.getElementById('remarksnoremarks'+data.id).style.display = 'block';
                document.getElementById('gradingGrades1'+data.id).style.display = 'none';
                document.getElementById('gradingGrades2'+data.id).style.display = 'none';
            }
            else if(data.midterm !== null && data.finals !== null){
                document.getElementById('ave'+data.id).innerHTML = ave;
                document.getElementById('ave'+data.id).style.display = 'block';
                document.getElementById('remarksnoremarks'+data.id).style.display = 'none';
                document.getElementById('notComplete'+data.id).style.display = 'none';
                document.getElementById('notCompleteRemarks'+data.id).style.display = 'none';
                var heading = document.getElementById('remarks'+data.id);
                if(ave<75){
                    heading.innerHTML = "Failed";
                    heading.setAttribute("class", "badge bg-danger");
                    document.getElementById('remarksnoave'+data.id).style.display = 'none';
                    document.getElementById('remarks'+data.id).style.display = 'block';
                }
                else if(ave<=100){
                    heading.innerHTML = "Passed";
                    heading.setAttribute("class", "badge bg-success");
                    document.getElementById('remarksnoave'+data.id).style.display = 'none';
                    document.getElementById('remarks'+data.id).style.display = 'block';
                }
                else
                {
                    heading.innerHTML = "Undetermined";
                    heading.setAttribute("class", "badge bg-secondary");
                    document.getElementById('remarksnoave'+data.id).style.display = 'none';
                    document.getElementById('remarks'+data.id).style.display = 'block';
                }

            }

            else if(data.midterm === null || data.finals === null){
                document.getElementById('notComplete'+data.id).style.display = 'none';
                document.getElementById('ave'+data.id).style.display = 'none';
                document.getElementById('remarksnoave'+data.id).style.display = 'block';
                document.getElementById('notCompleteRemarks'+data.id).style.display = 'none';
                document.getElementById('remarks'+data.id).style.display = 'none';
                document.getElementById('remarksnoremarks'+data.id).style.display = 'block';
            }

            }        
        });

        
        $('#editable1').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dateType:"json",
            columns:{
            identifier:[0, 'id'],
            editable:[[3, 'midterm'], [4, 'finals']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
            if(data.action == 'delete')
            {
                $('#'+data.id).show();
            }

            
            var midterm = data.midterm /2;
            var finals = data.finals/2;
            var ave =(midterm + finals);
            if(Number.isNaN(ave)=== true){
                document.getElementById('notComplete2'+data.id).style.display = 'block';
                document.getElementById('remarks2'+data.id).style.display = 'none';
                document.getElementById('ave2'+data.id).style.display = 'none';
                document.getElementById('remarksnoremarks2'+data.id).style.display = 'block';
                document.getElementById('gradingGrades21'+data.id).style.display = 'none';
                document.getElementById('gradingGrades22'+data.id).style.display = 'none';
            }
            else if(data.midterm !== null && data.finals !== null){
                
                document.getElementById('ave2'+data.id).innerHTML = ave;
                document.getElementById('ave2'+data.id).style.display = 'block';
                document.getElementById('remarksnoremarks2'+data.id).style.display = 'none';
                document.getElementById('notComplete2'+data.id).style.display = 'none';
                document.getElementById('notCompleteRemarks2'+data.id).style.display = 'none';
                var heading = document.getElementById('remarks2'+data.id);
                if(ave<75){
                    heading.innerHTML = "Failed";
                    heading.setAttribute("class", "badge bg-danger");
                    document.getElementById('remarksnoave2'+data.id).style.display = 'none';
                    document.getElementById('remarks2'+data.id).style.display = 'block';
                }
                else if(ave<=100){
                    heading.innerHTML = "Passed";
                    heading.setAttribute("class", "badge bg-success");
                    document.getElementById('remarksnoave2'+data.id).style.display = 'none';
                    document.getElementById('remarks2'+data.id).style.display = 'block';
                }
                else
                {
                    heading.innerHTML = "Undetermined";
                    heading.setAttribute("class", "badge bg-secondary");
                    document.getElementById('remarksnoave2'+data.id).style.display = 'none';
                    document.getElementById('remarks2'+data.id).style.display = 'block';
                }
            }
            else if(data.midterm === null || data.finals === null){
                document.getElementById('notComplete2'+data.id).style.display = 'none';
                document.getElementById('ave2'+data.id).style.display = 'none';
                document.getElementById('remarksnoave2'+data.id).style.display = 'block';
                document.getElementById('notCompleteRemarks2'+data.id).style.display = 'none';
                document.getElementById('remarks2'+data.id).style.display = 'none';
                document.getElementById('remarksnoremarks2'+data.id).style.display = 'block';
            }
            }
        });

        $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
        });


        });  
    </script>
  
</main>