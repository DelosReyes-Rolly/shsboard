@include('partials.adminheader')
@include('partials.adminSecondHeader')
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
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
<div class="">
        <div class="px-2 mt-2">
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                        <div class="card-body delay-1">
                            <div class="card-header" style="font-size: 20px; font-weight: 800;">Expired Announcements</div>
                            <div class="h3" style="padding: 40px 40px 10px 40px;"><i class="fas fa-calendar-times"></i> <span id="reload">{{ $announcements->where('status', '=', 2)->count() }}</span> </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                    <div class="card-body delay-2">
                        <div class="card-header" style="font-size: 20px; font-weight: 800;">Active Announcements</div>
                        <div class="h3 d-flex align-items-center" style="padding: 40px 40px 10px 40px"><i class="fas fa-bullhorn"> </i> <span id="reload">{{ $announcements->where('status', '=', 1)->count() }}</span> </div>
                    </div>
                </div>
            </div>
        </div>
        

        @if ($message = Session::get('approval'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <h3 style="font-size: 28px; font-weight: 800;">Table of Private Annoucements</h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-yellow" style="padding: 10px 20px 10px 20px;">
            <div class="card-header"></div>
            <div class="card-body p-0">
                <!-- Announcements table-->
                @if($announcements->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                <br>
                <div class="table-responsive table-billing-history">
                    <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                        <thead class="table-success">
                            <tr>
                                <th class="border-gray-200" scope="col">#</th>
                                <th class="border-gray-200" scope="col">Title</th>
                                <th class="border-gray-200" scope="col">Receipient</th>
                                <th class="border-gray-200" scope="col">Date</th>
                                <th class="border-gray-200" scope="col">Time</th>
                                <th class="border-gray-200" scope="col">Location</th>
                                <th class="border-gray-200" scope="col">Expired at</th>
                                <th class="border-gray-200" scope="col">Status</th>
                                <th class="border-gray-200" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=1;
                            ?>
                                @foreach ($announcements as $announcement)
                                    <tr id="announcement{{$announcement -> id}}">
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td>{{$announcement -> what}}</td>
                                        <td>{{$announcement -> who}}</td>
                                        <td>{{$date  =   date('F d, Y', strtotime($announcement->whn))}}</td>
                                        <td>{{$time  =   date('h:i A', strtotime($announcement->whn_time))}}</td>
                                        <td>{{$announcement -> whr}}</td>
                                        <td>{{$requested_at  =   date('F d, Y', strtotime($announcement->expired_at))}}</td>
                                        <td>
                                            <?php 
                                                switch ($announcement -> status) {
                                                    case '1':
                                                        echo '<span class="badge bg-success" style="color:#fff">Active</span>';
                                                        break;
                                                    case '2':
                                                        echo '<span class="badge bg-danger" style="color:#fff">Expired</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="badge bg-secondary" style="color:#fff">Undetermined</span>';
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-md" href="/viewannouncement/{{$announcement->id}}"><i class="fa-solid fa-eye"></i> View</a>
                                            <a class="btn btn-warning btn-md" href="/showannouncement/{{$announcement->id}}" onclick="editItem(this)" data-id="{{ $announcement->id }}" data-toggle="modal" data-target="#editModal{{ $announcement->id }}"><i class="fas fa-edit"></i> Update</a>
                                            <button class="btn btn-danger btn-md" onclick="deleteItem(this)" data-id="{{ $announcement->id }}"><i class="fas fa-trash-alt"></i> Delete</button>
                                        </td> 
                                    </tr>
                                    <!-- update announcement -->
                                    <div id="editModal{{ $announcement->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content border-start-lg border-start-yellow">
                                            </div>
                                        </div>
                                    </div>
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
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
          editItem(e);
          deleteItem(e);

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
                            url:'{{url("/announcement/delete")}}/' +id,
                            data:{
                                "_token": "{{ csrf_token() }}",
                            },
                            success:function(data) {
                                if (data.success){
                                    
                                    swalWithBootstrapButtons.fire(
                                        'Deleted!',
                                        'An announcement has been deleted successfully.',
                                        "success"
                                    );
                                    $("#reload").load(location.href + " #reload");
                                    $("#reload2").load(location.href + " #reload2");
                                    $("#announcement"+id+"").remove();
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