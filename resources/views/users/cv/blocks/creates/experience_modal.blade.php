{{--start user experiences modal --}}
<div class="modal fade" id="user-experiences-modal" tabindex="-1" role="dialog" aria-labelledby="userExperiencesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userExperiencesModalLabel">
          <strong>
            {{trans('cvs.headers.experiences.title')}}
          </strong>
        </h3>
      </div>

      {{--start user experiences edit form--}}
      {!!
            Form::open([
                'route' => 'experiences.store',
                'files' => true
            ])
        !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-sm m-b-lg">

            <p class="text-muted m-b-lg">
             Feature paid and unpaid experience you’ve gained through side projects and part/full-time employment in any business, educational, charitable, or governmental entities.
            </p>
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