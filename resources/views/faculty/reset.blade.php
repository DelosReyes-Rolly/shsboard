
@include('partials.landingheader')

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
                @if ($message = Session::get('message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form method="POST" action="/resetpassfaculty/">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="username@email.com" autofocus>
                            
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
    </div>
</div>
@include('partials.landingfooter')