{{-- start certificate form --}}

{{--start applicant id--}}
@if(is_set($applicant_id))
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
@endif
{{--end applicant id--}}

{{-- start title --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label for="title" title="{{ trans('certificates.inputs.title.description') }}">
            {{trans('certificates.inputs.title.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('title', null, [
            'id' => 'title',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'certificate_title_help_block',
            'placeholder' => trans('certificates.inputs.title.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('title'))
        {!!
            $errors->first('title', '<p id="certificate_title_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end title --}}


{{-- start institution --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('institution') ? 'has-error' : ''}}">
        <label for="institution" title="{{ trans('certificates.inputs.institution.description') }}">
            {{trans('certificates.inputs.institution.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('institution', null, [
            'id' => 'institution',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'certificate_institution_help_block',
            'placeholder' => trans('certificates.inputs.institution.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('institution'))
        {!!
            $errors->first('institution', '<p id="certificate_institution_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end institution --}}

{{-- start summary --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
        <label for="summary" title="{{ trans('certificates.inputs.summary.description') }}">
            {{trans('certificates.inputs.summary.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('summary', null, [
            'id' => 'summary',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'certificate_summary_help_block',
            'placeholder' => trans('certificates.inputs.summary.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('summary'))
        {!!
            $errors->first('summary', '<p id="certificate_summary_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end summary --}}

{{-- start started_at --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('started_at') ? 'has-error' : ''}}">
        <label for="started_at" title="{{ trans('certificates.inputs.started_at.description') }}">
            {{trans('certificates.inputs.started_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('started_at', null, [
            'id' => 'started_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('certificates.inputs.started_at.placeholder'),
            'aria-describedby'=> 'certificate_started_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-start-view' => 'months',
            'data-date-min-view-mode' => 'months',
            'data-date-format' => config('app.datepicker_month_year_format')
        ]) !!}
       @if($errors->any() && $errors->has('started_at'))
        {!!
            $errors->first('started_at', '<p id="certificate_started_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end started_at --}}

{{-- start finished_at --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('finished_at') ? 'has-error' : ''}}">
        <label for="finished_at" title="{{ trans('certificates.inputs.finished_at.description') }}">
            {{trans('certificates.inputs.finished_at.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('finished_at', null, [
            'id' => 'finished_at',
            'class' => 'form-control datepicker',
            //'required' => 'required',
            'placeholder' => trans('certificates.inputs.finished_at.placeholder'),
            'aria-describedby'=> 'certificate_finished_at_help_block',
            'data-provide' => 'datepicker',
            'data-date-start-view' => 'months',
            'data-date-min-view-mode' => 'months',
            'data-date-format' => config('app.datepicker_month_year_format')
        ]) !!}
       @if($errors->any() && $errors->has('finished_at'))
        {!!
            $errors->first('finished_at', '<p id="certificate_finished_at_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end finished_at --}}


{{-- start attachment edit --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group m-b-lg {{ $errors->has('attachment') ? 'has-error' : ''}}">
        <div class="edit-profile-photo edit-profile-photo-cv">
            <img src="{{url('/images/attachment.jpg') }}" alt="{{trans('certificates.inputs.attachment.placeholder')}}" class="img-thumbnail"
            title="{{trans('certificates.inputs.attachment.placeholder')}}">
            <div class="change-photo-btn">
                <div class="photoUpload">
                    <span title="{{trans('certificates.inputs.attachment.placeholder')}}">
                        <i class="fa fa-upload"></i> {{trans('certificates.inputs.attachment.change')}}
                    </span>
                    <input id="attachment" name="attachment" type="file" class="upload" />
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end attachment edit --}}

{{-- end certificate form --}}