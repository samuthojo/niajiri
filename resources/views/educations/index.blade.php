@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start educations table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('educations.create', ['applicant_id'=> $applicant_id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('educations.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('educations.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        {{-- start educations search form --}}
                        @if(is_set($educations) && 
                        ($educations->count() > config('app.defaults.pageSize')))
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'educations.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('educations.actions.search.title') }}">
                            {{--start applicant id--}}
                            @if(is_set($applicant_id))
                            <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
                            @endif
                            {{--end applicant id--}}
                            <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('educations.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('educations.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('educations.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        @endif
                        {{-- end educations search form --}}

                    </div>
                </div>
                {{-- end educations table in filter --}}

                {{-- start educations table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('educations.inputs.level.header') }}
                                </th>
                                <th>
                                    {{ trans('educations.inputs.institution.header') }}
                                </th>
                                <th>
                                    {{ trans('educations.inputs.summary.header') }}
                                </th>
                                <th>
                                    {{ trans('educations.inputs.started_at.header') }}
                                </th>
                                <th>
                                    {{ trans('educations.inputs.finished_at.header') }}
                                </th>
                                <th>
                                    {{ trans('educations.inputs.remark.header') }}
                                </th>
                                <th>
                                    {{ trans('educations.inputs.attachment.header') }}
                                </th>
                                <th>
                                    {{trans('educations.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($educations as $item)
                            <tr>
                                <td>{{ $item->level}}</td>
                                <td>{{ $item->institution}}</td>
                                <td>{{ $item->summary}}</td>
                                <td>
                                    {{ display_date($item->started_at, config('app.datepicker_parse_month_year_format'))}}
                                </td>
                                <td>
                                    {{ display_date($item->finished_at, config('app.datepicker_parse_month_year_format'))}}
                                </td>
                                <td>{{ $item->remark}}</td>
                                @if($item->attachment())
                                <td>
                                    <a href="{{$item->attachment()->public_url()}}" target="_blank">
                                        {{$item->attachment()->file_name}}
                                    </a>
                                </td>
                                @else
                                <td>N/A</td>
                                @endif
                                <td>

                                    @permission('view:education')
                                    <a href="{{ route('educations.edit', ['id' => $item->id, 'applicant_id'=> $applicant_id]) }}" class="btn btn-success btn-xs" title="{{trans('educations.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:education')
                                    <a href="{{ route('educations.edit', ['id' => $item->id , 'applicant_id'=> $applicant_id]) }}" class="btn btn-primary btn-xs" title="{{trans('educations.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:education')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('educations.destroy', ['id' => $item->id, 'applicant_id'=> $applicant_id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('educations.actions.delete.title'),
                                                'onclick'=>'return confirm("Confirm Delete?")'
                                        ]) !!}
                                    {!! Form::close() !!}
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
                        {!! $educations->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end educations table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
