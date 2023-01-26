<main>
    <div class="modal-header">
        <h1 style="font-size: 28px;" ><label><b>Teacher </b></label></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div>
            <div class="card-body">
                @if($data->count() == null)
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    <div class="table-responsive table-billing-history">
                        <table id="example" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead class="table-success">
                                <tr>
                                    <th width="4%" class="border-gray-200" scope="col">#</th>
                                    <th width="96%" class="border-gray-200" scope="col">Teahcer Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                ?>
                                    @foreach ($data as $teacher)
                                        <tr id="teacher{{$teacher->id}}">
                                            <td width="10%" class="text-center"><?php echo $i++; ?></td>
                                            <td width="20%" style="text-align: left;">{{$teacher -> last_name}}, {{$teacher -> first_name}} {{$teacher -> middle_name}} {{$teacher -> suffix}}</td>
                                        </tr>
                                    @endforeach 
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</main>