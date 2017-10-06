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
