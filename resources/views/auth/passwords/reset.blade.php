@extends('layouts.auth')

@section('content')
    {{--
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif--}}
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <img src="{{ asset('images/logo.png') }}" width="160" height="120">
           {!!
                Form::open([
                    'route' => 'password.request',
                    'files' => true
                ])
            !!}

            <input type="hidden" name="token" value="{{ $token }}">
            
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

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                {!! Form::password('password_confirmation', [
                    'id' => 'password_confirmation',
                    'class' => 'form-control',
                    'required' => 'required',
                    'placeholder' => 'Password'
                ]) !!}
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            {!!
                Form::button(
                    'Reset Password',
                    [
                    'type' => 'submit',
                    'class' => 'btn btn-primary block full-width m-b',
                    'title' => 'Click to Reset Password',
                ])
            !!}

        {!! Form::close() !!}

    </div>
@endsection
