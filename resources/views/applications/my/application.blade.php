@extends('layouts.page')

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
                            <h2 class="product-main-price">
                                {{$application->organization->name}} 
                                <small class="text-muted">
                                {{$application->position->sector}}
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
                    @include('applications.my.blocks.stages')
                    {{-- end application stages --}}

                    {{-- start application cover letter --}}
                    @include('applications.my.blocks.cover_letter')
                    {{-- end application cover letter --}}

                </div>

            </div>
            {{-- end box content --}}
        </div>
        {{-- end box --}}

    </div>
</div>
{{-- end position preview --}}
@endsection
