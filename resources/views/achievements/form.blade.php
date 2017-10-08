{{-- start achievement form --}}

{{--start applicant id--}}
@if(is_set($applicant_id))
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
@endif
{{--end applicant id--}}

{{-- start title --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label for="title" title="{{ trans('achievements.inputs.title.description') }}">
            {{trans('achievements.inputs.title.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('title', null, [
            'id' => 'title',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'achievement_title_help_block',
            'placeholder' => trans('achievements.inputs.title.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('title'))
        {!!
            $errors->first('title', '<p id="achievement_title_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end title --}}


{{-- start organization --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('organization') ? 'has-error' : ''}}">
        <label for="organization" title="{{ trans('achievements.inputs.organization.description') }}">
            {{trans('achievements.inputs.organization.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('organization', null, [
            'id' => 'organization',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'achievement_organization_help_block',
            'placeholder' => trans('achievements.inputs.organization.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('organization'))
        {!!
            $errors->first('organization', '<p id="achievement_organization_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end organization --}}


{{-- start summary --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
        <label for="summary" title="{{ trans('achievements.inputs.summary.description') }}">
            {{trans('achievements.inputs.summary.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('summary', null, [
            'id' => 'summary',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'achievement_summary_help_block',
            'placeholder' => trans('achievements.inputs.summary.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('summary'))
        {!!
            $errors->first('summary', '<p id="achievement_summary_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end summary --}}

{{-- start issued_at --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('issued_at') ? 'has-error' : ''}}">
        <label for="issued_at" title="{{ trans('achievements.inputs.issued_at.description') }}">
            {{trans('achievements.inputs.issued_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('issued_at', null, [
            'id' => 'issued_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('achievements.inputs.issued_at.placeholder'),
            'aria-describedby'=> 'achievement_issued_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-format' => config('app.datepicker_date_format')
        ]) !!}
       @if($errors->any() && $errors->has('issued_at'))
        {!!
            $errors->first('issued_at', '<p id="achievement_issued_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end issued_at --}}


{{-- end achievement form --}}