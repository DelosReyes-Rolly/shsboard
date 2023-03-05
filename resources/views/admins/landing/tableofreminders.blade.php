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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables-bootstrap-1.10.20.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables-jquery-1.12.1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables-rowreorder-1.2.8.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables-responsive-2.3.0.css') }}">
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/datatables-jquery-1.12.1.js') }}"></script>
    <script src="{{ asset('assets/js/datatables-rowreorder-1.2.8.js') }}"></script>
    <script src="{{ asset('assets/js/datatables-responsive-2.3.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-4.5.2.js') }}"></script>
    <script src="{{ asset('assets/js/needs-validated2.js') }}"></script>
    <div class="">
        <div class="px-2 mt-2">
            <hr class="mt-0 mb-4">
            <div class="px-2 mt-2">
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 2-->
                        <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                            <div class="card-body">
                                <div class="card-header" style="font-size: 20px; font-weight: 800;">Expired Private Reminders</div>
                                <div class="h3" style="padding: 40px 40px 10px 40px"><i class="fas fa-calendar-times"></i> <span id="reload2"> </span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 3-->
                        <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                            <div class="card-body">
                                <div class="card-header" style="font-size: 20px; font-weight: 800;">Active Private Reminders</div>
                                <div class="h3 d-flex align-items-center" style="padding: 40px 40px 10px 40px"><i class="fas fa-bullhorn"></i> <span id="reload"> </span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('reminder'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <!-- tables -->
            <h3 style="font-size: 28px; font-weight: 800;">Table of Private Reminders</h3>
            <hr class="mt-0 mb-4">
            <div class="card mb-4 border-start-lg border-start-yellow" style="padding: 10px 20px 10px 20px;">
                <div class="card-header"></div>
                <div class="card-body p-0">
                    <br>
                    <div class="table-responsive table-billing-history">
                        <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="border-gray-200" scope="col">#</th>
                                    <th class="border-gray-200" scope="col">Content</th>
                                    <th class="border-gray-200" scope="col">Date Posted</th>
                                    <th class="border-gray-200" scope="col">Expiry Date</th>
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
        <div class="modal fade" id="Reminder-modal-view" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-start-lg border-start-yellow">
                    <div class="modal-header">
                        <h1 class="modal-title" id="ReminderModal-view" style="font-size: 20px;">New Reminder</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label style="font-size: 20px;"><b>Date Posted: </b></label>
                                <span id="created_at-view" style="font-size: 20px;"></span><br />
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><b>Expiry date: </b></label>
                                <span id="expired_at-view" style="font-size: 20px;"></span><br />
                            </div>
                            <div class="col-md-12"><br />
                                <label style="font-size: 20px;"><b>Content: </b></label>
                                <span id="content-view" style="font-size: 20px;"></span><br />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- boostrap update model  -->
        <div class="modal fade" id="Reminder-modal-update" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-start-lg border-start-yellow">
                    <div class="modal-header">
                        <h1 class="modal-title" id="ReminderModal-update" style="font-size: 20px;">New strand</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="javascript:void(0)" id="ReminderFormUpdate" name="ReminderFormUpdate" class="form-horizontal needs-validation" novalidate method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id-update">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="whoops-update" class="alert alert-danger" style="display: none;">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <b>Whoops! There is a problem in your input</b> <br />
                                        <div id="validation-errors-update"></div>
                                    </div>
                                </div>
                                <div class="mb-3" style="color: red">
                                    * required field
                                </div>
                                <div class="col-md-12">
                                    <label class="slarge mb-1" for="expired_at" style="font-size: 20px;"><span style="color: red">*</span> Expiry date</label>
                                    <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="expired_at-update" placeholder="Enter the date" name="expired_at" required>
                                    <div class="invalid-feedback">
                                        Please input expiry date.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="large mb-1" for="editor2" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="editor2" type="text" placeholder="Enter the information" name="content" rows="10" cols="80" required maxlength="400"></textarea>
                                    <div class="invalid-feedback">
                                        Please input content.
                                    </div>
                                </div><br />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <font face="Verdana" size="2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->

        <!-- boostrap delete model  -->
        <div class="modal fade" id="Reminder-modal-delete" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-start-lg border-start-yellow">
                    <div class="modal-header">
                        <h1 class="modal-title" id="ReminderModal-Delete" style="font-size: 20px;">Delete Strand</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="javascript:void(0)" id="ReminderFormDelete" name="ReminderFormDelete" class="form-horizontal" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id-delete">
                            <p style="color: red; font-size:20px;">Are you sure you want to delete?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <font face="Verdana" size="2"><input type="submit" class="btn btn-danger btn-md" value="Delete"></font>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                $('#example').DataTable({
                    responsive: true,
                    "bInfo": false,
                    ordering: true,
                    pageLength: 10,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('/tableofreminders') }}",
                    columns: [{
                            "data": "id",
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'content',
                            name: 'content'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            "render": function(data) {
                                var date = new Date(data);
                                return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                            }
                        },
                        {
                            data: 'expired_at',
                            name: 'expired_at',
                            "render": function(data) {
                                var date = new Date(data);
                                return month[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
                            }
                        },
                        {
                            "data": "id",
                            "render": function(data, type, full, meta) {
                                if (full["status"] == 1)
                                    return '<span class="badge bg-success" style="color:#fff">Active</span>';
                                else if (full["status"] == 2)
                                    return '<span class="badge bg-danger" style="color:#fff">Expired</span>';
                                else
                                    return '<span class="badge bg-secondary" style="color:#fff">Undetermined</span>';
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        },
                    ],
                    order: [
                        [0, 'desc']
                    ]
                });

                $.ajax({
                    type: "POST",
                    url: "{{ url('/countprivatereminder') }}",
                    dataType: 'json',
                    success: function(res) {
                        document.getElementById('reload').innerHTML = res.active;
                        document.getElementById('reload2').innerHTML = res.expired;
                    }
                });
            });

            function viewFunc(id) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('/viewreminder') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#ReminderModal-view').html("View Reminder");
                        $('#Reminder-modal-view').modal('show');
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

            function editFunc(id) {
                $('#ReminderFormUpdate').trigger("reset").removeClass('was-validated');
                document.getElementById('whoops-update').style.display = 'none';
                $.ajax({
                    type: "POST",
                    url: "{{ url('/showreminder') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#ReminderModal-update').html("Edit Reminder");
                        $('#Reminder-modal-update').modal('show');
                        $('#id-update').val(res.id);
                        $('#expired_at-update').val(res.expired_at);
                        $('#editor2').val(res.content);
                    }
                });
            }

            function deleteFunc(id) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('/deleteannouncement') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#ReminderModal-Delete').html("Delete Reminder");
                        $('#Reminder-modal-delete').modal('show');
                        $('#id-delete').val(res.id);
                    }
                });
            }


            $('#ReminderFormUpdate').submit(function(e) {
                e.preventDefault();
                if ($('#ReminderFormUpdate')[0].checkValidity() === false) {
                    e.stopPropagation();
                } else {
                    var formData = new FormData(this);
                    $(":submit").attr("disabled", true);
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/updatereminder')}}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $("#Reminder-modal-update").modal('hide');
                            var oTable = $('#example').dataTable();
                            oTable.fnDraw(false);
                            $("#btn-save").html('Submit');
                            $("#btn-save").attr("disabled", false);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success.',
                                text: 'Reminder has been updated successfully',
                            });
                            $(":submit").removeAttr("disabled");
                        },
                        complete: function() {
                            $.ajax({
                                type: "POST",
                                url: "{{ url('/countprivatereminder') }}",
                                dataType: 'json',
                                success: function(res) {
                                    document.getElementById('reload').innerHTML = res.active;
                                    document.getElementById('reload2').innerHTML = res.expired;
                                }
                            });
                        },
                        error: function(xhr) {
                            $('#validation-errors-update').html('');
                            document.getElementById('whoops-update').style.display = 'block';
                            if (xhr.responseJSON.error != undefined) {
                                $("#validation-errors-update").html("");
                                $('#validation-errors-update').append('&emsp;<li>' + xhr.responseJSON.error + '</li>');
                            }
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('#validation-errors-update').append('&emsp;<li>' + value + '</li>');
                            });
                            $(":submit").removeAttr("disabled");
                        }
                    });
                }
                $('#ReminderFormUpdate').addClass('was-validated');

            });

            $('#ReminderFormDelete').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/announcement/delete')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#Reminder-modal-delete").modal('hide');
                        var oTable = $('#example').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Reminder has been deleted successfully',
                        });
                    },
                    complete: function() {
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/countprivatereminder') }}",
                            dataType: 'json',
                            success: function(res) {
                                document.getElementById('reload').innerHTML = res.active;
                                document.getElementById('reload2').innerHTML = res.expired;
                            }
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        </script>
</main>
<br><br><br><br>