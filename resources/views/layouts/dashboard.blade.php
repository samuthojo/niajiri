{{-- start content layout --}}

{{-- extend main layout --}}
@extends('layouts.main')

{{-- start content section --}}
@section('content')
{{-- <div class="container"> --}}
    <div class="row">
        <div class="col-lg-12">

            {{-- start content wrapper --}}
            <div class="wrapper wrapper-content">
                @yield('page')
            </div>
            {{-- end content wrapper --}}

        </div>
    </div>
{{-- </div> --}}
@endsection
{{-- end content section --}}

{{-- end content layout --}}
