@extends('layouts.page')

@section('page')

{{-- start open question edit form --}}
{!! Form::model($question, [
    'method' => 'PATCH',
    'route' => ['questions.update', $question->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start question edit form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ route('questions.show',['id' => $question->id]) }}"
	        class="btn btn-white"
	        title="{{ trans('questions.actions.cancel.title') }}">
	        {{ trans('questions.actions.cancel.name') }}
	    </a>
	    </div>
	    <h2>
	        <small>
	            {{trans('questions.actions.update.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end question edit form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('pages.questions.form')
    </div>
    {{-- end form --}}

    <div class="col-md-12">
      {!!
         Form::button(
             trans('questions.actions.update.name'),
             [
             'type' => 'submit',
             'class' => 'btn btn-primary pull-right',
             'title' => trans('questions.actions.update.title'),
         ])
     !!}
    </div>

{!! Form::close() !!}
{{-- close question edit form --}}

@endsection
