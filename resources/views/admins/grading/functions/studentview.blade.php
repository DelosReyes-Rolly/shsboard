@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
<div class="left-to-right">
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 20px;">View Student</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">View student</div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-10">
                                            <label><b> LRN:</b></label>
                                            {{$student->LRN}}
                                        </div>
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <label><b>Last Name: </b></label>
                                            {{$student->last_name}}
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label><b>First Name: </b></label>
                                            {{$student->first_name}}
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label><b>Middle Name: </b></label>
                                            {{$student->middle_name}}
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label><b>Email Address: </b></label>
                                            {{$student->email}}
                                        </div><br/><br/>
                                        <div class="pull-right">
                                            <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                            <a class="btn btn-warning btn-md" href="/showstudent/{{$student->id}}"><i class="fas fa-edit"></i> Update</a>
                                            <a class="btn btn-danger btn-md" href="{{route('admin.deletestudent', $student->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        
    </script>
</main>
<br><br><br><br>