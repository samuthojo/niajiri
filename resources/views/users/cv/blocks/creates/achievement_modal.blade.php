{{--start user achievements modal --}}
<div class="modal fade" id="user-achievements-modal" tabindex="-1" role="dialog" aria-labelledby="userAchievementsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userAchievementsModalLabel">
          <strong>
            {{trans('cvs.headers.achievements.title')}}
          </strong>
        </h3>
      </div>

      {{--start user achievements edit form--}}
      {!!
            Form::open([
                'route' => 'achievements.store',
                'files' => true
            ])
        !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-lg m-b-lg">
             @include ('achievements.form')
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('achievements.actions.cancel.title')}}">
          {{trans('achievements.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('achievements.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('achievements.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end user achievements edit form--}}

    </div>
  </div>
</div>
{{-- end user achievements modal --}}