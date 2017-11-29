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
                                        @permission('edit:project')
                                        <div class="m-b-md">
                                          @if($project->status === "open")
                                          {!! Form::open([
                                              'method'=>'PATCH',
                                              'url' => route('projects.close_project', ['id' => $project->id]),
                                              'style' => 'display:inline'
                                          ]) !!}
                                              {!! Form::button('<span aria-hidden="true" title="">Close Project</span>', [
                                                      'type' => 'submit',
                                                      'class' => 'btn btn-danger btn-xs pull-right',
                                                      'title' => trans('positions.actions.delete.title'),
                                                      'onclick'=>'return confirm("Confirm Close project?")'
                                              ]) !!}
                                          {!! Form::close() !!}
                                          @endif
                                            <a href="{{ route('projects.edit', ['id' => $project->id]) }}" class="btn btn-primary btn-xs pull-right">Edit project</a>
                                            <h2>{{$project->name}}</h2>
                                        </div>
                                        @endpermission
                                        <dl class="dl-horizontal">
                                          @if(strtotime($project->dueAt) > time())
                                            <dt>{{ trans('projects.headers.status') }}</dt> <dd><span class="label label-primary">{{ trans('projects.status.active') }}</span></dd>
                                          @else
                                            <dt>{{ trans('projects.headers.status') }}</dt> <dd><span class="label label-primary">{{ trans('projects.status.inactive') }}</span></dd>
                                          @endif
                                          <dt>{{ trans('projects.headers.status') }}</dt> <dd><span class={{ $project->status === "open" ? "label label-primary" : "label label-danger" }}>{{ $project->status }}</span></dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <dl class="dl-horizontal">
                                            <dt>Client:</dt> <dd><a href="{{ route('organizations.show', ['id' => $project->organization->id]) }}" class="text-navy">{{$project->organization->name}}</a> </dd>
                                            <dt>Application link:</dt> <dd><a href="{{ route('projects.open_position', ['id' => $project->id]) }}" class="text-navy">{{ route('projects.open_position', ['id' => $project->id]) }}</a></dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-5" id="cluster_info">
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
