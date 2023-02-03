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
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
    <div>
            <!-- boxes -->
            <div class="container-xl px-4 mt-4">
                <hr class="mt-0 mb-4">
                <div class="row left-to-right">
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 2-->
                        <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                            <div class="card-body">
                                <div class="card-header" style="font-size: 20px; font-weight: 800;">Expired Events</div>
                                <div class="h3" style="padding: 40px 40px 10px 40px"><i class="fas fa-calendar-times"></i> <span id="reload">{{ $events->where('status', '=', 2)->count() }}</span></div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                        <div class="card-body">
                            <div class="card-header" style="font-size: 20px; font-weight: 800;">Active Events</div>
                            <div class="h3 d-flex align-items-center" style="padding: 40px 40px 10px 40px"><i class="fas fa-bullhorn"></i> <span id="reload2">{{ $events->where('status', '=', 1)->count() }}</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="container-xl px-4 mt-4">
                    <!-- page navigation-->
                    <h3 style="font-size: 28px; font-weight: 800;">Create Event </h3>
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        
                            <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="border-start-lg border-start-yellow">
                                <div class="card-header">
                                    <!-- form -->
                                    @if ($message = Session::get('message'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    
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
                                </div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputsubject" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                                            <input class="form-control @error('subject') is-invalid @enderror" id="inputsubject" type="text" placeholder="Enter the title" name="subject"  value="{{ old('subject') }}" required>
                                            <div class="invalid-feedback">
                                                Please input subject.
                                            </div>
                                        </div>
                                        <!-- Form Group date-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputdate" style="font-size: 20px;"><span style="color: red">*</span> Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="inputdate" placeholder="Enter the date" name="date"  value="{{ old('date') }}" required>
                                            <div class="invalid-feedback">
                                                Please input date.
                                            </div>
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                             <div class="form-group">
                                                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time</label><br>
                                                <input type="time"  class="form-control" id="time" name="time" value="{{ old('time') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input time.
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-3">
                                                <label class="large mb-1" for="inputsender" style="font-size: 20px;"><span style="color: red">*</span> From</label>
                                                <input class="form-control @error('sender') is-invalid @enderror" id="inputsender" type="text" placeholder="Enter the sender" name="sender"  value="{{ old('sender') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input sender.
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="large mb-1" for="inputrecipient" style="font-size: 20px;"><span style="color: red">*</span> To</label>
                                                <input class="form-control @error('recipient') is-invalid @enderror" id="inputrecipient" type="text" placeholder="Enter the recipients" name="recipient"  value="{{ old('recipient') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input recipient.
                                                </div>
                                            </div>
                                            <!-- Form Group whr-->
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputlocation" style="font-size: 20px;"><span style="color: red">*</span> Location</label>
                                                <input class="form-control @error('location') is-invalid @enderror" id="inputlocation" type="text" placeholder="Enter the location" name="location"  value="{{ old('location') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input location.
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <br><label class="slarge mb-1" for="inputpost_expiration" style="font-size: 20px;"><span style="color: red">*</span> Post Expiration</label>
                                                <input type="date" class="form-control @error('post_expiration') is-invalid @enderror" id="inputpost_expiration" placeholder="Enter the date" name="post_expiration"  value="{{ old('post_expiration') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input expiry date.
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80" required>{{ old('content') }}</textarea>
                                            <div class="invalid-feedback">
                                                Please input content.
                                            </div>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (img)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputcontent" style="font-size: 20px;">Image (Only png and jpg files are allowed)</label>
                                                <div class ="form-group row">
                                                    <div class="col-md-8"></div>
                                                    <input type="file" name = "image" class="form-control">
                                                </div> 
                                            </div>
                                            <!-- Save changes button-->
                                        </div>
                                        <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>

            @if ($message = Session::get('event'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <br/>
            <!-- tables -->
            <h3 style="font-size: 28px; font-weight: 800;">Table of Events</h3>
            <hr class="mt-0 mb-4">
            <div class="card mb-4 left-to-right border-start-lg border-start-yellow" style="padding: 10px 40px 10px 40px">
                <div class="card-header"></div>
                <div class="card-body p-0">
                    <!-- Events table-->
                    @if($events->count() == 0)
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
                                        <th class="border-gray-200" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i=1;
                                    ?>
                                        @foreach ($events as $event)
                                            <tr id="event{{$event -> id}}">
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td>{{$event -> what}}</td>
                                                <td>{{$event -> who}}</td>
                                                <td>{{$requested_at  =   date('F d, Y', strtotime($event->whn))}}</td>
                                                <td>{{$time_start =  date('h:i A', strtotime($event->whn_time))}}</td>
                                                <td>{{$event -> whr}}</td>
                                                <td>{{$requested_at  =   date('F d, Y', strtotime($event->expired_at))}}</td>
                                                <td>
                                                    <?php 
                                                        switch ($event -> status) {
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
                                                    <a class="btn btn-success btn-md" href="/viewevent/{{$event->id}}"><i class="fa-solid fa-eye"></i> View</a>
                                                    <a class="btn btn-warning btn-md" href="/showevent/{{$event->id}}" data-toggle="modal" data-target="#editModal{{ $event->id }}"><i class="fas fa-edit"></i> Update</a>
                                                    <button class="btn btn-danger btn-md" onclick="deleteItem(this)" data-id="{{ $event->id }}"><i class="fas fa-trash-alt"></i> Delete</button> 
                                                </td> 
                                            </tr>
                                             <!-- edit modal -->
                                            <div id="editModal{{ $event->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                </div>
            </div>  

        <!-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'editor' );
        </script> -->
        </div>

        <!-- announcements -->

     <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });

      deleteItem(e);

    });

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
                                    'An event has been deleted successfully.',
                                    "success"
                                );
                                $("#reload").load(location.href + " #reload");
                                $("#reload2").load(location.href + " #reload2");
                                $("#event"+id+"").remove();
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
    <script src="{{ asset('assets/js/needs-validated.js') }}"></script>
</main>
<br><br><br><br>