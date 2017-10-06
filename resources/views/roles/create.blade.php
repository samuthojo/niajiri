@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open role create form --}}
        {!!
            Form::open([
                'route' => 'roles.store',
                'class' => 'form-horizontal',
                'files' => true
            ])
        !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start role create form header --}}
                <div class="page-header">
                    <div class='btn-toolbar pull-right' role="toolbar">
                     <a
                        href="{{ url('/roles') }}"
                        class="btn btn-white"
                        title="{{ trans('roles.actions.cancel.title') }}">
                        {{ trans('roles.actions.cancel.name') }}
                    </a>
                     {!!
                        Form::button(
                            trans('roles.actions.save.name'),
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                            'title' => trans('roles.actions.save.title'),
                        ])
                    !!}
                    </div>
                    <h2>
                        <small>
                            {{trans('roles.actions.save.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end role create form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('roles.form')
                </div>
                {{-- end form --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close role create form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
