
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
    <div class="col-12 gray-bg">
      @foreach ($project->positions->chunk(3) as $chunkedPosition)
      <div class="row wrapper">
        @foreach ($chunkedPosition as $item)

      <a href="{{ route('positions.show', ['id' => $item->id]) }}">
        <div class="col-md-4">
          <div class="widget white-bg text-center">
            <div class="m-b-md">
              <h1 class="font-bold text-black">
                  {{$item->title}}
              </h1>
              <h3>Position Status: <span class="text-navy">{{$item->firstStage()->name}}</span></h3>
              <hr>
              <div class="col-12">
                <a href="{{ route('positions.show', ['id' => $item->id]) }}"  class="btn btn-block btn-primary m-t-n-xs"><strong>View</strong></a>
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
