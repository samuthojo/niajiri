
<div class="tab-pane active" id="tab-1">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{trans('stages.headers.status')}}</th>
            <th>{{trans('stages.inputs.name.label')}}</th>
            <th>{{trans('stages.inputs.number.label')}}</th>
            <th>{{trans('stages.inputs.startedAt.label')}}</th>
            <th>{{trans('stages.inputs.endedAt.label')}}</th>
            <th>{{trans('stages.inputs.passMark.label')}}</th>
            <th>{{trans('stages.headers.actions')}}</th>
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
              <td>
                 {{$item->number}}
              </td>
              <td>
                 {{$item->startedAt->format('d-m-y')}}
              </td>
              <td>
                  {{$item->endedAt->format('d-m-y')}}
              </td>
              <td>{{$item->passMark}}</td>
              <td class="project-actions">
                  <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                  <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
              </td>

          </tr>
        @endforeach

        </tbody>
    </table>

</div>
