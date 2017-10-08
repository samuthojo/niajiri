@extends('layouts.profile')

@section('tab')

{{-- start open education edit form --}}
{!! Form::model($education, [
    'method' => 'PATCH',
    'route' => ['educations.update', $education->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start education edit form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ route('educations.index') }}"
	        class="btn btn-white"
	        title="{{ trans('educations.actions.cancel.title') }}">
	        {{ trans('educations.actions.cancel.name') }}
	    </a>
	     {!!
	        Form::button(
	            trans('educations.actions.update.name'),
	            [
	            'type' => 'submit',
	            'class' => 'btn btn-primary',
	            'title' => trans('educations.actions.update.title'),
	        ])
	    !!}
	    </div>
	    <h2>
	        <small>
	            {{trans('educations.actions.update.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end education edit form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('educations.form')
    </div>
    {{-- end form --}}

{!! Form::close() !!}
{{-- close education edit form --}}

@endsection
