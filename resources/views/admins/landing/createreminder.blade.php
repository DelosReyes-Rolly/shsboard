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
            <div class="px-2 mt-2">
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 2-->
                        <div class="card h-100 border-start-lg border-start-secondary" style="background-color: red; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);" >
                            <div class="card-body">
                                <div class="card-header" style="font-size: 22px; font-weight: 800;">Expired Reminders</div>
                                <div class="h3" style="padding: 40px 40px 10px 40px; font-size: 40px;"><i class="fas fa-calendar-times"></i> <span id="reload">{{ $reminders->where('status', '=', 2)->count() }}</span></div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success" style="background-color: green; color: white; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                        <div class="card-body">
                            <div class="card-header" style="font-size: 22px; font-weight: 800;">Active Reminders</div>
                            <div class="h3 d-flex align-items-center" style="padding: 40px 40px 10px 40px; font-size: 40px;"><i class="fas fa-bullhorn"></i> <span id="reload2">{{ $reminders->where('status', '=', 1)->count() }}</span></div>
                        </div>
                    </div>
                </div>
            </div>


            <form method="POST" id="createReminder" class="needs-validation" novalidate>
                @csrf
                <div class="px-2 mt-2">
                    <!-- page navigation-->
                    <h3 style="font-size: 28px; font-weight: 800;">Create Reminder </h3>
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card border-start-lg border-start-yellow">
                                    <div class="card-header">
                                        <!-- form -->
                                        <div id="whoops" class="alert alert-danger" style="display: none;">
                                            <b>Whoops! There is a problem in your input</b> <br/>
                                            <div id="validation-errors"></div>
                                        </div>
                                        <center><div hidden id="loadingDiv" style="color: red; font-weight: bold;"><div class="lds-hourglass"></div><br/> <div style="font-size: 20px;">Processing. Please wait...</div></div></center>
                                    </div>
                                    <div class="card-body" style="padding: 10px 40px 10px 40px">
                                        <div class="">
                                        <div class="mb-3" style="color: red">
                                            * required field
                                        </div>
                                            <!-- Form Group (content)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="contents" style="font-size: 24px;"><span style="color: red">*</span> Content</label>
                                                <textarea style="font-size:24px;" class="form-control @error('contents') is-invalid @enderror" id="contents" type="text" placeholder="Enter the information" name="contents" required>{{ old('content') }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please input content.
                                                </div>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="expired_at" style="font-size: 24px;"><span style="color: red">*</span> Expiry Date</label>
                                                    <input style="font-size:24px;" type="date" class="form-control @error('expired_at') is-invalid @enderror" id="expired_at" placeholder="Enter the date" name="expired_at"  value="{{ old('expired_at') }}" required>
                                                    <div class="invalid-feedback">
                                                        Please input expiry date.
                                                    </div>
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
            <div class="card mb-4 border-start-lg border-start-yellow" style="padding: 10px 40px 10px 40px">
                <div class="card-header"></div>
                <div class="card-body p-0" style="padding: 10px 40px 100px 40px">
                    <!-- Events table-->
                    @if($reminders->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				    @else 
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
                                <tbody>
                                    <?php 
                                        $i=1;
                                    ?>
                                        @foreach ($reminders as $reminder)
                                            <tr id="reminder{{$reminder -> id}}">
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
                                                    <a class="btn btn-success btn-md" href="{{ url('viewreminder',['id'=>$reminder->id]) }}" data-toggle="modal" data-target="#modal-view-{{ $reminder->id }}"><i class="fa-solid fa-eye"></i> View</a>
                                                    <a class="btn btn-warning btn-md" href="{{ url('showreminder',['id'=>$reminder->id]) }}" data-toggle="modal" onclick="editItem(this)" data-id="{{ $reminder->id }}" data-target="#editModal{{ $reminder->id }}"><i class="fas fa-edit"></i> Update</a>
                                                    <button class="btn btn-danger btn-md" onclick="deleteItem(this)" data-id="{{ $reminder->id }}"><i class="fas fa-trash-alt"></i> Delete</button>  
                                                </td> 
                                            </tr>
                                            <!-- view reminder -->
                                            <div id="modal-view-{{ $reminder->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content border-start-lg border-start-yellow">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- update reminder -->
                                            <div id="editModal{{ $reminder->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
        </div>



        <!-- <script src="{{ asset('ckcontents/ckcontents.js') }}"></script>
        <script>
            CKEDITOR.replace( 'contents' );
        </script> -->

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
                                    'A reminder has been deleted successfully.',
                                    "success"
                                );
                                $("#reload").load(location.href + " #reload");
                                $("#reload2").load(location.href + " #reload2");
                                $("#reminder"+id+"").remove();
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
<script>
        var $loading = $('#loadingDiv');
        function formPost(){
            $(document).ajaxStart(function () {
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
            });
            $('#whoops').hide();
            var form_data = $("form#createReminder").serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('reminder.store') }}",
                data:form_data,
                success: function(response) {
                    if (response) {
                        $("#createReminder")[0].reset();
                        $(":submit").removeAttr("disabled");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success.',
                            text: 'Reminder has been added successfully',
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