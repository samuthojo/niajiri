{{-- start education form --}}


{{-- start institution --}}
<div class="col-md-offset-2 col-md-6">
    <div class="form-group {{ $errors->has('institution') ? 'has-error' : ''}}">
        <label for="institution" title="{{ trans('educations.inputs.institution.description') }}">
            {{trans('educations.inputs.institution.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('institution', null, [
            'id' => 'institution',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'education_institution_help_block',
            'placeholder' => trans('educations.inputs.institution.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('institution'))
        {!!
            $errors->first('institution', '<p id="education_institution_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end institution --}}

{{-- end education form --}}