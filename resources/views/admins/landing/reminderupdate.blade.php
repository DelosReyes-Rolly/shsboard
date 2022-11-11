@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<div class="left-to-right">

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

        <form method="POST" action="/updatereminder/{{$reminder->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 20px;">Update Reminder </h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (content)-->
                                        <div class="col-md-3">
                                            <label class="slarge mb-1" for="inputwhn">When</label>
                                                <input type="date" class="form-control @error('whn') is-invalid @enderror" id="inputwhn" placeholder="Enter the date" name="whn"  value="{{$reminder->whn}}">
                                            </div>
                                        </div><br/>
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor">Content</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content" rows="10" cols="80">{{$reminder->content}}</textarea>
                                        </div><br/>
                                        <!-- Form Group privacy-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Save changes button-->
                                            <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a> &emsp;
                                            <font face = "Bedrock" size = "3"><input type="submit" class="btn btn-primary" value="Submit" style="float: right;"></font>
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