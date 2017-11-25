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
                                            <dt>{{trans('stages.inputs.startedAt.label')}}:</dt><dd>{{$stage->startedAt->format('d-m-y')}}</dd>
                                            <dt>{{trans('stages.inputs.endedAt.label')}}:</dt> <dd>{{$stage->endedAt->format('d-m-y')}}</dd>
                                        </dl>
                                    </div>
                                </div>
                              @if($stage->hasTest)
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
                                      @include('pages.stages.tests')

                                    </div>
                                  </div>

                                    </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
              </div>
              @if(count($stage->applicationStages) > 0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>{{ trans('cvs.inputs.name.header') }}</th>
                        <th>{{ trans('cvs.inputs.mobile.header') }}</th>
                        <th>{{ trans('cvs.inputs.email.header') }}</th>
                        <th>{{ trans('users.inputs.age.header') }}</th>
                        <th>{{ trans('users.inputs.gender.header') }}</th>
                        <th>{{ trans('applicationstages.inputs.score.header') }}</th>
                        <th>{{ trans('applicationstages.inputs.status.header') }}</th>
                        <th>{{ trans('applicationstages.headers.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($stage->applicationstages->sortBy('score') as $item)
                        <tr>
                            <td>{{ $item->applicant->fullName()}}</td>
                            <td>
                                {{ display_or_na($item->applicant->mobile)}}
                            </td>
                            <td>
                                {{ display_or_na($item->applicant->email)}}
                            </td>
                            <td>
                                {{ display_or_na($item->applicant->age())}}
                            </td>
                            <td>
                                {{ display_or_na($item->applicant->gender)}}
                            </td>
                            <td>
                                {{ display_decimal($item->score)}}%
                            </td>
                            <td>
                                <span class="label {{display_boolean($item->hasPass(), 'label-primary', 'label-danger')}}">
                                    {{display_boolean($item->hasPass(), trans('applicationstages.scores.pass'), trans('applicationstages.scores.failed'))}}
                                </span>
                            </td>
                            <td>
                            {{-- TODO score, advance, view application, view cv --}}
                                @permission('view:applicationstage')
                                <a href="{{ route('applicationstages.show', ['id' => $item->id]) }}" class="btn btn-success btn-xs" title="{{trans('applicationstages.actions.view.title')}}">
                                    {{trans('applicationstages.actions.view.name')}}
                                </a>
                                @endpermission

                                @if($item->application->canAdvance($item->stage))
                                @permission('edit:applicationstage')
                                <button class="btn btn-info btn-xs" title="{{trans('applicationstages.actions.score.title')}}" data-toggle="modal" data-target="#application-score-modal">
                                    {{trans('applicationstages.actions.score.name')}}
                                </button>
                                @include('applicationstages.blocks.score_modal', ['applicationstage' => $item])
                                @endpermission
                                @if($item->hasPass())
                                @permission('edit:applicationstage')
                                <a href="{{route('applications.advance', ['id' => $item->application_id, 'applicant_id' => $item->applicant_id, 'position_id'=>$item->position_id])}}" class="btn btn-primary btn-xs" title="{{trans('applicationstages.actions.advance.title')}}">
                                    {{trans('applicationstages.actions.advance.name')}}
                                </a>
                                @endpermission
                                @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                @else
                <h3 class="text-center">No applicants found in {{$stage->name}} stage.</h3>
                @endif


            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
