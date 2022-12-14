@include('partials.facultyheader')
@include('partials.facultySecondHeader')
<main>
<div class="left-to-right">
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
            var table = $('#example').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
      <h3 style="font-size: 28px; font-weight: 800;">School Year</h3>  
      <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-yellow" style="padding: 10px 40px 10px 40px">
            @if($subjectteachers->count() == 0) 
            <!-- find all subject of teachers then count if they have one. -->
				<br><br>
				<div class="alert alert-danger"><em>No records found.</em></div>
			@else
                @foreach ($subjectteachers as $sy)
                    <!-- collection to individual row -->
                        <!-- accordion start -->
                        <button class="accordion"><b>{{$sy->schoolyear->schoolyear}}</b></button>
                        <!-- output schoolyear "" -->
                        <div class="panel">
                            <div style="padding-bottom: 400px;">
                                <div class="card-header">Table of Subjects</div>
                                <div class="card-body p-0">
                                    <!-- table-->
                                        <br>
                                        <div class="table-responsive table-billing-history">
                                            <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th class="border-gray-200" scope="col">#</th>
                                                        <th class="border-gray-200" scope="col">Subject Name</th>
                                                        <th class="border-gray-200" scope="col">Grade Level</th>
                                                        <th class="border-gray-200" scope="col">Semester</th>
                                                        <th class="border-gray-200" scope="col">Course Name</th>
                                                        <th class="border-gray-200" scope="col">Section</th>
                                                        <th class="border-gray-200" scope="col">Time</th>
                                                        <th class="border-gray-200" scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php $count = 1; @endphp
                                                @foreach($subjects as $schoolyearsubject)
                                                    @if($schoolyearsubject->schoolyear->schoolyear == $sy->schoolyear->schoolyear)
                                                            <tr id="{{$schoolyearsubject -> id}}">
                                                                <td>{{$count++}}</td>
                                                                <td>{{$schoolyearsubject -> subject -> subjectname}}</td>
                                                                <td>{{$schoolyearsubject -> gradelevel -> gradelevel}}</td>
                                                                <td>{{$schoolyearsubject -> semester -> sem}}</td>
                                                                <td>{{$schoolyearsubject -> course -> courseName}}</td>
                                                                <td>{{$schoolyearsubject -> section -> section}}</td>
                                                                <td>{{$time_start =  date('h:i A', strtotime($schoolyearsubject -> time_start))}} - {{$time_end =  date('h:i A', strtotime($schoolyearsubject -> time_end))}}</td>
                                                                <td>
                                                                    <a href="{{route('view-students',['subject_id'=>$schoolyearsubject -> subject_id, 'gradelevel_id'=>$schoolyearsubject -> gradelevel_id, 'semester_id'=>$schoolyearsubject -> semester_id, 'schoolyear_id'=>$schoolyearsubject -> schoolyear_id])}}"><i class="fas fa-edit"></i>View students</a>
                                                                </td> 
                                                            </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>    
                                        </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            @endif
        </div>  
    </div>

    <!-- accordion -->
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("actives");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            } 
          });
        }
    </script>
</main>
<br><br><br><br>