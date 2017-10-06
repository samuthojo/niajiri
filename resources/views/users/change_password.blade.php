@extends('layouts.profile')

@section('tab')

{{-- start open user password change form --}}
{!! Form::model($user, [
    'method' => 'PATCH',
    'route' => ['users.change_password', $user->id],
    'class' => 'form-horizontal',
    'files' => true
]) !!}

	{{-- start user password change form header --}}
	<div class="page-header">
	    <div class='btn-toolbar pull-right' role="toolbar">
	     <a
	        href="{{ route('users.index') }}"
	        class="btn btn-white"
	        title="{{ trans('users.actions.cancel.title') }}">
	        {{ trans('users.actions.cancel.name') }}
	    </a>
	     {!!
	        Form::button(
	            trans('users.actions.change_password.name'),
	            [
	            'type' => 'submit',
	            'class' => 'btn btn-primary',
	            'title' => trans('users.actions.change_password.title'),
	        ])
	    !!}
	    </div>
	    <h2>
	        <small>
	            {{trans('users.actions.change_password.header')}}
	        </small>
	    </h2>
	</div>
	{{-- end user password change form header --}}

	{{-- start form --}}
    <div class="row m-t-lg m-b-lg">
	    @include ('users.change_password_form')
    </div>
    {{-- end form --}}

{!! Form::close() !!}
{{-- close user password change form --}}

@endsection
