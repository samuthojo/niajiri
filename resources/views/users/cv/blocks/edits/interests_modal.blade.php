{{--start user interests modal --}}
<div class="modal fade" id="user-interests-modal" tabindex="-1" role="dialog" aria-labelledby="userinterestsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userinterestsModalLabel">
          <strong>
            {{trans('cvs.inputs.interests.label')}}
          </strong>
        </h3>
      </div>

      {{--start user interests edit form--}}
      {!! Form::model($user, [
            'method' => 'PATCH',
            'route' => ['users.edits', $user->id],
            'files' => true
        ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-lg m-b-lg">

            {{--start interests textarea--}}
            {!! Form::textarea('interests', null, [
                'id' => 'interests',
                'class' => 'form-control',
                'rows' => 2,
                //'required' => 'required',
                'aria-describedby'=> 'cv_interests_help_block',
                'placeholder' => trans('cvs.inputs.interests.placeholder')
            ]) !!}
            {{-- end interests textarea --}}


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

      {{--end user interests edit form--}}

    </div>
  </div>
</div>
{{-- end user interests modal --}}