{{--start user extracurricular_activities modal --}}
<div class="modal fade" id="user-extracurricular_activities-modal" tabindex="-1" role="dialog" aria-labelledby="userHobbiesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userHobbiesModalLabel">
          <strong>
            {{trans('cvs.inputs.extracurricular_activities.label')}}
          </strong>
        </h3>
      </div>

      {{--start user extracurricular_activities edit form--}}
      {!! Form::model($user, [
            'method' => 'PATCH',
            'route' => ['users.edits', $user->id],
            'files' => true
        ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-lg m-b-lg">

            {{--start extracurricular_activities textarea--}}
            {!! Form::textarea('extracurricular_activities', null, [
                'id' => 'extracurricular_activities',
                'class' => 'form-control',
                'rows' => 2,
                //'required' => 'required',
                'aria-describedby'=> 'cv_extracurricular_activities_help_block',
                'placeholder' => trans('cvs.inputs.extracurricular_activities.placeholder')
            ]) !!}
            {{-- end extracurricular_activities textarea --}}


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

      {{--end user extracurricular_activities edit form--}}

    </div>
  </div>
</div>
{{-- end user extracurricular_activities modal --}}