@include('partials.landingheader')
<style>

    .password{
        height: 34px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
    }
    
</style><!-- student login start -->
    <br/><br/><br/><br/>
    <div class="reg regOthers">     
		<div class="col-md-12">
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
                    @isset($url)
                    <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                    @else
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @endisset
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card-header" style="background-color: #1c8a43; color:white; text-align:center; border-radius:10px; font-weight:bold; font-family: arial black"> STUDENT REGISTRATION MODULE</div>
                        <br>
                        <div class="mb-3" style="color: red">
                            * required field
                        </div>
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
                        <div class="form-group">
                            <label for="LRN" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('LRN') }}</label>
                                <input id="LRN" type="text" class="form-control @error('LRN') is-invalid @enderror" name="LRN" value="{{ old('LRN') }}" required autocomplete="LRN" autofocus onkeypress="return onlyNumberKey(event)" maxlength="12" minlength="12"/>
                                @error('lrn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="LRN" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus onkeydown="return alphaOnly(event);" maxlength="255"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="middle_name" class="col-form-label text-md-end">{{ __('Middle name') }}</label>
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus onkeydown="return alphaOnly(event);" maxlength="255"/>
                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Last name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus onkeydown="return alphaOnly(event);" maxlength="255"/>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="suffix" class="col-form-label text-md-end"> {{ __('Suffix') }}</label>
                                <input id="suffix" type="text" class="form-control @error('suffix') is-invalid @enderror" name="suffix" value="{{ old('suffix') }}" autocomplete="suffix" autofocus onkeydown="return alphaOnly(event);" maxlength="255"/>
                                @error('suffix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                

                            <div class="form-group">
                                <label for="username" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Username') }}</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus onkeydown="return alphaOnly(event);" maxlength="255"/>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for ="gender"><span style="color: red">*</span> Sex</label><br>
                                <select name="gender" id="gender" class="form-control" value="{{ old('gender') }}" style="font-size: 14px;" required>
                                    <option value="" {{old('gender') == "" ?
                                    'selected' : ''}} disabled>  Please Select Sex </option>
                                    <option value="Male" {{old('gender') == "Male" ?
                                    'selected' : ''}}>Male </option>
                                    <option value="Female" {{old('gender') == "Female" ?
                                    'selected' : ''}}>Female</option>
                                </select>
                            @error('gender')
                                <p>
                                    {{$message}}
                                </p>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="gradelevel_id" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Grade Level') }}</label><br>
                                <select name="gradelevel_id" id="gradelevel_id" class="form-control" style="font-size: 14px;" required>
                                    <option value="" {{old('gradelevel_id') == "" ?'selected' : ''}}  disabled> Please Select Grade Level </option>
                                    @foreach($level_data as $gradelevel_id)
                                        <option value="{{$gradelevel_id->id}}"  {{(old('gradelevel_id')==$gradelevel_id->id)? 'selected':''}}>{{$gradelevel_id->gradelevel}}</option>
                                    @endforeach
                                </select>
                                @error('gradelevel_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                
                            <div class="form-group">
                                <label for="section_id" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Section') }}</label>
                                <select name="section_id" id="section_id" class="form-control" style="font-size: 14px;" required>
                                    <option value="" {{old('section_id') == "" ?'selected' : ''}} disabled> Please Select section </option>
                                    @foreach($section_data as $section_id)
                                        <option value="{{$section_id->id}}"{{(old('section_id')==$section_id->id)? 'selected':''}}>{{$section_id->section}}</option>
                                    @endforeach
                                </select>
                                @error('section')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="course_id" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Strand Code') }}</label><br>
                                <input id="course_id" type="password" class="form-control @error('course_id') is-invalid @enderror" name="course_id" value="{{ old('course_id') }}" required autocomplete="course_id" autofocus maxlength="255">
                                @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="255"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Password') }}</label>
                                <input id="password" type="password" class="password @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/><br/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span style="float:left;"><input id="showpass" type="checkbox" onclick="showpassw()"></span>
                                <span style="float:left;"><label for="showpass">&ensp;Show password</label></span><br/>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="password" name="password_confirmation" required autocomplete="new-password"/><br/>
                                <span style="float:left;"><input id="showpass2" type="checkbox" onclick="showpassw2()"></span>
                                <span style="float:left;"><label for="showpass2">&ensp;Show password</label></span><br/>
                            </div>
                            <center><font face = "Bedrock" size = "3" >
                                <button type="submit" class="btn btn-primary" style="padding-left:40px; padding-right:40px;">
                                    {{ __('Register') }}
                                </button>
                            </center></font>
                        </form>
                        
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
            <!-- <script>
                const togglePassword = document.querySelector("#togglePassword");
                const password = document.querySelector("#password");

                togglePassword.addEventListener("click", function () {
                    // toggle the type attribute
                    const type = password.getAttribute("type") === "password" ? "text" : "password";
                    password.setAttribute("type", type);
                    
                    // toggle the icon
                    this.classList.toggle("bi-eye");
                });

                // prevent form submit
                const form = document.querySelector("form");
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                });
            </script>
            <script>
                const togglePassword2 = document.querySelector("#togglePassword2");
                const password2 = document.querySelector("#password-confirm");

                togglePassword2.addEventListener("click", function () {
                    // toggle the type attribute
                    const type = password2.getAttribute("type") === "password" ? "text" : "password";
                    password2.setAttribute("type", type);
                    
                    // toggle the icon
                    this.classList.toggle("bi-eye");
                });
            </script> -->
        <br/><br/>
        </div></div>
        @include('partials.landingfooter')
