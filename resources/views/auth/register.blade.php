@extends('web.layouts.app' , ['title' => "Register"])
@section('content')
<style>
.auth_form .sidebar{
	background-color: white;
	background-size: 100%;
}

.auth_form .head-title{
	padding: 10px;
	font-size: 25px;
	font-weight: bold;
}

.selected_reg{
	border-color: #2FF06A;
	color: #2FF06A;
	border-style: solid;
	border-width: 2px;
}

.msg_area{
	font-weight: bold;
}

label {
    color: #191F26;
    font-size: 13px;
    text-transform:capitalize;
	padding: 0 0 5px 1px;
	text-align:left;
	float:left;
}

</style>
	<!-- Main -->
	<main class="main auth_form" role="main">
		<!-- Page info -->
		{{-- <header class="site-title color">
			<div class="wrap">
				<div class="container">
					<h1>Register</h1>
					<nav role="navigation" class="breadcrumbs">
						<ul>
							<li><a href="index.html" title="Home">Home</a></li>
							<li>Register</li>
						</ul>
					</nav>
				</div>
			</div>
		</header> --}}
		<!-- //Page info -->
		

		<div class="container">
			<div class="row mt-5">
				<div class="col-md-4">
					<div class="container card">
						<div class=" head-title mt-3 mb-4"><i>Register As</i></div>
						<div class="card setRegInputValue selected_reg p-3 m-3" data-value="0">
							<div class="image_area p-2 mb-3">
								<img src="{{ $logo_img }}" alt="Transfers" width="50"/>
							</div>
							<div class="msg_area">
								A Passenger
							</div>
						</div>
						<div class="card setRegInputValue p-3 m-3" data-value="1">
							<div class="image_area p-2 mb-3">
								<img src="{{ $logo_img }}" alt="Transfers" width="50"/>
							</div>
							<div class="msg_area">
								A Company
							</div>
						</div>
					</div>
					
				</div>
				<div class=" col-md-8">
					<div class="container card">
						<div class="h3 mt-4 mb-2"><i>Basic Information</i></div>
						@include('web.includes.flash_message')
						<!--Login-->
						<div class="">
						<form method="POST" action="{{ route('register') }}"> @csrf
							<input type="hidden" name="role" id="userRoleInput" required value="0">
								<div class="form-row p-3">
									<div class="col-md-6 form-group">
										<div class="">
											<label for="name">First Name</label>
											<input class="form-control" type="text" name="fname" required />
										</div>
									</div>
									<div class="col-md-6 form-group">
										<div class="">
											<label for="name">Last Name</label>
											<input class="form-control" type="text" name="lname" required/>
										</div>
									</div>

									<div class="col-md-4 form-group">
										<div class="">
											<label for="email">Email Address</label>
											<input class="form-control" type="email" name="email" required/>
										</div>
									</div>
								
									<div class="col-md-4 form-group">
										<div class="">
											<label for="password">Your password</label>
											<input class="form-control" type="password" name="password" required/>
										</div>
									</div>

									<div class="col-md-4 form-group">
										<div class="">
											<label for="password_confirmation">Repeat password</label>
											<input class="form-control" type="password" name="password_confirmation" required/>
										</div>
									</div>

									<div class="col-md-6 form-group ">
										<div class=" ">
											<input type="checkbox" id="checkbox" />
											<label for="checkbox">I agree with terms and conditions.</label>
										</div>
									</div>
									<div class="col-md-6 form-group">
										<div class=" ">
											<p>Already have an account? <a href="{{ route('login') }}">Login</a>.</p>
										</div>
									</div>
								</div>
								
								<div class="col-md-12 form-group" >
									<div class="mt-2 mb-3">
										<input type="submit" value="Create an account" class="btn color medium full" />
									</div>
								</div>
								
							</form>
						</div>
						<!--//Login-->
					</div>
				</div>
			</div>
		</div>
		
	
	</main>
	<!-- //Main -->
@endsection