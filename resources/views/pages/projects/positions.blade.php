
<div>
  {{-- start positions create --}}
 @permission('create:position')
  <div class="row m-t-md">
      <div class="col-sm-8 m-b-xs">
          <div class="btn-group">
              <a href="{{route('positions.create',['project_id' => $project->id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('positions.actions.create.title') }}">
              <i class="fa fa-plus"></i> {{ trans('positions.actions.create.name') }}</a>
          </div>
      </div>
  </div>
  @endpermission
  {{-- end positions create --}}
    <div class="col-12">
      @foreach ($project->positions->chunk(3) as $chunkedPosition)
      <div class="row wrapper">
        @foreach ($chunkedPosition as $item)

      <a href="{{ route('positions.show', ['id' => $item->id]) }}">
        <div class="col-md-4">
          <div class="widget niajiri-green-card text-center m-l-n-md">
            <div class="m-b-md">
              <h1 class="font-bold text-white">
                  {{$item->title}}
              </h1>
              @if(!empty($item->firstStage()))
              <small class="text-white">Current Stage: <span class="text-white">{{$item->firstStage()->name}}</span></small>
              @else
              <h3>Current Stage: <span class="text-white">No Stages</span></h3>
              @endif
              <hr>
              <div class="col-12">
                <a href="{{ route('positions.show', ['id' => $item->id]) }}"  class="btn btn-block niajiri-label m-t-n-xs" style="max-width:200px;margin:0 auto">View</a>
              </div>
            </div>
          </div>
        </div>
        </a>
        @endforeach
      </div>
      @endforeach
    </div>

</div>
