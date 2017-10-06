@extends('layouts.auth')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
		<img src="{{ asset('images/logo.png') }}">
		<form class="m-t" role="form" method="POST" action="{{ route('login') }}">
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

			<button type="submit" class="btn btn-primary block full-width m-b">Log in</button>

			{{-- <a href="{{ route('password.request') }}"><small>Forgot password?</small></a> --}}
		</form>
	</diV>
@endsection
