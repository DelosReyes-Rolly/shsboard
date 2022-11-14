@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
<div class="left-to-right">

       
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">View Subject</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><b>Subject Code: </b></label>
                                            <span style="font-size: 20px;">{{$subject->subjectcode}}</span>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><b>Subject Name: </b></label>
                                            <span style="font-size: 20px;">{{$subject->subjectname}}</span>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><b>Description: </b></label>
                                            <span style="font-size: 20px;">{{$subject->description}}</span>
                                        </div><br/><br/>
                                        <div class="pull-right">
                                            <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                            <a class="btn btn-warning btn-md" href="/showsubject/{{$subject->id}}"><i class="fas fa-edit"></i> Update</a>
                                            <a class="btn btn-danger btn-md" href="{{route('admin.deletesubject', $subject->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
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