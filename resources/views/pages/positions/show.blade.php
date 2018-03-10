@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start table title --}}
                {{-- TODO place any advance filter here --}}
            {{-- end table title --}}

            {{-- start page box content --}}
            <div class="ibox-content">
              <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInUp">
                        <div class="ibox">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @permission('edit:position')
                                        <div class="m-b-md">
                                            <a href="{{ route('positions.edit', ['id' => $position->id]) }}" class="btn btn-primary btn-xs pull-right">Edit position</a>
                                            {{-- start view applicant action --}}
                                            @if(!empty($position->firstStage()->id))
                                            <a href="{{ route('applicationstages.index', ['position_id' => $position->id, 'stage_id' => $position->firstStage()->id]) }}" class="btn btn-primary btn-xs m-r-sm pull-right" title="{{trans('positions.actions.applicants.title')}}">
                                                {{trans('positions.actions.applicants.name')}}
                                            </a>
                                            @endif
                                            {{-- end view applicants action --}}
                                        </div>
                                        @endpermission
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <h1 class="font-bold">{{$position->title}}</h1>
                                    </div>
                                    <div class="col-lg-9" id="cluster_info">
                                      {{-- start position summary --}}
                                      <div class="m-t-sm">
                                          <h3>Description</h3>
                                          <div class="small text-muted">
                                              {!! $position->summary !!}
                                          </div>
                                      </div>
                                      {{-- end position summary --}}

                                      {{-- start position responsibilities --}}
                                      <div class="m-t-sm">
                                          <h3>Responsibilities</h3>
                                          <div class="small text-muted">
                                              {!! $position->responsibilities !!}
                                          </div>
                                      </div>
                                      {{-- end position responsibilities --}}

                                      {{-- start position requirements --}}
                                      <div class="m-t-sm">
                                          <h3>Requirements</h3>
                                          <div class="small text-muted">
                                              {!! $position->requirements !!}
                                          </div>
                                      </div>
                                      {{-- end position requirements --}}
                                    </div>
                                </div>
                                {{-- start positions create --}}
                                @permission('create:stage')
                                  <div class="col-lg-12 m-b-xs m-t-xs">
                                      <div class="btn-group">
                                          <a href="{{route('positions.stages.create',['id' => $position->id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('stages.actions.create.title') }}">
                                          <i class="fa fa-plus"></i> {{ trans('stages.actions.create.name') }}</a>
                                      </div>
                                  </div>
                                @endpermission
                                {{-- end positions create --}}
                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="tabpanel panel-options">
                                            <ul class="nav nav-tabs cd-breadcrumb triangle " role="tablist" >
                                                @foreach($position->stages as $index => $stage)

                                                     <li role="presentation" @if($index == 0) class="active" @endif>
                                                         <a href="#tab-{{ $stage->number }}" aria-controls="#tab-{{ $stage->number }}" role="tab" data-toggle="tab">{{ $stage->name }}</a
                                                     </li>

                                                 @endforeach
                                            </ul>
                                            <ol class="breadcrumb dis-flex">
                                              @foreach($position->stages as $index => $stage)

                                                  <li class="flex-1">
                                                    @if(count($stage->applicationStages) > 0)
                                                    {{count($stage->applicationStages)}} candidates
                                                    @else
                                                    Starts at {{$stage->startedAt->format('d-m-y')}}
                                                    @endif
                                                  </li>

                                               @endforeach
                                            </ol>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    <div class="tab-content">
                                    @include('pages.positions.stages')

                                    </div>
                                  </div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
