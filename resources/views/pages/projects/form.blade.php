{{-- start project form --}}
<input type="hidden" name="type" value="secret">



{{-- start name --}}
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('name', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'projectNameHelpBlock',
            'placeholder' => trans('projects.inputs.name.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('name'))
        {!!
            $errors->first('name', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="projectNameHelpBlock" class="help-block">
                {{ trans('projects.inputs.name.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end name --}}

{{-- start name --}}
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('slug', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'projectNameHelpBlock',
            'placeholder' => trans('projects.inputs.slug.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('slug'))
        {!!
            $errors->first('name', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="projectNameHelpBlock" class="help-block">
                {{ trans('projects.inputs.slug.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end name --}}
{{-- start summary --}}
<div class="form-group {{ $errors->has('summary') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::textarea('summary', null, [
            'class' => 'form-control',
            'rows' => 2,
            'aria-describedby'=> 'positionSummaryHelpBlock',
            'placeholder' => trans('projects.inputs.summary.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('summary'))
        {!!
            $errors->first('summary', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="positionNameHelpBlock" class="help-block">
                {{ trans('projects.inputs.summary.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end summary --}}

{{-- start organization --}}
<div class="form-group {{ $errors->has('organization') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('organization_id', $organizations,
            null,
            [   'id' => 'organization_id',
                'class' => 'form-control',
                'required' => 'required',
                'aria-describedby'=> 'userorganizationHelpBlock',
                'placeholder' => trans('projects.inputs.organization.placeholder')
            ])
        !!}
        @if($errors->any() && $errors->has('organization'))
        {!!
            $errors->first('organization', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userorganizationHelpBlock" class="help-block">
                {{ trans('projects.inputs.organization.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end organization --}}

{{-- start startedAt --}}
<div class="form-group {{ $errors->has('startedAt') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('startedAt', null, [
            'class' => 'form-control date',
            'required' => 'required',
            'aria-describedby'=> 'userstartedAtHelpBlock',
            'placeholder' => trans('projects.inputs.startedAt.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('startedAt'))
        {!!
            $errors->first('startedAt', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userstartedAtHelpBlock" class="help-block">
                {{ trans('projects.inputs.startedAt.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end startedAt --}}

{{-- start endedAt --}}
<div class="form-group {{ $errors->has('endedAt') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('endedAt', null, [
            'class' => 'form-control date',
            'required' => 'required',
            'aria-describedby'=> 'userendedAtHelpBlock',
            'placeholder' => trans('projects.inputs.endedAt.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('endedAt'))
        {!!
            $errors->first('endedAt', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="userendedAtHelpBlock" class="help-block">
                {{ trans('projects.inputs.endedAt.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end endedAt --}}

{{-- end project form --}}

@push('scripts')
<script type="text/javascript">

    $('.date').datepicker({

       format: 'dd-mm-yyyy'

     });

</script>
@endpush
