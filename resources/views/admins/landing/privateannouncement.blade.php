@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
        <!-- form -->
    <div class="left-to-right">
        <form method="POST" action="/add/privateannouncements" enctype="multipart/form-data"class="needs-validation" novalidate>
            @csrf
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Create Private Announcement </h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">
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
                                </div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-6">
                                            <label class="large mb-1" for="inputsubject" style="font-size: 20px;"><span style="color: red">*</span> Subject</label>
                                            <input class="form-control @error('subject') is-invalid @enderror" id="inputsubject" type="text" placeholder="Enter the title" name="subject"  value="{{ old('subject') }}" required>
                                            <div class="invalid-feedback">
                                                Please input subject.
                                            </div>
                                        </div>
                                        <!-- Form Group date-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputdate" style="font-size: 20px;"><span style="color: red">*</span> Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="inputdate" placeholder="Enter the date" name="date"  value="{{ old('date') }}" required>
                                            <div class="invalid-feedback">
                                                Please input date.
                                            </div>
                                        </div>
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                             <div class="form-group">
                                                <label for="appt" style="font-size: 20px;"><span style="color: red">*</span> Time</label><br>
                                                <input type="time" id="time" class="form-control" name="time" value="{{ old('time') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input time.
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                            <!-- Form Group whr-->
                                            <div class="col-md-3">
                                                <label class="large mb-1" for="inputsender" style="font-size: 20px;"><span style="color: red">*</span> From</label>
                                                <input class="form-control @error('sender') is-invalid @enderror" id="inputsender" type="text" placeholder="Enter the sender" name="sender"  value="{{ old('sender') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input sender.
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="large mb-1" for="inputrecipient" style="font-size: 20px;"><span style="color: red">*</span> To</label>
                                                <input class="form-control @error('recipient') is-invalid @enderror" id="inputrecipient" type="text" placeholder="Enter the recipients" name="recipient"  value="{{ old('recipient') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input recipient.
                                                </div>
                                            </div>
                                            <!-- Form Group whr-->
                                            <!-- Form Group (location)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputlocation" style="font-size: 20px;"><span style="color: red">*</span> Location</label>
                                                <input class="form-control @error('location') is-invalid @enderror" id="inputlocation" type="text" placeholder="Enter the location" name="location"  value="{{ old('location') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input location.
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <br><label class="slarge mb-1" for="inputpost_expiration" style="font-size: 20px;"><span style="color: red">*</span> Post Expiration</label>
                                                <input type="date" class="form-control @error('post_expiration') is-invalid @enderror" id="inputpost_expiration" placeholder="Enter the date" name="post_expiration"  value="{{ old('post_expiration') }}" required>
                                                <div class="invalid-feedback">
                                                    Please input expiry date.
                                                </div>
                                            </div>
                                        </div><br/>
                                        <!-- Form Group (content)-->
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80" required>{{ old('content') }}</textarea>
                                            <div class="invalid-feedback">
                                                Please input content.
                                            </div>
                                        </div><br/>
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (img)-->
                                            <div class="col-md-6">
                                                <label class="large mb-1" for="inputcontent" style="font-size: 20px;">Image (Only png and jpg files are allowed)</label>
                                                <div class ="form-group row">
                                                    <div class="col-md-8"></div>
                                                    <input type="file" name = "image" class="form-control">
                                                </div> 
                                            </div>
                                            <!-- Save changes button-->
                                        </div>
                                        <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit"></font>
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
    <script src="{{ asset('assets/js/needs-validated.js') }}"></script>
</main>
<br><br><br><br>