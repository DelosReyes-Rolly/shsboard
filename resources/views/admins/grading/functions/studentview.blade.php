@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
<div class="left-to-right">
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">View Student</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">
                                    @if($student->status==1)
                                        <div class="pull-right">
                                            <a href="/studentaddsubject/{{$student->id}}" class="btn btn-primary"><i class="fas fa-book"> </i> Add Subject Manually</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b> LRN:</b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$student->LRN}}</span>
                                        </div>
                                     
                                        <!-- Form Group (title)-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Full Name: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} {{$student->suffix}}</span>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b> Address:</b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$student->address->street}} {{$student->address->village}}, {{$student->address->city}}, {{$student->address->zip_code}}</span>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Phone Number: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$student->phone_number}}</span>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Sex: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$student->gender}}</span>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Grade Level: </b></label>
                                        </div>
                                            <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                                @if($student->gradelevel->gradelevel == 11 || $student->gradelevel->gradelevel == 12)
                                                    <span style="font-size: 26px;">{{$student->gradelevel->gradelevel}}</span>
                                                @else
                                                    <span style="font-size: 26px;">Alumni</span>
                                                @endif
                                            </div>
                                        <!-- Form Group (title)-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Strand and Section: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$student->course->courseName}} - {{$student->section->section}} ({{$student->course->abbreviation}} - {{$student->section->section}})</span>
                                        </div>
                                        <!-- Form Group (title)-->
                                        
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row">
                                        <!-- Form Group whr-->
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Email Address: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$student->email}}</span>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                            <label style="font-size: 26px;"><b>Username: </b></label>
                                        </div>
                                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-bottom: 10px;">
                                            <span style="font-size: 26px;">{{$student->username}}</span>   
                                        </div>
                                        <br/><br/><br/><br/>
                                        <div class="pull-right">
                                            <a class="btn btn-info btn-md" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
                                            <a class="btn btn-warning btn-md" href="/showstudent/{{$student->id}}"><i class="fas fa-edit"></i> Update</a>
                                            <a class="btn btn-danger btn-md" href="{{route('admin.deletestudent', $student->id)}}"><i class="fas fa-trash-alt"></i> Delete</a>
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