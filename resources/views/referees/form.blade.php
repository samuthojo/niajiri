{{-- start referee form --}}

{{--start applicant id--}}
@if(is_set($applicant_id))
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
@endif
{{--end applicant id--}}

{{-- start name --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" title="{{ trans('referees.inputs.name.description') }}">
            {{trans('referees.inputs.name.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('name', null, [
            'id' => 'name',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'referee_name_help_block',
            'placeholder' => trans('referees.inputs.name.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('name'))
        {!!
            $errors->first('name', '<p id="referee_name_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end name --}}

{{-- start title --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label for="title" title="{{ trans('referees.inputs.title.description') }}">
            {{trans('referees.inputs.title.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('title', null, [
            'id' => 'title',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'referee_title_help_block',
            'placeholder' => trans('referees.inputs.title.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('title'))
        {!!
            $errors->first('title', '<p id="referee_title_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end title --}}


{{-- start organization --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('organization') ? 'has-error' : ''}}">
        <label for="organization" title="{{ trans('referees.inputs.organization.description') }}">
            {{trans('referees.inputs.organization.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('organization', null, [
            'id' => 'organization',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'referee_organization_help_block',
            'placeholder' => trans('referees.inputs.organization.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('organization'))
        {!!
            $errors->first('organization', '<p id="referee_organization_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end organization --}}


{{-- start email --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" title="{{ trans('referees.inputs.email.description') }}">
            {{trans('referees.inputs.email.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('email', null, [
            'id' => 'email',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'referee_email_help_block',
            'placeholder' => trans('referees.inputs.email.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('email'))
        {!!
            $errors->first('email', '<p id="referee_email_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end email --}}

{{-- start mobile --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
        <label for="mobile" title="{{ trans('referees.inputs.mobile.description') }}">
            {{trans('referees.inputs.mobile.label')}}
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('mobile', null, [
            'id' => 'mobile',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'referee_mobile_help_block',
            'placeholder' => trans('referees.inputs.mobile.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('mobile'))
        {!!
            $errors->first('mobile', '<p id="referee_mobile_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end mobile --}}

{{-- start alternative_mobile --}}
<div class="col-md-offset-2 col-md-6 m-t-md">
    <div class="form-group {{ $errors->has('alternative_mobile') ? 'has-error' : ''}}">
        <label for="alternative_mobile" title="{{ trans('referees.inputs.alternative_mobile.description') }}">
            {{trans('referees.inputs.alternative_mobile.label')}}
        </label>
        {!! Form::text('alternative_mobile', null, [
            'id' => 'alternative_mobile',
            'class' => 'form-control',
            //'required' => 'required',
            'aria-describedby'=> 'referee_alternative_mobile_help_block',
            'placeholder' => trans('referees.inputs.alternative_mobile.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('alternative_mobile'))
        {!!
            $errors->first('alternative_mobile', '<p id="referee_alternative_mobile_help_block" class="help-block">:message</p>')
        !!}
        @endif
    </div>
</div>
{{-- end alternative_mobile --}}


{{-- end referee form --}}