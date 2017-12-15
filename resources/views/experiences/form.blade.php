{{-- start experience form --}}

{{--start applicant id--}}
@if(is_set($applicant_id))
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
@endif
{{--end applicant id--}}

<div class="row">
{{-- start position --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
        <label for="position" title="{{ trans('experiences.inputs.position.description') }}">
            {{trans('experiences.inputs.position.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('position', null, [
            'id' => 'position',
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'experience_position_help_block',
            'placeholder' => trans('experiences.inputs.position.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('position'))
        {!!
            $errors->first('position', '<p id="experience_position_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end position --}}


{{-- start organization --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('organization') ? 'has-error' : ''}}">
        <label for="organization" title="{{ trans('experiences.inputs.organization.description') }}">
            {{trans('experiences.inputs.organization.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('organization', null, [
            'id' => 'organization',
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'experience_organization_help_block',
            'placeholder' => trans('experiences.inputs.organization.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('organization'))
        {!!
            $errors->first('organization', '<p id="experience_organization_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end organization --}}
</div>

<div class="row">
{{-- start sector --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('sector') ? 'has-error' : ''}}">
        <label for="sector" title="{{ trans('experiences.inputs.sector.description') }}">
            {{trans('experiences.inputs.sector.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('sector', null, [
            'id' => 'sector',
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'experience_sector_help_block',
            'placeholder' => trans('experiences.inputs.sector.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('sector'))
        {!!
            $errors->first('sector', '<p id="experience_sector_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end sector --}}


{{-- start location --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
        <label for="location" title="{{ trans('experiences.inputs.location.description') }}">
            {{trans('experiences.inputs.location.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('location', null, [
            'id' => 'location',
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'experience_location_help_block',
            'placeholder' => trans('experiences.inputs.location.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('location'))
        {!!
            $errors->first('location', '<p id="experience_location_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end location --}}
</div>

<div class="row">
{{-- start started_at --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('started_at') ? 'has-error' : ''}}">
        <label for="started_at" title="{{ trans('experiences.inputs.started_at.description') }}">
            {{trans('experiences.inputs.started_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('started_at', null, [
            'id' => 'started_at',
            'class' => 'form-control datepicker',
            'required' => 'required',
            'placeholder' => trans('experiences.inputs.started_at.placeholder'),
            'aria-describedby'=> 'experience_started_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-start-view' => 'months',
            'data-date-min-view-mode' => 'months',
            'data-date-format' => config('app.datepicker_month_year_format')
        ]) !!}
       @if($errors->any() && $errors->has('started_at'))
        {!!
            $errors->first('started_at', '<p id="experience_started_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end started_at --}}

{{-- start ended_at --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('ended_at') ? 'has-error' : ''}}">
        <label for="ended_at" title="{{ trans('experiences.inputs.ended_at.description') }}">
            {{trans('experiences.inputs.ended_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('ended_at', null, [
            'id' => 'ended_at',
            'class' => 'form-control datepicker',
            'required' => 'required',
            'placeholder' => trans('experiences.inputs.ended_at.placeholder'),
            'aria-describedby'=> 'experience_ended_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-start-view' => 'months',
            'data-date-min-view-mode' => 'months',
            'data-date-format' => config('app.datepicker_month_year_format')
        ]) !!}
       @if($errors->any() && $errors->has('ended_at'))
        {!!
            $errors->first('ended_at', '<p id="experience_ended_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end ended_at --}}
</div>

{{-- start summary --}}
<div class="row">
<div class="col-md-12 m-t-md">
    <div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
        <label for="summary" title="{{ trans('experiences.inputs.summary.description') }}">
            {{trans('experiences.inputs.summary.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::textarea('summary', null, [
            'id' => 'summary',
            'class' => 'form-control',
            'rows' => 2,
            'required' => 'required',
            'aria-describedby'=> 'experience_summary_help_block',
            'placeholder' => trans('experiences.inputs.summary.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('summary'))
        {!!
            $errors->first('summary', '<p id="experience_summary_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
</div>
{{-- end summary --}}

{{-- end experience form --}}