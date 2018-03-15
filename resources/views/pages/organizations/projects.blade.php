<div class="tab-pane active" id="tab-1">
  <div class="btn-group">
      <a href="{{route('projects.create')}}" class="btn btn-sm btn-primary" role="button" title="{{ trans('projects.actions.create.title') }}">
      <i class="fa fa-plus"></i> {{ trans('projects.actions.create.name') }}</a>
  </div>
  {{-- start organizations table --}}
  <div class="wrapper wrapper-content animated fadeInRight">
  @foreach ($organization->projects->chunk(3) as $chunkedProject)
  <div class="row">
    @foreach ($chunkedProject as $item)

  <a href="{{ route('projects.show', ['id' => $item->id]) }}">
    <div class="col-md-4 ">
      <div class="payment-card gray-bg  m-l-n-md text-center">
          <h1 class="font-bold text-black">
              {{$item->name}}
          </h1>
          <div class="row">
            
                <div class="col-sm-12 text-black">
                  <small>
                      <strong>Start At:</strong> {{$item->startedAt->format('d-m-y')}}
                      <br/>
                      <strong>End At:</strong> {{$item->endedAt->format('d-m-y')}}
                  </small>
              </div>
               <hr>
              
              <div class="col-sm-12 m-t-md">
                  <a href="{{ route('projects.show', ['id' => $item->id]) }}" class="btn btn-sm niajiri-label">More Info </a>
              </div>
          </div>
      </div>
    </div>
    </a>
    @endforeach
  </div>
  @endforeach

  </div>
  {{-- end organizations table --}}
</div>
