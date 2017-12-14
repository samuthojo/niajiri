{{--start user publications modal --}}
<div class="modal fade" id="user-publications-modal" tabindex="-1" role="dialog" aria-labelledby="userRefereesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userRefereesModalLabel">
          <strong>
            {{trans('cvs.headers.publications.title')}}
          </strong>
        </h3>
      </div>

      {{--start user publications edit form--}}
      {!!
            Form::open([
                'route' => 'publications.store',
                'files' => true
            ])
        !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-lg m-b-lg">
             @include ('publications.form')
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('publications.actions.cancel.title')}}">
          {{trans('publications.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('publications.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('publications.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end user publications edit form--}}

    </div>
  </div>
</div>
{{-- end user publications modal --}}