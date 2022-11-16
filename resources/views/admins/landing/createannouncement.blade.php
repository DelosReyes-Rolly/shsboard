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
        <div class="container-xl">
            <hr>
            <div class="row left-to-right">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white;" >
                        <div class="card-body delay-1">
                            <div class="card-header" style="font-size: 20px; font-weight: 800;">Expired Announcements</div>
                            <div class="h3" style="padding: 40px 40px 10px 40px;"><i class="fas fa-calendar-times"></i> {{ $announcements->where('status', '=', 2)->count() }} </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white;">
                    <div class="card-body delay-2">
                        <div class="card-header" style="font-size: 20px; font-weight: 800;">Active Annoucements</div>
                        <div class="h3 d-flex align-items-center" style="padding: 40px 40px 10px 40px"><i class="fas fa-bullhorn"> </i> {{ $announcements->where('status', '=', 1)->count() }} </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- reports -->
        <div class="container-xl px-4 mt-4 right-to-left">
            <!-- page navigation-->
            <h3 style="font-size: 20px;"><b>Print Announcement Report</b> </h3>
            <hr class="mt-0 mb-4">
            <div class="row">
                
                    <!-- Account details card-->
                    <div class="card mb-4">
                    <div class="card border-start-lg border-start-yellow">
                        <div class="card-header"></div>
                            <div class="card-body">
                                <form action="{{route('admin.downloadpdf')}}" method="POST">
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

        <form method="POST" action="/add/announcements" enctype="multipart/form-data">
            @csrf
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Create Announcement </h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwhat" style="font-size: 20px;">What</label>
                                            <input class="form-control @error('what') is-invalid @enderror" id="inputwhat" type="text" placeholder="Enter the title" name="what"  value="{{ old('what') }}">
                                        </div>
                                        <!-- Form Group date-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwho" style="font-size: 20px;">Who</label>
                                            <input class="form-control @error('who') is-invalid @enderror" id="inputwho" type="text" placeholder="Enter the receipients" name="who"  value="{{ old('who') }}">
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-2">
                                                <label class="slarge mb-1" for="inputwhn" style="font-size: 20px;">When</label>
                                                <input type="date" class="form-control @error('whn') is-invalid @enderror" id="inputwhn" placeholder="Enter the date" name="whn"  value="{{ old('whn') }}">
                                            </div>
                                            <!-- Form Group (content)-->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="appt" style="font-size: 20px;">Select a time:</label><br>
                                                    <input type="time" id="whn_time" name="whn_time" value="{{ old('whn_time') }}">
                                                </div>
                                            </div>
                                            <!-- Form Group whr-->
                                            <div class="col-md-2">
                                                <label class="slarge mb-1" for="inputexpired_at" style="font-size: 20px;">Expired at</label>
                                                <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{ old('expired_at') }}">
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputwhr" style="font-size: 20px;">Where</label>
                                                <input class="form-control @error('whr') is-invalid @enderror" id="inputwhr" type="text" placeholder="Enter the location" name="whr"  value="{{ old('whr') }}">
                                            </div>
                                        </div><br/>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 20px;">Content</label>
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
                                            <a class="btn btn-danger btn-md" href="/deleteadminannouncement/{{$announcement->id}}"><i class="far fa-trash-alt"></i> Delete</a>  
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