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
                <div class="col-lg-9">
                    <div class="wrapper wrapper-content animated fadeInUp">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="m-b-md">
                                            <a href="#" class="btn btn-primary btn-xs pull-right">Edit project</a>
                                            <h2>{{$project->name}}</h2>
                                        </div>
                                        <dl class="dl-horizontal">
                                            <dt>Status:</dt> <dd><span class="label label-primary">Active</span></dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <dl class="dl-horizontal">
                                            <dt>Client:</dt> <dd><a href="{{ route('organizations.show', ['id' => $project->organization->id]) }}" class="text-navy">{{$project->organization->name}}</a> </dd>
                                            <dt>Version:</dt> <dd>v1</dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-7" id="cluster_info">
                                        <dl class="dl-horizontal" >
                                            <dt>Last Updated:</dt><dd>{{$project->updated_at->diffForHumans()}}</dd>
                                            <dt>Created:</dt> <dd>{{$project->created_at->diffForHumans()}}</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab-1" data-toggle="tab">{{trans('projects.tabs.positions.name')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    <div class="tab-content">
                                      @include('pages.projects.positions')

                                    </div>
                                  </div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                      @include('pages.projects.description')
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
