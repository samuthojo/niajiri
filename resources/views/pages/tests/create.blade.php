@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open test create form --}}
        {!!
            Form::open([
                'route' => 'tests.store',
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
                        href="{{ route('tests.index') }}"
                        class="btn btn-white"
                        title="{{ trans('tests.actions.cancel.title') }}">
                        {{ trans('tests.actions.cancel.name') }}
                    </a>
                    </div>
                    <h2>
                        <small>
                            {{trans('tests.actions.save.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end test create form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('pages.tests.form')
                </div>
                {{-- end form --}}

                {{-- start bottom actions --}}

                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                      {!!
                         Form::button(
                             trans('tests.actions.save.name'),
                             [
                             'type' => 'submit',
                             'class' => 'btn btn-primary pull-right',
                             'title' => trans('tests.actions.save.title'),
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

        {{-- close test create form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
