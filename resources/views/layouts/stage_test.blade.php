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
<body class="niajiri top-navigation">

    {{-- start page wrapper --}}
    <div id="wrapper">

        {{-- start page content --}}
        <div id="page-wrapper" class="gray-bg">

            {{-- start content section --}}

            {{-- start page header --}}
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-md-offset-1 col-md-5">

                    {{-- start page title --}}
                    <h2 title="{{$route_description}}">
                        {{$route_title}}
                    </h2>
                    {{-- end page title --}}
                </div>
                @if($test->duration)
                <div class="col-md-5">
                    <h2 class="pull-right">
                        <div id="countdowntimer"><span id="timer"></span></div>
                    </h2>
                </div>
                @endif
            </div>
            {{-- end page header --}}

            {{-- start content wrapper --}}
            <div class="row wrapper wrapper-content">
                {{-- start flash messages --}}
                <div class="row">
                    <div class="col-md-12">
                        @include('flash::message')
                    </div>
                </div>
                {{-- end flash messages --}}

                @yield('page')

            </div>
            {{-- end content wrapper --}}

            {{-- end content section --}}

        </div>
        {{-- end page content --}}

        {{-- start footer --}}
        <div class="container-fluid m-t-lg">

            <div class="row">
                <div class="col-md-12">
                    <div class="footer">
                        {{-- TODO add owner information i.e TTU --}}
                        <div>
                            <strong class="m-r-xs">Copyright</strong>&copy; {{date('Y')}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- end footer --}}

    </div>
    {{-- end page wrapper --}}

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
