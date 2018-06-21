{{--start user skills modal --}}
<div class="modal fade" id="user-skills-modal" tabindex="-1" role="dialog" aria-labelledby="userSkillsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userSkillsModalLabel">
          <strong>
            {{trans('cvs.inputs.skills.label')}}
          </strong>
        </h3>
      </div>

      {{--start user skills edit form--}}
      {!! Form::model($user, [
            'method' => 'PATCH',
            'route' => ['users.edits', $user->id],
            'files' => true
        ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-sm m-b-lg">

            <p class="text-muted m-b-lg">
             Tell us about areas that you are competent in such as, problem solving, and creative thinking by showing us brief examples etc.
            </p>

            {{--start skills textarea--}}
            {!! Form::textarea('skills', null, [
                'id' => 'skills',
                'class' => 'form-control',
                'rows' => 2,
                //'required' => 'required',
                'aria-describedby'=> 'cv_skills_help_block',
                'placeholder' => trans('cvs.inputs.skills.placeholder')
            ]) !!}
            {{-- end skills textarea --}}


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

      {{--end user skills edit form--}}

    </div>
  </div>
</div>
{{-- end user skills modal --}}