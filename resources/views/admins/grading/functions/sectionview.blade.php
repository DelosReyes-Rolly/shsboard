@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
    <div class="left-to-right">

        <!-- form -->
                    
        
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 20px;">View Section</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <label><b>Section:</b></label>
                                            {{$section->section}}
                                        </div>
                                        <div class="pull-right">
                                            <br/><br/>
                                            <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                            <a class="btn btn-warning btn-md" href="/showsection/{{$section->id}}"><i class="fas fa-edit"></i> Update</a>
                                            <a class="btn btn-danger btn-md" href="{{route('admin.deletesection', $section->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>

</main>
<br><br><br><br>