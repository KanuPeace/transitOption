@extends('web.layouts.app' , ['title' => "Register"])
@section('content')

<div class="authentication-section">
	<div class="container">
		<div class="main-form ptb-100">
			<form id="#authForm">
				<div class="content">
					<h3>Create Account</h3>
					<p>Register please if you don't have an account</p>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-icon"><i class='bx bx-user'></i></div>
						<input type="text" class="form-control" name="fname" placeholder="First Name" required>
					</div>
					<div class="form-group col-md-6">
						<input type="text" class="form-control" name="lname" placeholder="Last name" required>
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon"><i class='bx bx-at'></i></div>
					<input type="email" name="email" class="form-control" placeholder="Email Address" required>
				</div>
				<div class="form-group">
					<div class="input-icon"><i class='bx bx-show'></i></div>
					<input type="password" class="form-control" placeholder="Password" required>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<div class="input-icon"><i class='bx bx-user'></i></div>
						<label for="">Signup as User</label>
						<input type="radio" class="" name="role" placeholder="Password" required>
					</div>
					<div class="form-group col-md-6">
						<div class="input-icon"><i class='bx bx-user'></i></div>
						<label for="">Signup as User</label>
						<input type="radio" class="" name="role" placeholder="Password" required>
					</div>
				</div>
				<div class="row align-items-start mb-30">
					<div class="col-lg-12">
						<div class="checkbox">
							<input type="checkbox" id="agreement">
							<label for="agreement">I agreed to the <a href="terms-of-service.html">Terms of
									Services</a> and <a href="privacy-policy.html">Privacy Policy</a></label>
						</div>
					</div>
				</div>
				<button type="submit" class="btn-primary">
					Register
				</button>
			</form>
		</div>
	</div>
</div>

@endsection