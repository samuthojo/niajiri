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

                {{-- start users table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-6 m-b-xs">
                        @permission('edit:user')
                        <div class="btn-group">
                            <a href="{{route('users.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('users.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('users.actions.create.name') }}</a>
                            {{--start export--}}
                            @if($users->count() > 0)
                            <a
                                class="btn btn-sm btn-white"
                                href="{{route('users.export', app('request')->request->all())}}"
                                role="button"
                                title="{{ trans('users.actions.export.title') }}" target="_blank">
                                <i class="fa fa-file-excel-o"></i>
                                {{ trans('users.actions.export.name') }}
                            </a>
                            @endif
                            {{--end export--}}
                        </div>
                        @endpermission
                    </div>
                    <div class="col-sm-6">
                        {{-- start users search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'users.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    {!! Form::select('type', $types, null, [
                                            'class' => 'form-control',
                                            'id' =>'type'
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group" title="{{ trans('users.actions.search.title') }}">
                                    <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('users.actions.search.placeholder') }}" class="form-control"/>
                                        <span class="input-group-btn">
                                            {!! Form::button(trans('users.actions.search.name'),[
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-primary',
                                                    'title' => trans('users.actions.search.title')
                                                ]) !!}
                                        </span>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        {{-- end users search form --}}

                    </div>
                </div>
                {{-- end users table in filter --}}

                {{-- start users table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('users.inputs.avatar.header') }}
                                </th>
                                <th>
                                    {{ trans('users.inputs.name.header') }}
                                </th>
                                <th>
                                    {{ trans('users.inputs.email.header') }}
                                </th>
                                <th>
                                    {{ trans('users.inputs.mobile.header') }}
                                </th>
                                <th>
                                    {{ trans('users.inputs.applied.header') }}
                                </th>
                                <th>
                                    {{trans('users.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td>
                                <img src="{{$item->avatar()}}" alt="{{trans('users.inputs.avatar.placeholder')}}" class="img-circle img-sm" title="{{trans('users.inputs.avatar.placeholder')}}">
                                </td>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->mobile}}</td>
                                <td>
                                    {{$item->type !== App\Models\User::TYPE_APPLICANT ? trans('users.inputs.applied.na') : display_boolean($item->applications->count() > 0, trans('users.inputs.applied.yes'), trans('users.inputs.applied.no'))}}
                                </td>
                                <td>

                                    @permission('view:user')
                                    <a href="{{ route('users.show', ['id' => $item->id]) }}" class="btn btn-success btn-xs" title="{{trans('users.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:user')
                                    <a href="{{ route('users.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs" title="{{trans('users.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:user')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('users.destroy', ['id' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('users.actions.delete.title'),
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
                        {!! $users->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end users table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
