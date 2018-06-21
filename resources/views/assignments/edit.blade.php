@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open assignment edit form --}}
        {!! Form::model($assignment, [
		    'method' => 'PATCH',
		    'route' => ['assignments.update', $assignment->id],
		    'class' => 'form-horizontal',
		    'files' => true
		]) !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('assignments.form')
                </div>
                {{-- end form --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                         {!!
                            Form::button(
                                trans('assignments.actions.save.name'),
                                [
                                'type' => 'submit',
                                'class' => 'btn btn-primary pull-right',
                                'title' => trans('assignments.actions.save.title'),
                            ])
                        !!}
                        <a
                            href="{{ route('assignments.index', ['applicant_id'=> $applicant_id]) }}"
                            class="btn btn-white pull-right m-r-sm"
                            title="{{ trans('assignments.actions.cancel.title') }}">
                            {{ trans('assignments.actions.cancel.name') }}
                        </a>
                    </div>
                </div>
                {{-- end bottom actions --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close assignment edit form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
