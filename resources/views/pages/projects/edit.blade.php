@extends('layouts.page')

@section('page')

{{-- start open project edit form --}}
{!! Form::model($project, [
    'method' => 'PATCH',
    'route' => ['projects.update', $project->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start project edit form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ route('projects.index') }}"
	        class="btn btn-white"
	        title="{{ trans('projects.actions.cancel.title') }}">
	        {{ trans('projects.actions.cancel.name') }}
	    </a>
	     {!!
	        Form::button(
	            trans('projects.actions.update.name'),
	            [
	            'type' => 'submit',
	            'class' => 'btn btn-primary',
	            'title' => trans('projects.actions.update.title'),
	        ])
	    !!}
	    </div>
	    <h2>
	        <small>
	            {{trans('projects.actions.update.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end project edit form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('pages.projects.form')
    </div>
    {{-- end form --}}

{!! Form::close() !!}
{{-- close project edit form --}}

@endsection
