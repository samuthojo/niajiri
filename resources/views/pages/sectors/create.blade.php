@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open sector create form --}}
        {!!
            Form::open([
                'route' => 'sectors.store',
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
                        href="{{ route('sectors.index') }}"
                        class="btn btn-white"
                        title="{{ trans('sectors.actions.cancel.title') }}">
                        {{ trans('sectors.actions.cancel.name') }}
                    </a>
                    </div>
                    <h2>
                        <small>
                            {{trans('sectors.actions.save.header')}}
                        </small>
                    </h2>
                </div>
                {{-- end sector create form header --}}

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('pages.sectors.form')
                </div>
                {{-- end form --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                      {!!
                         Form::button(
                             trans('sectors.actions.save.name'),
                             [
                             'type' => 'submit',
                             'class' => 'btn btn-primary pull-right',
                             'title' => trans('sectors.actions.save.title'),
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
