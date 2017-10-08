{{-- start education form --}}

{{-- start level --}}
<div class="col-md-offset-2 col-md-6">
    <div class="form-group {{ $errors->has('level') ? 'has-error' : ''}}">
        <label for="level" title="{{ trans('educations.inputs.level.description') }}">
            {{trans('educations.inputs.level.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('level', trans('educations.levels'),
            null,
            [
                'id' => 'level',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'education_level_help_block',
            ])
        !!}
        @if($errors->any() && $errors->has('level'))
        {!!
            $errors->first('level', '<p id="education_level_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end level --}}

{{-- start institution --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
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

{{-- start summary --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
        <label for="summary" title="{{ trans('educations.inputs.summary.description') }}">
            {{trans('educations.inputs.summary.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('summary', null, [
            'id' => 'summary',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'education_summary_help_block',
            'placeholder' => trans('educations.inputs.summary.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('summary'))
        {!!
            $errors->first('summary', '<p id="education_summary_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end summary --}}

{{-- start started_at --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('started_at') ? 'has-error' : ''}}">
        <label for="started_at" title="{{ trans('educations.inputs.started_at.description') }}">
            {{trans('educations.inputs.started_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('started_at', null, [
            'id' => 'started_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('educations.inputs.started_at.placeholder'),
            'aria-describedby'=> 'education_started_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-format' => config('app.datepicker_date_format')
        ]) !!}
       @if($errors->any() && $errors->has('started_at'))
        {!!
            $errors->first('started_at', '<p id="education_started_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end started_at --}}

{{-- start finished_at --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('finished_at') ? 'has-error' : ''}}">
        <label for="finished_at" title="{{ trans('educations.inputs.finished_at.description') }}">
            {{trans('educations.inputs.finished_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('finished_at', null, [
            'id' => 'finished_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('educations.inputs.finished_at.placeholder'),
            'aria-describedby'=> 'education_finished_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-format' => config('app.datepicker_date_format')
        ]) !!}
       @if($errors->any() && $errors->has('finished_at'))
        {!!
            $errors->first('finished_at', '<p id="education_finished_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end finished_at --}}

{{-- start remark --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('remark') ? 'has-error' : ''}}">
        <label for="remark" title="{{ trans('educations.inputs.remark.description') }}">
            {{trans('educations.inputs.remark.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('remark', null, [
            'id' => 'remark',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'education_remark_help_block',
            'placeholder' => trans('educations.inputs.remark.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('remark'))
        {!!
            $errors->first('remark', '<p id="education_remark_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end remark --}}

{{-- end education form --}}