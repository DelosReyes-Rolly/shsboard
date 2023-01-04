@include('partials.adminheader')
<main>
        <div class="box-form">
            <div class="left fade-in-text">
                <div class="overlay">
                    <center>
						<img src='{{ URL::asset("img/shs.png")}}'>
                        <h6>SENIOR HIGH <br> SCHOOL BOARD</h6>
                    </center>
                </div>
            </div>
            <div class="right">
                <div class="right-logo">
                    <center>
                        <img src='{{ URL::asset("img/shs.png")}}'><br/><br/>
                    </center>
                </div>
                <div class="card-header" style="background-color: #1c8a43; color:white; text-align:center; border-radius:10px; font-weight:bold; font-family: arial black"> Reset Password</div><br/>
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
                <form action="/reset-password-admin" method="POST">
					@csrf
                    <input type="hidden" name="action" value="update" class="form-control"/>
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif  
                    <div class="form-group animate pop">
                        <label><strong>Enter New Password:</strong></label>                                
                        <input type="password"  name="new_password" class="form-control"/>
                    </div>
                    <div class="form-group animate pop delay-1">
                        <label><strong>Confirm Password:</strong></label>                             
                        <input type="password"  name="confirm_password" class="form-control"/>
                    </div>
                        <center><font face = "Bedrock" size = "3" ><input type="submit" id="reset" value="Reset Password" class="btn btn-primary" style="padding-left:40px; padding-right:40px;"></center></font>
                    </div>
                </form>
                <br>
            </div>
        </div>
</main>     