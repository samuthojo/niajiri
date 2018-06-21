@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open cv basic details form --}}
        {!! Form::model($user, [
            'method' => 'PATCH',
            'route' => ['users.basic', $user->id],
            'files' => true
        ]) !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start form --}}
                @include ('users.basic.form')
                {{-- end form --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                         {!!
                            Form::button(
                                trans('cvs.actions.save.name'),
                                [
                                'type' => 'submit',
                                'class' => 'btn btn-primary pull-right',
                                'title' => trans('cvs.actions.save.title'),
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

        {{-- close cv basic details form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
