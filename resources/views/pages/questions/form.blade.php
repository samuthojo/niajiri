{{-- start test form --}}
<input type="hidden" name="type" value="secret">



{{-- start label --}}
<div class="form-group {{ $errors->has('label') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('label', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'testNameHelpBlock',
            'placeholder' => trans('questions.inputs.label.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('label'))
        {!!
            $errors->first('label', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="testNameHelpBlock" class="help-block">
                {{ trans('questions.inputs.label.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end label --}}

{{-- start firstChoice --}}
<div class="form-group {{ $errors->has('firstChoice') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('firstChoice', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'testNameHelpBlock',
            'placeholder' => trans('questions.inputs.firstChoice.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('firstChoice'))
        {!!
            $errors->first('firstChoice', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="testNameHelpBlock" class="help-block">
                {{ trans('questions.inputs.firstChoice.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end firstChoice --}}

{{-- start secondChoice --}}
<div class="form-group {{ $errors->has('secondChoice') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('secondChoice', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'testNameHelpBlock',
            'placeholder' => trans('questions.inputs.secondChoice.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('secondChoice'))
        {!!
            $errors->first('secondChoice', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="testNameHelpBlock" class="help-block">
                {{ trans('questions.inputs.secondChoice.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end secondChoice --}}

{{-- start thirdChoice --}}
<div class="form-group {{ $errors->has('thirdChoice') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('thirdChoice', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'testNameHelpBlock',
            'placeholder' => trans('questions.inputs.thirdChoice.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('thirdChoice'))
        {!!
            $errors->first('thirdChoice', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="testNameHelpBlock" class="help-block">
                {{ trans('questions.inputs.thirdChoice.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end thirdChoice --}}

{{-- start fourthChoice --}}
<div class="form-group {{ $errors->has('fourthChoice') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('fourthChoice', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'testNameHelpBlock',
            'placeholder' => trans('questions.inputs.fourthChoice.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('fourthChoice'))
        {!!
            $errors->first('fourthChoice', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="testNameHelpBlock" class="help-block">
                {{ trans('questions.inputs.fourthChoice.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end fourthChoice --}}

{{-- start fifthChoice --}}
<div class="form-group {{ $errors->has('fifthChoice') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('fifthChoice', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'testNameHelpBlock',
            'placeholder' => trans('questions.inputs.fifthChoice.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('fifthChoice'))
        {!!
            $errors->first('fifthChoice', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="testNameHelpBlock" class="help-block">
                {{ trans('questions.inputs.fifthChoice.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end fifthChoice --}}

{{-- start correct --}}
<div class="form-group {{ $errors->has('correct') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('correct', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'testNameHelpBlock',
            'placeholder' => trans('questions.inputs.correct.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('correct'))
        {!!
            $errors->first('correct', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="testNameHelpBlock" class="help-block">
                {{ trans('questions.inputs.correct.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end correct --}}

{{-- start weight --}}
<div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('weight', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'testNameHelpBlock',
            'placeholder' => trans('questions.inputs.weight.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('weight'))
        {!!
            $errors->first('weight', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="testNameHelpBlock" class="help-block">
                {{ trans('questions.inputs.weight.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end weight --}}

{{-- end test form --}}

@push('scripts')
<script type="text/javascript">

    $('.date').datepicker({

       format: 'dd-mm-yyyy'

     });

</script>
@endpush
