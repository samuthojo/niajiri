{{--start user referees modal --}}
<div class="modal fade" id="user-edit-referees-modal-{{$referee->id}}" tabindex="-1" role="dialog" aria-labelledby="userRefereesModalLabel-{{$referee->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userRefereesModalLabel-{{$referee->id}}">
          <strong>
            {{trans('cvs.headers.referees.title')}}
          </strong>
        </h3>
      </div>

      {{--start user referees edit form--}}
      {!! Form::model($referee, [
        'method' => 'PATCH',
        'route' => ['referees.update', $referee->id],
        'files' => true
    ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-sm m-b-lg">

            <p class="text-muted m-b-lg">
            List professionals who you’ve worked with or Your University Supervisor/Lecture who would genuinely vouch for your skills and accomplishments. Make sure they are comfortable to be your reference. 
            </p>
             @include ('referees.form')
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('referees.actions.cancel.title')}}">
          {{trans('referees.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('referees.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('referees.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end user referees edit form--}}

    </div>
  </div>
</div>
{{-- end user referees modal --}}