<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('name', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'roleNameHelpBlock',
            'placeholder' => trans('roles.inputs.name.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('name'))
        {!!
            $errors->first('name', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="roleNameHelpBlock" class="help-block">
                {{ trans('roles.inputs.name.description') }}
            </p>
        @endif
    </div>
</div>


<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::textarea('description', null, [
                'class' => 'form-control',
                'rows' => 2,
                'aria-describedby'=> 'roleDescriptionHelpBlock',
                'placeholder' => trans('roles.inputs.description.placeholder')
            ]) !!}
        @if($errors->any() && $errors->has('description'))
        {!!
            $errors->first('description', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="roleDescriptionHelpBlock" class="help-block">
                {{trans('roles.inputs.description.description')}}
            </p>
        @endif
    </div>
</div>
