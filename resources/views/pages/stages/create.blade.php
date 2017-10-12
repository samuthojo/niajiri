@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open stage create form --}}
        {!!
            Form::open([
                'route' => ['positions.stages.store', $position->id],
                'class' => 'form-horizontal',
                'files' => true
            ])
        !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start stage create form header --}}
                <div class="page-header">
                    <div class='btn-toolbar pull-right' role="toolbar">
                     <a
                        href="{{ URL::previous() }}"
                        class="btn btn-white"
                        title="{{ trans('stages.actions.cancel.title') }}">
                        {{ trans('stages.actions.cancel.name') }}
                    </a>
                     {!!
                        Form::button(
                            trans('stages.actions.save.name'),
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                            'title' => trans('stages.actions.save.title'),
                        ])
                    !!}
                    </div>
                    <h2>
                        <small>
                            {{trans('stages.actions.save.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end stage create form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('pages.stages.form')
                </div>
                {{-- end form --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close stage create form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
