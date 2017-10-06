{{-- start user form --}}
<input type="hidden" name="type" value="{{\App\User::TYPE_NORMAL}}">

{{-- start avatar edit --}}
<div class="form-group m-b-lg {{ $errors->has('avatar') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        <div class="edit-profile-photo">
            <img src="{{$user->avatar()}}" alt="{{trans('users.inputs.avatar.placeholder')}}" class="img-thumbnail"
            title="{{trans('users.inputs.avatar.placeholder')}}">
            <div class="change-photo-btn">
                <div class="photoUpload">
                    <span title="Change Profile Avatar">
                        <i class="fa fa-upload"></i> {{trans('users.inputs.avatar.change')}}
                    </span>
                    <input id="avatar" name="avatar" type="file" class="upload" />
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end avatar edit --}}

{{-- start title --}}
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('title', null, [
            'class' => 'form-control',
            'aria-describedby'=> 'userTitleHelpBlock',
            'placeholder' => trans('users.inputs.title.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('title'))
        {!!
            $errors->first('title', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userTitleHelpBlock" class="help-block">
                {{ trans('users.inputs.title.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end title --}}

{{-- start first name --}}
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('first_name', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userNameHelpBlock',
            'placeholder' => trans('users.inputs.first_name.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('first_name'))
        {!!
            $errors->first('first_name', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userNameHelpBlock" class="help-block">
                {{ trans('users.inputs.first_name.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end firstname --}}

{{-- start surname --}}
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('surname', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userSurnameHelpBlock',
            'placeholder' => trans('users.inputs.surname.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('surname'))
        {!!
            $errors->first('surname', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userSurnameHelpBlock" class="help-block">
                {{ trans('users.inputs.surname.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end surname --}}


{{-- start dob --}}
<div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('dob', null, [
            'class' => 'form-control datepicker',
            'required' => 'required',
            'placeholder' => trans('users.inputs.dob.placeholder'),
            'aria-describedby'=> 'userDobHelpBlock',
            'data-provide' => 'datepicker',
            'data-date-format' => config('app.datepicker_date_format')
        ]) !!}
       @if($errors->any() && $errors->has('dob'))
        {!!
            $errors->first('dob', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userDobHelpBlock" class="help-block">
                {{ trans('users.inputs.dob.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end dob --}}


{{-- start email --}}
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::email('email', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userEmailHelpBlock',
            'placeholder' => trans('users.inputs.email.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('email'))
        {!!
            $errors->first('email', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userEmailHelpBlock" class="help-block">
                {{ trans('users.inputs.email.description') }}
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
            'placeholder' => trans('users.inputs.mobile.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('mobile'))
        {!!
            $errors->first('mobile', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userMobileHelpBlock" class="help-block">
                {{ trans('users.inputs.mobile.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end mobile --}}

{{-- start gender --}}
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('gender', trans('users.genders'),
            null,
            [
                'class' => 'form-control',
                'required' => 'required',
                'aria-describedby'=> 'userGenderHelpBlock',
                'placeholder' => trans('users.inputs.gender.placeholder')
            ])
        !!}
        @if($errors->any() && $errors->has('gender'))
        {!!
            $errors->first('gender', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userGenderHelpBlock" class="help-block">
                {{ trans('users.inputs.gender.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end gender --}}

{{-- start region --}}
<div class="form-group {{ $errors->has('region_id') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('region_id', $regions->pluck('name', 'id'), null,
            [
                'class' => 'form-control',
                //'required' => 'required',
                'id' => 'region_id',
                'aria-describedby'=> 'userRegionHelpBlock',
                'placeholder' => trans('users.inputs.region.placeholder')

            ])
        !!}
        @if($errors->any() && $errors->has('region'))
        {!!
            $errors->first('region', '<p id="userRegionHelpBlock" class="help-block">:message</p>')
        !!}
         @else
            <p id="userRegionHelpBlock" class="help-block">
                {{ trans('users.inputs.region.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end region --}}

{{-- start district --}}
<div class="form-group {{ $errors->has('district_id') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('district_id', $districts->pluck('name', 'id'),
            null,
            [
                'class' => 'form-control',
                //'required' => 'required',
                'id' => 'district_id',
                'aria-describedby'=> 'userDistrictHelpBlock',
                'placeholder' => trans('users.inputs.district.placeholder')

            ])
        !!}
        @if($errors->any() && $errors->has('parent_id'))
        {!!
            $errors->first('parent_id', '<p id="userDistrictHelpBlock" class="help-block">:message</p>')
        !!}
         @else
            <p id="userDistrictHelpBlock" class="help-block">
                {{ trans('users.inputs.district.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end district --}}

{{-- start district --}}
<div class="form-group {{ $errors->has('ward_id') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('ward_id', $wards->pluck('name', 'id'),
            null,
            [
                'class' => 'form-control',
                'id' => 'ward_id',
                'aria-describedby'=> 'userWardHelpBlock',
                'placeholder' => trans('users.inputs.ward.placeholder')

            ])
        !!}
        @if($errors->any() && $errors->has('parent_id'))
        {!!
            $errors->first('parent_id', '<p id="userWardHelpBlock" class="help-block">:message</p>')
        !!}
         @else
            <p id="userWardHelpBlock" class="help-block">
                {{ trans('users.inputs.ward.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end district --}}

{{-- start password & password confirm --}}
@if(!is_set($user->id))
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::password('password', [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userPasswordHelpBlock',
            'placeholder' => trans('users.inputs.password.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('password'))
        {!!
            $errors->first('password', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userPasswordHelpBlock" class="help-block">
                {{ trans('users.inputs.password.description') }}
            </p>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::password('password_confirmation', [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'userPasswordConfirmationHelpBlock',
            'placeholder' => trans('users.inputs.password_confirmation.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('password_confirmation'))
        {!!
            $errors->first('password_confirmation', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userPasswordConfirmationHelpBlock" class="help-block">
                {{ trans('users.inputs.password_confirmation.description') }}
            </p>
        @endif
    </div>
</div>
@endif
{{-- end password & password confirm --}}

{{-- start roles --}}
<div class="form-group">
    <div class="col-md-offset-3 col-md-6">
        <p class="list-group-header">
            {{ trans('users.inputs.roles.header') }}
        </p>
        <hr/>
        <ul class="list-group">
            @foreach($roles as $role)
                <li class="list-group-item list-checkbox-item">
                    <div
                        class="checkbox"
                        title="{{$role->description}}">
                      <label
                        for="{{$role->id}}"
                        title="{{$role->description}}">
                      {{
                        Form::checkbox(
                            'roles[]',
                            $role->id,
                            isset($user) ? $user->hasRole($role->name) : false
                        )
                        }}
                      {{$role->display_name}}
                      </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
{{-- end roles --}}

{{-- end user form --}}

@push('scripts')
<script type="text/javascript">

var regionSelect = $('#region_id');
var districtSelect = $('#district_id');
var wardSelect = $('#ward_id');


function append(root, key, value, isSelected) {
    var option = $('<option></option>').attr('value', key).text(value);
    if(isSelected){
        option.attr('selected', 'selected');
    }
    root.append(option);
}

//on region selected load specific districts
regionSelect.change(function(event) {
    var parent = event.target.value;
    var url = '{{route('districts.index')}}';
    $.getJSON(url+'?parent_id=' + parent, function(data) {
        data = data || {};
        districtSelect.empty();
        wardSelect.empty();

        //append empty
        districtSelect.append('<option value="" disabled selected>{{ trans('members.inputs.district.empty') }}</option>');
        $.each(data, function(key, value) {
             append(districtSelect, key, value);
        });

    });
});

//on district selected load specific wards
districtSelect.change(function(event) {
    var parent = event.target.value;

    //populate wards select
    var wardUrl = '{{route('wards.index')}}';
    $.getJSON(wardUrl+'?parent_id=' + parent, function(data) {
        data = data || {};
        wardSelect.empty();

         //append empty
        wardSelect.append('<option value="" disabled selected>{{ trans('members.inputs.ward.empty') }}</option>');
        $.each(data, function(key, value) {
             append(wardSelect, key, value);
        });
    });
});

</script>
@endpush
