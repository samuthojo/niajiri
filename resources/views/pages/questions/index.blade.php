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

                {{-- start tests table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('tests.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('tests.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('tests.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start tests search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'tests.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('tests.actions.search.title') }}">
                            <input name="name" value="name" type="text" placeholder="{{ trans('tests.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('tests.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('tests.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end tests search form --}}

                    </div>
                </div>
                {{-- end tests table in filter --}}

                {{-- start tests table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('tests.input.duration.header') }}
                                </th>
                                <th>
                                    {{trans('tests.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($tests as $item)
                            <tr>
                                <td>{{ $item->duration}}</td>
                                <td>

                                    @permission('edit:test')
                                    <a href="{{ route('tests.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs" title="{{trans('tests.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:test')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('tests.destroy', ['id' => $item->id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('tests.actions.delete.title'),
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
                        {!! $tests->render() !!}
                    </div> --}}
                    {{-- end pagination --}}

                </div>
                {{-- end tests table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
