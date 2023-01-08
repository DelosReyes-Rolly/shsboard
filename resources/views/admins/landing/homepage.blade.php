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
    <div class="container-xl px-4 mt-4">
        <h3 style="font-size: 28px; font-weight: 800;">Create Content on Homepage </h3>
        <hr class="mt-0 mb-4">
        <!-- form -->
            <form method="POST" action="{{ route('homepage.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="container-xl px-4 mt-4">
                    <!-- page navigation-->
                    <div class="row">
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

                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card border-start-lg border-start-yellow">
                                    <div class="card-header"></div>
                                    <div class="card-body" style="padding: 10px 40px 10px 40px">
                                        <!-- Form Row-->
                                        <div class="mb-3" style="color: red">
                                            * required field
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (title)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputtitle" style="font-size: 20px;"><span style="color: red">*</span> Title</label>
                                                <input class="form-control @error('title') is-invalid @enderror" id="inputtitle" type="text" placeholder="Enter the title" name="title"  value="{{ old('title') }}">
                                            </div>
                                        </div><br/>
                                        <!-- Form Row -->
                                      
                                            <!-- Form Group (content)-->
                                            <div class="mb-3" style="padding-left: 18px;">
                                                <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                                <textarea class="form-control @error('document_id') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content" rows="10" cols="80">{{ old('content') }}</textarea>
                                            </div><br/>
                                            <div class="row gx-3 mb-3" style="padding-left: 22px;">
                                                <!-- Form Group (img)-->
                                                <div class="col-md-6">
                                                    <label class="large mb-1" for="inputcontent" style="font-size: 20px;">Image (Only png and jpg files are allowed)</label>
                                                    <div class ="form-group row">
                                                        <div class="col-md-8"></div>
                                                        <input type="file" name = "image" class="form-control">
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
            </form>

        <!-- tables -->
            <br/><br/>
             @if ($message = Session::get('landing'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <h3 style="font-size: 28px; font-weight: 800;">Table of contents at Home Page</h3>
            <hr class="mt-0 mb-4">
            <div class="card mb-4 right-to-left border-start-lg border-start-yellow" style="padding: 10px 40px 10px 40px">
                <div class="card-header"></div>
                <div class="card-body p-0">
                    <!-- table-->
                    @if($landings->count() == 0)
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
                                        <th class="border-gray-200" scope="col">Image</th>
                                        <th class="border-gray-200" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i=1;
                                    ?>
                                        @foreach ($landings as $landing)
                                            <tr id="landing{{$landing -> id}}">
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td>{{$landing -> title}}</td>
                                                <td>{{$landing -> image}}</td>
                                                <td>
                                                    <a class="btn btn-success btn-md" href="/viewlanding/{{$landing->id}}"><i class="fas fa-eye"></i> View</a>
                                                    <a class="btn btn-warning btn-md" href="/showlanding/{{$landing->id}}" data-toggle="modal" data-target="#editModal{{ $landing->id }}"><i class="fas fa-edit"></i> Update</a>
                                                    <button class="btn btn-danger btn-md" onclick="deleteItem(this)" data-id="{{ $landing->id }}"><i class="fas fa-trash-alt"></i> Delete</button>
                                                </td> 
                                            </tr>
                                            <!-- edit modal -->
                                            <div id="editModal{{ $landing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                            url:'{{url("/landing/delete")}}/' +id,
                            data:{
                                "_token": "{{ csrf_token() }}",
                            },
                            success:function(data) {
                                if (data.success){
                                    
                                    swalWithBootstrapButtons.fire(
                                        'Deleted!',
                                        'Content on landing page has been deleted successfully.',
                                        "success"
                                    );
                                    $("#landing"+id+"").remove();
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
</main>
<br><br><br><br>