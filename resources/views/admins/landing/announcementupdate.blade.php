@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<div>

        <!-- form -->
                    
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/updateannouncement/{{$announcement->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Update Announcement</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4 left-to-right">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwhat" style="font-size: 20px;"><span style="color: red">*</span> What</label>
                                            <input class="form-control @error('what') is-invalid @enderror" id="inputwhat" type="text" placeholder="Enter the title" name="what"  value="{{$announcement->what}}">
                                        </div>
                                        <!-- Form Group date-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwho" style="font-size: 20px;"><span style="color: red">*</span> Who</label>
                                            <input class="form-control @error('who') is-invalid @enderror" id="inputwho" type="text" placeholder="Enter the receipients" name="who"  value="{{$announcement->who}}">
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                            <div class="col-md-3">
                                                <label class="slarge mb-1" for="inputwhn" style="font-size: 20px;"><span style="color: red">*</span> When</label>
                                                <input type="date" class="form-control @error('whn') is-invalid @enderror" id="inputwhn" placeholder="Enter the date" name="whn"  value="{{$announcement->whn}}">
                                            </div>
                                            <!-- Form Group (content)-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Select a time:</label><br>
                                                    <input type="time" id="whn_time" name="whn_time" value="{{$announcement->whn_time}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="slarge mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Expired at</label>
                                                <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{$announcement->expired_at}}">
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputwhr" style="font-size: 20px;"><span style="color: red">*</span> Where</label>
                                                <input class="form-control @error('whr') is-invalid @enderror" id="inputwhr" type="text" placeholder="Enter the location" name="whr"  value="{{$announcement->whr}}">
                                            </div>
                                        </div><br/>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80">{{$announcement->content}}</textarea>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Save changes button-->
                                            <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a> &emsp;
                                            <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </form>

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'editor' );
        </script>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });
    </script>
</main>
<br><br><br><br>