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
                                        @permission('view:question')
                                        <div class="m-b-md">
                                            <a href="{{ route('questions.edit', ['id' => $question->id]) }}" class="btn btn-primary btn-xs pull-right">{{trans('questions.actions.edit.label')}}</a>
                                            <h2>{{$question->name}}</h2>
                                        </div>
                                        @endpermission
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <dl class="dl-horizontal">
                                            <dt>{{trans('questions.inputs.weight.label')}}:</dt> <dd>{{$question->weight}}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-7" id="cluster_info">
                                        <dl class="dl-horizontal" >
                                            <dt>Last Updated:</dt><dd>{{$question->updated_at->diffForHumans()}}</dd>
                                            <dt>Created:</dt> <dd>{{$question->created_at->diffForHumans()}}</dd>
                                        </dl>
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
