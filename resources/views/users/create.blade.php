@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open user create form --}}
        {!!
            Form::open([
                'route' => 'users.store',
                'class' => 'form-horizontal',
                'files' => true
            ])
        !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start user create form header --}}
                <div class="page-header">
                    <div class='btn-toolbar pull-right' role="toolbar">
                     <a
                        href="{{ route('users.index') }}"
                        class="btn btn-white"
                        title="{{ trans('users.actions.cancel.title') }}">
                        {{ trans('users.actions.cancel.name') }}
                    </a>
                     {!!
                        Form::button(
                            trans('users.actions.save.name'),
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                            'title' => trans('users.actions.save.title'),
                        ])
                    !!}
                    </div>
                    <h2>
                        <small>
                            {{trans('users.actions.save.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end user create form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('users.form')
                </div>
                {{-- end form --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close user create form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
