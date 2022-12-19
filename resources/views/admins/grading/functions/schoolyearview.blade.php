@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
<div class="left-to-right">

            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">View School year </h3>   
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <!-- Form Group (title)-->
                                    <div class="col-md-10">
                                        <h1 style="font-size: 28px;" ><label><b>School Year: </b></label>
                                        {{$schoolyear->schoolyear}}</h1>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-info btn-md" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
                                        <a class="btn btn-warning btn-md" href="/showschoolyear/{{$schoolyear->id}}"><i class="fas fa-edit"></i> Update</a>
                                        <a class="btn btn-danger btn-md" href="{{route('admin.deleteschoolyear', $schoolyear->id)}}"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
</main>
<br><br><br><br>