@include('partials.adminheader')
<main>
<br/><br/><br/><br/>
<body style="font-family: Arial;"> 

	
	<section id="about" class="about">
		<div class="container left-to-right">
			<div class="body-container">
                    <div class="container-xl px-4 mt-4">
                        <!-- page navigation-->
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card border-start-lg border-start-yellow">
                                        <div class="card-header">View document</div>
                                        <div class="card-body" style="padding: 10px 40px 10px 40px">
                                            <div class="mb-3">

                                            </div>
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                    <div class="mb-3">
                                                            <label class="large" for="name">Document Name: </label>
                                                            {{$document->name}}
                                                    </div><br>
                                                    <div class="mb-3">
                                                            <label class="large" for="name">Created at: </label>
                                                            {{$requested_at  =   date('F d, Y', strtotime($document->created_at))}}
                                                    </div><br>
                                                    <div class="mb-3">
                                                            <label class="large" for="name">Updated at: </label>
                                                            {{$requested_at  =   date('F d, Y', strtotime($document->updated_at))}}
                                                    </div><br>
                                                <div class="row gx-3 mb-3">
                                                    <!-- Save changes button-->
                                                    <div class="pull-right">
                                                        <a class="btn btn-info btn-sm" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                                        <a class="btn btn-warning btn-sm" href="/showdocument/{{$document->id}}"><i class="fas fa-edit"></i> Update</a>
														<a class="btn btn-danger btn-sm" href="{{route('admin.deletedocument', $document->id)}}"><i class="far fa-trash-alt"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
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