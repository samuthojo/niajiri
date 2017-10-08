@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open cv basic details form --}}
        {!!
            Form::open([
                'route' => 'users.store',
                'files' => true
            ])
        !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start form --}}
                @include ('cvs.basic.form')
                {{-- end form --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                         {!!
                            Form::button(
                                trans('users.actions.save.name'),
                                [
                                'type' => 'submit',
                                'class' => 'btn btn-primary pull-right',
                                'title' => trans('users.actions.save.title'),
                            ])
                        !!}
                        <a
                            href="{{ route('users.index') }}"
                            class="btn btn-white pull-right m-r-sm"
                            title="{{ trans('users.actions.cancel.title') }}">
                            {{ trans('users.actions.cancel.name') }}
                        </a>
                    </div>
                </div>
                {{-- end bottom actions --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close cv basic details form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
