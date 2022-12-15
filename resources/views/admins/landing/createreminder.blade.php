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
                        <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                            <div class="card-body">
                                <div class="card-header" style="font-size: 20px; font-weight: 800;">Expired Reminders</div>
                                <div class="h3" style="padding: 40px 40px 10px 40px"><i class="far fa-calendar-times"></i> {{ $reminders->where('status', '=', 2)->count() }}</div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                        <div class="card-body">
                            <div class="card-header" style="font-size: 20px; font-weight: 800;">Active Reminders</div>
                            <div class="h3 d-flex align-items-center" style="padding: 40px 40px 10px 40px"><i class="fas fa-bullhorn"></i> {{ $reminders->where('status', '=', 1)->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>


            <form method="POST" action="{{ route('reminder.store') }}">
                @csrf
                <div class="container-xl px-4 mt-4 right-to-left">
                    <!-- page navigation-->
                    <h3 style="font-size: 28px; font-weight: 800;">Create Reminder </h3>
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card border-start-lg border-start-yellow">
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
                                        <div class="">
                                        <div class="mb-3" style="color: red">
                                            * required field
                                        </div>
                                            <!-- Form Group (content)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                                <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80">{{ old('content') }}</textarea>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Expiry Date</label>
                                                    <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{ old('expired_at') }}">
                                                </div>
                                            </div><br/>
                                            <!-- Save changes button-->
                                            <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </form>

            @if ($message = Session::get('reminder'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <!-- tables -->
            <h3 style="font-size: 28px; font-weight: 800;">Table of Reminders </h3>
            <hr class="mt-0 mb-4">
            <div class="card mb-4 left-to-right border-start-lg border-start-yellow" style="padding: 10px 40px 10px 40px">
                <div class="card-header"></div>
                <div class="card-body p-0" style="padding: 10px 40px 100px 40px">
                    <!-- Events table-->
                    @if($reminders->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				    @else 
                        <br>
                        <div class="table-responsive table-billing-history">
                            <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="border-gray-200" scope="col">#</th>
                                        <th class="border-gray-200" scope="col">Content</th>
                                        <th class="border-gray-200" scope="col">Date Posted</th>
                                        <th class="border-gray-200" scope="col">Expiry Date</th>
                                        <th class="border-gray-200" scope="col">Status</th>
                                        <th class="border-gray-200" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i=1;
                                    ?>
                                        @foreach ($reminders as $reminder)
                                            <tr>
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td>{!!$reminder -> content!!}</td>
                                                <td>{{$requested_at  =   date('F d, Y', strtotime($reminder->created_at))}}</td>
                                                <td>{{$requested_at  =   date('F d, Y', strtotime($reminder->expired_at))}}</td>
                                                <td>
                                                    <?php 
                                                        switch ($reminder -> status) {
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
                                                    <a class="btn btn-success btn-md" href="/viewreminder/{{$reminder->id}}"><i class="fas fa-eye"></i> View</a>
                                                    <a class="btn btn-warning btn-md" href="/showreminder/{{$reminder->id}}"><i class="fas fa-edit"></i> Update</a>
                                                    <a class="btn btn-danger btn-md" href="/deleteadminannouncement/{{$reminder->id}}"><i class="far fa-trash-alt"></i> Delete</a>  
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



        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'editor' );
        </script>

     <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

</main>
<br><br><br><br>