<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--
        See http://www.iacquire.com/blog/18-meta-tags-every-webpage-should-have-in-2013
     --}}

    {{-- Site Wide Meta --}}
    <meta name="description" content="">
    <meta rel="author" href="{{url('/')}}">
    <meta rel="publisher" href="{{url('/')}}">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    {{-- start styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- end styles --}}

</head>

{{-- start body --}}
<body class="niajiri gray-bg">

    <div class="container">

        <div class="loginscreen animated fadeInDown">

            @include('flash::message')

        </div>

    </div>

    {{-- start yield content --}}
    @yield('content')
    {{-- end yield content --}}

    {{-- start scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- end scripts --}}

    {{-- start custom page scripts --}}
    @yield('scripts')
    {{-- end custom page scripts --}}

    {{-- start google analytics script --}}
    <script type="text/javascript">
        //place google analytic scripts here
    </script>
    {{-- end google analytics script --}}

</body>
{{-- end body --}}

</html>
