{{--
User profile layout with support of tabs navigation
--}}
@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start tabs --}}
                <div class="tabs-container">

                    {{-- start tab navigation --}}
                    <ul class="nav nav-tabs">
                        <li class="{{areActiveRoutes([
                            'users.show', 'users.edit'
                            ])}}">
                            <a href="{{route('users.edit', ['id' => $user->id])}}" title="{{trans('users.tabs.basic_details.title')}}">
                                <i class="fa fa-user-o"></i>
                                {{trans('users.tabs.basic_details.name')}}
                            </a>
                        </li>
                        <li class="{{isActiveRoute('users.change_password')}}">
                            <a href="{{route('users.change_password', ['id' => $user->id])}}" title="{{trans('users.tabs.change_password.title')}}">
                                <i class="fa fa-key"></i>
                                 {{trans('users.tabs.change_password.name')}}
                            </a>
                        </li>
                    </ul>
                    {{-- end tab navigation --}}

                    {{-- start tabs content --}}
                    <div class="tab-content">

                        {{-- start tab content pane --}}
                        <div class="tab-pane active">
                            @yield('tab')
                        </div>
                        {{-- end tab content pane --}}

                    </div>
                    {{-- end tabs content --}}

                </div>
                {{-- end tabs --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
