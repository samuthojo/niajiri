@extends('layouts.auth')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <img src="{{ asset('images/logo.png') }}" width="160" height="120">
           {!!
                Form::open([
                    'route' => 'register',
                    'files' => true
                ])
            !!}

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

            <div class="form-group">
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
                    'class' => 'btn btn-primary block full-width m-b',
                    'title' => 'Click to Register',
                ])
            !!}

        {!! Form::close() !!}

    </div>
@endsection
