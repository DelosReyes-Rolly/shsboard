@include('partials.adminheader')
@include('partials.adminSecondHeader')
<main>
<div class="left-to-right">

        <form method="POST" action="/updatereminder/{{$reminder->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Update Reminder </h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header">
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
                                </div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (content)-->
                                        <div class="col-md-6">
                                            <label class="slarge mb-1" for="inputexpired_at" style="font-size: 20px;"><span style="color: red">*</span> Expiry date</label>
                                                <input type="date" class="form-control @error('expired_at') is-invalid @enderror" id="inputexpired_at" placeholder="Enter the date" name="expired_at"  value="{{$reminder->expired_at}}">
                                            </div>
                                        </div><br/>
                                        <div class="mb-3">
                                            <label class="large mb-1" for="editor" style="font-size: 20px;"><span style="color: red">*</span> Content</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="editor" type="text" placeholder="Enter the information" name="content" rows="10" cols="80">{{$reminder->content}}</textarea>
                                        </div><br/>
                                        <!-- Form Group privacy-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Save changes button-->
                                            <a class="btn btn-info btn-md" href="/createReminder"><i class="fas fa-arrow-left"></i> Back</a> &emsp;
                                            <font face = "Verdana" size = "6"><input type="submit" class="btn btn-primary" value="Submit" style="float: right;"></font>
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