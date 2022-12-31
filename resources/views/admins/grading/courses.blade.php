@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
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
<div class="left-to-right">
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div></br></br>
        @endif
        <h3 style="font-size: 28px; font-weight: 800;">Table of Strands </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 left-to-right border-start-lg border-start-success" style="padding: 10px 40px 10px 40px;">
            <div class="card-header">
                <div class="pull-right">
                    <a href="{{route('course.add')}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add Record</a>
                </div><br/><br/>
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                <!-- table-->
                @if($courses->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                <br/>
                <div class="table-responsive table-billing-history">
                        <table id="example" class="display nowrap table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="border-gray-200" scope="col">Strand Name</th>
                                    <th class="border-gray-200" scope="col">Abbreviation</th>
                                    <th class="border-gray-200" scope="col">Code</th>
                                    <th class="border-gray-200" scope="col">Action</th>
                                </tr>
                            </thead>    
                            <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{$course -> courseName}}</td>
                                            <td>{{$course -> abbreviation}}</td>
                                            <td>{{$course -> code}}</td>
                                            <td>
                                                <a class="btn btn-success btn-md" href="/viewcourse/{{$course->id}}"><i class="fas fa-eye"></i> View</a>
                                                <a class="btn btn-warning btn-md" href="/showcourse/{{$course->id}}"><i class="fas fa-edit"></i> Update</a> 
                                                <a class="btn btn-danger btn-md" href="{{route('admin.deletecourse', $course->id)}}"><i class="fas fa-trash-alt"></i> Delete</a>
                                            </td> 
                                        </tr>
                                    @endforeach 
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>  
    </div>

   
</main>
<br><br><br><br>