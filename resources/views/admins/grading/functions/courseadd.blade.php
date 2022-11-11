@include('partials.adminheader')
@include('partials.adminThirdHeader')
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

        <form method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 20px;">Create Strand</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow" >
                                <div class="card-header"><font face = "Bedrock" size = "6"><b>New Strand</b></font></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <label>Strand Name</label>
                                            <input type="text" name="courseName"  class="form-control @error('courseName') is-invalid @enderror" value="{{ old('courseName') }}" style="font-size: 14px;" >
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label>Abbreviation</label>
                                            <input type="text" name="abbreviation"  class="form-control @error('abbreviation') is-invalid @enderror" value="{{ old('abbreviation') }}" style="font-size: 14px;">
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label>Strand Description</label>
                                            <textarea name="description" id="editor" type=text class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea style="font-size: 14px;">
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label>Code</label>
                                            <input type="text" name="code"  class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}"style="font-size: 14px;">
                                        </div>
                                    </div><br/>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label>Video Link (Copy embed link on youtube and paste it here) </label>
                                            <input type="text" name="link"  class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}" style="font-size: 14px;">
                                        </div>
                                    </div><br/>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label class="large mb-1" for="inputcontent">Image (Only png and jpg files are allowed)</label>
                                            <div class ="form-group row">
                                                <div class="col-md-8"></div>
                                                <input type="file" name = "image" class="form-control">
                                            </div> 
                                        </div>
                                    </div><br/>
                                    <hr>
                                    <a class="btn btn-info btn-md" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                                    <div class="pull-right">
                                        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
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