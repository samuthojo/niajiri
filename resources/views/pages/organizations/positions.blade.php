
<div class="tab-pane" id="tab-2">

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
          @foreach($organization->positions as $item)
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
                  {{$item->dueAt->format('d-m-y')}}
              </td>
              <td class="project-actions">
                  <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                  <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
              </td>

          </tr>
        @endforeach

        </tbody>
    </table>

</div>
