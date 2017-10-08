@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open experience create form --}}
        {!!
            Form::open([
                'route' => 'experiences.store',
                'class' => 'form-horizontal',
                'files' => true
            ])
        !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('experiences.form')
                </div>
                {{-- end form --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                         {!!
                            Form::button(
                                trans('experiences.actions.save.name'),
                                [
                                'type' => 'submit',
                                'class' => 'btn btn-primary pull-right',
                                'title' => trans('experiences.actions.save.title'),
                            ])
                        !!}
                        <a
                            href="{{ route('experiences.index', ['applicant_id'=> $applicant_id]) }}"
                            class="btn btn-white pull-right m-r-sm"
                            title="{{ trans('experiences.actions.cancel.title') }}">
                            {{ trans('experiences.actions.cancel.name') }}
                        </a>
                    </div>
                </div>
                {{-- end bottom actions --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close experience create form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
