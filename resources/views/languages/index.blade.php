@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start languages table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('languages.create', ['applicant_id'=> $applicant_id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('languages.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('languages.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        {{-- start languages search form --}}
                        @if(is_set($languages) && 
                        ($languages->count() > config('app.defaults.pageSize')))
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'languages.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('languages.actions.search.title') }}">
                            {{--start applicant id--}}
                            @if(is_set($applicant_id))
                            <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
                            @endif
                            {{--end applicant id--}}
                            <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('languages.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('languages.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('languages.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        @endif
                        {{-- end languages search form --}}

                    </div>
                </div>
                {{-- end languages table in filter --}}

                {{-- start languages table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('languages.inputs.name.header') }}
                                </th>
                                <th>
                                    {{ trans('languages.inputs.write_fluency.header') }}
                                </th>
                                <th>
                                    {{ trans('languages.inputs.speak_fluency.header') }}
                                </th>
                                <th>
                                    {{trans('languages.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($languages as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->write_fluency}}</td>
                                <td>{{ $item->speak_fluency}}</td>
                                <td>

                                    @permission('view:language')
                                    <a href="{{ route('languages.edit', ['id' => $item->id, 'applicant_id'=> $applicant_id]) }}" class="btn btn-success btn-xs" title="{{trans('languages.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:language')
                                    <a href="{{ route('languages.edit', ['id' => $item->id , 'applicant_id'=> $applicant_id]) }}" class="btn btn-primary btn-xs" title="{{trans('languages.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:language')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('languages.destroy', ['id' => $item->id, 'applicant_id'=> $applicant_id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('languages.actions.delete.title'),
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
                        {!! $languages->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end languages table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
