@extends('layouts.auth')

@section('content')
<div class="register-wrapper">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <!-- <img src="{{ asset('images/logo.png') }}" width="160" height="120"> -->
        	<div class="col-lg-4 signup-container">
                <a href="#" id="logo" class="layout center-center">
                        <img src="{{asset('images/landing/logo.png')}}" alt="Niajiri logo" style="height: 50px">
                </a>

                <h1 style="font-size:2.5em">Have you been here?</h1>
                <h2>If you have registered before just sign in,<br/>new oportunities are waiting! </h2>
                <a class="btn btn-block full-width m-b" href="{{route('login')}}" title="Click to create new account">Sign In</a>
		    </div>
           {!!
                Form::open([
                    'route' => 'register',
                    'files' => true,
                    'class' => 'col-lg-8'
                ])
            !!}
             <h1>Lets do this!</h1>       
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::text('name', null, [
                    'id' => 'name',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => 'Full Name'
                ]) !!}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::email('email', null, [
                    'id' => 'email',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => 'Email'
                ]) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                {!! Form::text('mobile', null, [
                    'id' => 'mobile',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => 'Phone Number'
                ]) !!}
                @if ($errors->has('mobile'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mobile') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::password('password', [
                    'id' => 'password',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => 'Password'
                ]) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group m-b-lg">
                {!! Form::password('password_confirmation', [
                    'id' => 'password_confirmation',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => 'Confirm Password'
                ]) !!}
            </div>

            {!!
                Form::button(
                    'Register',
                    [
                    'type' => 'submit',
                    'class' => 'btn btn-primary block full-width',
                    'title' => 'Click to Register',
                ])
            !!}

        {!! Form::close() !!}

    </div>
</div>
@endsection
