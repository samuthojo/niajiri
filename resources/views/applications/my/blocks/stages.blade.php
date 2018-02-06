{{--start application stages --}}

{{--start header--}}
<div class="col-md-12 m-t-lg">
    <blockquote>
      <h3 title="{{trans('cvs.headers.stages.title')}}">
        {{trans('cvs.headers.stages.name')}}
      </h3>
    </blockquote>
</div>
{{--end header--}}

{{--start stages listing--}}
@if($application->stages && $application->stages->count() > 0)
<div class="col-md-12">
    <div class="project-list">
        <table class="table">
            <tbody>
                @foreach($application->stages->sortBy('stage.number') as $applicationStage)
                @if($applicationStage->hasTest())

                {{-- start display stage with test--}}
                <tr class="testable-stage">
                    <td class="project-status">
                        @if($applicationStage->score !== null)
                        <span class="label {{display_boolean($applicationStage->hasPass(), 'label-primary', 'label-danger')}}">
                            {{display_boolean($applicationStage->hasPass(), trans('applicationstages.scores.pass'), trans('applicationstages.scores.failed'))}}
                        </span>
                        @else
                        <span class="label">
                            {{trans('applicationstages.scores.na')}}
                        </span>
                        @endif
                    </td>
                    <td class="project-title">
                        <strong>{{$applicationStage->stage->name}}</strong>
                    </td>
                    <td class="project-completion">
                        Score: {{display_decimal($applicationStage->score)}}%
                    </td>
                    <td class="project-actions">
                        &nbsp;
                    </td>
                </tr>
                {{--start display stage tests--}}
                @foreach($applicationStage->stage->tests as $index => $test)
                <tr class="testable-stage-test">
                    <td class="project-status {{($index+1) !== $applicationStage->stage->tests->count() ? 'no-border-bottom' : ''  }}">
                        &nbsp;
                    </td>
                    <td class="project-title">
                        {{$test->category}}
                    </td>
                    <td class="project-completion">
                        Score: {{display_decimal($applicationStage->getTestScore($test))}}%
                    </td>
                    <td class="project-actions {{($index+1) !== $applicationStage->stage->tests->count() ? 'no-border-bottom' : ''  }}">
                        @unless($applicationStage->testIsAlreadyTaken($test))
                        @if($applicationStage->canTakeTest(Auth::user()))
                        @if($applicationStage->application->isCurrentStage($applicationStage->stage))
                        <a href="{{route('stagetests.create',['applicant_id' => $applicationStage->applicant_id, 'position_id' => $applicationStage->position_id, 'stage_id' => $applicationStage->stage_id, 'application_id' => $applicationStage->application_id, 'applicationstage_id'=> $applicationStage->id, 'test_id' => $test->id])}}" class="btn btn-primary btn-sm" title="{{trans('applicationstages.actions.take_test.title')}}">
                            {{trans('applicationstages.actions.take_test.name')}}
                        </a> {{--TODO just pass application stage id?--}}
                        @endif
                        @endif
                        @endunless
                    </td>
                </tr>
                @endforeach
                {{--end display stage tests--}}

                {{-- end display stage with test--}}

                @else
                {{-- start display no test stage--}}
                <tr>
                    <td class="project-status">
                        @if($applicationStage->score)
                        <span class="label {{display_boolean($applicationStage->hasPass(), 'label-primary', 'label-danger')}}">
                            {{display_boolean($applicationStage->hasPass(), trans('applicationstages.scores.pass'), trans('applicationstages.scores.failed'))}}
                        </span>
                        @else
                        <span class="label">
                            {{trans('applicationstages.scores.na')}}
                        </span>
                        @endif
                    </td>
                    <td class="project-title">
                        <strong>{{$applicationStage->stage->name}}</strong>
                    </td>
                    <td class="project-completion">
                        Score: {{display_decimal($applicationStage->score)}}%
                    </td>
                    <td class="project-actions">
                        &nbsp;
                    </td>
                </tr>
                {{-- end display no test stage --}}
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
{{--end stages listing--}}

{{-- end application stages--}}