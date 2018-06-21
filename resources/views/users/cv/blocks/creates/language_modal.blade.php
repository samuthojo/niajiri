{{--start user languages modal --}}
<div class="modal fade" id="user-languages-modal" tabindex="-1" role="dialog" aria-labelledby="userLanguagesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userLanguagesModalLabel">
          <strong>
            {{trans('cvs.headers.languages.title')}}
          </strong>
        </h3>
      </div>

      {{--start user languages edit form--}}
      {!!
            Form::open([
                'route' => 'languages.store',
                'files' => true
            ])
        !!}
      <div class="modal-body">
        <div class="row">
         <div class="col-md-12 m-t-sm m-b-lg">

            <p class="text-muted m-b-lg">
            List the languages you know and what your proficiency in each of them.
            </p>
             @include ('languages.form')
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('languages.actions.cancel.title')}}">
          {{trans('languages.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('languages.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('languages.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end user languages edit form--}}

    </div>
  </div>
</div>
{{-- end user languages modal --}}