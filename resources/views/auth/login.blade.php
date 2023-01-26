<style>
    form i {
        cursor: pointer;
        font-size: 20px;
    }

    #password{
        height: 34px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
</style>
@include('partials.landingheader')
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <div class="loginchoice loginOthers">     
		<div class="col-md-12 text-center">
            <div class="box-form">
                <div class="left">
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
                    <div class="card-header" style="background-color: #1c8a43; color:white; text-align:center; border-radius:10px; font-weight:bold; font-family: arial black"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>
                    <br><br>
                        @isset($url)
                        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @endisset
                            @csrf
                            <div class="form-group">
                                @if ($message = Session::get('message'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                                    
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Whoops!</strong> There were some problems with your input.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <label>Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror animate pop" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="255" placeholder="username@email.com" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="@error('password') is-invalid @enderror animate pop" name="password" minlength="6" required autocomplete="current-password">
                                <i class="bi bi-eye-slash animate pop" style="margin-left: -30px;" id="togglePassword"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br/>
                            <button type="submit" class="btn btn-primary" style="padding-left:40px; padding-right:40px;">{{ __('Login') }}</button>
                            <b><br/><br/>
                                @if (Route::is('login.students'))
                                    <a href='{{ url("register/students") }}'>
                                        {{ __('Register') }}
                                    </a><br><br>
                                @endif
                                @if ($url == "students")
                                    <a href='{{ url("reset/students") }}'>
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                @if ($url == "admins")
                                    <a href='{{ url("reset/admins") }}'>
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                @if ($url == "faculties")
                                    <a href='{{ url("reset/faculties") }}'>
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </b><br>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>
@include('partials.landingfooter')
