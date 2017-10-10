
<div class="tab-pane active" id="tab-1">
  {{-- start questions create --}}
  <div class="row m-t-md">
      <div class="col-sm-8 m-b-xs">
          <div class="btn-group">
              <a href="{{route('tests.questions.create', $test->id)}}" class="btn btn-sm btn-white" role="button" title="{{ trans('questions.actions.create.title') }}">
              <i class="fa fa-plus"></i> {{ trans('questions.actions.create.name') }}</a>
          </div>
      </div>
  </div>
  {{-- end questions create --}}
  @if (count($test->questions) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="col-md-6">{{trans('questions.inputs.label.label')}}</th>
            <th class="text-center">{{trans('questions.inputs.weight.label')}}</th>
            <th class="text-center">{{trans('questions.headers.actions')}}</th>
        </tr>
        </thead>
        <tbody>
          @foreach($test->questions as $item)
          <tr>
              <td>
                 {{$item->label}}
              </td>
              <td class="text-center">
                 {{$item->weight}}
              </td>
              <td class="project-actions text-center">
                  <a href="{{ route('questions.show', ['id' => $item->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i></a>
                  <a href="{{ route('questions.edit', ['id' => $item->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i></a>
                  @permission('delete:question')
                  {!! Form::open([
                      'method'=>'DELETE',
                      'url' => route('questions.destroy', ['id' => $item->id]),
                      'style' => 'display:inline'
                  ]) !!}
                      {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                              'type' => 'submit',
                              'class' => 'btn btn-danger btn-sm',
                              'title' => trans('questions.actions.delete.title'),
                              'onclick'=>'return confirm("Confirm Delete?")'
                      ]) !!}
                  {!! Form::close() !!}
                  @endpermission
              </td>

          </tr>
        @endforeach

        </tbody>
    </table>
  @else
    <h3 class="text-center">No Questions found</h3>
  @endif

</div>
