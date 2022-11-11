@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
    <div class="left-to-right" style="padding: 10px 40px 10px 40px;">
    <h3 style="font-size: 20px;">Table of Grade Level </h3>
      <hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success">
            <div class="card-header">
            </div>
            <div class="card-body p-0" style="padding: 20px 20px 20px 20px;">
                @if($gradelevels->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    <br>
                    <div class="table-responsive table-billing-history">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="border-gray-200" scope="col">#</th>
                                    <th class="border-gray-200" scope="col">Grade Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                ?>
                                    @foreach ($gradelevels as $gradelevel)
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>{{$gradelevel -> gradelevel}}</td>
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