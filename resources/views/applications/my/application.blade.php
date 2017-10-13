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
                            <i class="fa fa-clock-o"></i> Date Applied: {{$application->created_at->toFormattedDateString()}}
                        </small>
                        {{-- end application date --}}
                        <div class="m-t-md">
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

                    {{-- start position cover letter --}}
                    <div class="col-md-12 m-t-lg">
                        <hr/>
                        <div class="m-t-lg">
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end position cover letter --}}
                </div>

            </div>
            {{-- end box content --}}
        </div>
        {{-- end box --}}

    </div>
</div>
{{-- end position preview --}}
@endsection
