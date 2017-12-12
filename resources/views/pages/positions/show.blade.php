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
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="tabpanel panel-options">
                                            <ul class="nav nav-tabs cd-breadcrumb triangle" role="tablist" >
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
