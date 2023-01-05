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

                <form method="POST" action="/updatepurpose/{{$purpose->id}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="container-xl px-4 mt-4">
                        <!-- page navigation-->
                        <h3 style="font-size: 28px; font-weight: 800;">Update purpose</h3>
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="border-start-lg border-start-yellow">
                                        <div class="card-header"></div>
                                        <div class="card-body" style="padding: 10px 40px 10px 40px">
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                <label class="large" for="purpose" style="font-size: 20px;">Purpose:</label>
                                                <br>
                                                <input class="form-control @error('purpose') is-invalid @enderror" id="purpose" type="text" style="font-size: 16px;" placeholder="Document purpose" name="purpose" value="{{$purpose->purpose}}">
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <label class="large" for="proof_needed" style="font-size: 20px;">Proof needed:</label>
                                                <br>
                                                <input class="form-control @error('proof_needed') is-invalid @enderror" id="proof_needed" type="text" style="font-size: 16px;" placeholder="Proof Needed" name="proof_needed" value="{{$purpose->proof_needed}}">
                                            </div>
                                            <a class="btn btn-info btn-md" href="/documentrequest"><i class="fas fa-arrow-left"></i> Back</a>
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