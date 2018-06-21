@extends('layouts.profile')

@section('tab')

{{-- start open user edit form --}}
{!! Form::model($user, [
    'method' => 'PATCH',
    'route' => ['users.update', $user->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start user edit form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ route('users.index') }}"
	        class="btn btn-white"
	        title="{{ trans('users.actions.cancel.title') }}">
	        {{ trans('users.actions.cancel.name') }}
	    </a>
	    </div>
	    <h2>
	        <small>
	            {{trans('users.actions.update.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end user edit form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('users.form')
    </div>
    {{-- end form --}}
    <div class="col-md-12">
      {!!
         Form::button(
             trans('users.actions.update.name'),
             [
             'type' => 'submit',
             'class' => 'btn btn-primary',
             'title' => trans('users.actions.update.title'),
         ])
     !!}
    </div>

{!! Form::close() !!}
{{-- close user edit form --}}

@endsection
