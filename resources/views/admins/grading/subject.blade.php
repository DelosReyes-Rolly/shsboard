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
<!-- reports -->
<div class="">
        @if ($message = Session::get('message'))    
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div></br></br>
        @endif
        <h3 style="font-size: 28px; font-weight: 800;">Table of Subjects </h3>
        <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
            <div class="card-header" style="background-color: #ffffff;">
                <a class="btn btn-primary" style="float: right;" onClick="add()" href="javascript:void(0)"><i class="fas fa-user-plus"></i> Add Record</a>
            </div>
            <div class="card-body p-0">
                <!-- table-->
                    <br>
                    <div class="table-responsive table-billing-history">
                        <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="border-gray-200" scope="col">#</th>
                                    <th class="border-gray-200" scope="col">Subject Code</th>
                                    <th class="border-gray-200" scope="col">Subject Name</th>
                                    <th class="border-gray-200" scope="col">Expertise Needed</th>
                                    <th class="border-gray-200" scope="col">Description</th>
                                    <th class="border-gray-200" scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>  
    </div>


    <!-- boostrap view model  -->
    <div class="modal fade" id="Subject-modal-view" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SubjectModal-view" style="font-size: 20px;">New Subject</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label style="font-size: 20px;"><b>Subject Code: </b></label>
                            <span id="subjectcode-view" style="font-size: 20px;"></span><br/>
                        </div>
                        <div class="col-md-12">
                            <label style="font-size: 20px;"><b>Subject Name: </b></label>
                            <span id="subjectname-view" style="font-size: 20px;"></span><br/>
                        </div>
                        <div class="col-md-12">
                            <label style="font-size: 20px;"><b>Description: </b></label>
                            <span id="description-view" style="font-size: 20px;"></span><br/>
                        </div>
                    </div>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- boostrap add model -->
    <div class="modal fade" id="Subject-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SubjectModal" style="font-size: 20px;">New Subject</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="SubjectForm" name="SubjectForm" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="whoops" class="alert alert-danger" style="display: none;">
                                    <b>Whoops! There is a problem in your input</b> <br/>
                                    <div id="validation-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label style="font-size: 20px;"><span style="color: red">*</span> Subject Code</label>
                                <input id="subjectcode" type="text" name="subjectcode" class="form-control @error('subjectcode') is-invalid @enderror" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid subject code.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>
                                <label style="font-size: 20px;"><span style="color: red">*</span> Subject Name</label>
                                <input id="subjectname" type="text" name="subjectname" class="form-control @error('subjectname') is-invalid @enderror" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid subject name.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>
                                <label style="font-size: 20px;"><span style="color: red">*</span> Description</label>
                                <textarea id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" style="font-size: 18px;" required></textarea>
                                <div class="invalid-feedback">
                                    Please input valid description.
                                </div>
                            </div>
                            <div class="col-md-12"><br/>                              
                                <label for="expertise_id" class="col-form-label text-md-end" style="font-size: 20px;"><span style="color: red">*</span>  {{ __('Expertise Needed') }}</label>
                                <select id="expertise_id" name="expertise_id" id="expertise_id" class="form-control" required>
                                    <option value="" {{old('expertise_id') == "" ?'selected' : ''}} disabled> Please Select Expertise Needed </option>
                                    @foreach($expertises as $expertise_id)
                                        <option value="{{$expertise_id->id}}">{{$expertise_id->expertise}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please input expertise.
                                </div>
                            </div>
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

    <!-- boostrap update model  -->
    <div class="modal fade" id="Subject-modal-update" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SubjectModal-update" style="font-size: 20px;">New Subject</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="SubjectFormUpdate" name="SubjectFormUpdate" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-update">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="whoops-update" class="alert alert-danger" style="display: none;">
                                    <b>Whoops! There is a problem in your input</b> <br/>
                                    <div id="validation-errors-update"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label style="font-size: 20px;"><span style="color: red">*</span> Subject Code</label>
                                <input id="subjectcode-update" type="text" name="subjectcode" class="form-control @error('subjectcode') is-invalid @enderror" style="font-size: 18px;" required>
                                <div class="invalid-feedback"> 
                                    Please input valid subject code.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label style="font-size: 20px;"><span style="color: red">*</span> Subject Name</label>
                                <input id="subjectname-update" type="text" name="subjectname" class="form-control @error('subjectname') is-invalid @enderror" style="font-size: 18px;" required>
                                <div class="invalid-feedback">
                                    Please input valid subject name.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label style="font-size: 20px;"><span style="color: red">*</span> Description</label>
                                <textarea id="description-update" type="text" name="description" id="editor" class="form-control @error('description') is-invalid @enderror" style="font-size: 18px;" required></textarea>
                                <div class="invalid-feedback">
                                    Please input valid description.
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="expertise_id" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                                <select id="expertise-update" name="expertise_id" class="form-control" required>
                                    <option value="" {{old('expertise_id') == "" ?'selected' : ''}} disabled> Please Select Expertise Needed </option>
                                    @foreach($expertises as $expertise_id)
                                        <option value="{{$expertise_id->id}}">{{$expertise_id->expertise}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please choose expertise.
                                </div>
                            </div>
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
    <div class="modal fade" id="Subject-modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-start-lg border-start-yellow">
                <div class="modal-header">
                    <h1 class="modal-title" id="SubjectModalDelete" style="font-size: 20px;">Delete Strand</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="SubjectFormDelete" name="SubjectFormDelete" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-delete">
                        <p style="color: red; font-size:20px;">Are you sure you want to delete <span id="subject-delete"></span>?</p>
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
        $('#example').DataTable({
            responsive: true,
            "bInfo" : false,
            ordering : true,
            pageLength : 10,
            processing: true,
            serverSide: true,
            ajax: "{{ url('/gradingsubjects') }}",
            columns: [
            {
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'subjectcode', name: 'subjectcode' },
            { data: 'subjectname', name: 'subjectname' },
            { data: 'expertise', name: 'expertise' },
            { data: 'description', name: 'description' },
            { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });
    });

    function add(){
        
        $('#SubjectForm').trigger("reset");
        document.getElementById('whoops').style.display = 'none';
        $('#SubjectModal').html("Add Subject");
        $('#Subject-modal').modal('show');
        $('#id').val('');
    }   

    function viewFunc(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/viewsubject') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#SubjectModal-view').html("View Subject");
                $('#Subject-modal-view').modal('show');
                document.getElementById('subjectcode-view').innerHTML = res.subjectcode;
                document.getElementById('subjectname-view').innerHTML = res.subjectname;
                document.getElementById('description-view').innerHTML = res.description;
            }
        });
        $('#Course-modal-view').on('hide.bs.modal', () =>{
            $('#video' + id).attr('src', $("#video" + id).attr("src"));
        });
    } 

    function editFunc(id){
        document.getElementById('whoops-update').style.display = 'none';
        $.ajax({
            type:"POST",
            url: "{{ url('/showsubject') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#SubjectModal-update').html("Edit Subject");
                $('#Subject-modal-update').modal('show');
                $('#id-update').val(res.id);
                $('#subjectcode-update').val(res.subjectcode);
                $('#subjectname-update').val(res.subjectname);
                $('#description-update').val(res.description);
                $('#expertise-update').val(res.expertise);
            }
        });
    } 

    function deleteFunc(id){
        $.ajax({
            type:"POST",
            url: "{{ url('/deletesubject') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#Subject-modal-delete').modal('show');
                $('#id-delete').val(res.id);
                document.getElementById('subject-delete').innerHTML = res.subjectname;
            }
        });
    }

    $('#SubjectForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/add/subject')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Subject-modal").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Subject has been added successfully',                      
                });
                $(":submit").removeAttr("disabled");
            },
            error: function(xhr){
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
            }
        });
    });

    $('#SubjectFormUpdate').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(":submit").attr("disabled", true);
        $.ajax({
            type:'POST',
            url: "{{ url('/updatesubject')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Subject-modal-update").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Subject has been updated successfully',                      
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

    $('#SubjectFormDelete').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('/subject/delete')}}/",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#Subject-modal-delete").modal('hide');
                var oTable = $('#example').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                Swal.fire({                                                            
                    icon: 'success',                                                  
                    title: 'Success.',                                               
                    text: 'Subject has been deleted successfully',                      
                });
            },
            error: function(data){
                console.log(data);
            }
        });
    });
    </script>

</main>
<br><br><br><br>