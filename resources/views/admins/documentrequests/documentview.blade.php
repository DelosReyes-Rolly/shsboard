@include('partials.adminheader')
<main>
<body style="font-family: Arial;"> 

	
	<section>
		<div class="left-to-right">
			<div>
                    <div class="container-xl px-4 mt-4">
                        <!-- page navigation-->
                        <h3 style="font-size: 28px; font-weight: 800;">View document</h3>
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="border-start-lg border-start-yellow">
                                        <div class="card-header"></div>
                                        <div class="card-body" style="padding: 10px 40px 10px 40px">
                                            <div class="mb-3">

                                            </div>
                                            <!-- Form Row -->
                                            
                                                    <div class="mb-3">
                                                            <label class="large" for="name" style="font-size: 26px;"><b>Document Name: </b></label>
                                                                <span style="font-size: 26px;">{{$document->name}}</span>
                                                    </div><br>
                                                    <div class="mb-3">
                                                            <label class="large" for="name" style="font-size: 26px;"><b>Created at: </b></label>
                                                                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($document->created_at))}}</span>
                                                    </div><br>
                                                    <div class="mb-3">
                                                            <label class="large" for="name" style="font-size: 26px;"><b>Updated at: </b></label>
                                                                <span style="font-size: 26px;">{{$requested_at  =   date('F d, Y', strtotime($document->updated_at))}}</span>
                                                    </div><br>
                                                
                                                    <!-- Save changes button-->
                                                    <div class="pull-right">
                                                        <a class="btn btn-info btn-md" href="/documentrequest"><i class="fas fa-arrow-left"></i> Back</a>
                                                        <a class="btn btn-warning btn-md" href="/showdocument/{{$document->id}}"><i class="fas fa-edit"></i> Update</a>
														<a class="btn btn-danger btn-md" href="{{route('admin.deletedocument', $document->id)}}"><i class="fas fa-trash-alt"></i> Delete</a>
                                                    </div>

                                           
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
            </div>
        </div>
    </section>
</main>
<br><br><br><br>