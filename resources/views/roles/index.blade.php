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

                {{-- start roles table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('roles.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('roles.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('roles.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start roles search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'roles.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('roles.actions.search.title') }}">
                            <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('roles.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('roles.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('roles.actions.search.title'),
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end roles search form --}}

                    </div>
                </div>
                {{-- end roles table in filter --}}

                {{-- start roles table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th> {{ trans('roles.inputs.name.header') }} </th>
                                <th>
                                    {{ trans('roles.inputs.display_name.header') }}
                                </th>
                                <th>
                                    {{ trans('roles.inputs.description.header') }}
                                </th>
                                <th>
                                    {{trans('roles.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($roles as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->display_name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>

                                    @permission('view:role')
                                    <a href="{{ route('roles.show', ['id' => $item->id]) }}" class="btn btn-success btn-xs" title="{{trans('roles.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:role')
                                    <a href="{{ route('roles.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs" title="{{trans('roles.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                     @if(Auth::user()->can('delete:role') && !$item->restrict)
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('roles.destroy', ['id' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('roles.actions.delete.title'),
                                                'onclick'=>'return confirm("Confirm Delete?")'
                                        ]) !!}
                                    {!! Form::close() !!}
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
                        {!! $roles->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end roles table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
