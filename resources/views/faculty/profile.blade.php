
@include('partials.facultyheader')
<main>
<br><br><br><br><br><br><br><br><br><br>
	<!-- php
	    // if(!empty($success)){   
	    // 	echo '<div class="alert alert-success">'.$success.'</div>';
	    // }
	?> -->

	<form action="/facultyprofile/{{Auth::user()->id}}/{{$address->id}}" method="post">
        @method('PUT')
         @csrf
	    <div class="container rounded bg-white mt-5 mb-5 top-to-bottom">
			<div style="font-size: 20px;"><b>Profile Information</b></div>
			<hr style="border:1px solid black;">
			<hr>
			<div class="row">
				<div class="col-md-3 border-right">
					<div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" 
						@if (Auth::user()->gender == "Male")
							src="{{ URL::asset('img/profile-male.png')}}"><br>
						@elseif(Auth::user()->gender == "Female")
							src="{{ URL::asset('img/profile-female.png')}}"><br>
						@elseif(Auth::user()->gender == "Others")
							src="{{ URL::asset('img/shs.png')}}"><br>
						@else
							src="{{ URL::asset('img/svnhs-logo.png')}}"><br>
						@endif
						<span class="font-weight-bold"> {{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->last_name}} </span><span class="text-black-50"><br>Faculty</span><span> </span><br/><br/>
					</div>
				</div>
				<div class="col-md-5 border-right">
					<div class="p-3 py-5">
						@if ($message = Session::get('message'))
							<div class="alert alert-success alert-block">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>{{ $message }}</strong>
							</div>
						@endif
									
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
						<div class="d-flex justify-content-between align-items-center mb-3">
							<b><div class="text-center" style="font-size: 28px; color:green;">Profile Settings</div><br><hr style="border:1px solid grey;"></b><br>
						</div>
						<div class="row mt-2">
							<div class="col-md-4" style="font-size: 18px;"><label>First Name</label><input  style="font-size: 16px;" class="form-control @error('first_name') is-invalid @enderror" type="text"  name="first_name" class="form-control" placeholder="{{Auth::user()->first_name}}" value={{Auth::user()->first_name}}></div>
							<div class="col-md-4" style="font-size: 18px;"><label>Middle Name</label><input style="font-size: 16px;" class="form-control @error('middle_name') is-invalid @enderror" type="text" name="middle_name" class="form-control" placeholder="{{Auth::user()->middle_name}}" value={{Auth::user()->middle_name}}></div>
							<div class="col-md-4" style="font-size: 18px;"><label>Last Name</label><input style="font-size: 16px;" class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" class="form-control" placeholder="{{Auth::user()->last_name}}" value={{Auth::user()->last_name}}></div>
						</div><br/>
						<div class="row mt-3">
							<div class="col-md-12" style="font-size: 18px;"><label>Email</label>
								<input style="font-size: 16px;" class="form-control @error('email') is-invalid @enderror" type="text" name="email" class="form-control" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}">
							</div><br/><br/>
							<div class="col-md-12" style="font-size: 18px;"><label for="gender">Gender</label>
								<select id="gender" name="gender"  class="form-control @error('gender') is-invalid @enderror" value="{{Auth::user()->gender}}">
									<option value="" hidden>  Please Select Gender </option>
									<option value="Male" {{Auth::user()->gender == "Male" ?'selected' : ''}}>Male</option>
									<option value="Female" {{Auth::user()->gender == "Female" ?'selected' : ''}}>Female</option>
									<option value="Prefer Not To Say" {{Auth::user()->gender == "Prefer Not To Say" ?'selected' : ''}}>Prefer not to say</option>
									<option value="Others" {{Auth::user()->gender == "Others" ?'selected' : ''}}>Others</option>
								</select>
							</div><br/>
							<div class="col-md-12" style="font-size: 18px;"><label>Username</label>
								<input style="font-size: 16px;" class="form-control @error('username') is-invalid @enderror" type="text" name="username" class="form-control" placeholder="{{Auth::user()->username}}" value="{{Auth::user()->username}}">
							</div><br/><br/><br/>
						</div>
					</div>
				</div>	
				<div class="col-md-4" style="font-size: 18px;">
					<div class="p-3 py-5"><br><br><br><br>
						<div class="d-flex justify-content-between align-items-center experience"><span>Address</span></div>
						<br><br>
						<div class="col-lg-6"><label>Street</label><input style="font-size: 16px;" type="text" class="form-control @error('street') is-invalid @enderror" name="street" placeholder="{{$address->street}}" alue={{$address->street}}></div>
						<div class="col-lg-6"><label>Village</label><input style="font-size: 16px;" type="text" class="form-control @error('village') is-invalid @enderror" name="village" placeholder="{{$address->village}}" value={{$address->village}}></div>
						<div class="col-lg-6"><label>City</label><input style="font-size: 16px;" type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="{{$address->city}}" value={{$address->city}}></div>
						<div class="col-lg-6"><label>Zip code</label><input style="font-size: 16px;" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" placeholder="{{$address->zip_code}}" value={{$address->zip_code}}></div>
					</div>
				</div><br/>	
				<hr>
			</div>
			<hr style="border:1px solid black;"><hr>
			<div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Submit"></div>
		</div>
	</form>
</main>     