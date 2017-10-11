
<div class="tab-pane active" id="tab-1">
  {{-- start positions create --}}
  <div class="row m-t-md">
      <div class="col-sm-8 m-b-xs">
          <div class="btn-group">
              <a href="{{route('positions.create',['project_id' => $project->id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('positions.actions.create.title') }}">
              <i class="fa fa-plus"></i> {{ trans('positions.actions.create.name') }}</a>
          </div>
      </div>
  </div>
  {{-- end positions create --}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{trans('positions.headers.status')}}</th>
            <th>{{trans('positions.inputs.title.label')}}</th>
            <th>{{trans('positions.inputs.duration.label')}}</th>
            <th>{{trans('positions.inputs.dueAt.label')}}</th>
            <th>{{trans('positions.headers.actions')}}</th>
        </tr>
        </thead>
        <tbody>
          @foreach($project->positions as $item)
          <tr>
              @if(strtotime($item->dueAt) > time())
                <td class="text-center">
                    <span class="label label-primary">{{ trans('positions.status.active') }}</span>
                </td>
              @else
                <td class="text-center">
                    <span class="label label-default">{{ trans('positions.status.inactive') }}</span>
                </td>
              @endif
              <td>
                 {{$item->title}}
              </td>
              <td>
                 <span class="label label-primary">{{$item->duration}}</span>
              </td>
              <td>
                  {{$item->dueAt}}
              </td>
              <td class="project-actions">
                  <a href="{{ route('positions.show', ['id' => $item->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                  <a href="{{ route('positions.edit', ['id' => $item->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
              </td>

          </tr>
        @endforeach

        </tbody>
    </table>

</div>
