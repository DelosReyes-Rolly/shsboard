@include('partials.adminheader')
@include('partials.adminThirdHeader')
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
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
<!-- reports -->
<div class="left-to-right">
        <div class="container-xl px-4 mt-4">
            <!-- page navigation-->
            <h3 style="font-size: 28px;"><b>Print Student Report</b> </h3>
            <hr class="mt-0 mb-4">
            <div class="row left-to-right">
                    <div class="mb-4">
                        <div class="card border-start-lg border-start-yellow">
                            <div class="card-header"></div>
                                <div class="card-body">
                                    <form action="{{route('admin.downloadpdfstu')}}" method="POST">
                                        @csrf
                                        <b>From:</b>
                                        <input type="date" name="dateFrom" value="<?php echo date('Y-m-d'); ?>" />
                                        <b>To:</b>
                                        <input type="date" name="dateTo" value="<?php echo date('Y-m-d'); ?>" />
                                        <input type="submit" name="submit" class="btn btn-primary" value="Print"/></input>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div></br></br>
        @endif
        <h3 style="font-size: 28px; font-weight: 800;">Table of Students </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 right-to-left border-start-lg border-start-success" style="padding: 10px 40px 10px 40px;">
            <div class="card-header">
                <div class="pull-right">
                    <a href="{{route('student.add')}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add Student Manually</a>
                </div>
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                @if($students->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    <br>
                    <div class="table-responsive table-billing-history">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="border-gray-200" scope="col">#</th>
                                    <th class="border-gray-200" scope="col">LRN</th>
                                    <th class="border-gray-200" scope="col">Student Name</th>
                                    <th class="border-gray-200" scope="col">Address</th>
                                    <th class="border-gray-200" scope="col">Gender</th>
                                    <th class="border-gray-200" scope="col">Username</th>
                                    <th class="border-gray-200" scope="col">Phone Number</th>
                                    <th class="border-gray-200" scope="col">Email Address</th>
                                    <th class="border-gray-200" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                ?>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td>{{$student -> LRN}}</td>
                                            <td>{{$student -> last_name}}, {{$student -> first_name}} {{$student -> middle_name}} {{$student -> suffix}}</td>
                                            <td>{{$student -> address -> street}} {{$student -> address -> village}}, {{$student -> address -> city}} {{$student -> address -> zip_code}}</td>
                                            <td>{{$student -> gender}}</td>
                                            <td>{{$student -> username}}</td>
                                            <td>{{$student -> phone_number}}</td>
                                            <td>{{$student -> email}}</td>
                                            <td>
                                                <a class="btn btn-success btn-md" href="/viewstudent/{{$student->id}}"><i class="fas fa-eye"></i> View</a>
                                                <a class="btn btn-warning btn-md" href="/showstudent/{{$student->id}}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="{{route('admin.deletestudent', $student->id)}}"><i class="fas fa-trash-alt"></i> Delete</a>
                                            </td> 
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

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

</main>
<!-- <br><br><br><br>
@include('partials.adminfooter') -->