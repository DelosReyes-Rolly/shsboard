@include('partials.landingheader')
<!-- student login start -->
    <br><br><br><br>
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
                    @isset($url)
                    <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                    @else
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @endisset
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <center><h1 style="font-family: arial black;">STUDENT MODULE</h1></center>
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
                            <input id="LRN" type="text" class="form-control @error('LRN') is-invalid @enderror" name="LRN" value="{{ old('LRN') }}" required autocomplete="LRN" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="LRN" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('First Name') }}</label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="middle_name" class="col-form-label text-md-end">{{ __('Middle name') }}</label>
                            <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus>
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Last name') }}</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="suffix" class="col-form-label text-md-end"> {{ __('Suffix') }}</label>
                            <input id="suffix" type="text" class="form-control @error('suffix') is-invalid @enderror" name="suffix" value="{{ old('suffix') }}" autocomplete="suffix" autofocus>
                            @error('suffix')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                

                        <div class="form-group">
                            <label for="username" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for ="gender"><span style="color: red">*</span> Sex</label><br>
                            <select name="gender" id="gender" class="form-control" value="{{ old('gender') }}" style="font-size: 14px;">
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
                            <select name="gradelevel_id" id="gradelevel_id" class="form-control" value="{{ old('gradelevel_id') }}" style="font-size: 14px;">
                                <option value="" {{old('gradelevel_id') == "" ?'selected' : ''}}  disabled> Please Select Grade Level </option>
                                @foreach($level_data as $gradelevel_id)
                                    <option value="{{$gradelevel_id->id}}" >{{$gradelevel_id->gradelevel}}</option>
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
                            <select name="section_id" id="section_id" class="form-control" value="{{ old('section_id') }}" style="font-size: 14px;">
                                <option value="" {{old('section_id') == "" ?'selected' : ''}} disabled> Please Select section </option>
                                @foreach($section_data as $section_id)
                                    <option value="{{$section_id->id}}">{{$section_id->section}}</option>
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
                            <input id="course_id" type="password" class="form-control @error('course_id') is-invalid @enderror" name="course_id" value="{{ old('course_id') }}" required autocomplete="course_id" autofocus>
                            @error('course_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-end"><span style="color: red">*</span> {{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <center><font face = "Bedrock" size = "3" >
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </center></font>
                    </form>
            </div>
        </div>
        <br/><br/>
        @include('partials.landingfooter')
