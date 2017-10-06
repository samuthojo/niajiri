{{-- start sector form --}}
<input type="hidden" name="type" value="secret">



{{-- start name --}}
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::text('name', null, [
            'class' => 'form-control',
            'required' => 'required',
            'aria-describedby'=> 'sectorNameHelpBlock',
            'placeholder' => trans('sectors.inputs.name.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('name'))
        {!!
            $errors->first('name', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="sectorNameHelpBlock" class="help-block">
                {{ trans('sectors.inputs.name.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end firstname --}}

{{-- end sector form --}}

@push('scripts')

@endpush
