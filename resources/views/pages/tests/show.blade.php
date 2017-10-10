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
                                        @permission('view:test')
                                        <div class="m-b-md">
                                            <a href="{{ route('tests.edit', ['id' => $test->id]) }}" class="btn btn-primary btn-xs pull-right">{{trans('tests.actions.edit.label')}}</a>
                                            <h2>{{$test->name}}</h2>
                                        </div>
                                        @endpermission
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <dl class="dl-horizontal">
                                            <dt>{{trans('tests.inputs.stage.label')}}:</dt> <dd><a href="{{ route('stages.show', ['id' => $test->stage->id]) }}" class="text-navy">{{$test->stage->name}}</a> </dd>
                                            <dt>{{trans('tests.inputs.duration.label')}}:</dt> <dd>{{$test->duration}}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-7" id="cluster_info">
                                        <dl class="dl-horizontal" >
                                            <dt>Last Updated:</dt><dd>{{$test->updated_at->diffForHumans()}}</dd>
                                            <dt>Created:</dt> <dd>{{$test->created_at->diffForHumans()}}</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab-1" data-toggle="tab">{{trans('tests.tabs.questions.name')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    <div class="tab-content">
                                      {{-- @include('pages.questions.tests') --}}

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
