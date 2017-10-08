@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open achievement edit form --}}
        {!! Form::model($achievement, [
		    'method' => 'PATCH',
		    'route' => ['achievements.update', $achievement->id],
		    'class' => 'form-horizontal',
		    'files' => true
		]) !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('achievements.form')
                </div>
                {{-- end form --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                         {!!
                            Form::button(
                                trans('achievements.actions.save.name'),
                                [
                                'type' => 'submit',
                                'class' => 'btn btn-primary pull-right',
                                'title' => trans('achievements.actions.save.title'),
                            ])
                        !!}
                        <a
                            href="{{ route('achievements.index', ['applicant_id'=> $applicant_id]) }}"
                            class="btn btn-white pull-right m-r-sm"
                            title="{{ trans('achievements.actions.cancel.title') }}">
                            {{ trans('achievements.actions.cancel.name') }}
                        </a>
                    </div>
                </div>
                {{-- end bottom actions --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close achievement edit form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
