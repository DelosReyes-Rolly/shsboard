@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<div class="left-to-right">
        <div class="left-to-right">
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 20px;">View on Home</h3>
                <hr class="mt-0 mb-4">
                
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                          
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputtitle"><b>Title:</b></label><br/>
                                            <h2 style="font-size: 30px;"><b>{{$landing->title}}</b></h2>
                                        </div>
                                    </div><br/>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            @if($landing->image == NULL)
                                                <img src="../uploads/event/placeholder.png" style = "width: auto; height: auto"/>
                                            @else
                                                <img src="{{ asset('uploads/landing/'.$landing->image) }}" style = "width: auto; height: auto"/>
                                            @endif
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1"><b>Content:</b></label>
                                            {!!$landing->content!!}
                                            <!-- Save changes button-->
                                            <div class="pull-right">
                                                <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                                <a class="btn btn-warning btn-md" href="/showlanding/{{$landing->id}}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="/delete/{{$landing->id}}"><i class="far fa-trash-alt"></i> Delete</a>
                                            </div>
                                        </div><br/>
                                    </div>
                                </div>
                            </div>
                        </div>         
            </div> 
        </div>
</div>
</main>
<br><br><br><br>