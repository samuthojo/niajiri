{{--start user certificates modal --}}
<div class="modal fade" id="user-edit-certificates-modal-{{$certificate->id}}" tabindex="-1" role="dialog" aria-labelledby="userCertificatesModalLabel-{{$certificate->id}}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="userCertificatesModalLabel-{{$certificate->id}}">
          <strong>
            {{trans('cvs.headers.certificates.title')}}
          </strong>
        </h3>
      </div>

      {{--start user certificates edit form--}}
      {!! Form::model($certificate, [
        'method' => 'PATCH',
        'route' => ['certificates.update', $certificate->id],
        'files' => true
    ]) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 m-t-sm m-b-lg">

            <p class="text-muted m-b-lg">
             List all your certificates that are relevant to your next desired position. e.g. CPA etc.
            </p>
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