@include('partials.adminheader')
@include('partials.adminThirdHeader')
<main>
<div class="left-to-right" style="padding: 10px 40px 10px 40px;">

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

        <form method="POST" action="{{ route('gradelevel.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Create New Grade Level </h3>  
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Group (title)-->
                                    <div class="col-md-10">
                                        <label style="font-size: 28px;">Gradelevel</label>
                                        <input type="text" name="gradelevel" class="form-control @error('gradelevel') is-invalid @enderror" value="{{ old('gradelevel') }}" style="font-size: 14px;">
                                    </div>
                                    <hr>
                                    <a class="btn btn-info btn-md" href="/gradinggradelevels"><i class="fas fa-arrow-left"></i> Back</a>
                                    <div class="pull-right">
                                        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            CKEDITOR.replace('editor');
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