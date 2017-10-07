<div class="tab-pane active" id="tab-1">
  <table class="table table-striped">
      <thead>
      <tr>
          <th class="text-center">{{ trans('projects.headers.status') }}</th>
          <th class="text-center">{{ trans('projects.inputs.name.header') }}</th>
          <th class="text-center">{{ trans('projects.inputs.startedAt.header') }}</th>
          <th class="text-center">{{ trans('projects.inputs.endedAt.header') }}</th>
          <th class="text-center">{{ trans('projects.headers.actions') }}</th>
      </tr>
      </thead>
      <tbody>
        @foreach($organization->projects as $item)
          <tr>
              @if(strtotime($item->endedAt) > time())
              <td class="text-center">
                  <span class="label label-primary">{{ trans('projects.status.active') }}</span>
              </td>
              @else
              <td class="text-center">
                  <span class="label label-default">{{ trans('projects.status.inactive') }}</span>
              </td>
              @endif
              <td class="text-center">
                 {{$item->name}}
              </td>
              <td class="text-center">
                 {{$item->startedAt}}
              </td>
              <td class="text-center">
                  {{$item->endedAt}}
              </td>
              <td class="project-actions text-center">
                  <a href="{{ route('projects.show', ['id' => $item->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i>{{ trans('projects.actions.view.name') }}</a>
                  <a href="{{ route('projects.edit', ['id' => $item->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i>{{ trans('projects.actions.edit.name') }}</a>
              </td>

          </tr>
          @endforeach

      </tbody>
  </table>
</div>
