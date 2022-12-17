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

        <form method="POST" action="/updatesection/{{$section->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="container-xl px-4 mt-4">
                <!-- page navigation-->
                <h3 style="font-size: 28px; font-weight: 800;">Update Section</h3>
                <hr class="mt-0 mb-4">
                <div class="row">
                    
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card border-start-lg border-start-yellow">
                                <div class="card-header"><font face = "Bedrock" size = "6"><b><i class="fas fa-pencil-alt"></i> Edit Section Information</b></font></div>
                                <div class="card-body" style="padding: 10px 40px 10px 40px">
                                    <div class="mb-3">

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        
                                        <!-- Form Group (title)-->
                                        <div class="col-md-10">
                                            <label style="font-size: 28px;">Section</label>
                                            <input type="text" name="section" class="form-control @error('section') is-invalid @enderror" value="{{$section->section}}" style="font-size: 14px;">
                                        </div>
                                    </div>
                                    <hr>
                                    <a class="btn btn-info btn-md" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
                                    <div class="pull-right">
                                        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary" value="Submit"></font>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </form>
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