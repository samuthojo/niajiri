{{-- start language form --}}

{{--start applicant id--}}
@if(is_set($applicant_id))
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
@endif
{{--end applicant id--}}

{{-- start name --}}
<div class="col-md-offset-2 col-md-6">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" title="{{ trans('languages.inputs.name.description') }}">
            {{trans('languages.inputs.name.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('name', trans('languages.languages'),
            null,
            [
                'id' => 'name',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'language_name_help_block',
            ])
        !!}
        @if($errors->any() && $errors->has('name'))
        {!!
            $errors->first('name', '<p id="language_name_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end name --}}


{{-- start fluency --}}
<div class="col-md-offset-2 col-md-6">
    <div class="form-group {{ $errors->has('fluency') ? 'has-error' : ''}}">
        <label for="fluency" title="{{ trans('languages.inputs.fluency.description') }}">
            {{trans('languages.inputs.fluency.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('fluency', trans('languages.fluencies'),
            null,
            [
                'id' => 'fluency',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'language_fluency_help_block',
            ])
        !!}
        @if($errors->any() && $errors->has('fluency'))
        {!!
            $errors->first('fluency', '<p id="language_fluency_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end fluency --}}

{{-- end language form --}}