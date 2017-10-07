@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open sector create form --}}
        {!!
            Form::open([
                'route' => 'projects.store',
                'class' => 'form-horizontal',
                'files' => true
            ])
        !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start sector create form header --}}
                <div class="page-header">
                    <div class='btn-toolbar pull-right' role="toolbar">
                     <a
                        href="{{ route('projects.index') }}"
                        class="btn btn-white"
                        title="{{ trans('projects.actions.cancel.title') }}">
                        {{ trans('projects.actions.cancel.name') }}
                    </a>
                     {!!
                        Form::button(
                            trans('projects.actions.save.name'),
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                            'title' => trans('projects.actions.save.title'),
                        ])
                    !!}
                    </div>
                    <h2>
                        <small>
                            {{trans('projects.actions.save.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end sector create form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('pages.projects.form')
                </div>
                {{-- end form --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close sector create form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
