@foreach($position->stages as $index => $stage)
<div role="tabpanel" @if($index == 0) class="tab-pane active" @else class="tab-pane" @endif id="tab-{{ $stage->number }}">
  {{-- start positions create --}}
    <div class="row m-t-md">
        <div class="col-sm-8 m-b-xs">
            <div class="btn-group">
                <a href="{{route('positions.stages.create',['id' => $position->id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('stages.actions.create.title') }}">
                <i class="fa fa-plus"></i> {{ trans('stages.actions.create.name') }}</a>
            </div>
        </div>
    </div>
  {{-- end positions create --}}
  <div class="row">
      <div class="col-md-12">
        <div class="m-b-md pull-right">
          <a href="{{ route('stages.edit', ['id' => $stage->id]) }}" class="btn btn-white btn-xs"><i class="fa fa-pencil"></i> Edit </a>
          @permission('delete:stage')
          {!! Form::open([
              'method'=>'DELETE',
              'url' => route('stages.destroy', ['id' => $stage->id]),
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""> Delete</span>', [
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-xs',
                      'title' => trans('stages.actions.delete.title'),
                      'onclick'=>'return confirm("Confirm Delete?")'
              ]) !!}
          {!! Form::close() !!}
          @endpermission
        </div>
      </div>
      <div class="col-lg-5">
          <dl class="dl-horizontal">
              <dt>{{trans('stages.headers.status')}}:</dt> <dd>@if(strtotime($stage->endedAt) > time())<span class="label label-primary">{{ trans('stages.status.active') }}</span> @else <span class="label label-default">{{ trans('stages.status.inactive') }}</span> @endif</dd>
              <dt>{{trans('stages.inputs.name.label')}}:</dt> <dd><a href="{{ route('stages.show', ['id' => $stage->id]) }}" class="text-navy">{{$stage->name}}</a> </dd>
              <dt>{{trans('stages.inputs.number.label')}}:</dt> <dd><span>{{ $stage->number }}</span></dd>
              <dt>{{trans('stages.inputs.passMark.label')}}:</dt><dd><span>{{ $stage->passMark }}</span></dd>
          </dl>
      </div>
      <div class="col-lg-7" id="cluster_info">
          <dl class="dl-horizontal" >
              <dt>{{trans('stages.inputs.startedAt.label')}}:</dt><dd>{{$stage->startedAt->format('d-m-y')}}</dd>
              <dt>{{trans('stages.inputs.endedAt.label')}}:</dt> <dd>{{$stage->endedAt->format('d-m-Y')}}</dd>
          </dl>
      </div>
  </div>
  @if(count($stage->applicationStages) > 0)
  {{-- start table --}}
  <table class="table table-borderless">

      {{-- start table header --}}
      <thead>
          <tr>
              <th>
                  {{ trans('applicationstages.inputs.created_at.header') }}
              </th>
              <th>
                  {{ trans('cvs.inputs.name.header') }}
              </th>
              <th>
                  {{ trans('cvs.inputs.gender.header') }}
              </th>
              <th>
                  {{ trans('cvs.inputs.mobile.header') }}
              </th>
              <th>
                  {{ trans('cvs.inputs.email.header') }}
              </th>
              <th>
                  {{ trans('applicationstages.inputs.score.header') }}
              </th>
              <th>
                  {{ trans('applicationstages.inputs.status.header') }}
              </th>
              <th>
                  {{trans('applicationstages.headers.actions')}}
              </th>
          </tr>
      </thead>
      {{-- end table header --}}

      {{-- start table body --}}
      <tbody>
          @foreach($stage->applicationstages->sortBy('score') as $item)
          <tr>
              <td>{{$item->created_at}}</td>
              <td>{{ $item->applicant->fullName()}}</td>
              <td>{{display_or_na($item->applicant->gender)}}</td>
              <td>
                  {{ display_or_na($item->applicant->mobile)}}
              </td>
              <td>
                  {{ display_or_na($item->applicant->email)}}
              </td>
              <td>
                  {{ display_decimal($item->score)}}%
              </td>
              <td>
                  <span class="label {{display_boolean($item->hasPass(), 'label-primary', 'label-danger')}}">
                      {{display_boolean($item->hasPass(), trans('applicationstages.scores.pass'), trans('applicationstages.scores.failed'))}}
                  </span>
              </td>
              <td>
              {{-- TODO score, advance, view application, view cv --}}
                  @permission('view:applicationstage')
                  <a href="{{ route('users.resume', ['id' => $item->applicant->id, 'application_id' => $item->application_id]) }}" class="btn btn-success btn-xs" title="{{trans('applicationstages.actions.view.title')}}">
                      {{trans('applicationstages.actions.view.name')}}
                  </a>
                  @endpermission

                  @if($item->application->canAdvance($item->stage))
                  @permission('edit:applicationstage')
                  <button type="button" class="btn btn-info btn-xs" title="{{trans('applicationstages.actions.score.title')}}" data-toggle="modal" data-target="#application-score-modal-{{$item->id}}">
                      {{trans('applicationstages.actions.score.name')}}
                  </button>
                  {{-- include score model --}}
                  @endpermission
                  @if($item->hasPass())
                  @permission('edit:applicationstage')
                  <a href="{{route('applications.advance', ['applications[]' => $item->application_id, 'stage_id' => $item->stage_id, 'position_id' => $item->position_id])}}" class="btn btn-primary btn-xs" title="{{trans('applicationstages.actions.advance.title')}}">
                      {{trans('applicationstages.actions.advance.name')}}
                  </a>
                  @endpermission
                  @endif
                  @endif
              </td>
          </tr>
      @endforeach

      </tbody>
      {{-- end table body --}}

  </table>
  {{-- end table --}}
  @else
  <h3 class="text-center">No applicants found in {{$stage->name}} stage.</h3>
  @endif

</div>

@endforeach
