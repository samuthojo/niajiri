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

                {{-- start projects table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('projects.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('projects.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('projects.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start projects search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'projects.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('projects.actions.search.title') }}">
                            <input name="name" value="name" type="text" placeholder="{{ trans('projects.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('projects.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('projects.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end projects search form --}}

                    </div>
                </div>
                {{-- end projects table in filter --}}

                {{-- start projects table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                              <th>
                                  {{ trans('projects.headers.status') }}
                              </th>
                                <th>
                                    {{ trans('projects.inputs.name.header') }}
                                </th>
                                <th>
                                    {{ trans('projects.inputs.organization.header')}}
                                </th>
                                <th>
                                    {{ trans('projects.inputs.startedAt.header') }}
                                </th>
                                <th>
                                    {{ trans('projects.inputs.endedAt.header') }}
                                </th>
                                <th>
                                    {{trans('projects.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($projects as $item)
                            <tr>
                                @if(strtotime($item->endedAt) > time())
                                <td>
                                    <span class="label label-primary">{{ trans('projects.status.active') }}</span>
                                </td>
                                @else
                                <td>
                                    <span class="label label-default">{{ trans('projects.status.inactive') }}</span>
                                </td>
                                @endif
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->organization->name}}</td>
                                <td>{{ $item->startedAt->format('d-m-y')}}</td>
                                <td>{{ $item->endedAt->format('d-m-y')}}</td>
                                <td>
                                    @permission('view:project')
                                    <a href="{{ route('projects.show', ['id' => $item->id]) }}" class="btn btn-success btn-xs" title="{{trans('users.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:project')
                                    <a href="{{ route('projects.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs" title="{{trans('projects.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:project')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('projects.destroy', ['id' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('projects.actions.delete.title'),
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
                    {{--<div class="pagination-wrapper">
                        {!! $projects->render() !!}
                    </div> --}}
                    {{-- end pagination --}}

                </div>
                {{-- end projects table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
