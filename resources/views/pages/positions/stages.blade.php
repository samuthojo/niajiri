
<div class="tab-pane active" id="tab-1">
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
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="text-center">{{trans('stages.headers.status')}}</th>
            <th class="text-center">{{trans('stages.inputs.name.label')}}</th>
            <th class="text-center">{{trans('stages.inputs.number.label')}}</th>
            <th class="text-center">{{trans('stages.inputs.startedAt.label')}}</th>
            <th class="text-center">{{trans('stages.inputs.endedAt.label')}}</th>
            <th class="text-center">{{trans('stages.inputs.passMark.label')}}</th>
            <th class="text-center">{{trans('stages.headers.actions')}}</th>
        </tr>
        </thead>
        <tbody>
          @foreach($position->stages as $item)
          <tr>
              @if(strtotime($item->endedAt) > time())
                <td class="text-center">
                    <span class="label label-primary">{{ trans('stages.status.active') }}</span>
                </td>
              @else
                <td class="text-center">
                    <span class="label label-default">{{ trans('stages.status.inactive') }}</span>
                </td>
              @endif
              <td>
                 {{$item->name}}
              </td>
              <td class="text-center">
                 {{$item->number}}
              </td>
              <td class="text-center">
                 {{$item->startedAt->format('d-m-y')}}
              </td>
              <td class="text-center">
                  {{$item->endedAt->format('d-m-y')}}
              </td>
              <td class="text-center">{{$item->passMark}}</td>
              <td class="project-actions">
                  <a href="{{ route('stages.show', ['id' => $item->id]) }}" class="btn btn-white btn-xs"><i class="fa fa-folder"></i> View </a>
                  <a href="{{ route('stages.edit', ['id' => $item->id]) }}" class="btn btn-white btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                  @permission('delete:stage')
                  {!! Form::open([
                      'method'=>'DELETE',
                      'url' => route('stages.destroy', ['id' => $item->id]),
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
              </td>

          </tr>
        @endforeach

        </tbody>
    </table>

</div>
