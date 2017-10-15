{{-- start application stage score modal --}}
<div class="modal fade" id="application-score-modal" tabindex="-1" role="dialog" aria-labelledby="applicationScoreModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="applicationScoreModalLabel">
          <strong>
            {{trans('applicationstages.actions.score.label')}}
          </strong>
        </h3>
      </div>

      {{--start scoring form--}}
      {!! Form::model($applicationstage, [
            'method' => 'PATCH',
            'route' => ['applicationstages.update', $applicationstage->id],
            'files' => true
      ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            {{-- start score --}}
            <div class="col-md-offset-1 col-md-9">
                <div class="form-group {{ $errors->has('score') ? 'has-error' : ''}}">
                    <label for="score" title="{{ trans('applicationstages.inputs.score.description') }}">
                        {{trans('applicationstages.inputs.score.label')}}
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::number('score', null, [
                        'class' => 'form-control',
                        'required' => 'required',
                        'placeholder' => trans('applicationstages.inputs.score.placeholder'),
                        'min' => 0,
                        'step' => 0.01,
                    ]) !!}
                </div>
            </div>
            {{-- end score --}}
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('applicationstages.actions.cancel.title')}}">
          {{trans('applicationstages.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('applicationstages.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('applicationstages.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}
      {{--end scoring form--}}

    </div>
  </div>
</div>
{{-- end application stage score modal --}}