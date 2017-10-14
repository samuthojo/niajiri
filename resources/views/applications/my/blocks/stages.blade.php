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
                @foreach($application->stages as $applicationStage)
                <tr>
                    <td class="project-status">
                        <span class="label {{display_boolean($applicationStage->hasPass(), 'label-primary', 'label-danger')}}">
                            {{display_boolean($applicationStage->hasPass(), trans('applicationstages.scores.pass'), trans('applicationstages.scores.failed'))}}
                        </span>
                    </td>
                    <td class="project-title">
                        <strong>{{$applicationStage->stage->name}}</strong>
                    </td>
                    <td class="project-completion">
                        Score: {{display_decimal($applicationStage->score)}}%
                    </td>
                    <td class="project-actions">
                        @if($application->canAdvance($applicationStage->stage))
                        @if($applicationStage->canTakeTest(Auth::user()))
                        <a href="#" class="btn btn-primary btn-sm" title="{{trans('applicationstages.actions.take_test.title')}}">
                            {{trans('applicationstages.actions.take_test.name')}}
                        </a>
                        @endif
                        @permission('edit:applicationstage')
                        <a href="#" class="btn btn-info btn-sm" title="{{trans('applicationstages.actions.score.title')}}">
                            {{trans('applicationstages.actions.score.name')}}
                        </a>
                        @endpermission
                        @permission('edit:applicationstage')
                        <a href="{{route('applications.advance', ['id' => $application->id, 'applicant_id' => $application->applicant_id])}}" class="btn btn-primary btn-sm" title="{{trans('applicationstages.actions.advance.title')}}">
                            {{trans('applicationstages.actions.advance.name')}}
                        </a>
                        @endpermission
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
{{--end stages listing--}}

{{-- end application stages--}}