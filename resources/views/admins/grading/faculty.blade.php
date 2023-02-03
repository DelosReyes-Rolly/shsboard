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
    <div class="">
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <h3 style="font-size: 28px; font-weight: 800;">Table of Teachers </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 40px 10px 40px;">
            <div class="card-header" style="background-color: #ffffff;">
                <div class="row">
                    <div class="col-lg-6 col-md-6" style="font-size: 20px;">
                        Max Regular Load: <span id="reload">{{$load->regular_load}}</span> <a class="btn btn-warning btn-sm" href="/showminload/{{$load->id}}" data-toggle="modal" onclick="editReg(this)" data-id="{{ $load->id }}" data-target="#editmin"><i class="fas fa-edit"></i> Change</a><br/><br/>
                        
                        Max Master Load: <span id="reload2">{{$load->master_load}}</span> <a class="btn btn-warning btn-sm" href="/showmaxload/{{$load->id}}" data-toggle="modal" onclick="editMas(this)" data-id="{{ $load>id }}" data-target="#editmax"><i class="fas fa-edit"></i> Change</a>
                        
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div style="float:right; text-align: right;">
                            <a href="{{route('facultybatch.add')}}" class="btn btn-primary" style="display: inline-block" data-toggle="modal" data-target="#batchModal"><i class="fas fa-user-plus"></i> Add Faculty in Batch</a><br/><br/>
                            <a href="{{route('faculty.add')}}" class="btn btn-primary" style="display: inline-block" data-toggle="modal" data-target="#createModal"><i class="fas fa-user-plus"></i> Add Record Manually</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                @if($faculties->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    <br>
                    <div class="table-responsive table-billing-history">
                        <table id="example" class="display table-bordered table-striped table-hover table-lg table" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="border-gray-200" scope="col">#</th>
                                    <th class="border-gray-200" scope="col">Name</th>
                                    <th class="border-gray-200" scope="col">Subject Load</th>
                                    <th class="border-gray-200" scope="col">Class Load</th>
                                    <th class="border-gray-200" scope="col">Expertise</th>
                                    <th class="border-gray-200" scope="col">Status</th>
                                    <th class="border-gray-200" scope="col">Email Address</th>
                                    <th class="border-gray-200" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                ?>
                                    @foreach ($faculties as $faculty)
                                        <tr id="faculty{{$faculty->id}}">
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td>{{$faculty -> last_name}} , {{$faculty -> first_name}} {{$faculty -> middle_name}} {{$faculty -> suffix}}</td>
                                            <td>{{$faculty -> subject_load}}</td>
                                            <td>{{$faculty -> class_load}}</td>
                                            <td>{{$faculty -> expertise -> expertise}}</td>
                                            <td>
                                                @if ($faculty->isMaster == null)
                                                    Master
                                                @else
                                                    Regular
                                                @endif
                                            </td>
                                            <td>{{$faculty -> email}}</td>
                                            <td width=24%>
                                                <a class="btn btn-success btn-md" href="/viewfaculty/{{$faculty->id}}"><i class="fa-solid fa-eye"></i> View</a>
                                                <a class="btn btn-warning btn-md" href="/showfaculty/{{$faculty->id}}" data-toggle="modal" onclick="editItem(this)" data-id="{{ $faculty->id }}" data-target="#editModal{{ $faculty->id }}"><i class="fas fa-edit"></i> Update</a>
                                                <button class="btn btn-danger btn-md" onclick="deleteItem(this)" data-id="{{ $faculty->id }}"><i class="fas fa-trash-alt"></i> Delete</button>
                                            </td> 
                                        </tr>
                                        <!-- edit modal -->
                                        <div id="editModal{{ $faculty->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                <!-- create modal -->
                <div id="batchModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content border-start-lg border-start-yellow">
                        </div>
                   </div>
                </div>
                <!--min -->
                <div id="editmin" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content border-start-lg border-start-yellow">
                        </div>
                    </div>
                </div>
                <!--max-->
                <div id="editmax" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
      editReg(e);
      editMas(e);
      editItem(e);
      deleteItem(e);
    });
    function editReg(e){
        id = e.getAttribute('data-id');
    }
    function editMas(e){
        id = e.getAttribute('data-id');
    }
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
                        url:'{{url("/faculty/delete")}}/' +id,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            if (data.success){
                                
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Faculty is deleted successfully.',
                                    "success"
                                );
                                $("#faculty"+id+"").remove();
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
<br><br><br><br>