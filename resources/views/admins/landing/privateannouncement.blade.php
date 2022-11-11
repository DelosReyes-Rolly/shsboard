@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<br/><br/><br/><br/><br/><br/>
        <!-- form -->
    <div class="container left-to-right" style="padding: 10px 40px 10px 40px;">
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
                    
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

        <form method="POST" action="/add/privateannouncements" enctype="multipart/form-data">
            @csrf
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">Create Private Announcement</div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwhat">What</label>
                                            <input class="form-control @error('what') is-invalid @enderror" id="inputwhat" type="text" placeholder="Enter the title" name="what"  value="{{ old('what') }}">
                                        </div>
                                        <!-- Form Group date-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputwho">Who</label>
                                            <input class="form-control @error('who') is-invalid @enderror" id="inputwho" type="text" placeholder="Enter the receipients" name="who"  value="{{ old('who') }}">
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-2">
                                                <label class="slarge mb-1" for="inputwhn">When</label>
                                                <input type="date" class="form-control @error('whn') is-invalid @enderror" id="inputwhn" placeholder="Enter the date" name="whn"  value="{{ old('whn') }}">
                                            </div>
                                            <!-- Form Group (content)-->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="appt">Select a time:</label><br>
                                                    <input type="time" id="whn_time" name="whn_time" value="{{ old('whn_time') }}">
                                                </div>
                                            </div>
                                            <!-- Form Group whr-->
                                            <div class="col-md-2">
                                                <label class="slarge mb-1" for="inputexpired_at">Expired at</label>
                                                <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{ old('expired_at') }}">
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputwhr">Where</label>
                                                <input class="form-control @error('whr') is-invalid @enderror" id="inputwhr" type="text" placeholder="Enter the location" name="whr"  value="{{ old('whr') }}">
                                            </div>
                                        </div><br/>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor">Content</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80">{{ old('content') }}</textarea>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (img)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputcontent">Image (Only png and jpg files are allowed)</label>
                                                <div class ="form-group row">
                                                    <div class="col-md-8"></div>
                                                    <input type="file" name = "image" class="form-control">
                                                </div> 
                                            </div>
                                            <!-- Save changes button-->
                                            <br/><br/><br/><br/><font face = "Bedrock" size = "3"><input type="submit" class="btn btn-primary" value="Submit" style="float: right;"></font>
                                        </div>
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
        @if ($message = Session::get('approval'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
    <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });
    </script>
</main>
<br><br><br><br>