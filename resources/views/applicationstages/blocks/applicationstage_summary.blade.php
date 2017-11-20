{{-- start application stage summary --}}
<div class="row">

    {{-- start total applied --}}
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{trans('applicationstages.summaries.applied.title')}}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">
                    {{$summary['applied']}}
                </h1>
                <div class="stat-percent font-bold text-success">
                    &nbsp;
                </div>
                <small>{{trans('applicationstages.summaries.applied.description')}}</small>
            </div>
        </div>
    </div>
    {{-- end total applied --}}

    {{-- start total passed --}}
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{trans('applicationstages.summaries.passed.title')}}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">
                    {{$summary['passed']}}
                </h1>
                <div class="stat-percent font-bold text-navy">
                    {{display_percentage($summary['passed'], $summary['applied'])}}
                </div>
                <small>{{trans('applicationstages.summaries.passed.description')}}</small>
            </div>
        </div>
    </div>
    {{-- end total passed --}}

    {{-- start total failed --}}
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{trans('applicationstages.summaries.failed.title')}}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">
                    {{$summary['failed']}}
                </h1>
                <div class="stat-percent font-bold text-danger">
                    {{display_percentage($summary['failed'], $summary['applied'])}}
                </div>
                <small>{{trans('applicationstages.summaries.failed.description')}}</small>
            </div>
        </div>
    </div>
    {{-- end total failed --}}

    {{-- start not reviewed --}}
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{trans('applicationstages.summaries.unreviewed.title')}}</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">
                    {{$summary['unreviewed']}}
                </h1>
                <div class="stat-percent font-bold text-info">
                    {{display_percentage($summary['unreviewed'], $summary['applied'])}}
                </div>
                <small>{{trans('applicationstages.summaries.unreviewed.description')}}</small>
            </div>
        </div>
    </div>
    {{-- end not reviewed --}}

</div>
{{-- end application stage summary --}}
