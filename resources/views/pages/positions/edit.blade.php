@extends('layouts.page')

@section('page')

{{-- start open position edit form --}}
{!! Form::model($position, [
    'method' => 'PATCH',
    'route' => ['positions.update', $position->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start position edit form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ url()->previous() }}"
	        class="btn btn-white"
	        title="{{ trans('positions.actions.cancel.title') }}">
	        {{ trans('positions.actions.cancel.name') }}
	    </a>
	    </div>
	    <h2>
	        <small>
	            {{trans('positions.actions.update.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end position edit form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('pages.positions.form')
    </div>
    {{-- end form --}}

    <div class="col-md-12">
	     {!!
	        Form::button(
	            trans('positions.actions.update.name'),
	            [
	            'type' => 'submit',
	            'class' => 'btn btn-primary pull-right',
	            'title' => trans('positions.actions.update.title'),
	        ])
	    !!}
    </div>

{!! Form::close() !!}
{{-- close position edit form --}}

@endsection
