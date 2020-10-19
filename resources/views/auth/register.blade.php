@extends('web.layouts.app' , ['title' => "Register"])
@section('content')
	<!-- Main -->
	<main class="main" role="main">
		<!-- Page info -->
		<header class="site-title color">
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
		</header>
		<!-- //Page info -->
		
		<div class="wrap">
			<div class="row">
				<!--- Content -->
				<div class="content one-half modal">
					@include('web.includes.flash_message')
					<!--Login-->
					<div class="box">
					<form method="POST" action="{{ route('register') }}"> @csrf
							<div class="f-row">
								<div class="full-width">
									<label for="name">Your name and surname</label>
									<input type="text" name="name" />
								</div>
							</div>
							<div class="f-row">
								<div class="full-width">
									<label for="email">Your email address</label>
									<input type="email" name="email" />
								</div>
							</div>
							<div class="f-row">
								<div class="full-width">
									<label for="password">Your password</label>
									<input type="password" name="password" />
								</div>
							</div>
							<div class="f-row">
								<div class="full-width">
									<label for="password_confirmation">Repeat password</label>
									<input type="password" name="password_confirmation" />
								</div>
							</div>
							<div class="f-row">
								<div class="full-width check">
									<input type="checkbox" id="checkbox" />
									<label for="checkbox">I agree with terms and conditions.</label>
								</div>
							</div>
							<div class="f-row">
								<div class="full-width">
									<input type="submit" value="Create an account" class="btn color medium full" />
								</div>
							</div>
							
							<p>Already have an account? <a href="{{ route('login') }}">Login</a>.</p>
						</form>
					</div>
					<!--//Login-->
				</div>
				<!--- //Content -->
			</div>
		</div>
	</main>
	<!-- //Main -->
@endsection