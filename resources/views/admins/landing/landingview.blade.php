@include('partials.adminheader')
@include('partials.adminSecondHeader')
<script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
<main>
<div class="">
        <div class="">
            <div class="px-2 mt-2">
                <div>
                    <nav  aria-label = "breadcrumb">
                        <!--Add the "breadcrumb" class to ul element that represents the breadcrumb-->
                        <ul class = "breadcrumb">
                        <!--Add the ".breadcrumb-item" class to each li element within the breadcrumb-->
                        <li class = "breadcrumb-item"><a class="bca" href = "{{ url('homepage') }}">Homepage</a></li>
                        <!--Add the "active" class to li element to represent the current page-->
                        <li class = "breadcrumb-item active" aria-current = "page">View Content</li>
                        </ul>
                    </nav>
                </div>
                <!-- page navigation-->
                <div style="margin: 20px;">
                    <a class="btn btn-secondary btn-lg" href="{{ url('homepage') }}" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to homepage</a>
                </div>
                <h3 style="font-size: 28px; font-weight: 800;">View on Home</h3><br/>
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
                                            <label class="large mb-1" for="inputtitle" style="font-size: 26px;"><b>Title:</b></label><br/>
                                            <h2 style="font-size: 30px;"><b><div id="reloadlanding2">{{$landing->title}}</div></b></h2>
                                        </div>
                                    </div><br/>
                                    <div class="row gx-3 mb-3">
                                        @if($landing->image != NULL)
                                            <div class="col-md-6">
                                                <img src="{{ asset('uploads/landing/'.$landing->image) }}" style = "width: auto; height: auto"/>
                                            </div>
                                            <!-- Form Group (content)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" style="font-size: 26px;"><b>Content:</b></label>
                                                <div id="reloadlanding">{!!$landing->content!!}</div>
                                                <!-- Save changes button-->
                                                <div class="pull-right">
                                                    <a class="btn btn-warning btn-md" href="{{ url('showlanding',['id'=>$landing->id]) }}" onclick="editItem(this)" data-id="{{ $landing->id }}" data-toggle="modal" data-target="#editModal{{ $landing->id }}"><i class="fas fa-edit"></i> Update</a>
                                                </div>
                                            </div><br/>
                                        @else
                                            <!-- Form Group (content)-->
                                            <div class="col-md-12">
                                                <label class="large mb-1" style="font-size: 26px;"><b>Content:</b></label>
                                                <div id="reloadlanding">{!!$landing->content!!}</div>
                                                <!-- Save changes button-->
                                                <div class="pull-right">
                                                    <a class="btn btn-warning btn-md" href="{{ url('showlanding',['id'=>$landing->id]) }}" onclick="editItem(this)" data-id="{{ $landing->id }}" data-toggle="modal" data-target="#editModal{{ $landing->id }}"><i class="fas fa-edit"></i> Update</a>
                                                </div>
                                            </div><br/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>  
                         <!-- edit modal -->
                         <div id="editModal{{ $landing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content border-start-lg border-start-yellow">
                                </div>
                            </div>
                        </div>       
            </div> 
        </div>
</div>
        <script type="text/javascript">
            $(document).ready(function(){
                editItem(e);
            });
            function editItem(e){
                id = e.getAttribute('data-id');
            }
        </script>
</main>
<br><br><br><br>