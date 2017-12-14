{{-- start education form --}}

{{--start applicant id--}}
@if(is_set($applicant_id))
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
@endif
{{--end applicant id--}}

{{-- {{dd($errors)}} --}}

<div class="row">
{{-- start level --}}
<div class="col-md-6 m-t-md">
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
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('institution') ? 'has-error' : ''}}">
        <label for="institution" title="{{ trans('educations.inputs.institution.description') }}">
            {{trans('educations.inputs.institution.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('institution', trans('educations.institutions'), null, [
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
</div>

<div class="row">
{{-- start summary --}}
<div class="col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
        <label for="summary" title="{{ trans('educations.inputs.summary.description') }}">
            {{trans('educations.inputs.summary.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('summary', trans('educations.qualifications'), null, [
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
<div class="col-md-6 m-t-md">
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
            'data-date-start-view' => 'months',
            'data-date-min-view-mode' => 'months',
            'data-date-format' => config('app.datepicker_month_year_format')
        ]) !!}
       @if($errors->any() && $errors->has('started_at'))
        {!!
            $errors->first('started_at', '<p id="education_started_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end started_at --}}
</div>

<div class="row">
{{-- start finished_at --}}
<div class="col-md-6 m-t-md">
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
            'data-date-start-view' => 'months',
            'data-date-min-view-mode' => 'months',
            'data-date-format' => config('app.datepicker_month_year_format')
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
<div class="col-md-6 m-t-md">
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
</div>

<div class="row">
{{-- start attachment edit --}}
<div class="col-md-12 m-t-md">
    <div class="form-group m-b-lg {{ $errors->has('attachment') ? 'has-error' : ''}}">
        <div class="edit-profile-photo edit-profile-photo-cv">
            <img src="{{url('/images/attachment.jpg') }}" alt="{{trans('educations.inputs.attachment.placeholder')}}" class="img-thumbnail"
            title="{{trans('educations.inputs.attachment.placeholder')}}">
            <div class="change-photo-btn">
                <div class="photoUpload">
                    <span title="{{trans('educations.inputs.attachment.placeholder')}}">
                        <i class="fa fa-upload"></i> {{trans('educations.inputs.attachment.change')}}
                    </span>
                    <input id="attachment" name="attachment" type="file" class="upload" />
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end attachment edit --}}
</div>

{{-- end education form --}}