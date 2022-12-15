
@include('partials.landingheader')
<br/><br/><br/><br/>
    <div class="loginchoice">     
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
                    <br><br>
                    <div class="card-header" style="background-color: #1c8a43; color:white; text-align:center; border-radius:10px; font-weight:bold; font-family: arial black"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>
                    <br><br>
                        @isset($url)
                        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @endisset
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror animate pop" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="username@email.com" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror animate pop" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br/>
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
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
@include('partials.landingfooter')
