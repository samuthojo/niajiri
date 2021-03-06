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

                {{-- start stages table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('stages.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('stages.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('stages.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start stages search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'stages.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('stages.actions.search.title') }}">
                            <input name="name" value="name" type="text" placeholder="{{ trans('stages.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('stages.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('stages.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end stages search form --}}

                    </div>
                </div>
                {{-- end stages table in filter --}}

                {{-- start stages table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('stages.inputs.name.header') }}
                                </th>
                                <th>
                                    {{trans('stages.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($stages as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>

                                    @permission('edit:stage')
                                    <a href="{{ route('stages.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs" title="{{trans('stages.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:stage')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('stages.destroy', ['id' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('stages.actions.delete.title'),
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
                        {!! $stages->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end stages table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
