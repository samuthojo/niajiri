<div class="tab-pane active gray-bg" id="tab-1">
  {{-- start organizations table --}}
  <div class="wrapper wrapper-content animated fadeInRight">
  @foreach ($organization->projects->chunk(3) as $chunkedProject)
  <div class="row">
    @foreach ($chunkedProject as $item)

  <a href="{{ route('projects.show', ['id' => $item->id]) }}">
    <div class="col-md-4">
      <div class="payment-card">
          <h2>
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
                  <a href="{{ route('projects.show', ['id' => $item->id]) }}" class="btn btn-xs btn-outline btn-primary">More Info <i class="fa fa-long-arrow-right"></i> </a>
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
