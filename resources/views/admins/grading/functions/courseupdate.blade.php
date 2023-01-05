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

        <form method="POST" action="/updatecourse/{{$course->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4 left-to-right">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Update Strand</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3" style="color: red">
                                        * required field
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><span style="color: red">*</span> Strand Name</label>
                                            <input type="text" name="courseName"  class="form-control @error('courseName') is-invalid @enderror" value="{{$course->courseName}}" style="font-size: 14px;" >
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><span style="color: red">*</span> Abbreviation</label>
                                            <input type="text" name="abbreviation"  class="form-control @error('abbreviation') is-invalid @enderror" value="{{$course->abbreviation}}" style="font-size: 14px;">
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><span style="color: red">*</span> Strand Description</label>
                                            <textarea name="description" type=text id="editor"  class="form-control @error('description') is-invalid @enderror">{!!$course->description!!}</textarea style="font-size: 14px;">
                                        </div>
                                    </div><br/>
                                    <!-- Form Row -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;"><span style="color: red">*</span> Code</label>
                                            <input type="text" name="code"  class="form-control @error('code') is-invalid @enderror" value="{{$course->code}}"style="font-size: 14px;">
                                        </div>
                                    </div><br/>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group whr-->
                                        <div class="col-md-10">
                                            <label style="font-size: 20px;">Video Link (Copy embed link on youtube and paste it here) </label>
                                            <input type="text" name="link"  class="form-control @error('link') is-invalid @enderror" value="{{$course->link}}" style="font-size: 14px;">
                                        </div>
                                    </div><br/>
                                    <hr>
                                    <a class="btn btn-info btn-md" href="/gradingcourses"><i class="fas fa-arrow-left"></i> Back</a>
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