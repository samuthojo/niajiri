{{-- start content layout --}}

{{-- extend main layout --}}
@extends('layouts.main')

{{-- start content section --}}
@section('content')

{{-- start page header --}}
<div class="row wrapper  page-heading">
    <div class="col-md-12">

    	{{-- start page title --}}
        <h2 title="{{$route_description}}" class="page_title">
	        <span id="route-title">{{$route_title}}</span>
        </h2>
        {{-- end page title --}}

        {{-- start render breadcrumbs --}}
        <span id="breadcrumb-text">
          @if(!empty($route_name))
              @if($instance)
  	            {!! Breadcrumbs::render($route_name, $instance) !!}
              @else
                {{--   {!! Breadcrumbs::render($route_name) !!}--}}
              @endif
          @endif
        </span>
        {{-- end render breadcrumbs --}}

    </div>
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

@endsection
{{-- end content section --}}

{{-- end content layout --}}
