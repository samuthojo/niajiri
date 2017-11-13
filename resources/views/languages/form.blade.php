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


{{-- start write_fluency --}}
<div class="col-md-offset-2 col-md-6">
    <div class="form-group {{ $errors->has('write_fluency') ? 'has-error' : ''}}">
        <label for="write_fluency" title="{{ trans('languages.inputs.write_fluency.description') }}">
            {{trans('languages.inputs.write_fluency.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('write_fluency', trans('languages.fluencies'),
            null,
            [
                'id' => 'write_fluency',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'language_write_fluency_help_block',
            ])
        !!}
        @if($errors->any() && $errors->has('write_fluency'))
        {!!
            $errors->first('write_fluency', '<p id="language_write_fluency_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end write_fluency --}}

{{-- start speak_fluency --}}
<div class="col-md-offset-2 col-md-6">
    <div class="form-group {{ $errors->has('speak_fluency') ? 'has-error' : ''}}">
        <label for="speak_fluency" title="{{ trans('languages.inputs.speak_fluency.description') }}">
            {{trans('languages.inputs.speak_fluency.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('speak_fluency', trans('languages.fluencies'),
            null,
            [
                'id' => 'speak_fluency',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'language_speak_fluency_help_block',
            ])
        !!}
        @if($errors->any() && $errors->has('speak_fluency'))
        {!!
            $errors->first('speak_fluency', '<p id="language_speak_fluency_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end speak_fluency --}}

{{-- end language form --}}