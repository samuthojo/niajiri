@extends('layouts.page')

@section('page')

{{-- start open sector edit form --}}
{!! Form::model($sector, [
    'method' => 'PATCH',
    'route' => ['sectors.update', $sector->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start sector edit form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ route('sectors.index') }}"
	        class="btn btn-white"
	        title="{{ trans('sectors.actions.cancel.title') }}">
	        {{ trans('sectors.actions.cancel.name') }}
	    </a>
	     {!!
	        Form::button(
	            trans('sectors.actions.update.name'),
	            [
	            'type' => 'submit',
	            'class' => 'btn btn-primary',
	            'title' => trans('sectors.actions.update.title'),
	        ])
	    !!}
	    </div>
	    <h2>
	        <small>
	            {{trans('sectors.actions.update.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end sector edit form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('pages.sectors.form')
    </div>
    {{-- end form --}}

{!! Form::close() !!}
{{-- close sector edit form --}}

@endsection
