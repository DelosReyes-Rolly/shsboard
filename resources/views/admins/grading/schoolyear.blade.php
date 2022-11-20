
@include('partials.adminheader')
@include('partials.adminThirdHeader')
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
<div class="left-to-right">
    <h3 style="font-size: 28px; font-weight: 800;">Table of School year </h3>   
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div></br></br>
        @endif
      <hr class="mt-0 mb-4">
        <div class="card mb-4 left-to-right border-start-lg border-start-success">
            <div class="card-header">
                <div class="pull-right">
                    <a href="{{route('schoolyear.add')}}" class="btn btn-primary btn-md"><i class="fas fa-user-plus"></i> Add Record</a>
                </div>
            </div>
            <div class="card-body p-0">
                @if($schoolyears->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    <br>
                    <div class="table-responsive table-billing-history">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
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
                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td>{{$schoolyear -> schoolyear}}</td>
                                            <td>
                                                <a class="btn btn-success btn-md" href="/viewschoolyear/{{$schoolyear->id}}"><i class="fas fa-eye"></i> View</a>
                                                <a class="btn btn-warning btn-md" href="/showschoolyear/{{$schoolyear->id}}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="{{route('admin.deleteschoolyear', $schoolyear->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
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

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
</main>
<br><br><br><br>