@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open test create form --}}
        {!!
            Form::open([
                'route' => 'questions.store',
                'class' => 'form-horizontal',
                'files' => true
            ])
        !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start test create form header --}}
                <div class="page-header">
                    <div class='btn-toolbar pull-right' role="toolbar">
                     <a
                        href="{{ route('questions.index') }}"
                        class="btn btn-white"
                        title="{{ trans('questions.actions.cancel.title') }}">
                        {{ trans('questions.actions.cancel.name') }}
                    </a>
                     {!!
                        Form::button(
                            trans('questions.actions.save.name'),
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                            'title' => trans('questions.actions.save.title'),
                        ])
                    !!}
                    </div>
                    <h2>
                        <small>
                            {{trans('questions.actions.save.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end test create form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('pages.questions.form')
                </div>
                {{-- end form --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close test create form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
