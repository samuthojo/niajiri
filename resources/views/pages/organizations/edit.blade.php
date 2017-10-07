@extends('layouts.page')

@section('page')

{{-- start open organization edit form --}}
{!! Form::model($organization, [
    'method' => 'PATCH',
    'route' => ['organizations.update', $organization->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start organization edit form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ route('organizations.index') }}"
	        class="btn btn-white"
	        title="{{ trans('organizations.actions.cancel.title') }}">
	        {{ trans('organizations.actions.cancel.name') }}
	    </a>
	     {!!
	        Form::button(
	            trans('organizations.actions.update.name'),
	            [
	            'type' => 'submit',
	            'class' => 'btn btn-primary',
	            'title' => trans('organizations.actions.update.title'),
	        ])
	    !!}
	    </div>
	    <h2>
	        <small>
	            {{trans('organizations.actions.update.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end organization edit form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('pages.organizations.form')
    </div>
    {{-- end form --}}

{!! Form::close() !!}
{{-- close organization edit form --}}

@endsection
