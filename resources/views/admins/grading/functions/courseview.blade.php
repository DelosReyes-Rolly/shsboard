@include('partials.adminheader')
<main>
<div class="left-to-right">

        <!-- form -->
                    
        
            <div class="container-xl px-4 mt-4 left-to-right">
                <div style="font-size: 20px;"><a href="/gradingcourses"> Strands</a>&emsp;<i class="fas fa-angle-right"></i>&emsp; view strand</div><br/>
                <!-- page navigation-->
                <div style="margin: 20px;">
                    <a class="btn btn-secondary btn-lg" href="/gradingcourses" style="float: right; font-size: 18px;"><i class="fas fa-arrow-left"></i>   Back to strand list</a>
                </div>
                <h3 style="font-size: 28px; font-weight: 800;">View Strand</h3><br/>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <!-- Form Row-->
                                    <!-- Form Group (title)-->
                                    @if($course->image == NULL)
                                        <center><img src="{{ URL::asset('img/shs.png')}}" style="width: auto; height: auto;" class="left-to-right"/></center> <br/><br/>
									@else
                                        <center><img src="{{ asset('img/'.$course->image) }}"style="width: auto; height: auto;" class="left-to-right"/></center> <br/><br/>
									@endif
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>Strand Name:</b> </label>
                                            <span style="font-size: 26px;">{{$course->courseName}}</span>
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-4 mb-4">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>Abbreviation: </b></label>
                                            <span style="font-size: 26px;">{{$course->abbreviation}}</span>
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-4 mb-4">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>Strand Description: </b></label>
                                            <span style="font-size: 26px;">{!!$course->description!!}</span>
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 26px;"><b>Code: </b></label>
                                            <span style="font-size: 26px;">{{$course->code}}</span>
                                        </div><br><br>  
                                        @if($course->link != NULL)
                                            <iframe width="100%" height="720" box-shadow = "0 5px 20px rgba(0,0,0,2)" src="{{$course -> link}}" title="ABM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        @endif
                                    </div><br/>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
    </script>
</main>
<br><br><br><br>