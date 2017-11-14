@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start achievements table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('achievements.create', ['applicant_id'=> $applicant_id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('achievements.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('achievements.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        {{-- start achievements search form --}}
                        @if(is_set($achievements) && 
                        ($achievements->count() > config('app.defaults.pageSize')))
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'achievements.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('achievements.actions.search.title') }}">
                            {{--start applicant id--}}
                            @if(is_set($applicant_id))
                            <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
                            @endif
                            {{--end applicant id--}}
                            <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('achievements.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('achievements.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('achievements.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        @endif
                        {{-- end achievements search form --}}

                    </div>
                </div>
                {{-- end achievements table in filter --}}

                {{-- start achievements table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('achievements.inputs.title.header') }}
                                </th>
                                <th>
                                    {{ trans('achievements.inputs.organization.header') }}
                                </th>
                                <th>
                                    {{ trans('achievements.inputs.summary.header') }}
                                </th>
                                <th>
                                    {{ trans('achievements.inputs.issued_at.header') }}
                                </th>
                                <th>
                                    {{ trans('achievements.inputs.attachment.header') }}
                                </th>
                                <th>
                                    {{trans('achievements.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($achievements as $item)
                            <tr>
                                <td>{{ $item->title}}</td>
                                <td>{{ $item->organization}}</td>
                                <td>{{ $item->summary}}</td>
                                <td>
                                    {{ display_date($item->issued_at, config('app.datepicker_parse_month_year_format'))}}
                                </td>
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

                                    @permission('view:achievement')
                                    <a href="{{ route('achievements.edit', ['id' => $item->id, 'applicant_id'=> $applicant_id]) }}" class="btn btn-success btn-xs" title="{{trans('achievements.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:achievement')
                                    <a href="{{ route('achievements.edit', ['id' => $item->id , 'applicant_id'=> $applicant_id]) }}" class="btn btn-primary btn-xs" title="{{trans('achievements.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:achievement')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('achievements.destroy', ['id' => $item->id, 'applicant_id'=> $applicant_id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('achievements.actions.delete.title'),
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
                        {!! $achievements->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end achievements table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
