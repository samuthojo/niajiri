{{--start user hobbies modal --}}
<div class="modal fade" id="user-hobbies-modal" tabindex="-1" role="dialog" aria-labelledby="userHobbiesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userHobbiesModalLabel">
          <strong>
            {{trans('cvs.inputs.hobbies.label')}}
          </strong>
        </h3>
      </div>

      {{--start user hobbies edit form--}}
      {!! Form::model($user, [
            'method' => 'PATCH',
            'route' => ['users.edits', $user->id],
            'files' => true
        ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-lg m-b-lg">

            {{--start hobbies textarea--}}
            {!! Form::textarea('hobbies', null, [
                'id' => 'hobbies',
                'class' => 'form-control',
                'rows' => 2,
                //'required' => 'required',
                'aria-describedby'=> 'cv_hobbies_help_block',
                'placeholder' => trans('cvs.inputs.hobbies.placeholder')
            ]) !!}
            {{-- end hobbies textarea --}}


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

      {{--end user hobbies edit form--}}

    </div>
  </div>
</div>
{{-- end user hobbies modal --}}