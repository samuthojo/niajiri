@extends('layouts.position_page')

@section('page')

{{-- start applciation stage summary --}}
@include('applicationstages.blocks.applicationstage_summary')
{{-- end application stage summary --}}

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

                {{-- start applicationstages table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                         @if($position->isFirstStage($stage))
                         @permission('edit:applicationstage')
                             <div class="btn-group">
                                <button class="btn btn-sm btn-white" role="button" title="{{ trans('applicationstages.actions.screen.title') }}" data-toggle="modal" data-target="#application-screening-modal">
                                <i class="fa fa-filter"></i> {{ trans('applicationstages.actions.screen.name') }}</button>
                            </div>
                            @include('applicationstages.blocks.screening_modal')
                        @endpermission
                        @endif
                    </div>
                    <div class="col-sm-4">
                        {{-- start applicationstages search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'applicationstages.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('applicationstages.actions.search.title') }}">
                            @if(is_set($position))
                            <input type="hidden" name="position_id" value="{{$position->id}}">
                            @endif
                            @if(is_set($stage))
                            <input type="hidden" name="stage_id" value="{{$stage->id}}">
                            @endif
                            <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('applicationstages.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('applicationstages.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('applicationstages.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end applicationstages search form --}}

                    </div>
                </div>
                {{-- end applicationstages table in filter --}}

                {{-- start applicationstages table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start advance all form --}}
                    {!! Form::open([
                            'method'=>'PATCH',
                            'route' => 'applications.advance',
                            'id'=>'applicationstage_advance'
                        ]) !!}
                    @if(is_set($position))
                        <input type="hidden" name="position_id" value="{{$position->id}}">
                      @endif
                      @if(is_set($stage))
                        <input type="hidden" name="stage_id" value="{{$stage->id}}">
                      @endif
                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>

                                <th>
                                    <input type="checkbox" id="selectAll" />
                                </th>
                                <th>
                                    {{ trans('cvs.inputs.name.header') }}
                                </th>
                                <th>
                                    {{ trans('cvs.inputs.age.header') }}
                                </th>
                                <th>
                                    {{ trans('cvs.inputs.gender.header') }}
                                </th>
                                <th>
                                    {{ trans('cvs.inputs.mobile.header') }}
                                </th>
                                <th>
                                    {{ trans('cvs.inputs.email.header') }}
                                </th>
                                <th>
                                    {{ trans('applicationstages.inputs.score.header') }}
                                </th>
                                <th>
                                    {{ trans('applicationstages.inputs.status.header') }}
                                </th>
                                <th>
                                    {{trans('applicationstages.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                            @foreach($stage->applicationstages->sortBy('score') as $item)
                            <tr>
                              <td>
                                {{Form::checkbox('applications[]', $item->application_id, false , ['id' => $item->application_id])}}
                                </td>
                                <td>{{ $item->applicant->fullName()}}</td>
                                <td>{{display_int($item->applicant->age())}}</td>
                                <td>{{display_or_na($item->applicant->gender)}}</td>
                                <td>
                                    {{ display_or_na($item->applicant->mobile)}}
                                </td>
                                <td>
                                    {{ display_or_na($item->applicant->email)}}
                                </td>
                                <td>
                                    {{ display_decimal($item->score)}}%
                                </td>
                                <td>
                                    <span class="label {{display_boolean($item->hasPass(), 'label-primary', 'label-danger')}}">
                                        {{display_boolean($item->hasPass(), trans('applicationstages.scores.pass'), trans('applicationstages.scores.failed'))}}
                                    </span>
                                </td>
                                <td>
                                {{-- TODO score, advance, view application, view cv --}}
                                    @permission('view:applicationstage')
                                    <a href="{{ route('users.resume', ['id' => $item->applicant->id, 'application_id' => $item->application_id]) }}" class="btn btn-success btn-xs" title="{{trans('applicationstages.actions.view.title')}}">
                                        {{trans('applicationstages.actions.view.name')}}
                                    </a>
                                    @endpermission

                                    @if($item->application->canAdvance($item->stage))
                                    @permission('edit:applicationstage')
                                    <button type="button" class="btn btn-info btn-xs" title="{{trans('applicationstages.actions.score.title')}}" data-toggle="modal" data-target="#application-score-modal-{{$item->id}}">
                                        {{trans('applicationstages.actions.score.name')}}
                                    </button>
                                    {{-- include score model --}}
                                    @endpermission
                                    @if($item->hasPass())
                                    @permission('edit:applicationstage')
                                    <a href="{{route('applications.advance', ['applications[]' => $item->application_id, 'stage_id' => $item->stage_id, 'position_id' => $item->position_id])}}" class="btn btn-primary btn-xs" title="{{trans('applicationstages.actions.advance.title')}}">
                                        {{trans('applicationstages.actions.advance.name')}}
                                    </a>
                                    @endpermission
                                    @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        {{-- end table body --}}

                    </table>
                    {{-- end table --}}


                    {{-- start pagination --}}
                    <div class="pagination-wrapper">
                        {!! $applicationstages->render() !!}
                    </div>
                    {{-- end pagination --}}

                    {{-- start advance actions --}}
                    @if($applicationstages->count() >= 1)
                    <div class="m-b-lg">
                        <div class="hr-line-dashed"></div>
                        <div>
                             {!!
                                Form::button(
                                    trans('applicationstages.actions.advance_all.name'),
                                    [
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-primary',
                                    'title' => trans('applicationstages.actions.advance_all.title'),
                                ])
                            !!}
                        </div>
                    </div>
                    @endif
                    {{-- end advance actions --}}

                    {!! Form::close() !!}
                    {{-- end advance all form --}}

                </div>
                {{-- end applicationstages table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

{{-- start include scoring model
    //These were added here to avoid nested forms --}}
@foreach($applicationstages->sortBy('score') as $item)
@include('applicationstages.blocks.score_modal', ['applicationstage' => $item])
@endforeach
{{-- end include scoring model --}}

@endsection

@push('scripts')
<script type="text/javascript">
    $('#selectAll').click(function (/*event*/) {
        $(this)
            .closest('table')
            .find('td input:checkbox')
            .prop('checked', this.checked);
    });
</script>
@endpush
