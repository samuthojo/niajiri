@extends('layouts.page')

@section('page')

{{-- start open stage edit form --}}
{!! Form::model($stage, [
    'method' => 'PATCH',
    'route' => ['stages.update', $stage->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start stage edit form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ URL::previous() }}"
	        class="btn btn-white"
	        title="{{ trans('stages.actions.cancel.title') }}">
	        {{ trans('stages.actions.cancel.name') }}
	    </a>
	    </div>
	    <h2>
	        <small>
	            {{trans('stages.actions.update.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end stage edit form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('pages.stages.form')
    </div>
    {{-- end form --}}


    <div class="col-md-12">
      {!!
         Form::button(
             trans('stages.actions.update.name'),
             [
             'type' => 'submit',
             'class' => 'btn btn-primary pull-right',
             'title' => trans('stages.actions.update.title'),
         ])
     !!}
    </div>

{!! Form::close() !!}
{{-- close stage edit form --}}

@endsection
