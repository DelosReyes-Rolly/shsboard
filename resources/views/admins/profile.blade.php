@include('partials.adminheader')
<main>
	<section class="top-to-bottom">
		<div>
		 	<!-- php
	           	// if(!empty($success)){   
	           	// 	echo '<div class="alert alert-success">'.$success.'</div>';
	            // }
	        ?> -->
	       	<form action="{{ url('profile',['id'=>Auth::user()->id]) }}" method="post"class="needs-validation" novalidate>
                @method('PUT')
                @csrf
	            <div class="rounded bg-white mt-5 mb-5">
	            	<div style="font-size: 20px; background-color:rgb(248, 248, 248) ;">
						<b>Profile Information</b>
						<hr style="border:1px solid black;">
					</div>
						<div style="box-shadow: 0 4px 16px rgba(0,0,0,1);">		
								<div class="row">
									<div class="col-md-3 border-right">
									    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{ URL::asset('img/shs.png')}}"><br>
									    	<span class="font-weight-bold"> {{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->last_name}} </span><span class="text-black-50"><br>Administrator</span><span> </span></div>
									</div>
									<div class="col-md-5 border-right">
									    <div class="p-3 py-5">
											@if ($message = Session::get('success'))
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
									       	<div>
									           	<b><div class="text-center" style="font-size: 28px; color:green;">Profile Settings</div><br><hr style="border:1px solid grey;"></b><br>
									       	</div>
									    <div class="row mt-2">
									    	<div class="col-md-12" style="font-size: 20px;">
												<label>First Name</label><input style="font-size: 18px;"  class="form-control @error('first_name') is-invalid @enderror" type="text" onkeydown="return alphaOnly(event);" name="first_name" class="form-control"  required maxlength="255" value="{{Auth::user()->first_name}}">
												<div class="invalid-feedback">
													Please input first name.
												</div>
											</div>
									    	<div class="col-md-12" style="font-size: 20px;"><br/>
												<label>Middle Name</label><input style="font-size: 18px;"  class="form-control @error('middle_name') is-invalid @enderror" type="text" onkeydown="return alphaOnly(event);" name="middle_name" class="form-control"  required maxlength="255" value="{{Auth::user()->middle_name}}">
												<div class="invalid-feedback">
													Please input middle name.
												</div>
											</div>
									       	<div class="col-md-12" style="font-size: 20px;"><br/>
												<label>Last Name</label><input style="font-size: 18px;"  class="form-control @error('last_name') is-invalid @enderror" type="text" onkeydown="return alphaOnly(event);" name="last_name" class="form-control" required maxlength="255" value="{{Auth::user()->last_name}}">
												<div class="invalid-feedback">
													Please input last name.
												</div>
											</div>
									   	</div>
									    <hr>
				          				<div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Submit"></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="p-3 py-5">
									    <div class="d-flex justify-content-between align-items-center experience"><span>Additional Info</span></div><br>
									  	<div class="col-md-12" style="font-size: 20px;"><label class="labels">Email</label><input style="font-size: 18px;"  type="text" class="form-control" placeholder="{{Auth::user()->email}}"readonly></div> <br>
									    <div class="col-md-12" style="font-size: 20px;"><label class="labels">Username</label><input style="font-size: 18px;"  type="text" class="form-control" placeholder="{{Auth::user()->username}}" readonly></div>
									</div>
								</div>
						</div>
					<hr>
					</div>
					<hr style="border:1px solid black;">
				</div>				
			</form>
		</div>
	</section>
	<script src="{{ asset('assets/js/needs-validated2.js') }}"></script>
</main>     