@extends('layouts.position_page')

@section('page')
{{-- start position preview --}}
<div class="row">
    <div class="col-md-12">

        {{-- start box --}}
        <div class="ibox product-detail">
            {{-- start box content --}}
            <div class="ibox-content">

                <div class="row">

                    {{-- end position details --}}
                    <div class="col-md-12">

                        {{-- start position title --}}
                        <h2 class="font-bold m-b-xs">
                            {{$application->position->title}}
                        </h2>
                        {{-- end position title --}}

                        {{-- start position deadline --}}
                        <small class="text-muted">
                            <i class="fa fa-clock-o"></i> Deadline: {{$application->position->dueAt->toFormattedDateString()}}
                        </small>
                        {{-- end position deadline --}}
                        |
                        {{-- start application date --}}
                        <small class="text-muted">
                            <i class="fa fa-calendar-o"></i> Date Applied: {{$application->created_at->toFormattedDateString()}}
                        </small>
                        {{-- end application date --}}
                        |
                        {{--start current application stage--}}
                        <small class="text-muted">
                            <i class="fa fa-clone"></i> Current Stage: {{$application->stage->name}}
                        </small>
                        {{--end current application stage--}}

                        <div class="m-t-md">
                            @if($applicationstage->hasPass($stage))
                            @if(!$applicationstage->position->isLastStage($stage))
                            @permission('edit:applicationstage')
                            <a href="{{route('applications.advance', ['id' => $applicationstage->application_id, 'applicant_id' => $applicationstage->applicant_id, 'position_id'=>$applicationstage->position_id])}}" class="btn btn-primary pull-right" title="{{trans('applicationstages.actions.advance.title')}}">
                                {{trans('applicationstages.actions.advance.name')}}
                            </a>
                            @endpermission
                            @endif
                            @endif
                            <h2 class="product-main-price">
                                {{$application->organization->name}} 
                                <small class="text-muted">
                                {{$application->position->sector->name}}
                                </small>
                            </h2>
                        </div>
                        <hr>

                        {{-- start position summary --}}
                        <div class="m-t-xl">
                            <h3>Description</h3>
                            <div class="small text-muted">
                                {!! $application->position->summary !!}
                            </div>
                        </div>
                        {{-- end position summary --}}

                        {{-- start position responsibilities --}}
                        <div class="m-t-xl">
                            <h3>Responsibilities</h3>
                            <div class="small text-muted">
                                {!! $application->position->responsibilities !!}
                            </div>
                        </div>
                        {{-- end position responsibilities --}}

                        {{-- start position requirements --}}
                        <div class="m-t-xl">
                            <h3>Requirements</h3>
                            <div class="small text-muted">
                                {!! $application->position->requirements !!}
                            </div>
                        </div>
                        {{-- end position requirements --}}
                        
                    </div>
                    {{-- start position details --}}

                     {{-- start application stages --}}
                    @include('applicationstages.blocks.stages')
                    {{-- end application stages --}}

                    {{-- start application cover letter --}}
                    @include('applicationstages.blocks.cover_letter')
                    {{-- end application cover letter --}}


                    {{--TODO add cv viewer--}}

                </div>

            </div>
            {{-- end box content --}}
        </div>
        {{-- end box --}}

    </div>
</div>
{{-- end position preview --}}
@endsection
