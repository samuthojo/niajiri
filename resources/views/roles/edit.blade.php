@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open role edit form --}}
        {!! Form::model($role, [
            'method' => 'PATCH',
            'route' => ['roles.update', $role->id],
            'class' => 'form-horizontal',
            'files' => true
        ]) !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start role edit form header --}}
                <div class="page-header">
                    <div class='btn-toolbar pull-right' role="toolbar">
                     <a
                        href="{{ url('/roles') }}"
                        class="btn btn-white"
                        title="{{ trans('roles.actions.cancel.title') }}">
                        {{ trans('roles.actions.cancel.name') }}
                    </a>
                    </div>
                    <h2>
                        <small>
                            {{trans('roles.actions.update.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end role edit form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('roles.form')
                </div>
                {{-- end form --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                     {!!
                        Form::button(
                            trans('roles.actions.update.name'),
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-primary pull-right',
                            'title' => trans('roles.actions.update.title'),
                        ])
                    !!}
                    </div>
                </div>
                {{-- end bottom actions --}}


            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close role edit form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
