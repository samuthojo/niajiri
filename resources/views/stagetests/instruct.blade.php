@extends('layouts.stage_test')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content product-detail">

                {{-- start instructions --}}
                <div class="row m-t-lg m-b-lg">
                    <div class="col-md-12">
                        <div class="p-w-xl">
                            <div class="p-w-xl">

                                <h2 class="product-main-price">
                                   {{trans('stagetests.headers.instructions')}}
                                </h2>
                                <hr/>
                                
                                <div class="m-t-lg">
                                    <div class="text-muted">
                                        @if($test->welcome)
                                            {!! $test->welcome !!}
                                        @else
                                            <p>
                                                This {{$test->category}} test comprises of {{$test->questions->count()}} questions and you will have {{display_int($test->duration)}} minutes in which to correctly answer as many as you can. You will not have the ability to pause the test timer.
                                            </p>
                                            <p>
                                                It is highly recommended you have a pen and paper at hand for rough calculations.
                                            </p>
                                            <p>
                                                With each question you will be given 4 potential answers to choose from, only one answer is correct.
                                            </p>
                                            <p>
                                                It is best to take this timed test in an environment where you will not be disturbed. Please use a Computer to take the test.
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                {{-- end instructions --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="col-md-12">
                        <div class="p-w-xl">
                            <div class="p-w-xl">
                                <div class="hr-line-dashed"></div>
                                <div class="pull-right">
                                    <a href="{{route('applications.application',['id' => $application_id, 'applicant_id' => $applicant_id])}}" class="btn btn-default btn-md" title="{{trans('stagetests.actions.cancel.title')}}">
                                        {{trans('stagetests.actions.cancel.name')}}
                                    </a>
                                    <a href="{{route('stagetests.create',['applicant_id' => $applicant_id, 'position_id' => $position_id, 'stage_id' => $stage_id, 'application_id' => $application_id, 'applicationstage_id'=> $applicationstage_id, 'test_id' => $test_id, 'take_test' => true])}}" class="btn btn-primary btn-md m-l-sm" title="{{trans('stagetests.actions.take.title')}}" target="_blank">
                                        {{trans('stagetests.actions.take.name')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end bottom actions --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
