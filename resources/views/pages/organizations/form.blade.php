{{-- start organization form --}}
<input type="hidden" name="type" value="secret">



{{-- start name --}}
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('name', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'organizationNameHelpBlock',
            'placeholder' => trans('organizations.inputs.name.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('name'))
        {!!
            $errors->first('name', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="organizationNameHelpBlock" class="help-block">
                {{ trans('organizations.inputs.name.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end name --}}

{{-- start email --}}
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::email('email', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userEmailHelpBlock',
            'placeholder' => trans('organizations.inputs.email.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('email'))
        {!!
            $errors->first('email', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userEmailHelpBlock" class="help-block">
                {{ trans('organizations.inputs.email.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end email --}}

{{-- start mobile --}}
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('mobile', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userMobileHelpBlock',
            'placeholder' => trans('organizations.inputs.mobile.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('mobile'))
        {!!
            $errors->first('mobile', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userMobileHelpBlock" class="help-block">
                {{ trans('organizations.inputs.mobile.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end mobile --}}

{{-- start fax --}}
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('fax', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userFaxHelpBlock',
            'placeholder' => trans('organizations.inputs.fax.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('fax'))
        {!!
            $errors->first('fax', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userMobileHelpBlock" class="help-block">
                {{ trans('organizations.inputs.fax.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end fax --}}


{{-- start landline --}}
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('landline', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userLandlineHelpBlock',
            'placeholder' => trans('organizations.inputs.landline.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('landline'))
        {!!
            $errors->first('landline', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userMobileHelpBlock" class="help-block">
                {{ trans('organizations.inputs.landline.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end landline --}}

{{-- start website --}}
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('website', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userWebsiteHelpBlock',
            'placeholder' => trans('organizations.inputs.website.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('website'))
        {!!
            $errors->first('website', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userMobileHelpBlock" class="help-block">
                {{ trans('organizations.inputs.website.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end fax --}}

{{-- start physical_address --}}
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('physical_address', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userWebsiteHelpBlock',
            'placeholder' => trans('organizations.inputs.physical_address.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('physical_address'))
        {!!
            $errors->first('physical_address', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userMobileHelpBlock" class="help-block">
                {{ trans('organizations.inputs.physical_address.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end physical_address --}}

{{-- start postal_address --}}
<div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('postal_address', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userWebsiteHelpBlock',
            'placeholder' => trans('organizations.inputs.postal_address.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('postal_address'))
        {!!
            $errors->first('postal_address', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userMobileHelpBlock" class="help-block">
                {{ trans('organizations.inputs.postal_address.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end fax --}}


{{-- start sector --}}
<div class="form-group {{ $errors->has('sector') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('sector_id', $sectors,
            null,
            [   'id' => 'sector_id',
                'class' => 'form-control',
                'required' => 'required',
                'aria-describedby'=> 'usersectorHelpBlock',
                'placeholder' => trans('organizations.inputs.sector.placeholder')
            ])
        !!}
        @if($errors->any() && $errors->has('sector'))
        {!!
            $errors->first('sector', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="usersectorHelpBlock" class="help-block">
                {{ trans('organizations.inputs.sector.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end sector --}}


{{-- start logo edit --}}
<div class="form-group m-b-lg {{ $errors->has('logo') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        <div class="edit-profile-photo">
            <img src="{{$organization->logo()}}" alt="{{trans('organizations.inputs.avatar.placeholder')}}" class="img-thumbnail"
            title="{{trans('organizations.inputs.avatar.placeholder')}}">
          {!! Form::file('logo', null,
              null,
              [  'class' => 'form-control',
                  'required' => 'required',
                  'aria-describedby'=> 'usersectorHelpBlock',
                  'placeholder' => trans('organizations.inputs.logo.placeholder')
              ])
          !!}
        </div>
    </div>
</div>
{{-- end avatar edit --}}


{{-- end organization form --}}

@push('scripts')

@endpush
