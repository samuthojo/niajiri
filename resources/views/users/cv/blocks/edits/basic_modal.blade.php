{{--start user basic details modal --}}
<div class="modal fade" id="user-edit-basic-modal" tabindex="-1" role="dialog" aria-labelledby="userBasicsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userBasicsModalLabel">
          <strong>
            {{trans('cvs.headers.basic_details.title')}}
          </strong>
        </h3>
      </div>

      {{--start user basic details edit form--}}
      {!! Form::model($user, [
            'method' => 'PATCH',
            'route' => ['users.basic', $user->id],
            'files' => true
        ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-lg m-b-lg">
              @include ('users.basic.basic_details')
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('cvs.actions.cancel.title')}}">
          {{trans('cvs.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('cvs.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('cvs.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end user basic details edit form--}}

    </div>
  </div>
</div>
{{-- end user basic details modal --}}