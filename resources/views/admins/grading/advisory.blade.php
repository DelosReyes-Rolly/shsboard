
@include('partials.adminheader')
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
    <script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
    <script>
        $(document).ready(function() {
            table = $('#example').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
<div class="">
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div></br></br>
        @endif
        <h3 style="font-size: 28px; font-weight: 800;">Table of Teacher's Advisory Class </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
            <div class="card-header" style="background-color: #ffffff;">
                <a href="{{route('advisory.add')}}" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#createModal"><i class="fas fa-user-plus"></i> Add Record</a>
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                @if($advisories->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    @foreach ($schoolYear as $sy)
                        <button class="accordion"><b>{{$sy->schoolyear->schoolyear}}</b></button>
                        <div class="panel">
                            <div style="padding-bottom: 400px;">
                            <br/>
                                @if($graderelease != null)
                                    @if($graderelease->grade_release == null)
                                        <div>
                                            <a class="btn btn-primary btn-lg" href="{{route('firstquarter',['schoolyear_id'=>$graderelease->schoolyear_id])}}" style="float: right; font-size: 18px;"><i class="fas fa-file-alt"></i> Release 1st quarter grades</a>
                                        </div>
                                    @elseif($graderelease->grade_release == 1)
                                        <div>
                                            <a class="btn btn-primary btn-lg" href="{{route('secondquarter',['schoolyear_id'=>$graderelease->schoolyear_id])}}" style="float: right; font-size: 18px;"><i class="fas fa-file-alt"></i> Release 2nd quarter grades</a>
                                        </div>
                                    @elseif($graderelease->grade_release == 2)
                                        <div>
                                            <a class="btn btn-primary btn-lg" href="{{route('thirdquarter',['schoolyear_id'=>$graderelease->schoolyear_id])}}" style="float: right; font-size: 18px;"><i class="fas fa-file-alt"></i> Release 3rd quarter grades</a>
                                        </div>
                                    @elseif($graderelease->grade_release == 3)
                                        <div>
                                            <a class="btn btn-primary btn-lg" href="{{route('fourthquarter',['schoolyear_id'=>$graderelease->schoolyear_id])}}" style="float: right; font-size: 18px;"><i class="fas fa-file-alt"></i> Release 4th quarter grades</a>
                                        </div>
                                    @endif
                                @endif
                                <div class="card-header">Table of Advisories</div>
                                <div class="card-body p-0">
                                    <!-- table-->
                                        <br>
                                        <div class="table-responsive table-billing-history">
                                            <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th class="border-gray-200" scope="col">#</th>
                                                        <th class="border-gray-200" scope="col">Teacher Name</th>
                                                        <th class="border-gray-200" scope="col">Grade Level</th>
                                                        <th class="border-gray-200" scope="col">Strand</th>
                                                        <th class="border-gray-200" scope="col">Section</th>
                                                        <th class="border-gray-200" scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php $count = 1; @endphp
                                                @foreach($advisories as $adviser)
                                                    @if($adviser->schoolyear->schoolyear == $sy->schoolyear->schoolyear)
                                                            <tr id="adviser{{$adviser -> id}}">
                                                                <td>{{$count++}}</td>
                                                                <td>{{$adviser -> faculty -> last_name}}, {{$adviser -> faculty -> first_name}} {{$adviser -> faculty -> middle_name}} {{$adviser -> faculty -> suffix}}</td>
                                                                <td>{{$adviser -> gradelevel -> gradelevel}}</td>
                                                                <td>{{$adviser -> course -> courseName}}</td>
                                                                <td>{{$adviser -> section -> section}}</td>
                                                                <td>
                                                                    <a class="btn btn-success btn-md" href="{{ url('viewadvisory',['id'=>$adviser->id]) }}" data-toggle="modal" data-target="#modal-view-{{ $adviser->id }}"><i class="fa-solid fa-eye"></i> View</a>
                                                                    <a class="btn btn-warning btn-md" href="{{ url('showadvisory',['id'=>$adviser->id]) }}" data-toggle="modal" onclick="editItem(this)" data-id="{{ $adviser->id }}" data-target="#editModal{{ $adviser->id }}"><i class="fas fa-edit"></i> Update</a>
                                                                </td> 
                                                            </tr>
                                                            <!-- view modal -->
                                                            <div id="modal-view-{{ $adviser->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content border-start-lg border-start-yellow">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- edit modal -->
                                                            <div id="editModal{{ $adviser->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content border-start-lg border-start-yellow">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>    
                                        </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                @endif
                 <!-- create modal -->
                 <div id="createModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content border-start-lg border-start-yellow">
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
      editItem(e);
    });
    function editItem(e){
        id = e.getAttribute('data-id');
    }
    </script>

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