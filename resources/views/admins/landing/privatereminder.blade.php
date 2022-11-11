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

            <form method="POST" action="/add/privatereminders">
                @csrf
                <div class="container-xl px-4 mt-4 left-to-left">
                    <!-- page navigation-->
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card border-start-lg border-start-yellow">
                                    <div class="card-header">Create Private Reminder</div>
                                    <div class="card-body" style="padding: 10px 40px 10px 40px">
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (content)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="editor">Content</label>
                                                <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content"  rows="10" cols="80">{{ old('content') }}</textarea>
                                            </div><br/>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputexpired_at">Expiry Date</label>
                                                <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{ old('expired_at') }}">
                                            </div><br/>
                                            <!-- Save changes button-->
                                            <font face = "Bedrock" size = "3"><input type="submit" class="btn btn-primary" value="Submit" style="float: right;"></font>
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