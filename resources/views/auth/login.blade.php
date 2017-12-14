@extends('layouts.auth')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
		<img src="{{ asset('images/logo.png') }}" width="160" height="120">
		<form role="form" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}

			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<input class="form-control" type="email" name="email" placeholder="Username" required="">
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<input class="form-control" type="password" name="password" placeholder="Password" required="">
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>

			<button type="submit" class="btn btn-primary block full-width m-b">Signin</button>

			<p class="text-muted text-center"><small>OR</small></p>

			{{-- start register --}}
			<a class="btn btn-white btn-block full-width m-b" href="">Create an Account</a>
			{{-- end register --}}

			{{-- start social signin --}}

            {{-- start google plus auth --}}
			<a class="btn btn-danger btn-google block full-width m-b"
				href="{{url(config('services.google.url'))}}">
			   <span class="fa fa-google"></span> Signin with Google
			</a>
			{{-- end google plus auth --}}

			{{-- start facebook auth --}}
			<a class="btn btn-success btn-facebook block full-width m-b"
				href="{{url(config('services.facebook.url'))}}">
		       <span class="fa fa-facebook"></span> Signin with Facebook
		    </a>
		    {{-- end facebook auth --}}

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
@endsection
