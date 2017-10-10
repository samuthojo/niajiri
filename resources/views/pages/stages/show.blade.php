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
                                        @permission('view:stage')
                                        <div class="m-b-md">
                                            <a href="{{ route('stages.edit', ['id' => $stage->id]) }}" class="btn btn-primary btn-xs pull-right">{{trans('stages.actions.edit.label')}}</a>
                                            <h2>{{$stage->name}}</h2>
                                        </div>
                                        @endpermission
                                        <dl class="dl-horizontal">
                                          @if(strtotime($stage->endedAt) > time())
                                            <dt>{{ trans('stages.headers.status') }}</dt> <dd><span class="label label-primary">{{ trans('stages.status.active') }}</span></dd>
                                          @else
                                            <dt>{{ trans('stages.headers.status') }}</dt> <dd><span class="label label-primary">{{ trans('stages.status.inactive') }}</span></dd>
                                          @endif
                                        </dl>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <dl class="dl-horizontal">
                                            <dt>{{trans('stages.inputs.position.label')}}:</dt> <dd><a href="{{ route('positions.show', ['id' => $stage->position->id]) }}" class="text-navy">{{$stage->position->title}}</a> </dd>
                                            <dt>{{trans('stages.inputs.number.label')}}:</dt> <dd>{{$stage->number}}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-7" id="cluster_info">
                                        <dl class="dl-horizontal" >
                                            <dt>Last Updated:</dt><dd>{{$stage->updated_at->diffForHumans()}}</dd>
                                            <dt>Created:</dt> <dd>{{$stage->created_at->diffForHumans()}}</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab-1" data-toggle="tab">{{trans('stages.tabs.tests.name')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    <div class="tab-content">
                                      {{-- @include('pages.stages.tests') --}}

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
