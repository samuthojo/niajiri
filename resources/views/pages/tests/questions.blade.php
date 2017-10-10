
<div class="tab-pane active" id="tab-1">
  {{-- start tests create --}}
  <div class="row m-t-md">
      <div class="col-sm-8 m-b-xs">
          <div class="btn-group">
              <a href="{{route('tests.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('tests.actions.create.title') }}">
              <i class="fa fa-plus"></i> {{ trans('tests.actions.create.name') }}</a>
          </div>
      </div>
  </div>
  {{-- end tests create --}}
  @if (count($stage->tests) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{trans('tests.inputs.duration.label')}}</th>
            <th>{{trans('tests.headers.actions')}}</th>
        </tr>
        </thead>
        <tbody>
          @foreach($stage->tests as $item)
          <tr>
              <td>
                 {{$item->duration}}
              </td>
              <td class="project-actions">
                  <a href="{{ route('tests.show', ['id' => $item->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                  <a href="{{ route('tests.edit', ['id' => $item->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
              </td>

          </tr>
        @endforeach

        </tbody>
    </table>
  @endif

</div>
