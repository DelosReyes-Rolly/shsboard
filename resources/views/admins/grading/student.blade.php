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
            var table = $('#example').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
<!-- reports -->
<div class="">
        <div class="px-2 mt-2">
            <!-- page navigation-->
            <h3 style="font-size: 28px;"><b>Print Student Report</b> </h3>
            <hr class="mt-0 mb-4">
            <div class="row">
                    <div class="card mb-4">
                    <div class="border-start-lg border-start-yellow">
                        <div class="card-header"></div>
                            <div class="card-body">
                                    <form action="{{route('admin.downloadpdfstu')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-2">
                                                <b>From:</b>
                                                <input type="date" name="dateFrom" class="form-control" value="<?php echo date('Y-m-d'); ?>" /><br/>
                                            </div>
                                            <div class="col-md-2">
                                                <b>To:</b>
                                                <input type="date" name="dateTo" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                                            </div>
                                            <div class="col-md-4">
                                                <br/>
                                                <input type="submit" name="submit" class="btn btn-primary" value="Print"/></input>
                                            </div>
                                        </div>
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
        <div class="card mb-4 right-to-left border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
            <div class="card-header" style="background-color: white;">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <a class="btn btn-success" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/gradingalumni") }}'><i class="fas fa-user-graduate"></i> Alumni</a><br/><br/>
                        <a class="btn btn-danger" style="font-size:20px; font-weight:bold; color:white;" href='{{ url("/gradingdropped") }}'><i class="fas fa-user-slash"></i> Dropped</a><br/><br/>
                    </div><br/><br/>
                    <div class="col-lg-6 col-md-12 col-sm-12" style="float:right; text-align: right;">
                        <a href="{{route('studentbatch.add')}}" class="btn btn-primary" style="display: inline-block" data-toggle="modal" data-target="#batchModal"><i class="fas fa-user-plus"></i> Add Student in Batch</a><br/><br/>
                        <a href="{{route('student.add')}}" class="btn btn-primary" style="display: inline-block" data-toggle="modal" data-target="#createModal"><i class="fas fa-user-plus"></i> Add Student Manually</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                @if($students->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    <br>
                    <div class="table-responsive table-billing-history">
                        <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="border-gray-200" scope="col">#</th>
                                    <th class="border-gray-200" scope="col">LRN</th>
                                    <th class="border-gray-200" scope="col">Student Name</th>
                                    <!-- <th class="border-gray-200" scope="col">Address</th> -->
                                    <th class="border-gray-200" scope="col">Gender</th>
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
                                        <tr id="student{{$student->id}}">
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td>{{$student -> LRN}}</td>
                                            <td>{{$student -> last_name}}, {{$student -> first_name}} {{$student -> middle_name}} {{$student -> suffix}}</td>

                                            <td>{{$student -> gender}}</td>
                                            <td>{{$student -> phone_number}}</td>
                                            <td>{{$student -> email}}</td>
                                            <td>
                                                <a class="btn btn-success btn-md" href="/viewstudent/{{$student->id}}" data-toggle="modal" data-target="#modal-view-{{ $student->id }}"><i class="fa-solid fa-eye"></i> View</a>
                                                <a class="btn btn-warning btn-md" href="/showstudent/{{$student->id}}" data-toggle="modal" onclick="editItem(this)" data-id="{{ $student->id }}" data-target="#editModal{{ $student->id }}"><i class="fas fa-edit"></i> Update</a>
                                                <button class="btn btn-danger btn-md" onclick="deleteItem(this)" data-id="{{ $student->id }}"><i class="fas fa-trash-alt"></i> Delete</button>
                                                <button class="btn btn-danger btn-md" onclick="dropItem(this)" data-id="{{ $student->id }}"><i class="fas fa-user-slash"></i> Drop</button>
                                            </td> 
                                            </td> 
                                        </tr>
                                        <!-- view modal -->
                                        <div id="modal-view-{{ $student->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content border-start-lg border-start-yellow">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- edit modal -->
                                        <div id="editModal{{ $student->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content border-start-lg border-start-yellow">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <!-- create modal -->
                <div id="createModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content border-start-lg border-start-yellow">
                        </div>
                     </div>
                </div>
                <!-- batch modal -->
                <div id="batchModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
      deleteItem(e);
      dropItem(e);
    });
    function editItem(e){
        id = e.getAttribute('data-id');
    }
    //delete
    function deleteItem(e){

        let id = e.getAttribute('data-id');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed){

                    $.ajax({
                        type:'PUT',
                        url:'{{url("/student/delete")}}/' +id,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            if (data.success){
                                
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Student is deleted successfully.',
                                    "success"
                                );
                                $("#student"+id+"").remove();
                            }

                        }
                    });

                }

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    '',
                    'error'
                );
            }
        });

        }

        //drop
    function dropItem(e){

        let id = e.getAttribute('data-id');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, drop the student!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed){

                    $.ajax({
                        type:'PUT',
                        url:'{{url("/dropstudent")}}/' +id,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            if (data.success){
                                
                                swalWithBootstrapButtons.fire(
                                    'Dropped!',
                                    'Student is dropped successfully.',
                                    "success"
                                );
                                $("#student"+id+"").remove();
                            }

                        }
                    });

                }

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    '',
                    'error'
                );
            }
        });

        }
    </script>

</main>
<!-- <br><br><br><br>
@include('partials.adminfooter') -->