@extends('layouts.auth')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <img src="{{ asset('images/logo.png') }}" width="160" height="120">
    <div>
        <h3>
            {!! trans('laravel-user-verification::user-verification.verification_error_header') !!}
        </h3>
        <p>
           {!! trans('laravel-user-verification::user-verification.verification_error_message') !!} 
        </p>

        <a href="{{route('password.request')}}"><small>Forgot password?</small></a>
        <br/>

        <p class="text-muted text-center"><small>OR</small></p>

        <p class="text-muted text-center"><small>Do not have an account?</small></p>

        {{-- start register --}}
        <a class="btn btn-white btn-block full-width m-b" href="{{route('register')}}" title="Click to create new account">Create an Account</a>
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
    </div>
</div>
@endsection
