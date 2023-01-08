@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
        <!-- form -->
    <div class="left-to-right">
            <form method="POST" action="/add/privatereminders">
                @csrf
                <div class="container-xl px-4 mt-4 left-to-left">
                    <!-- page navigation-->
                    <h3 style="font-size: 28px; font-weight: 800;">Create Private Reminder</h3>
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
                                        <div class="">
                                        <div class="mb-3" style="color: red">
                                            * required field
                                        </div>
                                            <!-- Form Group (content)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                                <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80" required>{{ old('content') }}</textarea>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Expiry Date</label>
                                                    <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{ old('expired_at') }}" required>
                                                </div>
                                            </div><br/>
                                            <!-- Save changes button-->
                                            <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit"></font>
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