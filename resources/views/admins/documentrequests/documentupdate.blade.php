@include('partials.adminheader')
<main>
<br/><br/><br/><br/>
<body style="font-family: Arial;"> 

	
	<section id="about" class="about">
		<div class="container left-to-right">
			<div class="body-container">

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

                <form method="POST" action="/updatedocument/{{$document->id}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="container-xl px-4 mt-4">
                        <!-- page navigation-->
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card border-start-lg border-start-yellow">
                                        <div class="card-header">Create document</div>
                                        <div class="card-body" style="padding: 10px 40px 10px 40px">
                                            <div class="mb-3">

                                            </div>
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                    <div class="mb-3">
                                                            <label class="large" for="name">Add document</label>
                                                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" style="font-size: 16px;" placeholder="Document Name" name="name" value="{{$document->name}}">
                                                    </div><br>
                                                <div class="row gx-3 mb-3">
                                                    <!-- Save changes button-->
                                                    <font face = "Bedrock" size = "3"><input type="submit" class="btn btn-primary" value="Submit" style="float: right;"></font>
                                                </div>
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
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });
    </script>
</main>
<br><br><br><br>