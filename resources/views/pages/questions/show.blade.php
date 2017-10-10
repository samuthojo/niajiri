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
                                <div class="row">
                                  {{-- start Question label --}}
                                  <div class="m-t-xl">
                                      <h3>{{trans('questions.inputs.label.label')}}</h3>
                                      <div class="">
                                          {!! $question->label !!}
                                      </div>
                                  </div>
                                  {{-- end Question label --}}

                                  <div class="col-md-offset-2">
                                      <dl class="dl-horizontal" >
                                          <dt>{{trans('questions.inputs.firstChoice.label')}}:</dt><dd>{{$question->firstChoice}}</dd>
                                          <dt>{{trans('questions.inputs.secondChoice.label')}}:</dt><dd>{{$question->secondChoice}}</dd>
                                          <dt>{{trans('questions.inputs.thirdChoice.label')}}:</dt><dd>{{$question->thirdChoice}}</dd>
                                          <dt>{{trans('questions.inputs.fourthChoice.label')}}:</dt><dd>{{$question->fourthChoice}}</dd>
                                          <dt>{{trans('questions.inputs.fifthChoice.label')}}:</dt><dd>{{$question->fifthChoice}}</dd>
                                      </dl>
                                  </div>

                                  <div class="m-t-xl">
                                      <h3>{{trans('questions.inputs.correct.label')}}</h3>
                                      <div class="">
                                          {!! $question->correct !!}
                                      </div>
                                  </div>
                                  <div class="m-t-xl">
                                      <h3>{{trans('questions.inputs.weight.label')}}</h3>
                                      <div class="">
                                          {!! $question->weight !!}
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
