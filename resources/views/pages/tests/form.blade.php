{{-- start test form --}}
<input type="hidden" name="type" value="secret">



{{-- start duration --}}
<div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('duration', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'testNameHelpBlock',
            'placeholder' => trans('tests.inputs.duration.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('duration'))
        {!!
            $errors->first('duration', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="testNameHelpBlock" class="help-block">
                {{ trans('tests.inputs.duration.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end name --}}

{{-- end test form --}}

@push('scripts')
<script type="text/javascript">

    $('.date').datepicker({

       format: 'dd-mm-yyyy'

     });

</script>
@endpush
