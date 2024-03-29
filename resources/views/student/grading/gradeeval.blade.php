@include('partials.studentheader')
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
                "bInfo" : true,
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
    <section>
        <div>
            <hr class="mt-0 mb-4">   
            <div>
                    <!-- boxes -->
                    <h3 style="font-size: 28px; font-weight: 800;">Grade Evaluations</h3>
                    <hr style="border: 1px solid grey;">
                    <div class="px-2 mt-2">
                        <hr class="mt-0 mb-4">
                        <div class="row">
                        <div class="col-lg-4 mb-4">
                            <!-- Billing card 3-->
                            <div class="card h-100 border-start-lg border-start-success" style="background-color: #008000; color: white; box-shadow: 0 4px 16px rgba(0,0,0,1);">
                                <div class="card-body">
                                    <div class="requesteddocument" style="color: white; font-size: 20px; font-weight: 800;">Requested Grade Evaluations</div>
                                    @if($gradeevaluationrequests->count() == 0)
                                        <br><br>
                                        <div class="alert alert-danger"><em>No records found.</em></div>
                                    @else 
                                        <div class="h3 d-flex align-items-center" style="padding-left: 20px; padding-bottom: 10px;"><i class="fas fa-clipboard"> </i> &nbsp; <span id="reload">{{ $gradeevaluationrequests->count() }}</span></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <br/><br/>
                    <hr style="border: 1px solid grey;">
                    <!-- tables -->
                    <h3 style="font-size: 28px; font-weight: 800;">Table of Grade Evaluations</h3>
                    <hr class="mt-0 mb-4">
                    <div class="card mb-4 right-to-left border-start-lg border-start-success" style="padding: 20px;">
                        <div class="card-header"></div>
                        <div class="card-body p-0">
                            <!--table-->
                            @if($gradeevaluationrequests->count() == 0)
                                <br><br>
                                <div class="alert alert-danger"><em>No records found.</em></div>
                            @else 
                                <br>
                                <div class="table-responsive table-billing-history">
                                    <table id="example" class="display table-bordered table-striped table-hover" style="width:100%;">
                                        <thead class="table-success">
                                            <tr>
                                                <th class="border-gray-200" scope="col">#</th>
                                                <th class="border-gray-200" scope="col">Grade Level</th>
                                                <th class="border-gray-200" scope="col">Semester</th>
                                                <th class="border-gray-200" scope="col">Subject</th>
                                                <th class="border-gray-200" scope="col">Teacher</th>
                                                <th class="border-gray-200" scope="col">Date Requested</th>
                                                <th class="border-gray-200" scope="col">File</th>
                                                <th class="border-gray-200" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                                @foreach ($gradeevaluationrequests as $gradeevaluationrequest)
                                                    <tr id="gradeevaluationrequest{{$gradeevaluationrequest -> id}}">
                                                        @php $requested_at = date('F d, Y', strtotime($gradeevaluationrequest -> created_at)); @endphp
                                                        <td>{{$gradeevaluationrequest -> gradelevel -> gradelevel}}</td>
                                                        <td>{{$gradeevaluationrequest -> semester -> sem}}</td>
                                                        <td>{{$gradeevaluationrequest -> subject -> subjectname}}</td>
                                                        <td>{{$gradeevaluationrequest -> faculty -> last_name}}, {{$gradeevaluationrequest -> faculty -> first_name}} {{$gradeevaluationrequest -> faculty -> middle_name}} {{$gradeevaluationrequest -> faculty -> suffix}}</td>
                                                        <td>{{$requested_at}}</td>
                                                        <td>
                                                            <?php if($gradeevaluationrequest -> file == NULL):?>
                                                            <div class="alert alert-danger"><em>Please wait for teacher to upload the file.</em></div>
                                                            <?php else: ?>
                                                                <a class="btn btn-success btn-md" href="{{ url('vieweval',['id'=>$gradeevaluationrequest->id]) }}"><i class="fa-solid fa-eye"></i> View</a>
                                                            <?php endif; ?> 
                                                        </td>
                                                        <td>
                                                        <a class="btn btn-danger btn-md" href="{{ url('deletegradeeval',['id'=>$gradeevaluationrequest->id]) }}" data-toggle="modal" onclick="deleteItem(this)" data-id="{{ $gradeevaluationrequest->id }}" data-target="#deleteModal{{ $gradeevaluationrequest->id }}"><i class="fas fa-trash-alt"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                                    <!-- delete modal -->
                                                    <div id="deleteModal{{ $gradeevaluationrequest->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
        <script type="text/javascript">
        $(document).ready(function(){
            $('.nav_btn').click(function(){
                $('.mobile_nav_items').toggleClass('active');
            });
            deleteItem(e);

        });

        //delete
        function deleteItem(e){
            id = e.getAttribute('data-id');
        }
        </script>
    </section>
</main>
<br><br><br><br>