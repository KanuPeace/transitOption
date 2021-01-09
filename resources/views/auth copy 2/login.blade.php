@extends('web.layouts.app' , ['title' => "Login"])
@section('content')
	<!-- Main -->
	<main class="main" role="main">
		<!-- Page info -->
		<header class="site-title color">
			<div class="wrap">
				<div class="container">
					<h1>Login</h1>
					<nav role="navigation" class="breadcrumbs">
						<ul>
							<li><a href="index.html" title="Home">Home</a></li>
							<li>Login</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<!-- //Page info -->
		
		<div class="wrap">
			<div class="row">
				<div class="col-md-3"></div>
				<!--- Content -->
				<div class="content one-half ">
					<!--Login-->
					<div class="box">
					@include('web.includes.flash_message')
					<form action="{{ route('login') }}" method="POST"> @csrf
							<div class="f-row">
								<div class="full-width">
									<label for="email">Your email</label>
									<input type="text" name="email" />
								</div>
							</div>
							<div class="f-row">
								<div class="full-width">
									<label for="password">Your password</label>
									<input type="password" name="password" />
								</div>
							</div>
							<div class="f-row">
								<div class="full-width check">
									<input type="checkbox" id="checkbox" />
									<label for="checkbox">Remember me next time</label>
								</div>
							</div>
							<div class="f-row">
								<div class="full-width">
									<input type="submit" value="Login" class="btn color medium full" />
								</div>
							</div>
							
							<p><a href="{{ route('password.request') }}">Forgotten password?</a>
								<br />
								Dont have an account yet? 
								<a href="{{ route('register') }}">Sign up</a>.</p>
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