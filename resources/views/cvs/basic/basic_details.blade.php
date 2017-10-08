{{-- start basic details --}}


{{-- start header --}}
<div class="row m-t-lg">
  <div class="col-md-12">
    <blockquote>
      <h3 title="{{trans('cvs.headers.basic_details.title')}}">
        {{trans('cvs.headers.basic_details.name')}}
      </h3>
    </blockquote>
  </div>
</div>
{{-- end header --}}


{{-- start firstname, middlename, surname --}}
<div class="row m-t-md">

    {{-- start first name --}}
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
            <label for="first_name" title="{{ trans('cvs.inputs.first_name.description') }}">
                {{trans('cvs.inputs.first_name.label')}}
                <span class="text-danger">*</span>
            </label>
            {!! Form::text('first_name', null, [
                'id' => 'first_name',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'cv_first_name_help_block',
                'placeholder' => trans('cvs.inputs.first_name.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('first_name'))
            {!!
                $errors->first('first_name', '<p id="cv_first_name_help_block" class="help-block">:message</p>')
            !!}
            @endif
        </div>
    </div>
    {{-- end first name --}}

    {{-- start middle name --}}
    <div class="col-md-3">
        <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : ''}}">
            <label for="middle_name" title="{{ trans('cvs.inputs.middle_name.description') }}">
                {{trans('cvs.inputs.middle_name.label')}}
            </label>
            {!! Form::text('middle_name', null, [
                'id' => 'middle_name',
                'class' => 'form-control',
                'aria-describedby'=> 'cv_middle_name_help_block',
                'placeholder' => trans('cvs.inputs.middle_name.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('middle_name'))
            {!!
                $errors->first('middle_name', '<p id="cv_middle_name_help_block" class="help-block">:message</p>')
            !!}
            @endif
        </div>
    </div>
    {{-- end middle name --}}

    {{-- start surname --}}
    <div class="col-md-5">
    	<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
            <label for="surname" title="{{ trans('cvs.inputs.surname.description') }}">
                {{trans('cvs.inputs.surname.label')}}
                <span class="text-danger">*</span>
            </label>
            {!! Form::text('surname', null, [
                'id' => 'surname',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'cv_surname_help_block',
                'placeholder' => trans('cvs.inputs.surname.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('surname'))
            {!!
                $errors->first('surname', '<p id="cv_surname_help_block" class="help-block">:message</p>')
            !!}
            @endif
        </div>
    </div>
    {{-- end surname --}}

</div>
{{-- end firstname, middlename, surname --}}


{{-- start dob, gender & marital status --}}
<div class="row m-t-md">

	{{-- start dob --}}
	<div class="col-md-4">
	    <div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
	        <label for="dob" title="{{ trans('cvs.inputs.dob.description') }}">
                {{trans('cvs.inputs.dob.label')}}
                <span class="text-danger">*</span>
            </label>
            {!! Form::text('dob', null, [
                'id' => 'dob',
	            'class' => 'form-control datepicker',
	            //'required' => 'required',
	            'placeholder' => trans('cvs.inputs.dob.placeholder'),
	            'aria-describedby'=> 'cv_dob_help_block',
	            'data-provide' => 'datepicker',
	            'data-date-format' => config('app.datepicker_date_format')
	        ]) !!}
	       @if($errors->any() && $errors->has('dob'))
	        {!!
	            $errors->first('dob', '<p id="cv_dob_help_block" class="help-block">:message</p>')
	        !!}
	        @else
	            <p id="cv_dob_help_block" class="help-block">
	                {{ trans('cvs.inputs.dob.description') }}
	            </p>
	        @endif
	    </div>
	</div>
	{{-- end dob --}}

	{{-- start gender --}}
	<div class="col-md-3">
        <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
            <label for="gender" title="{{ trans('cvs.inputs.gender.description') }}">
                {{trans('cvs.inputs.gender.label')}}
                <span class="text-danger">*</span>
            </label>
            <div>
                @foreach(trans('cvs.genders') as $key => $value)
                <label class="radio-inline text-black" for="{{$key}}">
                  {!! Form::radio('gender', $value, null, [
                      'id' => $key,
                      'aria-describedby'=> 'cv_gender_help_block',
                  ]) !!}
                  {{$value}}
                </label>
                @endforeach
            </div>
            @if($errors->any() && $errors->has('gender'))
            {!!
                $errors->first('gender', '<p id="cv_gender_help_block" class="help-block">:message</p>')
            !!}
            @else
                <p id="cv_gender_help_block" class="help-block">
                    {{ trans('cvs.inputs.gender.description') }}
                </p>
            @endif
        </div>
    </div>
	{{-- end gender --}}

	{{-- start marital status --}}
	<div class="col-md-5">
        {{-- <div class="form-group {{ $errors->has('maritalstatus_id') ? 'has-error' : ''}}">
            <label for="maritalstatus" title="{{ trans('cvs.inputs.maritalstatus.description') }}">
                {{trans('cvs.inputs.maritalstatus.label')}}
                <span class="text-danger">*</span>
            </label>
            <div>
                @foreach($maritalstatuses->pluck('name', 'id') as $key => $value)
                <label class="radio-inline text-black" for="{{$key}}">
                  {!! Form::radio('maritalstatus_id', $key, null, [
                      'id' => $key,
                      'aria-describedby' => 'cv_maritalstatus_help_block'
                  ]) !!}
                  {{$value}}
                </label>
                @endforeach
            </div>
            @if($errors->any() && $errors->has('maritalstatus_id'))
            {!!
                $errors->first('maritalstatus_id', '<p id="cv_maritalstatus_help_block" class="help-block">:message</p>')
            !!}
            @else
                <p id="cv_maritalstatus_help_block" class="help-block">
                    {{ trans('cvs.inputs.maritalstatus.description') }}
                </p>
            @endif
        </div> --}}
    </div>
	{{-- end marital status --}}

</div>
{{-- end dob, gender & marital status --}}


{{-- start email & mobile numbers --}}
<div class="row m-t-md">

    {{-- start email --}}
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label for="email" title="{{ trans('cvs.inputs.email.description') }}">
                {{trans('cvs.inputs.email.label')}}
                <span class="text-danger">*</span>
            </label>
            {!! Form::email('email', null, [
                'id' => 'email',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'cv_email_help_block',
                'placeholder' => trans('cvs.inputs.email.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('email'))
            {!!
                $errors->first('email', '<p id="cv_email_help_block" class="help-block">:message</p>')
            !!}
            @else
                <p id="cv_email_help_block" class="help-block">
                    {{ trans('cvs.inputs.email.description') }}
                </p>
            @endif
        </div>
    </div>
    {{-- end email --}}

    {{-- start mobile number --}}
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
            <label for="mobile" title="{{ trans('cvs.inputs.mobile.description') }}">
                {{trans('cvs.inputs.mobile.label')}}
                <span class="text-danger">*</span>
            </label>
            {!! Form::text('mobile', null, [
                'id' => 'mobile',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'cv_mobile_help_block',
                'placeholder' => trans('cvs.inputs.mobile.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('mobile'))
            {!!
                $errors->first('mobile', '<p id="cv_mobile_help_block" class="help-block">:message</p>')
            !!}
            @else
                <p id="cv_mobile_help_block" class="help-block">
                    {{ trans('cvs.inputs.mobile.description') }}
                </p>
            @endif
        </div>
    </div>
    {{-- end mobile number --}}

    {{-- start landline number --}}
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('landline') ? 'has-error' : ''}}">
             <label for="landline" title="{{ trans('cvs.inputs.landline.description') }}">
                {{trans('cvs.inputs.landline.label')}}
            </label>
            {!! Form::text('landline', null, [
                'id' => 'landline',
                'class' => 'form-control',
                'aria-describedby'=> 'cv_landline_help_block',
                'placeholder' => trans('cvs.inputs.landline.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('landline'))
            {!!
                $errors->first('landline', '<p id="cv_landline_help_block" class="help-block">:message</p>')
            !!}
            @else
                <p id="cv_landline_help_block" class="help-block">
                    {{ trans('cvs.inputs.landline.description') }}
                </p>
            @endif
        </div>
    </div>
    {{-- end landline number --}}

</div>
{{-- start email & mobile numbers --}}


{{-- start physical address, fax & postal address --}}
<div class="row m-t-md">

	{{-- start physical address --}}
	<div class="col-md-4">
	    <div class="form-group {{ $errors->has('physical_address') ? 'has-error' : ''}}">
            <label for="physical_address" title="{{ trans('cvs.inputs.physical_address.description') }}">
                {{trans('cvs.inputs.physical_address.label')}}
                <span class="text-danger">*</span>
            </label>
	        {!! Form::text('physical_address', null, [
                'id' => 'physical_address',
	            'class' => 'form-control',
	            'aria-describedby'=> 'cv_physical_address_help_block',
	            'placeholder' => trans('cvs.inputs.physical_address.placeholder')
	        ]) !!}
	        @if($errors->any() && $errors->has('physical_address'))
	        {!!
	            $errors->first('physical_address', '<p id="cv_physical_address_help_block" class="help-block">:message</p>')
	        !!}
	        @else
	            <p id="cv_physical_address_help_block" class="help-block">
	                {{ trans('cvs.inputs.physical_address.description') }}
	            </p>
	        @endif
	    </div>
	</div>
	{{-- end physical address --}}

	{{-- start fax --}}
	<div class="col-md-3">
	    <div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
	        <label for="fax" title="{{ trans('cvs.inputs.fax.description') }}">
                {{trans('cvs.inputs.fax.label')}}
            </label>
            {!! Form::text('fax', null, [
                'id' => 'fax',
	            'class' => 'form-control',
	            'aria-describedby'=> 'cv_fax_help_block',
	            'placeholder' => trans('cvs.inputs.fax.placeholder')
	        ]) !!}
	        @if($errors->any() && $errors->has('fax'))
	        {!!
	            $errors->first('fax', '<p id="cv_fax_help_block" class="help-block">:message</p>')
	        !!}
	        @else
	            <p id="cv_fax_help_block" class="help-block">
	                {{ trans('cvs.inputs.fax.description') }}
	            </p>
	        @endif
	    </div>
	</div>
	{{-- end fax --}}

	{{-- start postal address --}}
	<div class="col-md-5">
	    <div class="form-group {{ $errors->has('postal_address') ? 'has-error' : ''}}">
            <label for="postal_address" title="{{ trans('cvs.inputs.postal_address.description') }}">
                {{trans('cvs.inputs.postal_address.label')}}
            </label>
	        {!! Form::text('postal_address', null, [
                'id' => 'postal_address',
	            'class' => 'form-control',
	            'aria-describedby'=> 'cv_postal_address_help_block',
	            'placeholder' => trans('cvs.inputs.postal_address.placeholder')
	        ]) !!}
	        @if($errors->any() && $errors->has('postal_address'))
	        {!!
	            $errors->first('postal_address', '<p id="cv_postal_address_help_block" class="help-block">:message</p>')
	        !!}
	        @else
	            <p id="cv_postal_address_help_block" class="help-block">
	                {{ trans('cvs.inputs.postal_address.description') }}
	            </p>
	        @endif
	    </div>
	</div>
	{{-- end postal address --}}

</div>
{{-- end physical address, fax & postal address --}}


{{-- end basic details --}}
