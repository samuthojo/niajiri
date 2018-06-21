{{--start user educations modal --}}
<div class="modal fade" id="user-edit-educations-modal-{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="userEducationsModalLabel-{{$education->id}}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userEducationsModalLabel-{{$education->id}}">
          <strong>
            {{trans('cvs.headers.educations.title')}}
          </strong>
        </h3>
      </div>

      {{--start user educations edit form--}}
      {!! Form::model($education, [
        'method' => 'PATCH',
        'route' => ['educations.update', $education->id],
        'files' => true
    ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-sm m-b-lg">

            <p class="text-muted m-b-lg">
             Include any majors, minors, or specializations that are relevant to your next desired role and is part of your degree(s) or field of study.
            </p>

             @include ('educations.form')
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('educations.actions.cancel.title')}}">
          {{trans('educations.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('educations.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('educations.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end user educations edit form--}}

    </div>
  </div>
</div>
{{-- end user educations modal --}}