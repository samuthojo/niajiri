{{--start user experiences modal --}}
<div class="modal fade" id="user-edit-experiences-modal-{{$experience->id}}" tabindex="-1" role="dialog" aria-labelledby="userExperiencesModalLabel-{{$experience->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userExperiencesModalLabel-{{$experience->id}}">
          <strong>
            {{trans('cvs.headers.experiences.title')}}
          </strong>
        </h3>
      </div>

      {{--start user experiences edit form--}}
      {!! Form::model($experience, [
        'method' => 'PATCH',
        'route' => ['experiences.update', $experience->id],
        'files' => true
    ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-lg m-b-lg">
             @include ('experiences.form')
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('experiences.actions.cancel.title')}}">
          {{trans('experiences.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('experiences.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('experiences.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end user experiences edit form--}}

    </div>
  </div>
</div>
{{-- end user experiences modal --}}