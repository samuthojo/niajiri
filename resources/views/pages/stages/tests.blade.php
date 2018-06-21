
<div class="tab-pane active" id="tab-1">
  {{-- start tests create --}}
  <div class="row m-t-md">
      <div class="col-sm-8 m-b-xs">
          <div class="btn-group">
              <a href="{{route('tests.index', ['position_id' => $stage->position_id, 'stage_id' => $stage->id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('tests.actions.create.title') }}">
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
            <th>{{trans('tests.inputs.applicants.label')}}</th>
            <th>{{trans('tests.inputs.testCategory.label')}}</th>
            <th>{{trans('tests.headers.actions')}}</th>
        </tr>
        </thead>
        <tbody>
          @foreach($stage->tests as $item)
          <tr>
              <td>
                 {{$item->duration}}
              </td>
              <td>
                 {{$item->duration}}
              </td>
              <td>
                 {{$item->category}}
              </td>
              <td class="project-actions">
                  <a href="{{ route('tests.show', ['id' => $item->id]) }}" class="btn btn-white btn-xs"><i class="fa fa-folder"></i> View </a>
                  <a href="{{ route('tests.edit', ['id' => $item->id]) }}" class="btn btn-white btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                  @permission('delete:test')
                  {!! Form::open([
                      'method'=>'DELETE',
                      'url' => route('tests.destroy', ['id' => $item->id]),
                      'style' => 'display:inline'
                  ]) !!}
                      {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""> Delete</span>', [
                              'type' => 'submit',
                              'class' => 'btn btn-danger btn-xs',
                              'title' => trans('tests.actions.delete.title'),
                              'onclick'=>'return confirm("Confirm Delete?")'
                      ]) !!}
                  {!! Form::close() !!}
                  @endpermission
              </td>

          </tr>
        @endforeach

        </tbody>
    </table>
  @endif

</div>
