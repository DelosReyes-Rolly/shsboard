@include('partials.facultyheader')
@include('partials.facultySecondHeader')
<main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
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
        <h3 style="font-size: 20px;">Table of Students</h3>  
      <hr class="mt-0 mb-4">
            <div class="card-header"></div>
            <div>  
                <div class="table-responsive border-start-lg border-start-success">  
                @if($data->count() == 0) 
                    <!-- find all subject of teachers then count if they have one. -->
                    <br><br>
                    <div class="alert alert-danger"><em>No records found.</em></div>
			    @else
                    @csrf
                    <table id="editable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student name</th>
                                <th>Midterm</th>
                                <th>Finals</th>
                                <th>Average</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>   
                            @php
                                $count=1; 
                                $ave=0;
                            @endphp
                            @foreach ($data as $student)        
                                    <tr>
                                        <td class="hidden">{{$student -> id}}</td>
                                        <td>{{$count++;}}</td>
                                        <td>{{$student -> student -> last_name}}, {{$student -> student -> first_name}} {{$student -> student -> middle_name}}</td>
                                        <td>{{$student -> midterm}}</td>
                                        <td>{{$student -> finals}}</td>
                                        <td>
                                            @php
                                                switch ($student -> finals && $student -> midterm) {
                                                    case ($student -> finals === '0' || $student -> midterm === '0'):
                                                        echo '<span class="badge bg-danger">Grades are not complete</span>';
                                                        break;
                                                    case ($student -> finals !== '0' && $student -> midterm !== '0'):
                                                        echo $ave = ($student -> midterm + $student -> finals) / 2;;
                                                        break;
                                                    default:
                                                        echo '<span class="badge bg-danger">Unidentified</span>';
                                                    break;
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            @php 
                                                switch ($ave && $student -> finals && $student -> midterm) {
                                                    case ($ave <= '74' && $student -> finals !== '0' && $student -> midterm !== '0'):
                                                        echo '<span class="badge bg-danger">Failed</span>';
                                                        break;
                                                    case ($ave <='100' && $student -> finals !== '0' && $student -> midterm !== '0'):
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
                    @endif
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

        $('#editable').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dataType:"json",
            columns:{
            identifier:[0, 'id'],
            editable:[[3, 'midterm'], [4, 'finals']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
            if(data.action == 'delete')
            {
                $('#'+data.id).remove();
            }
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
<br><br><br><br>