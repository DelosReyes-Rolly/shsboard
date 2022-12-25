@include('partials.adminheader')
<main>
<body style="font-family: Arial;"> 

	
	<section>
		<div class="left-to-right">
			<div>

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
                        <h3 style="font-size: 28px; font-weight: 800;">Update document</h3>
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="border-start-lg border-start-yellow">
                                        <div class="card-header"></div>
                                        <div class="card-body" style="padding: 10px 40px 10px 40px">
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                <label class="large" for="name" style="font-size: 20px;">Document name:</label>
                                                <br>
                                                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" style="font-size: 16px;" placeholder="Document Name" name="name" value="{{$document->name}}">
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <label class="large" for="proof_needed" style="font-size: 20px;">Proof needed:</label>
                                                <br>
                                                <input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed" type="text" style="font-size: 16px;" placeholder="Proof Needed" name="proof_needed" value="{{$document->proof_needed}}">
                                            </div>
                                            <a class="btn btn-info btn-md" href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
                                            <font face = "Verdana" size = "4"><input type="submit" class="btn btn-primary" value="Submit"></font>
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