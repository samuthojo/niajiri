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

                {{-- start positions table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('positions.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('positions.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('positions.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start positions search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'positions.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('positions.actions.search.title') }}">
                            <input name="name" value="name" type="text" placeholder="{{ trans('positions.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('positions.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('positions.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end positions search form --}}

                    </div>
                </div>
                {{-- end positions table in filter --}}

                {{-- start positions table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('positions.inputs.name.header') }}
                                </th>
                                <th>
                                    {{trans('positions.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($positions as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>

                                    @permission('edit:position')
                                    <a href="{{ route('positions.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs" title="{{trans('positions.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:position')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('positions.destroy', ['id' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('positions.actions.delete.title'),
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
                        {!! $positions->render() !!}
                    </div> --}}
                    {{-- end pagination --}}

                </div>
                {{-- end positions table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
