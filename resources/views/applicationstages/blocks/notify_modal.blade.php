{{-- start application stage notify modal --}}
<div class="modal fade" id="application-notify-modal-{{$applicationstage->id}}" tabindex="-1" role="dialog" aria-labelledby="applicationScoreModalLabel-{{$applicationstage->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="applicationScoreModalLabel-{{$applicationstage->id}}">
          <strong>
            {{trans('applicationstages.actions.notify.label')}}
          </strong>
        </h3>
      </div>

      {{--start notifying form--}}
      {!! Form::open([
            'method' => 'PATCH',
            'route' => ['applications.advance'],
            'files' => true,
            'id' => 'applicationstage_notifying_form'
      ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            {{--start application--}}
            <input type="hidden" name="applications[]" value="{{$applicationstage->application_id}}">
            {{--start application--}}

            {{--start message--}}
            <div class="col-md-offset-1 col-md-11 m-t-md">
              <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                  <label for="message" title="{{ trans('applicationstages.inputs.message.description') }}">
                      {{trans('applicationstages.inputs.message.label')}}
                  </label>
                  {!! Form::textarea('message', null, [
                      'id' => 'message',
                      'class' => 'form-control',
                      'required' => true,
                      'rows' => 4,
                      'placeholder' => trans('applicationstages.inputs.message.placeholder')
                  ]) !!}
              </div>
          </div>
            {{--end message--}}

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('applicationstages.actions.cancel.title')}}">
          {{trans('applicationstages.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('applicationstages.actions.notify.name'),
               [
               'type' => 'submit',
               'value' => 'notify',
               'name' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('applicationstages.actions.notify.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}
      {{--end notifying form--}}

    </div>
  </div>
</div>
{{-- end application stage notify modal --}}