{{-- start stage test timeount modal --}}
<div class="modal fade" id="stage-test-timeout-modal" tabindex="-1" role="dialog" aria-labelledby="testTimeoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="testTimeoutModalLabel">
          <strong>
            {{trans('stagetests.actions.timeout.header')}}
          </strong>
        </h3>
      </div>

      {{--start stage test timeout info--}}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            {{--start timeout message--}}
             <p>
              <strong>{{trans('stagetests.actions.timeout.description')}}</strong>
              {{trans('stagetests.actions.timeout.brief')}}
             </p>
            {{--end timeout message--}}
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" 
          id="stage-test-timeout-modal-submit">
          {{trans('stagetests.actions.timeout.name')}}
        </button>
      </div>
      {{--end stage test timeout info--}}

    </div>
  </div>
</div>
{{-- end stage test timeout modal --}}