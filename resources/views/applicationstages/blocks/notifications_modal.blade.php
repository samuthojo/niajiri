{{-- start application stage notifications modal --}}
<div class="modal fade" id="application-notifications-modal" tabindex="-1" role="dialog" aria-labelledby="applicationScoreModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="applicationScoreModalLabel">
          <strong>
            {{trans('applicationstages.actions.notify.label')}}
          </strong>
        </h3>
      </div>

      {{--start notifying form--}}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">

            {{--start message--}}
            <div class="col-md-offset-1 col-md-11 m-t-md">
              <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                  <label for="application-notifications-message" title="{{ trans('applicationstages.inputs.message.description') }}">
                      {{trans('applicationstages.inputs.message.label')}}
                  </label>
                  {!! Form::textarea('message', null, [
                      'id' => 'application-notifications-message',
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
               'type' => 'button',
               'value' => 'notify',
               'name' => 'submit',
               'class' => 'btn btn-primary',
               'id' => 'application-notifications-modal-submit',
               'title' => trans('applicationstages.actions.notify.title'),
           ])
       !!}
      </div>
      {{--end notifying form--}}

    </div>
  </div>
</div>
{{-- end application stage notify modal --}}