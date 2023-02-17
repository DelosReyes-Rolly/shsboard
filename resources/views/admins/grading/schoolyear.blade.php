
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
            table = $('#example').DataTable( {
                responsive: true,
                "bInfo" : false,
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
<div class="">
  
    <h3 style="font-size: 28px; font-weight: 800;">Table of School Year </h3>   
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div></br></br>
        @endif
      <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success">
            <div class="card-header" style="font-size: 20px; font-weight:bold; background-color: #ffffff;">
                
                <div class="row">
                    <div class="col-lg-9 col-md-6 col-md-8" style="border-radius: 10px;">
                        <div class="alert alert-primary"><i class="fas fa-info"> </i> |  Example: 2022</div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-md-4">
                        <a href="{{route('schoolyear.add')}}" class="btn btn-primary btn-md" style="float: right;" data-toggle="modal" data-target="#createModal"><i class="fas fa-user-plus"></i> Add Record</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @if($schoolyears->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    <div class="table-responsive table-billing-history" style="padding: 20px;">
                        <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="border-gray-200" scope="col">#</th>
                                    <th class="border-gray-200" scope="col">School Year</th>
                                    <th class="border-gray-200" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                ?>
                                    @foreach ($schoolyears as $schoolyear)
                                        <tr id="schoolyear{{$schoolyear->id}}">
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td>{{$schoolyear -> schoolyear}}</td>
                                            <td>
                                                <a class="btn btn-success btn-md" href="{{ url('viewschoolyear',['id'=>$schoolyear->id]) }}" data-toggle="modal" data-target="#modal-view-{{ $schoolyear->id }}"><i class="fa-solid fa-eye"></i> View</a>
                                                <a class="btn btn-warning btn-md" href="{{ url('showschoolyear',['id'=>$schoolyear->id]) }}"onclick="editItem(this)" data-id="{{ $schoolyear->id }}" data-toggle="modal" data-target="#editModal{{ $schoolyear->id }}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="{{ url('deleteschoolyear',['id'=>$schoolyear->id]) }}" data-toggle="modal" onclick="deleteItem(this)" data-id="{{ $schoolyear->id }}" data-target="#deleteModal{{ $schoolyear->id }}"><i class="fas fa-trash-alt"></i> Delete</a>
                                            </td> 
                                        </tr>
                                        <!-- view modal -->
                                        <div id="modal-view-{{ $schoolyear->id }}" class="modal fade text-center" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content border-start-lg border-start-yellow">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- delete modal -->
                                        <div id="deleteModal{{ $schoolyear->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content border-start-lg border-start-yellow">
                                                </div>
                                            </div>
                                        </div>   
                                        <!-- update modal -->
                                        <div id="editModal{{ $schoolyear->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content border-start-lg border-start-yellow">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <!-- create modal -->
                <div id="createModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content border-start-lg border-start-yellow">
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

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
        id = e.getAttribute('data-id');
    }
    </script>
</main>
<br><br><br><br>