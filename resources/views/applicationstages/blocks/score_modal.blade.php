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
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('applicationstages.actions.cancel.title')}}">
          {{trans('applicationstages.actions.cancel.name')}}
        </button>
        <button type="button" class="btn btn-primary" title="{{trans('applicationstages.actions.save.title')}}">
          {{trans('applicationstages.actions.save.name')}}
        </button>
      </div>
    </div>
  </div>
</div>
{{-- end application stage score modal --}}