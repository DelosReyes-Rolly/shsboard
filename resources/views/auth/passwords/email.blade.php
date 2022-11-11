
@include('partials.landingheader')
<br><br><br><br><br><br><br><br>
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
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="username@email.com" autofocus>
                     @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <br/>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('partials.landingfooter')