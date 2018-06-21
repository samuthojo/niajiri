@extends('layouts.auth')

@section('content')
   {{-- @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    --}}
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <img src="{{ asset('images/logo.png') }}" width="160" height="120">
           {!!
                Form::open([
                    'route' => 'password.email',
                    'files' => true
                ])
            !!}

             <div class="ibox-content">

                    <h2 class="font-bold">Forgot password</h2>

                    <p>
                        Enter your email address and your password will be reset and emailed to you.
                    </p>

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

                    {!!
                        Form::button(
                            'Send Password Reset Link',
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-primary block full-width m-b',
                            'title' => 'Click to Send Password Reset Link',
                        ])
                    !!}

                {!! Form::close() !!}
            </div>
    </div>
@endsection
