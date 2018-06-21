{{-- start assignment form --}}

{{--start applicant id--}}
@if(is_set($applicant_id))
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
@endif
{{--end applicant id--}}

{{-- start title --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label for="title" title="{{ trans('assignments.inputs.title.description') }}">
            {{trans('assignments.inputs.title.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('title', null, [
            'id' => 'title',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'assignment_title_help_block',
            'placeholder' => trans('assignments.inputs.title.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('title'))
        {!!
            $errors->first('title', '<p id="assignment_title_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end title --}}


{{-- start client --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('client') ? 'has-error' : ''}}">
        <label for="client" title="{{ trans('assignments.inputs.client.description') }}">
            {{trans('assignments.inputs.client.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('client', null, [
            'id' => 'client',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'assignment_client_help_block',
            'placeholder' => trans('assignments.inputs.client.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('client'))
        {!!
            $errors->first('client', '<p id="assignment_client_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end client --}}

{{-- start location --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
        <label for="location" title="{{ trans('assignments.inputs.location.description') }}">
            {{trans('assignments.inputs.location.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('location', null, [
            'id' => 'location',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'assignment_location_help_block',
            'placeholder' => trans('assignments.inputs.location.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('location'))
        {!!
            $errors->first('location', '<p id="assignment_location_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end location --}}


{{-- start summary --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
        <label for="summary" title="{{ trans('assignments.inputs.summary.description') }}">
            {{trans('assignments.inputs.summary.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('summary', null, [
            'id' => 'summary',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'assignment_summary_help_block',
            'placeholder' => trans('assignments.inputs.summary.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('summary'))
        {!!
            $errors->first('summary', '<p id="assignment_summary_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end summary --}}


{{-- start started_at --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('started_at') ? 'has-error' : ''}}">
        <label for="started_at" title="{{ trans('assignments.inputs.started_at.description') }}">
            {{trans('assignments.inputs.started_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('started_at', null, [
            'id' => 'started_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('assignments.inputs.started_at.placeholder'),
            'aria-describedby'=> 'assignment_started_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-format' => config('app.datepicker_date_format')
        ]) !!}
       @if($errors->any() && $errors->has('started_at'))
        {!!
            $errors->first('started_at', '<p id="assignment_started_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end started_at --}}

{{-- start finished_at --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('finished_at') ? 'has-error' : ''}}">
        <label for="finished_at" title="{{ trans('assignments.inputs.finished_at.description') }}">
            {{trans('assignments.inputs.finished_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('finished_at', null, [
            'id' => 'finished_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('assignments.inputs.finished_at.placeholder'),
            'aria-describedby'=> 'assignment_finished_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-format' => config('app.datepicker_date_format')
        ]) !!}
       @if($errors->any() && $errors->has('finished_at'))
        {!!
            $errors->first('finished_at', '<p id="assignment_finished_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end finished_at --}}

{{-- end assignment form --}}