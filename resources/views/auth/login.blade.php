@extends('web.layouts.app' , ['title' => "Login"])
@section('content')
	

<div class="authentication-section">
	<div class="container">
		<div class="main-form ptb-100">
			<form action="{{ route('login') }}" method="POST"> @csrf
				<div class="content">
					<h3>Welcome Back</h3>
					<p>Login please if you already have an account</p>
				</div>
				<div class="form-group">
					<div class="input-icon"><i class='bx bx-at'></i></div>
					<input type="text" class="form-control" name="email" placeholder="Email address" required>
				</div>
				<div class="form-group">
					<div class="input-icon"><i class='bx bx-lock'></i></div>
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<div class="row align-items-center mb-30">
					<div class="col-lg-6 col-sm-6 col-6">
						<div class="checkbox">
							<input type="checkbox" id="remember">
							<label for="remember">Remember me</label>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-6">
						<div class="link">
							<a href="forget-password.html">Forget password?</a>
						</div>
					</div>
				</div>
				<button type="submit" class="btn-primary">
					Login
				</button>
			</form>
		</div>
	</div>
</div>

	
@endsection