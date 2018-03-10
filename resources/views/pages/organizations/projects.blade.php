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
      <div class="payment-card niajiri-green-card m-l-n-md ">
          <h2 class="white-text">
              {{$item->name}}
          </h2>
          <div class="row">
              <div class="col-sm-12">
                  <small>
                      <strong>Start At:</strong> {{$item->startedAt->format('d-m-y')}}
                      <br/>
                      <strong>End At:</strong> {{$item->endedAt->format('d-m-y')}}
                  </small>
              </div>
              <div class="col-sm-12">
                  <a href="{{ route('projects.show', ['id' => $item->id]) }}" class="btn btn-xs pull-right niajiri-label">More Info <i class="fa fa-long-arrow-right"></i> </a>
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
