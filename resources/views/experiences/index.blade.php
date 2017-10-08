@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start experiences table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('experiences.create', ['applicant_id'=> $applicant_id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('experiences.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('experiences.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start experiences search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'experiences.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('experiences.actions.search.title') }}">
                            {{--start applicant id--}}
                            @if(is_set($applicant_id))
                            <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
                            @endif
                            {{--end applicant id--}}
                            <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('experiences.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('experiences.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('experiences.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end experiences search form --}}

                    </div>
                </div>
                {{-- end experiences table in filter --}}

                {{-- start experiences table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('experiences.inputs.position.header') }}
                                </th>
                                <th>
                                    {{ trans('experiences.inputs.organization.header') }}
                                </th>
                                <th>
                                    {{ trans('experiences.inputs.location.header') }}
                                </th>
                                <th>
                                    {{ trans('experiences.inputs.started_at.header') }}
                                </th>
                                <th>
                                    {{ trans('experiences.inputs.ended_at.header') }}
                                </th>
                                <th>
                                    {{trans('experiences.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($experiences as $item)
                            <tr>
                                <td>{{ $item->position}}</td>
                                <td>{{ $item->organization}}</td>
                                <td>{{ $item->location}}</td>
                                <td>{{ display_date($item->started_at)}}</td>
                                <td>{{ display_date($item->ended_at)}}</td>
                                <td>

                                    @permission('view:experience')
                                    <a href="{{ route('experiences.edit', ['id' => $item->id, 'applicant_id'=> $applicant_id]) }}" class="btn btn-success btn-xs" title="{{trans('experiences.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:experience')
                                    <a href="{{ route('experiences.edit', ['id' => $item->id , 'applicant_id'=> $applicant_id]) }}" class="btn btn-primary btn-xs" title="{{trans('experiences.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:experience')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('experiences.destroy', ['id' => $item->id, 'applicant_id'=> $applicant_id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('experiences.actions.delete.title'),
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
                        {!! $experiences->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end experiences table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
