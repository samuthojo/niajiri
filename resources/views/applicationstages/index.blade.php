@extends('layouts.position_page')

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

                {{-- start applicationstages table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        &nbsp;
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

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('applicationstages.inputs.created_at.header') }}
                                </th>
                                <th>
                                    {{ trans('cvs.inputs.name.header') }}
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
                        @foreach($applicationstages->sortBy('score') as $item)
                            <tr>
                                <td>
                                    {{ $item->created_at->format(config('app.datetime_format'))}}
                                </td>
                                <td>{{ $item->applicant->fullName()}}</td>
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
                                    <a href="{{ route('applicationstages.show', ['id' => $item->id]) }}" class="btn btn-success btn-xs" title="{{trans('applicationstages.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:applicationstage')
                                    <a href="{{ route('applicationstages.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs" title="{{trans('applicationstages.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission
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

                </div>
                {{-- end applicationstages table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
