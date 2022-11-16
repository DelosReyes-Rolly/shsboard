@include('partials.adminheader')
<main>
<section>
        <div>
        	<div class="left-to-right">
                <h3 style="font-size: 28px; font-weight: 800;">Requested Document</h3>
                <hr style="border: 1px solid grey;">
                
                    <div class="container-xl px-4 mt-4">
                        <!-- page navigation-->
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card border-start-lg border-start-yellow">
                                        <div class="card-header"></div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                    
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (title)-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels" style="font-size: 26px;">Last Name</label><input type="text" class="form-control"  style="font-size: 16px;" placeholder=" {{$docreq->student->last_name}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group date-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels" style="font-size: 26px;">First Name</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{$docreq->student->first_name}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group (title)-->
                                                <div class="col-md-4">
                                                    <div class="col-md-12"><label class="labels" style="font-size: 26px;">Middle Name</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{$docreq->student->middle_name}} " value="" readonly></div> <br>
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                            	 <!-- Form Group (location)-->
                                                <!-- Form Group document needed-->
                                                <div class="col-md-6">
                                                	<div class="col-md-12"><label class="labels" style="font-size: 26px;">Grade Level</label><input type="text" class="form-control" style="font-size: 16px;" placeholder=" {{$docreq->gradelevel->gradelevel}} " value="" readonly></div> <br>
                                                </div>
                                                <!-- Form Group (content)-->
                                                </div>
                                                <div class="mb-3 requestdocument">
                                                	<label class="large mb-1" style="font-size: 26px;"><br><b>Document Needed: </b></label>
                                                        <span style="font-size: 26px;">{{$docreq -> document -> name}}</span>
            									</div>
                                                <!-- Form Group (content)-->
                                                <div class="mb-3 requestdocument">
                                                    <label class="large mb-1" for="inputpurpose" style="font-size: 26px;"><b>Purpose: </b></label>
                                                        <span style="font-size: 26px;">{{$docreq->purpose}}</span>
                                                </div>
                                                <div class="mb-3 requestdocument">
                                                    <label class="large mb-1" for="inputpurpose" style="font-size: 26px;"><b>Status: </b></label>
                                                    <?php 
                                                        switch ($docreq->status) {
                                                            case '1':
                                                                echo '<span class="badge bg-secondary" style="color: white;">Pending</span>';
                                                                break;
                                                            case '2':
                                                                echo '<span class="badge bg-success" style="color: white;">On Process</span>';
                                                                break;
                                                            case '3':
                                                                echo '<span class="badge bg-success" style="color: white;">For Collection</span>';
                                                                break;
                                                            case '4':
                                                                echo '<span class="badge bg-success" style="color: white;">Completed</span>';
                                                                break;
                                                            case '5':
                                                                echo '<span class="badge bg-danger" style="color: white;">Denied</span>';
                                                                break;
                                                            case '6':
                                                                echo '<span class="badge bg-secondary" style="color: white;">For follow-up</span>';
                                                                break;
                                                            default:
                                                                echo '<span class="badge bg-secondary" style="color: white;">Undetermine</span>';
                                                                break;
                                                            }
                                                        ?>
                                                </div>
                                                <br>
                                                 <!-- Save changes button-->
                                                    <div class="pull-right">
                                                        <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                                        <a class="btn btn-warning btn-md" href="/showrequestadmin/{{$docreq->id}}"><i class="fas fa-edit"></i> Update</a>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                           
                        </div>
                    <hr style="border: 1px solid grey;">
                
        </section>
        
</main>
<br><br><br><br>