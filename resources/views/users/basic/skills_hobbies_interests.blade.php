{{-- start skills, hobbies, interests, extracurricular activities details --}}


{{-- start header --}}
<div class="row m-t-lg">
  <div class="col-md-12">
    <blockquote>
      <h3 title="{{trans('cvs.headers.skills_hobbies_interests.title')}}">
        {{trans('cvs.headers.skills_hobbies_interests.name')}}
      </h3>
    </blockquote>
  </div>
</div>
{{-- end header --}}

{{-- start skills --}}
<div class="row m-t-md">

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('skills') ? 'has-error' : ''}}">
            <label for="skills" title="{{ trans('cvs.inputs.skills.description') }}">
                {{trans('cvs.inputs.skills.label')}}
            </label>
            {!! Form::textarea('skills', null, [
                'id' => 'skills',
                'class' => 'form-control',
                'rows' => 2,
                //'required' => 'required',
                'aria-describedby'=> 'cv_skills_help_block',
                'placeholder' => trans('cvs.inputs.skills.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('skills'))
            {!!
                $errors->first('skills', '<p id="cv_skills_help_block" class="help-block">:message</p>')
            !!}
            @endif
        </div>
    </div>

</div>
{{-- end skills --}}

{{-- start interests --}}
<div class="row m-t-md">

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('interests') ? 'has-error' : ''}}">
            <label for="interests" title="{{ trans('cvs.inputs.interests.description') }}">
                {{trans('cvs.inputs.interests.label')}}
            </label>
            {!! Form::textarea('interests', null, [
                'id' => 'interests',
                'class' => 'form-control',
                'rows' => 2,
                //'required' => 'required',
                'aria-describedby'=> 'cv_interests_help_block',
                'placeholder' => trans('cvs.inputs.interests.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('interests'))
            {!!
                $errors->first('interests', '<p id="cv_interests_help_block" class="help-block">:message</p>')
            !!}
            @endif
        </div>
    </div>

</div>
{{-- end interests --}}

{{-- start hobbies --}}
<div class="row m-t-md">

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('hobbies') ? 'has-error' : ''}}">
            <label for="hobbies" title="{{ trans('cvs.inputs.hobbies.description') }}">
                {{trans('cvs.inputs.hobbies.label')}}
            </label>
            {!! Form::textarea('hobbies', null, [
                'id' => 'hobbies',
                'class' => 'form-control',
                'rows' => 2,
                //'required' => 'required',
                'aria-describedby'=> 'cv_hobbies_help_block',
                'placeholder' => trans('cvs.inputs.hobbies.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('hobbies'))
            {!!
                $errors->first('hobbies', '<p id="cv_hobbies_help_block" class="help-block">:message</p>')
            !!}
            @endif
        </div>
    </div>

</div>
{{-- end hobbies --}}

{{--extracurricular_activitieshobbies --}}
<div class="row m-t-md m-b-lg">

    <div class="col-md-12">
        <div class="form-group {{ $errors->has('extracurricular_activities') ? 'has-error' : ''}}">
            <label for="extracurricular_activities" title="{{ trans('cvs.inputs.extracurricular_activities.description') }}">
                {{trans('cvs.inputs.extracurricular_activities.label')}}
            </label>
            {!! Form::textarea('extracurricular_activities', null, [
                'id' => 'extracurricular_activities',
                'class' => 'form-control',
                'rows' => 2,
                //'required' => 'required',
                'aria-describedby'=> 'cv_extracurricular_activities_help_block',
                'placeholder' => trans('cvs.inputs.extracurricular_activities.placeholder')
            ]) !!}
            @if($errors->any() && $errors->has('extracurricular_activities'))
            {!!
                $errors->first('extracurricular_activities', '<p id="cv_extracurricular_activities_help_block" class="help-block">:message</p>')
            !!}
            @endif
        </div>
    </div>

</div>
{{-- end extracurricular_activities --}}

{{-- end skills, hobbies, interests, extracurricular activities details --}}
