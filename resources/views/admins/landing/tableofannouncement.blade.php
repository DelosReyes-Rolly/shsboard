@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<br/><br/><br/><br/><br/><br/>
    <!-- new tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
<div class="container left-to-right" style="padding: 10px 40px 10px 40px;">
        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4">
            <div class="row left-to-right">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white;" >
                        <div class="card-body">
                            <div class="card-header">Expired Private Announcements</div>
                            <div class="h3" style="padding: 0px 40px 10px 40px"><i class="far fa-calendar-times"></i> {{ $announcements->where('status', '=', 2)->count() }} </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white;">
                    <div class="card-body">
                        <div class="card-header">Active Private Annoucements</div>
                        <div class="h3 d-flex align-items-center" style="padding: 0px 40px 10px 40px"><i class="fas fa-bullhorn"></i> {{ $announcements->where('status', '=', 1)->count() }} </div>
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
        
        <hr class="mt-0 mb-4">
        <div class="card mb-4 left-to-right">
            <div class="card-header">Table of Private Annoucements</div>
            <div class="card-body p-0">
                <!-- Announcements table-->
                @if($announcements->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                <br>
                <div class="table-responsive table-billing-history">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
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
                                    <tr>
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
                                                        echo '<span class="badge bg-success">Active</span>';
                                                        break;
                                                    case '2':
                                                        echo '<span class="badge bg-danger">Expired</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="badge bg-secondary">Undetermined</span>';
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="/viewannouncement/{{$announcement->id}}"><i class="fas fa-eye"></i> View</a>
                                            <a class="btn btn-warning btn-sm" href="/showannouncement/{{$announcement->id}}"><i class="fas fa-edit"></i> Update</a>
                                            <a class="btn btn-danger btn-sm" href="/deleteadminannouncement/{{$announcement->id}}"><i class="far fa-trash-alt"></i> Delete</a>  
                                        </td> 
                                    </tr>
                                @endforeach 
                        </tbody>
                    </table>
                @endif   
                </div>
            </div>
        </div>  
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'editor' );
        </script>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });
    </script>
</main>
<br><br><br><br>