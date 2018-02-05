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

{{-- start hasTest --}}
      <div class="form-group {{ $errors->has('hasTest') ? 'has-error' : ''}}">
        <div class="col-md-offset-3 col-md-6">
          <label for="hasTest" title="{{ trans('stages.inputs.hasTest.description') }}">
              {{trans('stages.inputs.hasTest.label')}}
              <span class="text-danger">*</span>
          </label>
          <div>
              @foreach(trans('stages.hasTest') as $key => $value)
              <label class="radio-inline text-black" for="{{$key}}">
                {!! Form::radio('hasTest', $key, null, [
                    'id' => $key,
                    'aria-describedby'=> 'stage_hasTest_help_block',
                ]) !!}
                {{$value}}
              </label>
              @endforeach
          </div>
          @if($errors->any() && $errors->has('hasTest'))
          {!!
              $errors->first('hasTest', '<p id="cv_hasTest_help_block" class="help-block">:message</p>')
          !!}
          @endif
      </div>
  </div>
{{-- end hasTest --}}

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

{{-- start accepted --}}
<div class="form-group {{ $errors->has('accepted') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::textarea('accepted', null, [
            'class' => 'form-control',
            'rows' => 2,
            'aria-describedby'=> 'acceptedHelpBlock',
            'placeholder' => trans('stages.inputs.accepted.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('accepted'))
        {!!
            $errors->first('accepted', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="acceptedHelpBlock" class="help-block">
                {{ trans('stages.inputs.accepted.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end accepted --}}

{{-- start rejected --}}
<div class="form-group {{ $errors->has('rejected') ? 'has-error' : ''}}">
    <div class="col-md-offset-3 col-md-6">
        {!! Form::textarea('rejected', null, [
            'class' => 'form-control',
            'rows' => 2,
            'aria-describedby'=> 'rejectedHelpBlock',
            'placeholder' => trans('stages.inputs.rejected.placeholder')
        ]) !!}
        @if($errors->any() && $errors->has('rejected'))
        {!!
            $errors->first('rejected', '<p class="help-block">:message</p>')
        !!}
        @else
            <p id="rejectedHelpBlock" class="help-block">
                {{ trans('stages.inputs.rejected.description') }}
            </p>
        @endif
    </div>
</div>
{{-- end rejected --}}

{{-- end stage form --}}

@push('scripts')
<script type="text/javascript">

    $('.date').datepicker({

       format: 'dd-mm-yyyy'

     });

</script>
@endpush
