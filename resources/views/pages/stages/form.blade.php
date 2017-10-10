{{-- start stage form --}}
<input type="hidden" name="type" value="secret">



{{-- start name --}}
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('name', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'stageNameHelpBlock',
            'placeholder' => trans('stages.inputs.name.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('name'))
        {!!
            $errors->first('name', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="stageNameHelpBlock" class="help-block">
                {{ trans('stages.inputs.name.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end name --}}

{{-- start activities --}}
<div class="form-group {{ $errors->has('activities') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('activities', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'stageNameHelpBlock',
            'placeholder' => trans('stages.inputs.activities.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('activities'))
        {!!
            $errors->first('activities', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="stageNameHelpBlock" class="help-block">
                {{ trans('stages.inputs.activities.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end activities --}}



{{-- start number --}}
<div class="form-group {{ $errors->has('number') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('number', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'stageNameHelpBlock',
            'placeholder' => trans('stages.inputs.number.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('number'))
        {!!
            $errors->first('number', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="stageNameHelpBlock" class="help-block">
                {{ trans('stages.inputs.number.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end number --}}

{{-- start passMark --}}
<div class="form-group {{ $errors->has('passMark') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('passMark', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'stageNameHelpBlock',
            'placeholder' => trans('stages.inputs.passMark.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('passMark'))
        {!!
            $errors->first('passMark', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="stageNameHelpBlock" class="help-block">
                {{ trans('stages.inputs.passMark.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end passMark --}}

{{-- start startedAt --}}
<div class="form-group {{ $errors->has('startedAt') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('startedAt', null, [
            'class' => 'form-control date',
            'required' => 'required',
            'aria-describedby'=> 'stageNameHelpBlock',
            'placeholder' => trans('stages.inputs.startedAt.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('startedAt'))
        {!!
            $errors->first('startedAt', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="stageNameHelpBlock" class="help-block">
                {{ trans('stages.inputs.startedAt.description') }}
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
            'aria-describedby'=> 'stageNameHelpBlock',
            'placeholder' => trans('stages.inputs.endedAt.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('endedAt'))
        {!!
            $errors->first('endedAt', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="stageNameHelpBlock" class="help-block">
                {{ trans('stages.inputs.endedAt.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end endedAt --}}

{{-- end stage form --}}

@push('scripts')
<script type="text/javascript">

    $('.date').datepicker({

       format: 'dd-mm-yyyy'

     });

</script>
@endpush
