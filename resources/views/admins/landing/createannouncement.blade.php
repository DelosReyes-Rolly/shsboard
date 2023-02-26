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

	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-jquery-1.12.1.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-rowreorder-1.2.8.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-responsive-2.3.0.css') }}">
	<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-jquery-1.12.1.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-rowreorder-1.2.8.js') }}"></script>
	<script src="{{ asset('assets/js/datatables-responsive-2.3.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div>
        <div class="container-xl">
            <hr>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                        <div class="card-body delay-1">
                            <div class="card-header" style="font-size: 22px; font-weight: 800;">Expired Announcements</div>
                            <div class="h3" style="padding: 40px 40px 10px 40px; font-size: 40px;"><i class="fas fa-calendar-times"></i> <span id="reload">{{ $announcements->where('status', '=', 2)->count() }}</span> </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                    <div class="card-body delay-2">
                        <div class="card-header" style="font-size: 22px; font-weight: 800;">Active Announcements</div>
                        <div class="h3 d-flex align-items-center" style="padding: 40px 40px 10px 40px; font-size: 40px;"><i class="fas fa-bullhorn"> </i> <span id="reload2">{{ $announcements->where('status', '=', 1)->count() }}</span> </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- reports -->
        <div class="px-2 mt-2">
            <!-- page navigation-->
            <h3 style="font-size: 24px;"><b>Print Announcement Report</b> </h3>
            <hr class="mt-0 mb-4">
            <div class="row">
                
                    <!-- Account details card-->
                    <div class="card mb-4">
                    <div class="border-start-lg border-start-yellow">
                        <div class="card-header"></div>
                            <div class="card-body">
                                <form action="{{route('admin.downloadpdf')}}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <b style="font-size:20px;">From:</b>
                                            <input style="font-size:20px;" type="date" name="dateFrom" class="form-control" value="<?php echo date('Y-m-d'); ?>" /><br/>
                                            <div class="invalid-feedback">
                                                Please input 'from' date.
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <b style="font-size:20px;">To:</b>
                                            <input style="font-size:20px;" type="date" name="dateTo" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                                            <div class="invalid-feedback">
                                                Please input 'to' date.
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br/>
                                            <input style="font-size:20px;" type="submit" name="submit" class="btn btn-primary" value="Print"/></input>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>      

        <form method="POST" id="addAnnouncement" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="px-2 mt-2">
                <!-- page navigation-->
                <h3 style="font-size: 24px; font-weight: 800;">Create Announcement </h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="border-start-lg border-start-yellow">
                                <div class="card-header">
                                    <!-- form -->
                                    <div id="whoops" class="alert alert-danger" style="display: none;">
                                        <b>Whoops! There is a problem in your input</b> <br/>
                                        <div id="validation-errors"></div>
                                    </div>
                                    <center><div id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
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
                                            <input style="font-size:20px;" class="form-control @error('subject') is-invalid @enderror" id="inputsubject" type="text" placeholder="Enter the title" name="subject"  value="{{ old('subject') }}" required>
                                            <div class="invalid-feedback">
                                                Please input subject.
                                            </div>
                                        </div>
                                        <!-- Form Group date-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputdate" style="font-size: 20px;"><span style="color: red">*</span> Date</label>
                                            <input style="font-size:20px;" type="date" class="form-control @error('date') is-invalid @enderror" id="inputdate" placeholder="Enter the date" name="date"  value="{{ old('date') }}" required>
                                            <div class="invalid-feedback">
                                                Please input date.
                                            </div>
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                             <div class="form-group">
                                                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time</label><br>
                                                <input style="font-size:20px;" type="time"  class="form-control" id="time" name="time" value="{{ old('time') }}" required>
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
                                                <input style="font-size:20px;" class="form-control @error('sender') is-invalid @enderror" id="inputsender" type="text" placeholder="Enter the sender" name="sender"  value="{{ old('sender') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input sender.
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="large mb-1" for="inputrecipient" style="font-size: 20px;"><span style="color: red">*</span> To</label>
                                                <input style="font-size:20px;" class="form-control @error('recipient') is-invalid @enderror" id="inputrecipient" type="text" placeholder="Enter the recipients" name="recipient"  value="{{ old('recipient') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input recipient.
                                                </div>
                                            </div>
                                            <!-- Form Group whr-->
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputlocation" style="font-size: 20px;"><span style="color: red">*</span> Location</label>
                                                <input style="font-size:20px;" class="form-control @error('location') is-invalid @enderror" id="inputlocation" type="text" placeholder="Enter the location" name="location"  value="{{ old('location') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input location.
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <br><label class="slarge mb-1" for="inputpost_expiration" style="font-size: 20px;"><span style="color: red">*</span> Post Expiration</label>
                                                <input style="font-size:20px;" type="date" class="form-control @error('post_expiration') is-invalid @enderror" id="inputpost_expiration" placeholder="Enter the date" name="post_expiration"  value="{{ old('post_expiration') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input expiry date.
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="contents" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                            <textarea class="form-control @error('contents') is-invalid @enderror" id="contents" type="text" placeholder="Enter the information" name="contents"  rows="10" cols="80" required>{{ old('content') }}</textarea>
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
                                                    <input style="font-size:20px;" type="file" name = "image" class="form-control">
                                                </div> 
                                            </div>
                                            <!-- Save changes button-->
                                        </div>
                                        <font face = "Verdana"  style="font-size:20px;"><input type="submit" class="btn btn-primary" value="Submit"></font>
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
        <h3 style="font-size: 24px; font-weight: 800;">Table of Annoucements</h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 right-to-left border-start-lg border-start-yellow" style="padding: 10px 20px 10px 20px;">
            <div class="card-header"></div>
            <div class="card-body p-0">
                <!-- Announcements table-->
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
                    </table>
                </div>
            </div>
        </div>  
    </div>

    <!-- boostrap view model  -->
    <div class="modal fade" id="Announcement-modal-view" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="AnnouncementModal-view" style="font-size: 20px;">New Announcement</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                    </div>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- boostrap update model  -->
    <div class="modal fade" id="Announcement-modal-update" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="AnnouncementModal-update" style="font-size: 20px;">New strand</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="AnnouncementFormUpdate" name="AnnouncementFormUpdate" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-update">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="whoops-update" class="alert alert-danger" style="display: none;">
                                    <b>Whoops! There is a problem in your input</b> <br/>
                                    <div id="validation-errors-update"></div>
                                </div>
                            </div>
                            <div class="mb-3" style="color: red">
                                * required field
                            </div>
                            <div class="col-md-12">
                                <label class="large mb-1" for="what" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                                <input id="what-update" style="font-size: 18px;" class="form-control @error('subject') is-invalid @enderror" type="text" placeholder="Enter the title" name="what"  required>
                                <div class="invalid-feedback">
                                    Please input subject.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>
                                <label class="slarge mb-1" for="whn" style="font-size: 20px;"><span style="color: red">*</span> Date</label>
                                <input id="whn-update" style="font-size: 18px;" type="date" class="form-control @error('date') is-invalid @enderror" placeholder="Enter the date" name="whn" required>
                                <div class="invalid-feedback">
                                    Please input date.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>
                                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time:</label><br>
                                <input id="whn_time-update" style="font-size: 18px;" style="font-size: 18px;" type="time" class="form-control" name="whn_time" required>
                                <div class="invalid-feedback">
                                    Please input time.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>
                                <label class="large mb-1" for="sender" style="font-size: 20px;"><span style="color: red">*</span> From</label>
                                <input id="sender-update" style="font-size: 18px;" class="form-control @error('sender') is-invalid @enderror" type="text" placeholder="Enter the sender" name="sender"  required>
                                <div class="invalid-feedback">
                                    Please input recipient.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>
                                <label class="large mb-1" for="recipient" style="font-size: 20px;"><span style="color: red">*</span> To</label>
                                <input id="who-update" style="font-size: 18px;" class="form-control @error('recipient') is-invalid @enderror" type="text" placeholder="Enter the recipients" name="who"  required>
                                <div class="invalid-feedback">
                                    Please input sender.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>
                                <label class="large mb-1" for="location" style="font-size: 20px;"><span style="color: red">*</span> Location</label>
                                <input id="whr-update" style="font-size: 18px;" class="form-control @error('location') is-invalid @enderror" type="text" placeholder="Enter the location" name="whr" required>
                                <div class="invalid-feedback">
                                    Please input location.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>
                                <label class="slarge mb-1" for="expired_at" style="font-size: 20px;"><span style="color: red">*</span> Expired at</label>
                                <input id="expired_at-update" style="font-size: 18px;" type="date" class="form-control @error('post_expiration') is-invalid @enderror" placeholder="Enter the date" name="expired_at" required>
                                <div class="invalid-feedback">
                                    Please input expiry date.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>
                                <label class="large mb-1" for="editor2" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                <textarea id="editor2-update" class="form-control @error('editor2') is-invalid @enderror" type="text" placeholder="Enter the information" name="editor2" rows="10" cols="80" required></textarea>
                                <div class="invalid-feedback">
                                    Please input content.
                                </div>
                            </div><br/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->

    <!-- boostrap delete model  -->
    <div class="modal fade" id="Announcement-modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="AnnouncementModal-Delete" style="font-size: 20px;">Delete Strand</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="AnnouncementFormDelete" name="AnnouncementFormDelete" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-delete">
                        <p style="color: red; font-size:20px;">Are you sure you want to delete?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-danger btn-md" value="Delete"></font>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->


    <script type="text/javascript">
        $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        $('#example').DataTable({
            responsive: true,
            "bInfo" : false,
            ordering : true,
            pageLength : 10,
            processing: true,
            serverSide: true,
            ajax: "{{ url('/createAnnouncement') }}",
            columns: [
            {
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'content', name: 'content' },
            { data: 'who', name: 'who' },
            { data: 'whn', name: 'whn',
                "render": function (data) {
                    var date = new Date(data);
                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                }
            },
            { data: 'whn_time', name: 'whn_time'},
            { data: 'whr', name: 'whr' },
            { data: 'expired_at', name: 'expires_at',
                "render": function (data) {
                    var date = new Date(data);
                    return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                }
            },
            {
                "data": "id",
                "render": function(data, type, full, meta){
                    if(full["status"] == 1)
                        return '<span class="badge bg-success" style="color:#fff">Active</span>';
                    else if(full["status"] == 2)
                        return '<span class="badge bg-danger" style="color:#fff">Expired</span>';
                    else
                        return '<span class="badge bg-secondary" style="color:#fff">Undetermined</span>';
                }
            },
            { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });
    });

    function viewFunc(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/viewannouncement') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#AnnouncementModal-view').html("View Announcement");
                $('#Announcement-modal-view').modal('show');
                var created = new Date(res.created_at);
                var created = month[created.getMonth()] + " " + created.getDate() + ", " + created.getFullYear();
                document.getElementById('created_at-view').innerHTML = created;
                var expired = new Date(res.expired_at);
                var expired = month[expired.getMonth()] + " " + expired.getDate() + ", " + expired.getFullYear();
                document.getElementById('expired_at-view').innerHTML = expired;
                document.getElementById('content-view').innerHTML = res.content;
            }
        });
    } 

    function editFunc(id){
        document.getElementById('whoops-update').style.display = 'none';
        $.ajax({
            type:"POST",
            url: "{{ url('/showannouncement') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#AnnouncementModal-update').html("Edit Announcement");
                $('#Announcement-modal-update').modal('show');
                $('#id-update').val(res.id);
                $('#expired_at-update').val(res.expired_at);
                $('#what-update').val(res.what);
                $('#whn-update').val(res.whn);
                $('#whn_time-update').val(res.whn_time);
                $('#sender-update').val(res.sender);
                $('#who-update').val(res.who);
                $('#whr-update').val(res.whr);
                $('#expired_ar-update').val(res.expired_at);
                $('#editor2-update').val(res.content);
            }
        });
    } 

    function deleteFunc(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/deleteannouncement') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#AnnouncementModal-Delete').html("Delete Announcement");
                $('#Announcement-modal-delete').modal('show');
                $('#id-delete').val(res.id);
            }
        });
    }


    $('#AnnouncementFormUpdate').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/updateannouncement')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Announcement-modal-update").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Announcement has been updated successfully',                      
                });
                $(":submit").removeAttr("disabled");
            },
            error: function(xhr){
                $('#validation-errors-update').html('');
                document.getElementById('whoops-update').style.display = 'block';
                if(xhr.responseJSON.error != undefined){
                    $("#validation-errors-update").html("");
                    $('#validation-errors-update').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                }
                $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#validation-errors-update').append('&emsp;<li>'+value+'</li>');
                }); 
                $(":submit").removeAttr("disabled");
            }
        });
    });

    $('#AnnouncementFormDelete').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('/announcement/delete')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Announcement-modal-delete").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Announcement has been deleted successfully',                      
                });
            },
            error: function(data){
                console.log(data);
            }
        });
    });
    </script>
    <script src="{{ asset('assets/js/needs-validated.js') }}"></script>
    <script>
        var $loading = $('#loadingDiv').hide();
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form = $('#addAnnouncement')[0];
            var form_data =  new FormData(form);
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('add.publicannouncement') }}",
                data:form_data,
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response) {
                        $("#addAnnouncement")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Announcement has been added successfully',
                        }).then(function() {
                            location.reload(true);
                        })
                        
                    }
                },error: function (xhr) {
                    $('#validation-errors').html('');
                    document.getElementById('whoops').style.display = 'block';
                    if(xhr.responseJSON.error != undefined){
                        $("#validation-errors").html("");
                        $('#validation-errors').append('&emsp;<li>'+xhr.responseJSON.error+'</li>');
                    }
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('&emsp;<li>'+value+'</li>');
                    }); 
                    $(":submit").removeAttr("disabled");
                },
            }).ajaxStop(function () {
                $loading.hide();
            });
        }
</script>
</main>
<br><br><br><br>