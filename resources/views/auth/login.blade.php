@extends('layouts.auth')

@section('content')
<div class="register-wrapper">
    <div class="middle-box text-center loginscreen animated fadeInDown ">
		<!-- <img src="{{ asset('images/logo.png') }}" width="160" height="120"> -->
		<div class="col-lg-4 signup-container">
			<a href="#" id="logo" class="layout center-center">
					<img src="{{asset('images/landing/logo.png')}}" alt="Niajiri logo" style="height: 50px">
			</a>

			<h1>New here?</h1>
			<h2>Let us jumpstart your career.<br/>We prepare you for your career and open doors to endless opportunities. </h2>
			<a class="btn btn-block full-width m-b" href="{{route('register')}}" title="Click to create new account">Sign Up Now</a>
		</div>
		<form class="col-lg-8" role="form" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
			<h1>Welcome back!</h1>
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<input class="form-control" type="email" name="email" placeholder="Email" required="">
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>

			<div class="m-b-lg form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<input class="form-control" type="password" name="password" placeholder="Password" required="">
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>

			<button type="submit" class="btn btn-primary block full-width">Signin</button>

			<a href="{{route('password.request')}}"><small>Forgot password?</small></a>

			{{-- <p class="text-muted text-center"><small>OR</small></p> --}}

			

			{{-- start register --}}
			{{-- <p class="text-muted text-center"><small>Do not have an account?</small></p> --}}
			{{--<a class="btn btn-white btn-block full-width m-b" href="{{route('register')}}" title="Click to create new account">Create an Account</a>--}}
			{{-- end register --}}

			{{-- start social signin --}}

            {{-- start google plus auth --}}
			<a class="btn btn-danger btn-google block full-width m-b"
				href="{{url(config('services.google.url'))}}">
			   <span class="fa fa-google"></span> Signin with Google
			</a>
			{{-- end google plus auth --}}


		    {{-- start twitter auth --}}
			<a class="btn btn-info btn-twitter block full-width m-b"
				href="{{url(config('services.twitter.url'))}}">
		       <span class="fa fa-twitter"></span> Signin with Twitter
		    </a>
		    {{-- end twitter auth --}}

		    {{-- start linkedin auth --}}
			<a class="btn btn-success btn-linkedin block full-width m-b"
				href="{{url(config('services.linkedin.url'))}}">
		       <span class="fa fa-linkedin"></span> Signin with LinkedIn
		    </a>
		    {{-- end linkedin auth --}}

            {{-- end social signin --}}
		</form>
	</div>
</div>
@endsection
