{{--start user certificates modal --}}
<div class="modal fade" id="user-certificates-modal" tabindex="-1" role="dialog" aria-labelledby="userCertificatesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userCertificatesModalLabel">
          <strong>
            {{trans('cvs.headers.certificates.title')}}
          </strong>
        </h3>
      </div>

      {{--start user certificates edit form--}}
      {!!
            Form::open([
                'route' => 'certificates.store',
                'files' => true
            ])
        !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-lg m-b-lg">
             @include ('certificates.form')
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" title="{{trans('certificates.actions.cancel.title')}}">
          {{trans('certificates.actions.cancel.name')}}
        </button>
        {!!
           Form::button(
               trans('certificates.actions.save.name'),
               [
               'type' => 'submit',
               'class' => 'btn btn-primary',
               'title' => trans('certificates.actions.save.title'),
           ])
       !!}
      </div>
      {!! Form::close() !!}

      {{--end user certificates edit form--}}

    </div>
  </div>
</div>
{{-- end user certificates modal --}}