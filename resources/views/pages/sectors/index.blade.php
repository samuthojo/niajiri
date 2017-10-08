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

                {{-- start sectors table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('sectors.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('sectors.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('sectors.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start sectors search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'sectors.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('sectors.actions.search.title') }}">
                            <input name="name" value="name" type="text" placeholder="{{ trans('sectors.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('sectors.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('sectors.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end sectors search form --}}

                    </div>
                </div>
                {{-- end sectors table in filter --}}

                {{-- start sectors table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('sectors.inputs.name.header') }}
                                </th>
                                <th>
                                    {{trans('sectors.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($sectors as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>

                                    @permission('edit:sector')
                                    <a href="{{ route('sectors.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs" title="{{trans('sectors.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:sector')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('sectors.destroy', ['id' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('sectors.actions.delete.title'),
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
                        {!! $sectors->render() !!}
                    </div> --}}
                    {{-- end pagination --}}

                </div>
                {{-- end sectors table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
