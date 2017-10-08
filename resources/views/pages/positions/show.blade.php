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
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @permission('edit:position')
                                        <div class="m-b-md">
                                            <a href="{{ route('positions.edit', ['id' => $position->id]) }}" class="btn btn-primary btn-xs pull-right">Edit position</a>
                                            <h2>{{$position->title}}</h2>
                                        </div>
                                        @endpermission
                                        <dl class="dl-horizontal">
                                            <dt>{{trans('positions.headers.status')}}:</dt>
                                            @if(strtotime($position->dueAt) > time())
                                            <dd>
                                                <span class="label label-primary">{{ trans('positions.status.active') }}</span>
                                            </dd>
                                            @else
                                            <dd>
                                                <span class="label label-default">{{ trans('positions.status.inactive') }}</span>
                                            </dd>
                                            @endif
                                        </dl>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <dl class="dl-horizontal">
                                          @permission('view:organization')
                                            <dt>{{trans('positions.inputs.organization.label')}}:</dt> <dd><a href="{{ route('organizations.show', ['id' => $position->organization->id]) }}" class="text-navy">{{$position->organization->name}}</a> </dd>
                                          @endpermission
                                          @permission('view:project')
                                            <dt>{{trans('positions.inputs.project.label')}}:</dt> <dd><a href="{{ route('projects.show', ['id' => $position->project->id]) }}" class="text-navy">{{$position->project->name}}</a> </dd>
                                          @endpermission
                                          @permission('view:project')
                                            <dt>{{trans('positions.inputs.sector.label')}}:</dt> <dd><a href="{{ route('sectors.show', ['id' => $position->sector->id]) }}" class="text-navy">{{$position->sector->name}}</a> </dd>
                                          @endpermission
                                            <dt>{{trans('positions.inputs.duration.label')}}:</dt><dd><span class="label label-primary">{{ $position->duration }}</span></dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-7" id="cluster_info">
                                        <dl class="dl-horizontal" >
                                            <dt>{{trans('positions.inputs.dueAt.label')}}:</dt><dd>{{$position->dueAt->format('d-m-Y')}}</dd>
                                            <dt>{{trans('positions.inputs.publishedAt.label')}}:</dt> <dd>{{$position->publishedAt->format('d-m-Y')}}</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                  <dl class="dl-horizontal" >
                                      <dt class="margin-10">{{trans('positions.inputs.summary.label')}}:</dt><dd class="margin-10">{{$position->summary}}</dd>
                                      <dt class="margin-10">{{trans('positions.inputs.responsibilities.label')}}:</dt><dd class="margin-10">{{$position->responsibilities}}</dd>
                                      <dt class="margin-10">{{trans('positions.inputs.requirements.label')}}:</dt> <dd class="margin-10">{{$position->requirements}}</dd>
                                  </dl>
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
