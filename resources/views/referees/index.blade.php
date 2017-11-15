@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start referees table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('referees.create', ['applicant_id'=> $applicant_id])}}" class="btn btn-sm btn-white" role="button" title="{{ trans('referees.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('referees.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start referees search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'referees.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('referees.actions.search.title') }}">
                            {{--start applicant id--}}
                            @if(is_set($applicant_id))
                            <input type="hidden" name="applicant_id" value="{{$applicant_id}}">
                            @endif
                            {{--end applicant id--}}
                            <input name="q" value="{{$q}}" type="text" placeholder="{{ trans('referees.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('referees.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('referees.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end referees search form --}}

                    </div>
                </div>
                {{-- end referees table in filter --}}

                {{-- start referees table --}}
                <div class="table-responsive m-t-lg">

                    {{-- start table --}}
                    <table class="table table-borderless">

                        {{-- start table header --}}
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('referees.inputs.name.header') }}
                                </th>
                                <th>
                                    {{ trans('referees.inputs.title.header') }}
                                </th>
                                <th>
                                    {{ trans('referees.inputs.organization.header') }}
                                </th>
                                <th>
                                    {{ trans('referees.inputs.email.header') }}
                                </th>
                                <th>
                                    {{ trans('referees.inputs.mobile.header') }}
                                </th>
                                 <th>
                                    {{ trans('referees.inputs.alternative_mobile.header') }}
                                </th>
                                <th>
                                    {{trans('referees.headers.actions')}}
                                </th>
                            </tr>
                        </thead>
                        {{-- end table header --}}

                        {{-- start table body --}}
                        <tbody>
                        @foreach($referees as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->title}}</td>
                                <td>{{ $item->organization}}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->mobile}}</td>
                                <td>
                                    {{ display_or_na($item->alternative_mobile)}}
                                </td>
                                <td>

                                    @permission('view:referee')
                                    <a href="{{ route('referees.edit', ['id' => $item->id, 'applicant_id'=> $applicant_id]) }}" class="btn btn-success btn-xs" title="{{trans('referees.actions.view.title')}}"><span class="fa fa-eye" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('edit:referee')
                                    <a href="{{ route('referees.edit', ['id' => $item->id , 'applicant_id'=> $applicant_id]) }}" class="btn btn-primary btn-xs" title="{{trans('referees.actions.edit.title')}}"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                    @endpermission

                                    @permission('delete:referee')
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => route('referees.destroy', ['id' => $item->id, 'applicant_id'=> $applicant_id]),
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => trans('referees.actions.delete.title'),
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
                        {!! $referees->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end referees table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
