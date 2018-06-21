@extends('layouts.page')

@section('page')

{{-- start open test edit form --}}
{!! Form::model($test, [
    'method' => 'PATCH',
    'route' => ['tests.update', $test->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start test edit form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ route('tests.show',['id' => $test->id]) }}"
	        class="btn btn-white"
	        title="{{ trans('tests.actions.cancel.title') }}">
	        {{ trans('tests.actions.cancel.name') }}
	    </a>
	    </div>
	    <h2>
	        <small>
	            {{trans('tests.actions.update.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end test edit form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('pages.tests.form')
    </div>
    {{-- end form --}}

    <div class="col-md-12">
	     {!!
	        Form::button(
	            trans('tests.actions.update.name'),
	            [
	            'type' => 'submit',
	            'class' => 'btn btn-primary pull-right',
	            'title' => trans('tests.actions.update.title'),
	        ])
	    !!}
    </div>

{!! Form::close() !!}
{{-- close test edit form --}}

@endsection
