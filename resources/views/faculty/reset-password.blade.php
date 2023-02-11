@include('partials.facultyheader')
<main>
        <div class="box-form" style="width: 80%">
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
                        <img style="width:auto; height:auto;" src='{{ URL::asset("img/shs.png")}}'><br/><br/>
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
                <form action="{{ url('/reset-password-faculty') }}" method="POST">
					@csrf
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif  
                    <input type="hidden" name="action" value="update" class="form-control"/>
                    <div class="form-group">
                        <label><strong>Enter New Password:</strong></label>                                
                        <input type="password" id="password" name="new_password" class="form-control" required minlength="8" required/>
                        <span style="float:left;"><input id="showpass" type="checkbox" onclick="showpassw()"></span>
                        <span style="float:left;"><label for="showpass">&ensp;Show password</label></span><br/>
                    </div>
                    <div class="form-group">
                        <label><strong>Confirm Password:</strong></label>                             
                        <input type="password" id="password-confirm" name="confirm_password" class="form-control" required minlength="8" required/>
                        <span style="float:left;"><input id="showpass2" type="checkbox" onclick="showpassw2()"></span>
                        <span style="float:left;"><label for="showpass2">&ensp;Show password</label></span><br/>
                    </div>
                        <center><font face = "Bedrock" size = "3" ><input type="submit" id="reset" value="Reset" style="padding-left:40px; padding-right:40px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 20px; background-color:#1c8a43; color: #ffffff; border: none; border-radius: 20px; cursor:pointer;"></center></font>
                    </div>
                </form>
                <br>
            </div>
        </div>
        
        <script>
                function showpassw() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
                function showpassw2() {
                    var x = document.getElementById("password-confirm");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
</main>     