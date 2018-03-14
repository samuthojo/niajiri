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
<body class="niajiri pace-done fixed-sidebar fixed-nav fixed-nav-top skin-3">

    {{-- start page wrapper --}}
    <div id="wrapper">
    @include('layouts._fixed_top_nav')

        {{-- start include sidebar --}}
        @include('positions.blocks.sidebar')

        {{-- start page content --}}
        <div id="page-wrapper" class="gray-bg">

            {{-- start yield content --}}
            @yield('content')
            {{-- end yield content --}}

        </div>
        {{-- end page content --}}

    {{-- start scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- end scripts --}}

    {{-- start custom page scripts --}}
    @stack('scripts')
    {{-- end custom page scripts --}}

    {{-- start google analytics script --}}
    <script type="text/javascript">
        //place google analytic scripts here
    </script>
    {{-- end google analytics script --}}

</body>
{{-- end body --}}

</html>
