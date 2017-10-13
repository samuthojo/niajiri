@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open sector create form --}}
        {!!
            Form::open([
                'route' => 'organizations.store',
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
                        href="{{ route('organizations.index') }}"
                        class="btn btn-white"
                        title="{{ trans('organizations.actions.cancel.title') }}">
                        {{ trans('organizations.actions.cancel.name') }}
                    </a>
                    </div>
                    <h2>
                        <small>
                            {{trans('organizations.actions.save.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end sector create form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('pages.organizations.form')
                </div>
                {{-- end form --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                      {!!
                         Form::button(
                             trans('organizations.actions.save.name'),
                             [
                             'type' => 'submit',
                             'class' => 'btn btn-primary pull-right',
                             'title' => trans('organizations.actions.save.title'),
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

        {{-- close sector create form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
