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

{{-- start test_category--}}
<div class="form-group {{ $errors->has('test_category') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::select('test_category', trans('tests.testCategories'),
            null,
            [   'id' => 'test_category',
                'class' => 'form-control',
                'aria-describedby'=> 'testCategoryHelpBlock',
                'placeholder' => trans('tests.inputs.testCategory.placeholder')
            ])
        !!}
        @if($errors->any() && $errors->has('test_category'))
        {!!
            $errors->first('test_category', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="usersectorHelpBlock" class="help-block">
                {{ trans('tests.inputs.testCategory.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end test_category --}}

{{-- end test form --}}

@push('scripts')
<script type="text/javascript">

    $('.date').datepicker({

       format: 'dd-mm-yyyy'

     });

</script>
@endpush
