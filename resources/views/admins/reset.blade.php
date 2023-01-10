
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
                <div class="right-logo">
                    <center>
                        <img src='{{ URL::asset("img/shs.png")}}'><br/><br/>
                    </center>
                    <div class="card-header" style="background-color: #1c8a43; color:white; text-align:center; border-radius:10px; font-weight:bold; font-family: arial black"> Reset Password</div><br/>
                </div>
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div></br></br>
                @endif
                <form method="POST" action="/resetpassadmin/">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="username@email.com" maxlength="255" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <br/>
                            <button type="submit" class="btn btn-primary" style="padding-left:40px; padding-right:40px;">
                                {{ __('Reset') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('partials.landingfooter')