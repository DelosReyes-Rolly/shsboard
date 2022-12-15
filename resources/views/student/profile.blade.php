@include('partials.studentheader')
<main>
	<!-- php
	    // if(!empty($success)){   
	    // 	echo '<div class="alert alert-success">'.$success.'</div>';
	    // }
	?> -->
	<form action="/studentprofile/{{Auth::user()->id}}/{{$address->id}}" method="post">
        @method('PUT')
         @csrf
	    <div class="rounded bg-white mt-5 mb-5 top-to-bottom">
		<div style="font-size: 20px; background-color:rgb(229, 238, 229) ;">
			<b>Profile Information</b>
			<hr style="border:1px solid black;">
		</div>
		<div style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
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
						<span class="font-weight-bold"> {{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->last_name}} </span><span class="text-black-50"><br>Student</span><span> </span><br/><br/>
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
						<div class="mb-3">
							<b><div class="text-center" style="font-size: 28px; color:green;">Profile Settings</div><br><hr style="border:1px solid grey;"></b><br>
						</div>
						<div class="row mt-2">
							<div class="col-md-3" style="font-size: 18px;"><label>First Name</label><input style="font-size: 16px;" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="{{Auth::user()->first_name}}" value={{Auth::user()->first_name}}></div>
							<div class="col-md-3" style="font-size: 18px;"><label>Middle Name</label><input style="font-size: 16px;" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" placeholder="{{Auth::user()->middle_name}}" value={{Auth::user()->middle_name}}></div>
							<div class="col-md-3" style="font-size: 18px;"><label>Last Name</label><input style="font-size: 16px;" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="{{Auth::user()->last_name}}" value={{Auth::user()->last_name}}></div>
							<div class="col-md-3" style="font-size: 18px;"><label>Suffix</label><input style="font-size: 16px;" type="text" class="form-control @error('suffix') is-invalid @enderror" name="suffix" placeholder="{{Auth::user()->suffix}}" value={{Auth::user()->suffix}}></div>
						</div><br/>
						<div class="row mt-3">
							<div class="col-md-12" style="font-size: 18px;"><label>Username</label><input style="font-size: 16px;" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="{{Auth::user()->username}}" value="{{Auth::user()->username}}"></div><br/><br/>
							<div class="col-md-12" style="font-size: 18px;"><label>Mobile Number</label><input style="font-size: 16px;" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="{{Auth::user()->phone_number}}" value="{{Auth::user()->phone_number}}"></div><br/><br/>
							<div class="col-md-12" style="font-size: 18px;"><label>Email</label><input style="font-size: 16px;" type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}"></div><br/>
							<div class="col-md-12" style="font-size: 18px;"><label for="gender">Sex</label>
								<select id="gender" name="gender"  class="form-control @error('gender') is-invalid @enderror" value="{{Auth::user()->gender}}">
									<option value="" hidden>  Please Select Sex </option>
									<option value="Male" {{Auth::user()->gender == "Male" ?'selected' : ''}}>Male</option>
									<option value="Female" {{Auth::user()->gender == "Female" ?'selected' : ''}}>Female</option>
								</select>
							</div><br/>
						</div>
						<div class="row mt-2">
							<div class="col-lg-6" style="font-size: 18px;"><label>Street</label><input style="font-size: 16px;" type="text" class="form-control @error('street') is-invalid @enderror" name="street" placeholder="{{$address->street}}" value={{$address->street}}></div>
							<div class="col-lg-6" style="font-size: 18px;"><label>Village</label><input style="font-size: 16px;" type="text" class="form-control @error('village') is-invalid @enderror" name="village" placeholder="{{$address->village}}" value={{$address->village}}></div>
							<div class="col-lg-6" style="font-size: 18px;"><label>City</label><input style="font-size: 16px;" type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="{{$address->city}}" value={{$address->city}}></div>
							<div class="col-lg-6" style="font-size: 18px;"><label>Zip code</label><input style="font-size: 16px;" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" placeholder="{{$address->zip_code}}" value={{$address->zip_code}}></div>
						</div><br/>
						<hr>
						<div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Update"></div>
					</div>
				</div>		
				<div class="col-md-4">
					<div class="p-3 py-5">
						<div class="d-flex justify-content-between align-items-center experience"><span>Additional Info</span></div><br>
						<div class="col-md-12" style="font-size: 18px;"><label class="labels">LRN</label><input style="font-size: 16px;" type="text" class="form-control" placeholder="{{Auth::user()->LRN}}" value="" readonly></div> <br>
						<div class="col-md-12" style="font-size: 18px;"><label class="labels">Strand</label><input style="font-size: 16px;" type="text" class="form-control" placeholder="{{$student->course->courseName}}" value="" readonly></div>
						<div class="col-md-12" style="font-size: 18px;"><label class="labels">Section</label><input style="font-size: 16px;" type="text" class="form-control" placeholder="{{$student->section->section}}" value="" readonly></div> <br>
					</div>
				</div>
				<hr>
			</div>
		</div>
		<hr style="border:1px solid black;">
		</div>
	</form>
</main>     