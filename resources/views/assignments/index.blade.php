@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start assignments table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('assignments.create', ['applicant_id'=> $applicant_id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('assignments.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('assignments.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        {{-- start assignments search form --}}
                        @if(is_set($assignments) && 
                        ($assignments->count() > config('app.defaults.pageSize')))
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'assignments.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('assignments.actions.search.title') }}">
                            {{--start applicant id--}}
                            @if(is_set($applicant_id))
                            <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
                            @endif
                            {{--end applicant id--}}
                            <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('assignments.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('assignments.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('assignments.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        @endif
                        {{-- end assignments search form --}}

                    </div>
                </div>
                {{-- end assignments table in filter --}}

                {{-- start assignments table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('assignments.inputs.title.header') }}
                                </th>
                                <th>
                                    {{ trans('assignments.inputs.client.header') }}
                                </th>
                                <th>
                                    {{ trans('assignments.inputs.location.header') }}
                                </th>
                                <th>
                                    {{ trans('assignments.inputs.summary.header') }}
                                </th>
                                <th>
                                    {{ trans('assignments.inputs.started_at.header') }}
                                </th>
                                <th>
                                    {{ trans('assignments.inputs.finished_at.header') }}
                                </th>
                                <th>
                                    {{trans('assignments.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($assignments as $item)
                            <tr>
                                <td>{{ $item->title}}</td>
                                <td>{{ $item->client}}</td>
                                <td>{{ $item->location}}</td>
                                <td>{{ $item->summary}}</td>
                                <td>{{ display_date($item->started_at)}}</td>
                                <td>{{ display_date($item->finished_at)}}</td>
                                <td>

                                    @permission('view:assignment')
                                    <a href="{{ route('assignments.edit', ['id' => $item->id, 'applicant_id'=> $applicant_id]) }}" class="btn btn-success btn-xs" title="{{trans('assignments.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:assignment')
                                    <a href="{{ route('assignments.edit', ['id' => $item->id , 'applicant_id'=> $applicant_id]) }}" class="btn btn-primary btn-xs" title="{{trans('assignments.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:assignment')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('assignments.destroy', ['id' => $item->id, 'applicant_id'=> $applicant_id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('assignments.actions.delete.title'),
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
                        {!! $assignments->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end assignments table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
