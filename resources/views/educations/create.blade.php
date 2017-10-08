@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open education create form --}}
        {!!
            Form::open([
                'route' => 'educations.store',
                'class' => 'form-horizontal',
                'files' => true
            ])
        !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start education create form header --}}
                <div class="page-header">
                    <div class='btn-toolbar pull-right' role="toolbar">
                     <a
                        href="{{ route('educations.index') }}"
                        class="btn btn-white"
                        title="{{ trans('educations.actions.cancel.title') }}">
                        {{ trans('educations.actions.cancel.name') }}
                    </a>
                     {!!
                        Form::button(
                            trans('educations.actions.save.name'),
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                            'title' => trans('educations.actions.save.title'),
                        ])
                    !!}
                    </div>
                    <h2>
                        <small>
                            {{trans('educations.actions.save.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end education create form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('educations.form')
                </div>
                {{-- end form --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close education create form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
