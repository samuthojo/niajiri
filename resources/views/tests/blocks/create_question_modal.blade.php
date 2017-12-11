{{-- start question create modal --}}
<div class="modal fade" id="question-create-modal" tabindex="-1" role="dialog" aria-labelledby="questionCreateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="questionCreateModalLabel">
          <strong>
            {{trans('questions.actions.create.label')}}
          </strong>
        </h3>
      </div>

      {{--start question creation form--}}
      {!!
            Form::open([
                'route' => 'questions.store',
                'class' => 'form-horizontal',
                'files' => true,
                'id' => 'question_creation_form'
            ])
      !!}
      <input type="hidden" name="position_id" value="{{$position->id}}">
      <input type="hidden" name="stage_id" value="{{$stage->id}}">
      <input type="hidden" name="test_id" value="{{$test->id}}">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">

            {{--start label--}}
            <div class="col-md-12 m-t-md">
                <div class="form-group {{ $errors->has('label') ? 'has-error' : ''}}">
                    <label for="label" title="{{ trans('questions.inputs.label.description') }}">
                        {{trans('questions.inputs.label.label')}}
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::textarea('label', null, [
                            'id' => 'label',
                            'class' => 'form-control',
                            'required' => 'required',
                            'aria-describedby'=> 'question_label_help_block',
                            'rows' => 2
                        ])
                    !!}
                </div>
            </div>
            {{--end label--}}

            <div class="col-md-12 m-t-md">
              <div class="row">  
                {{-- start firstChoice --}}
                <div class="col-md-5">
                    <div class="form-group {{ $errors->has('firstChoice') ? 'has-error' : ''}}">
                        <label for="firstChoice" title="{{ trans('questions.inputs.firstChoice.description') }}">
                            {{trans('questions.inputs.firstChoice.label')}}
                            <span class="text-danger">*</span>
                        </label>
                        {!! Form::text('firstChoice', null, [
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => trans('questions.inputs.firstChoice.placeholder')
                        ]) !!}
                    </div>
                </div>
                {{-- end firstChoice --}}

                {{-- start secondChoice --}}
                <div class="col-md-5 pull-right">
                    <div class="form-group {{ $errors->has('secondChoice') ? 'has-error' : ''}}">
                        <label for="secondChoice" title="{{ trans('questions.inputs.secondChoice.description') }}">
                            {{trans('questions.inputs.secondChoice.label')}}
                            <span class="text-danger">*</span>
                        </label>
                        {!! Form::text('secondChoice', null, [
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => trans('questions.inputs.secondChoice.placeholder')
                        ]) !!}
                    </div>
                </div>
                {{-- end secondChoice --}}
              </div>
            </div>

            <div class="col-md-12 m-t-md">
              <div class="row"> 
                {{-- start thirdChoice --}}
                <div class="col-md-5">
                    <div class="form-group {{ $errors->has('thirdChoice') ? 'has-error' : ''}}">
                        <label for="thirdChoice" title="{{ trans('questions.inputs.thirdChoice.description') }}">
                            {{trans('questions.inputs.thirdChoice.label')}}
                            <span class="text-danger">*</span>
                        </label>
                        {!! Form::text('thirdChoice', null, [
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => trans('questions.inputs.thirdChoice.placeholder')
                        ]) !!}
                    </div>
                </div>
                {{-- end thirdChoice --}}

                {{-- start fourthChoice --}}
                <div class="col-md-5 pull-right">
                    <div class="form-group {{ $errors->has('fourthChoice') ? 'has-error' : ''}}">
                        <label for="fourthChoice" title="{{ trans('questions.inputs.fourthChoice.description') }}">
                            {{trans('questions.inputs.fourthChoice.label')}}
                        </label>
                        {!! Form::text('fourthChoice', null, [
                            'class' => 'form-control',
                            //'required' => 'required',
                            'placeholder' => trans('questions.inputs.fourthChoice.placeholder')
                        ]) !!}
                    </div>
                </div>
                {{-- end fourthChoice --}}
              </div>
            </div>

            <div class="col-md-12 m-t-md">
              <div class="row">
              {{-- start fifthChoice --}}
              <div class="col-md-5">
                  <div class="form-group {{ $errors->has('fifthChoice') ? 'has-error' : ''}}">
                      <label for="fifthChoice" title="{{ trans('questions.inputs.fifthChoice.description') }}">
                          {{trans('questions.inputs.fifthChoice.label')}}
                      </label>
                      {!! Form::text('fifthChoice', null, [
                          'class' => 'form-control',
                          //'required' => 'required',
                          'placeholder' => trans('questions.inputs.fifthChoice.placeholder')
                      ]) !!}
                  </div>
              </div>
              {{-- end fifthChoice --}}


              {{-- start correct --}}
              <div class="col-md-5 pull-right">
                  <div class="form-group {{ $errors->has('correct') ? 'has-error' : ''}}">
                      <label for="correct" title="{{ trans('questions.inputs.correct.description') }}">
                          {{trans('questions.inputs.correct.label')}}
                          <span class="text-danger">*</span>
                      </label>
                      {!! Form::text('correct', null, [
                          'class' => 'form-control',
                          'required' => 'required',
                          'placeholder' => trans('questions.inputs.correct.placeholder')
                      ]) !!}
                  </div>
              </div>
              {{-- end correct --}}
             </div>
            </div>


          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('questions.actions.cancel.title')}}">
          {{trans('questions.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('questions.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('questions.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end question creation form--}}

    </div>
  </div>
</div>
{{-- end question create modal --}}