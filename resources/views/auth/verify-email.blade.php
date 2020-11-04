@extends('web.layouts.app' , ['title' => "Login"])
@section('content')
	<!-- Main -->
	<main class="main" role="main">
       <div class="row mt-5">
           <div class="col-md-3"></div>
           <div class="col-md-6">
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
	</main>
@stop