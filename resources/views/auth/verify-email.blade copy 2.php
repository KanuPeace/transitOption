@extends('web.layouts.app' , ['title' => "Register"])
@section('content')

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
						<div class=" head-title mt-3 mb-4"><i>Getting Started</i></div>
						<div class="card selected_reg p-3 m-3" >
							<div class="msg_area">
								Verify Email Address
							</div>
                        </div>
                        <div class="card  p-3 m-3" >
							<div class="msg_area">
								Complete Profile
							</div>
						</div>
					</div>
					
				</div>
				<div class=" col-md-8">
					<div class="container card">
						<div class="h3 mt-4 mb-2"><i></i></div>
						@include('web.includes.flash_message')
						<div class="container card p-5">
                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>
                    
                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif
                    
                            <div class="mt-4 d-flex items-center justify-content-between">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                    
                                    <div>
                                        <button type="submit" class="btn btn-dark btn-sm">
                                            {{ __('Resend Verification Email') }}
                                        </button>
                                    </div>
                                </form>
                    
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                    
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ __('Logout') }}
                                    </button>
                                </form>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		
	
	</main>
	<!-- //Main -->
@endsection