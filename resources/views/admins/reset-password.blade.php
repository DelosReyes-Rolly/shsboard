@include('partials.adminheader')
<main>
<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
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
                <form action="{{ url('/reset-password-admin') }}" method="POST" class="needs-validation" novalidate>
					@csrf
                    <input type="hidden" name="action" value="update" class="form-control"/>
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif  
                    <div class="form-group">
                        <label><strong>Enter New Password:</strong></label>                                
                        <input type="password"  name="new_password" class="form-control" required minlength="6"/>
                        <div class="invalid-feedback">
                            Please input valid password.
                        </div>
                    </div>
                    <div class="form-group">
                        <label><strong>Confirm Password:</strong></label>                             
                        <input type="password"  name="confirm_password" class="form-control" required minlength="6"/>
                        <div class="invalid-feedback">
                            Please input valid password.
                        </div>
                    </div>
                        <center><font face = "Bedrock" size = "3" ><input type="submit" id="reset" value="Reset Password" style="padding-left:40px; padding-right:40px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 20px; background-color:#1c8a43; color: #ffffff; border: none; border-radius: 20px; cursor:pointer;"></center></font>
                    </div>
                </form>
                <br>
            </div>
        </div>
</main>     