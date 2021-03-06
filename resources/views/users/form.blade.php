{{-- start user form --}}

{{-- start avatar edit --}}
<div class="form-group m-b-lg {{ $errors->has('avatar') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        <div class="edit-profile-photo">
            <img src="{{$user->avatar()}}" alt="{{trans('users.inputs.avatar.placeholder')}}" class="img-thumbnail"
            title="{{trans('users.inputs.avatar.placeholder')}}">
            <div class="change-photo-btn">
                <div class="photoUpload">
                    <span title="Change Profile Avatar">
                        <i class="fa fa-upload"></i> {{trans('users.inputs.avatar.change')}}
                    </span>
                    <input id="avatar" name="avatar" type="file" class="upload" />
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end avatar edit --}}


{{-- start first name --}}
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('first_name', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userNameHelpBlock',
            'placeholder' => trans('users.inputs.first_name.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('first_name'))
        {!!
            $errors->first('first_name', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userNameHelpBlock" class="help-block">
                {{ trans('users.inputs.first_name.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end firstname --}}

{{-- start surname --}}
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('surname', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userSurnameHelpBlock',
            'placeholder' => trans('users.inputs.surname.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('surname'))
        {!!
            $errors->first('surname', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userSurnameHelpBlock" class="help-block">
                {{ trans('users.inputs.surname.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end surname --}}


{{-- start dob --}}
<div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('dob', null, [
            'class' => 'form-control datepicker',
            'required' => 'required',
            'placeholder' => trans('users.inputs.dob.placeholder'),
            'aria-describedby'=> 'userDobHelpBlock',
            'data-provide' => 'datepicker',
            'data-date-format' => config('app.datepicker_date_format')
        ]) !!}
       @if($errors->any() && $errors->has('dob'))
        {!!
            $errors->first('dob', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userDobHelpBlock" class="help-block">
                {{ trans('users.inputs.dob.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end dob --}}


{{-- start email --}}
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::email('email', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userEmailHelpBlock',
            'placeholder' => trans('users.inputs.email.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('email'))
        {!!
            $errors->first('email', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userEmailHelpBlock" class="help-block">
                {{ trans('users.inputs.email.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end email --}}

{{-- start mobile --}}
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('mobile', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userMobileHelpBlock',
            'placeholder' => trans('users.inputs.mobile.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('mobile'))
        {!!
            $errors->first('mobile', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userMobileHelpBlock" class="help-block">
                {{ trans('users.inputs.mobile.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end mobile --}}

{{-- start gender --}}
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('gender', trans('users.genders'),
            null,
            [
                'class' => 'form-control',
                'required' => 'required',
                'aria-describedby'=> 'userGenderHelpBlock',
                'placeholder' => trans('users.inputs.gender.placeholder')
            ])
        !!}
        @if($errors->any() && $errors->has('gender'))
        {!!
            $errors->first('gender', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userGenderHelpBlock" class="help-block">
                {{ trans('users.inputs.gender.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end gender --}}

{{-- start password & password confirm --}}
@if(!is_set($user->id))
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::password('password', [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userPasswordHelpBlock',
            'placeholder' => trans('users.inputs.password.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('password'))
        {!!
            $errors->first('password', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userPasswordHelpBlock" class="help-block">
                {{ trans('users.inputs.password.description') }}
            </p>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::password('password_confirmation', [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userPasswordConfirmationHelpBlock',
            'placeholder' => trans('users.inputs.password_confirmation.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('password_confirmation'))
        {!!
            $errors->first('password_confirmation', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userPasswordConfirmationHelpBlock" class="help-block">
                {{ trans('users.inputs.password_confirmation.description') }}
            </p>
        @endif
    </div>
</div>
@endif
{{-- end password & password confirm --}}

{{-- start roles --}}
<div class="form-group">
    <div class="col-md-offset-3 col-md-6">
        <p class="list-group-header">
            {{ trans('users.inputs.roles.header') }}
        </p>
        <hr/>
        <ul class="list-group">
            @foreach($roles as $role)
                <li class="list-group-item list-checkbox-item">
                    <div
                        class="checkbox"
                        title="{{$role->description}}">
                      <label
                        for="{{$role->id}}"
                        title="{{$role->description}}">
                      {{
                        Form::checkbox(
                            'roles[]',
                            $role->id,
                            isset($user) ? $user->hasRole($role->name) : false
                        )
                        }}
                      {{$role->display_name}}
                      </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
{{-- end roles --}}

{{-- end user form --}}