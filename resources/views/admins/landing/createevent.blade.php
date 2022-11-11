@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
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
    <div>
            <!-- boxes -->
            <div class="container-xl px-4 mt-4 left-to-right">
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 2-->
                        <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white;" >
                            <div class="card-body">
                                <div class="card-header">Expired Events</div>
                                <div class="h3" style="padding: 0px 40px 10px 40px"><i class="far fa-calendar-times"></i> {{ $events->where('status', '=', 2)->count() }}</div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white;">
                        <div class="card-body">
                            <div class="card-header">Active Events</div>
                            <div class="h3 d-flex align-items-center" style="padding: 0px 40px 10px 40px"><i class="fas fa-bullhorn"></i> {{ $events->where('status', '=', 1)->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>

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

            <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="container-xl px-4 mt-4 right-to-left">
                    <!-- page navigation-->
                    <h3 style="font-size: 20px;">Create Event </h3>
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card border-start-lg border-start-yellow">
                                    <div class="card-header"></div>
                                    <div class="card-body" style="padding: 10px 40px 100px 40px">
                                        <div class="mb-3">
                                                
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (title)-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputwhat">What</label>
                                                <input class="form-control @error('what') is-invalid @enderror" id="inputwhat" type="text" placeholder="Enter the title" name="what"  value="{{ old('what') }}">
                                            </div>
                                            <!-- Form Group date-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputwho">Who</label>
                                                <input class="form-control @error('who') is-invalid @enderror" id="inputwho" type="text" placeholder="Enter the receipients" name="who"  value="{{ old('who') }}">
                                            </div>
                                        </div><br/>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                                <div class="col-md-2">
                                                    <label class="small mb-1" for="inputwhn">When</label>
                                                    <input type="date" class="form-control @error('whn') is-invalid @enderror" id="inputwhn" placeholder="Enter the date" name="whn"  value="{{ old('whn') }}">
                                                </div>
                                                <!-- Form Group (content)-->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="appt">Select a time:</label><br>
                                                        <input type="time" id="whn_time" name="whn_time" value="{{ old('whn_time') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="small mb-1" for="inputexpired_at">Expired at</label>
                                                    <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{ old('expired_at') }}">
                                                </div>
                                                <!-- Form Group (location)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputwhr">Where</label>
                                                    <input class="form-control @error('whr') is-invalid @enderror" id="inputwhr" type="text" placeholder="Enter the location" name="whr"  value="{{ old('whr') }}">
                                                </div>
                                            </div><br/>
                                            <!-- Form Group (content)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="editor">Content</label>
                                                <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content" rows="10" cols="80">{{ old('content') }}</textarea>
                                            </div><br/>
                                            <!-- Form Group (img)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1">Image (Only png and jpg files are allowed)</label>
                                                <div class ="form-group row">
                                                    <div class="col-md-8"></div>
                                                    <input type="file" name = "image" class="form-control">
                                                </div> 
                                            </div>
                                            <!-- Save changes button-->
                                            <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit" style="float: right;"></font>
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
            <h3 style="font-size: 20px;">Table of Events</h3>
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
                                        <th class="border-gray-200" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i=1;
                                    ?>
                                        @foreach ($events as $event)
                                            <tr>
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
                                                    <a class="btn btn-success btn-sm" href="/viewevent/{{$event->id}}"><i class="fas fa-eye"></i> View</a>
                                                    <a class="btn btn-warning btn-sm" href="/showevent/{{$event->id}}"><i class="fas fa-edit"></i> Update</a>
                                                    <a class="btn btn-danger btn-sm" href="/deleteadminannouncement/{{$event->id}}"><i class="far fa-trash-alt"></i> Delete</a>  
                                                </td> 
                                            </tr>
                                        @endforeach 
                                </tbody>
                            </table>  
                        </div>
                    @endif
                </div>
            </div>  

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'editor' );
        </script>
        </div>

        <!-- announcements -->

     <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
</main>
<br><br><br><br>