@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
    <div class="left-to-right">

        
                    
        
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">View Teacher</h3>
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
                                            <label style="font-size: 26px;"><b>Last Name: </b></label>
                                            <span style="font-size: 26px;">{{$faculty->last_name}}</span>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>First Name: </b></label>
                                            <span style="font-size: 26px;">{{$faculty->first_name}}</span>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>Middle Name: </b></label>
                                            <span style="font-size: 26px;">{{$faculty->middle_name}}</span>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>Gender: </b></label>
                                            <span style="font-size: 26px;">{{$faculty->gender}}</span>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>Username: </b></label>
                                            <span style="font-size: 26px;">{{$faculty->username}}</span>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>Phone Number: </b></label>
                                            <span style="font-size: 26px;">{{$faculty->phone_number}}</span>
                                        </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>Email Address: </b></label>
                                            <span style="font-size: 26px;">{{$faculty->email}}</span>
                                        </div><br/><br/><br/><br/>
                                        <div class="pull-right">
                                            <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                            <a class="btn btn-warning btn-md" href="/showfaculty/{{$faculty->id}}"><i class="fas fa-edit"></i> Update</a>
                                            <a class="btn btn-danger btn-md" href="{{route('admin.deletefaculty', $faculty->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div><br/>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        
</main>
<br><br><br><br>