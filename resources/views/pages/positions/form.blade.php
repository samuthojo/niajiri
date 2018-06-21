{{-- start position form --}}
<input type="hidden" name="type" value="secret">



{{-- start title --}}
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('title', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'positionNameHelpBlock',
            'placeholder' => trans('positions.inputs.title.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('title'))
        {!!
            $errors->first('title', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="positionNameHelpBlock" class="help-block">
                {{ trans('positions.inputs.title.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end title --}}

{{-- start summary --}}
<div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::textarea('summary', null, [
            'class' => 'form-control',
            'rows' => 2,
            'aria-describedby'=> 'positionSummaryHelpBlock',
            'placeholder' => trans('positions.inputs.summary.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('summary'))
        {!!
            $errors->first('summary', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="positionNameHelpBlock" class="help-block">
                {{ trans('positions.inputs.summary.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end summary --}}


{{-- start responsibilities --}}
<div class="form-group {{ $errors->has('responsibilities') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::textarea('responsibilities', null, [
            'class' => 'form-control',
            'rows' => 4,
            'aria-describedby'=> 'positionSummaryHelpBlock',
            'placeholder' => trans('positions.inputs.responsibilities.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('responsibilities'))
        {!!
            $errors->first('responsibilities', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="positionNameHelpBlock" class="help-block">
                {{ trans('positions.inputs.responsibilities.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end responsibilities --}}


{{-- start requirements --}}
<div class="form-group {{ $errors->has('responsibilities') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::textarea('requirements', null, [
            'class' => 'form-control',
            'required' => 'required',
            'rows' => 4,
            'aria-describedby'=> 'positionSummaryHelpBlock',
            'placeholder' => trans('positions.inputs.requirements.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('requirements'))
        {!!
            $errors->first('requirements', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="positionNameHelpBlock" class="help-block">
                {{ trans('positions.inputs.requirements.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end requirements --}}

{{-- start duration --}}
<div class="form-group {{ $errors->has('responsibilities') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('duration', null, [
            'class' => 'form-control',
            'aria-describedby'=> 'positionSummaryHelpBlock',
            'placeholder' => trans('positions.inputs.duration.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('duration'))
        {!!
            $errors->first('duration', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="positionNameHelpBlock" class="help-block">
                {{ trans('positions.inputs.duration.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end duration --}}

@if(!(Request::get('project_id')))
{{-- start projects --}}
<div class="form-group {{ $errors->has('project') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('project_id', $projects,
            null,
            [   'id' => 'project_id',
                'class' => 'form-control',
                'aria-describedby'=> 'userorganizationHelpBlock',
                'placeholder' => trans('positions.inputs.project.placeholder')
            ])
        !!}
        @if($errors->any() && $errors->has('project_id'))
        {!!
            $errors->first('project', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userorganizationHelpBlock" class="help-block">
                {{ trans('positions.inputs.project.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end projects --}}
@else
<input name="project_id" type="hidden" value="{{Request::get('project_id')}}">
@endif



{{-- start sector --}}
<div class="form-group {{ $errors->has('sector') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('sector', trans('sectors.sectors'),
            null,
            [
                'id' => 'sector',
                'class' => 'form-control',
                //'required' => 'required',
                'aria-describedby'=> 'education_level_help_block',
            ])
        !!}
        @if($errors->any() && $errors->has('sector'))
        {!!
            $errors->first('sector', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="usersectorHelpBlock" class="help-block">
                {{ trans('positions.inputs.sector.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end sector --}}

{{-- start dueAt --}}
<div class="form-group {{ $errors->has('dueAt') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('dueAt', null, [
            'class' => 'form-control date',
            'required' => 'required',
            'aria-describedby'=> 'userdueAtHelpBlock',
            'placeholder' => trans('positions.inputs.dueAt.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('dueAt'))
        {!!
            $errors->first('dueAt', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userdueAtHelpBlock" class="help-block">
                {{ trans('positions.inputs.dueAt.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end dueAt --}}

{{-- end position form --}}



@push('scripts')
<script>
  $('.date').datepicker({

     format: 'dd-mm-yyyy'

   });
</script>
@endpush
