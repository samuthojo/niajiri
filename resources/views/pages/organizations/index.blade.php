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

                {{-- start organizations table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('organizations.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('organizations.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('organizations.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start organizations search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'organizations.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('organizations.actions.search.title') }}">
                            <input name="name" value="name" type="text" placeholder="{{ trans('organizations.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('organizations.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('organizations.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end organizations search form --}}

                    </div>
                </div>
                {{-- end organizations table in filter --}}

                {{-- start organizations table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('organizations.inputs.name.header') }}
                                </th>
                                <th>
                                    {{ trans('organizations.inputs.email.header') }}
                                </th>
                                <th>
                                    {{ trans('organizations.inputs.mobile.header') }}
                                </th>
                                <th>
                                    {{trans('organizations.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($organizations as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->mobile}}</td>
                                <td>
                                    @permission('view:organization')
                                    <a href="{{ route('organizations.show', ['id' => $item->id]) }}" class="btn btn-success btn-xs" title="{{trans('users.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:organization')
                                    <a href="{{ route('organizations.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs" title="{{trans('organizations.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:organization')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('organizations.destroy', ['id' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('organizations.actions.delete.title'),
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
                        {!! $organizations->render() !!}
                    </div> --}}
                    {{-- end pagination --}}

                </div>
                {{-- end organizations table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
