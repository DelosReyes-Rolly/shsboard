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
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
    <div>
        <div class="container-xl">
            <hr>
            <div class="row left-to-right">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                        <div class="card-body delay-1">
                            <div class="card-header" style="font-size: 20px; font-weight: 800;">Expired Announcements</div>
                            <div class="h3" style="padding: 40px 40px 10px 40px;"><i class="fas fa-calendar-times"></i> {{ $announcements->where('status', '=', 2)->count() }} </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                    <div class="card-body delay-2">
                        <div class="card-header" style="font-size: 20px; font-weight: 800;">Active Announcements</div>
                        <div class="h3 d-flex align-items-center" style="padding: 40px 40px 10px 40px"><i class="fas fa-bullhorn"> </i> {{ $announcements->where('status', '=', 1)->count() }} </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- reports -->
        <div class="container-xl px-4 mt-4 right-to-left">
            <!-- page navigation-->
            <h3 style="font-size: 28px;"><b>Print Announcement Report</b> </h3>
            <hr class="mt-0 mb-4">
            <div class="row">
                
                    <!-- Account details card-->
                    <div class="card mb-4">
                    <div class="border-start-lg border-start-yellow">
                        <div class="card-header"></div>
                            <div class="card-body">
                                <form action="{{route('admin.downloadpdf')}}" method="POST">
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
                                        <div class="col-md-3">
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

        <form method="POST" action="/add/announcements" enctype="multipart/form-data">
            @csrf
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Create Announcement </h3>
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
                                            <input class="form-control @error('subject') is-invalid @enderror" id="inputsubject" type="text" placeholder="Enter the title" name="subject"  value="{{ old('subject') }}">
                                        </div>
                                        <!-- Form Group date-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputdate" style="font-size: 20px;"><span style="color: red">*</span> Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="inputdate" placeholder="Enter the date" name="date"  value="{{ old('date') }}">
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                             <div class="form-group">
                                                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time</label><br>
                                                <input type="time"  class="form-control" id="time" name="time" value="{{ old('time') }}">
                                            </div>
                                         </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-3">
                                                <label class="large mb-1" for="inputsender" style="font-size: 20px;"><span style="color: red">*</span> From</label>
                                                <input class="form-control @error('sender') is-invalid @enderror" id="inputsender" type="text" placeholder="Enter the sender" name="sender"  value="{{ old('sender') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="large mb-1" for="inputrecipient" style="font-size: 20px;"><span style="color: red">*</span> To</label>
                                                <input class="form-control @error('recipient') is-invalid @enderror" id="inputrecipient" type="text" placeholder="Enter the recipients" name="recipient"  value="{{ old('recipient') }}">
                                            </div>
                                            <!-- Form Group whr-->
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputlocation" style="font-size: 20px;"><span style="color: red">*</span> Location</label>
                                                <input class="form-control @error('location') is-invalid @enderror" id="inputlocation" type="text" placeholder="Enter the location" name="location"  value="{{ old('location') }}">
                                            </div>
                                            <div class="col-md-2">
                                                <br><label class="slarge mb-1" for="inputpost_expiration" style="font-size: 20px;"><span style="color: red">*</span> Post Expiration</label>
                                                <input type="date" class="form-control @error('post_expiration') is-invalid @enderror" id="inputpost_expiration" placeholder="Enter the date" name="post_expiration"  value="{{ old('post_expiration') }}">
                                            </div>
                                        </div><br/>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80">{{ old('content') }}</textarea>
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
        <br/>
        @if ($message = Session::get('approval'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <h3 style="font-size: 28px; font-weight: 800;">Table of Annoucements</h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 right-to-left border-start-lg border-start-yellow" style="padding: 10px 40px 10px 40px;">
            <div class="card-header"></div>
            <div class="card-body p-0">
                <!-- Announcements table-->
                @if($announcements->count() == 0)
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                <br>
                <div class="table-responsive table-billing-history">
                    <table id="example" class="display nowrap table-bordered table-striped table-hover" style="width:100%">
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
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td>{{$announcement -> what}}</td>
                                        <td>{{$announcement -> who}}</td>
                                        <td>{{$requested_at  =   date('F d, Y', strtotime($announcement->whn))}}</td>
                                        <td>{{$time_start =  date('h:i A', strtotime($announcement->whn_time))}}</td>
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
                                            <a class="btn btn-success btn-md" href="/viewannouncement/{{$announcement->id}}"><i class="fas fa-eye"></i> View</a>
                                            <a class="btn btn-warning btn-md" href="/showannouncement/{{$announcement->id}}"><i class="fas fa-edit"></i> Update</a>
                                            <a class="btn btn-danger btn-md" href="/deleteadminannouncement/{{$announcement->id}}"><i class="fas fa-trash-alt"></i> Delete</a>  
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