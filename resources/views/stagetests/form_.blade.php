{{-- start stagetest form --}}

{{--start applicant id--}}
@if(is_set($applicant_id))
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
@endif
{{--end applicant id--}}

{{-- {{dd($errors)}} --}}

{{-- start level --}}
<div class="col-md-offset-2 col-md-6">
    <div class="form-group {{ $errors->has('level') ? 'has-error' : ''}}">
        <label for="level" title="{{ trans('stagetests.inputs.level.description') }}">
            {{trans('stagetests.inputs.level.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('level', trans('stagetests.levels'),
            null,
            [
                'id' => 'level',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'stagetest_level_help_block',
            ])
        !!}
        @if($errors->any() && $errors->has('level'))
        {!!
            $errors->first('level', '<p id="stagetest_level_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end level --}}

{{-- start institution --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('institution') ? 'has-error' : ''}}">
        <label for="institution" title="{{ trans('stagetests.inputs.institution.description') }}">
            {{trans('stagetests.inputs.institution.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('institution', trans('stagetests.institutions'), null, [
            'id' => 'institution',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'stagetest_institution_help_block',
            'placeholder' => trans('stagetests.inputs.institution.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('institution'))
        {!!
            $errors->first('institution', '<p id="stagetest_institution_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end institution --}}

{{-- start summary --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
        <label for="summary" title="{{ trans('stagetests.inputs.summary.description') }}">
            {{trans('stagetests.inputs.summary.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('summary', trans('stagetests.qualifications'), null, [
            'id' => 'summary',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'stagetest_summary_help_block',
            'placeholder' => trans('stagetests.inputs.summary.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('summary'))
        {!!
            $errors->first('summary', '<p id="stagetest_summary_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end summary --}}

{{-- start started_at --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('started_at') ? 'has-error' : ''}}">
        <label for="started_at" title="{{ trans('stagetests.inputs.started_at.description') }}">
            {{trans('stagetests.inputs.started_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('started_at', null, [
            'id' => 'started_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('stagetests.inputs.started_at.placeholder'),
            'aria-describedby'=> 'stagetest_started_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-start-view' => 'months',
            'data-date-min-view-mode' => 'months',
            'data-date-format' => config('app.datepicker_month_year_format')
        ]) !!}
       @if($errors->any() && $errors->has('started_at'))
        {!!
            $errors->first('started_at', '<p id="stagetest_started_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end started_at --}}

{{-- start finished_at --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('finished_at') ? 'has-error' : ''}}">
        <label for="finished_at" title="{{ trans('stagetests.inputs.finished_at.description') }}">
            {{trans('stagetests.inputs.finished_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('finished_at', null, [
            'id' => 'finished_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('stagetests.inputs.finished_at.placeholder'),
            'aria-describedby'=> 'stagetest_finished_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-start-view' => 'months',
            'data-date-min-view-mode' => 'months',
            'data-date-format' => config('app.datepicker_month_year_format')
        ]) !!}
       @if($errors->any() && $errors->has('finished_at'))
        {!!
            $errors->first('finished_at', '<p id="stagetest_finished_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end finished_at --}}

{{-- start remark --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('remark') ? 'has-error' : ''}}">
        <label for="remark" title="{{ trans('stagetests.inputs.remark.description') }}">
            {{trans('stagetests.inputs.remark.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('remark', null, [
            'id' => 'remark',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'stagetest_remark_help_block',
            'placeholder' => trans('stagetests.inputs.remark.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('remark'))
        {!!
            $errors->first('remark', '<p id="stagetest_remark_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end remark --}}

{{-- end stagetest form --}}