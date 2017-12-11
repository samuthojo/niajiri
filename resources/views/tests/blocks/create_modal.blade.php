{{-- start test create modal --}}
<div class="modal fade" id="test-create-modal" tabindex="-1" role="dialog" aria-labelledby="testCreateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="testCreateModalLabel">
          <strong>
            {{trans('tests.actions.create.label')}}
          </strong>
        </h3>
      </div>

      {{--start test creation form--}}
      {!!
            Form::open([
                'route' => 'referees.store',
                'class' => 'form-horizontal',
                'files' => true,
                'id' => 'test_creation_form'
            ])
      !!}
      <input type="hidden" name="position_id" value="{{$position->id}}">
      <input type="hidden" name="stage_id" value="{{$stage->id}}">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">

            {{--start category--}}
            <div class="col-md-offset-1 col-md-11 m-t-md">
                <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                    <label for="category" title="{{ trans('tests.inputs.category.description') }}">
                        {{trans('tests.inputs.category.label')}}
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select('category', trans('tests.categories'),
                        null,
                        [
                            'id' => 'category',
                            'class' => 'form-control',
                            'required' => 'required',
                            'aria-describedby'=> 'test_category_help_block',
                        ])
                    !!}
                </div>
            </div>
            {{--end category--}}

            {{-- start duration --}}
            <div class="col-md-offset-1 col-md-11">
                <div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
                    <label for="duration" title="{{ trans('tests.inputs.duration.description') }}">
                        {{trans('tests.inputs.duration.label')}}
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::number('duration', null, [
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => trans('tests.inputs.duration.placeholder'),
                        'min' => 0,
                        'step' => 0.01,
                    ]) !!}
                </div>
            </div>
            {{-- end duration --}}


          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('tests.actions.cancel.title')}}">
          {{trans('tests.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('tests.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('tests.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end test creation form--}}

    </div>
  </div>
</div>
{{-- end test create modal --}}