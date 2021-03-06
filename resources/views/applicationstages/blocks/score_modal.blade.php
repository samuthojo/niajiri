{{-- start application stage score modal --}}
<div class="modal fade" id="application-score-modal-{{$applicationstage->id}}" tabindex="-1" role="dialog" aria-labelledby="applicationScoreModalLabel-{{$applicationstage->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="applicationScoreModalLabel-{{$applicationstage->id}}">
          <strong>
            {{trans('applicationstages.actions.score.label')}}
          </strong>
        </h3>
      </div>

      {{--start scoring form--}}
      {!! Form::model($applicationstage, [
            'method' => 'PATCH',
            'route' => ['applicationstages.update', $applicationstage->id],
            'files' => true,
            'id' => 'applicationstage_scoring_form'
      ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            {{-- start score --}}
            <div class="col-md-offset-1 col-md-11">
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

            {{--start comment--}}
            <div class="col-md-offset-1 col-md-11 m-t-md">
              <div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
                  <label for="comment" title="{{ trans('applicationstages.inputs.comment.description') }}">
                      {{trans('applicationstages.inputs.comment.label')}}
                  </label>
                  {!! Form::textarea('comment', null, [
                      'id' => 'comment',
                      'class' => 'form-control',
                      'rows' => 2,
                      'placeholder' => trans('applicationstages.inputs.comment.placeholder')
                  ]) !!}
              </div>
          </div>
            {{--end comment--}}

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