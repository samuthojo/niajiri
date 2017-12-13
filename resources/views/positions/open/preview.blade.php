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
                            {{$position->title}}
                        </h2>
                        {{-- end position title --}}

                        {{-- start position deafline --}}
                        <small class="text-muted">
                            <i class="fa fa-clock-o"></i> Deadline: {{$position->dueAt->toFormattedDateString()}}
                        </small>
                        {{-- end position deadline --}}
                        <div class="m-t-md">
                             <a class="btn btn-primary pull-right" href="{{route('applications.apply', ['position_id' => $position->id, 'organization_id' => $position->organization_id])}}" title="{{trans('positions.actions.apply.title')}}"></i>{{trans('positions.actions.apply.name')}}</a>
                            <h2 class="product-main-price">
                                {{$position->organization->name}}
                                <small class="text-muted">
                                {{$position->sector}}
                                </small>
                            </h2>
                        </div>
                        <hr>

                        {{-- start position summary --}}
                        <div class="m-t-xl">
                            <h3>Description</h3>
                            <div class="small text-muted">
                                {!! $position->summary !!}
                            </div>
                        </div>
                        {{-- end position summary --}}

                        {{-- start position responsibilities --}}
                        <div class="m-t-xl">
                            <h3>Responsibilities</h3>
                            <div class="small text-muted">
                                {!! $position->responsibilities !!}
                            </div>
                        </div>
                        {{-- end position responsibilities --}}

                        {{-- start position requirements --}}
                        <div class="m-t-xl">
                            <h3>Requirements</h3>
                            <div class="small text-muted">
                                {!! $position->requirements !!}
                            </div>
                        </div>
                        {{-- end position requirements --}}

                    </div>
                    {{-- start position details --}}
                </div>

            </div>
            {{-- end box content --}}
        </div>
        {{-- end box --}}

    </div>
</div>
{{-- end position preview --}}
@endsection
