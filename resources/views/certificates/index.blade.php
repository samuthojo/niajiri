@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start certificates table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('certificates.create', ['applicant_id'=> $applicant_id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('certificates.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('certificates.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start certificates search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'certificates.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('certificates.actions.search.title') }}">
                            {{--start applicant id--}}
                            @if(is_set($applicant_id))
                            <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
                            @endif
                            {{--end applicant id--}}
                            <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('certificates.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('certificates.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('certificates.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end certificates search form --}}

                    </div>
                </div>
                {{-- end certificates table in filter --}}

                {{-- start certificates table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('certificates.inputs.title.header') }}
                                </th>
                                <th>
                                    {{ trans('certificates.inputs.institution.header') }}
                                </th>
                                <th>
                                    {{ trans('certificates.inputs.summary.header') }}
                                </th>
                                <th>
                                    {{ trans('certificates.inputs.started_at.header') }}
                                </th>
                                <th>
                                    {{ trans('certificates.inputs.finished_at.header') }}
                                </th>
                                <th>
                                    {{ trans('certificates.inputs.attachment.header') }}
                                </th>
                                <th>
                                    {{trans('certificates.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($certificates as $item)
                            <tr>
                                <td>{{ $item->title}}</td>
                                <td>{{ $item->institution}}</td>
                                <td>{{ $item->summary}}</td>
                                <td>{{ display_date($item->started_at)}}</td>
                                <td>{{ display_date($item->finished_at)}}</td>
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

                                    @permission('view:certificate')
                                    <a href="{{ route('certificates.edit', ['id' => $item->id, 'applicant_id'=> $applicant_id]) }}" class="btn btn-success btn-xs" title="{{trans('certificates.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:certificate')
                                    <a href="{{ route('certificates.edit', ['id' => $item->id , 'applicant_id'=> $applicant_id]) }}" class="btn btn-primary btn-xs" title="{{trans('certificates.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:certificate')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('certificates.destroy', ['id' => $item->id, 'applicant_id'=> $applicant_id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('certificates.actions.delete.title'),
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
                        {!! $certificates->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end certificates table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
