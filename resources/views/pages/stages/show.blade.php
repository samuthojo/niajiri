@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start role permission edit form --}}
        {!! Form::model($role, [
            'method' => 'PATCH',
            'route' => ['roles.update', $role->id],
            'class' => 'form-horizontal',
            'files' => true
        ]) !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start role permission edit form header --}}
                <div class="page-header">
                    <div class='btn-toolbar pull-right' role="toolbar">
                        {{-- start action edit --}}
                        <a
                          href="{{ route('roles.edit', $role)}}"
                          class="btn btn-white"
                          title="{{trans('roles.actions.edit.title')}}">
                          {{trans('roles.actions.edit.name')}}
                        </a>
                        {{-- end action edit --}}

                        {{-- start action update --}}
                        {!!
                            Form::button(
                                trans('roles.actions.update.name'),
                                [
                                'type' => 'submit',
                                'class' => 'btn btn-primary',
                                'title' => trans('roles.actions.update.permissions')
                            ])
                        !!}
                        {{-- end action update --}}

                        {{-- start action delete --}}
                        @unless($role->restrict)
                        <a
                            href="{{ url('/roles/'. $role->id) }}"
                            data-method="delete"
                            data-token="{{csrf_token()}}"
                            title="{{trans('roles.actions.delete.title')}}"
                            class="btn btn-danger">
                            {{trans('roles.actions.delete.name')}}
                        </a>
                        @endunless
                        {{-- end action delete --}}

                    </div>
                    <h2>
                        <small>{{$role->name}} {{trans('roles.headers.permissions')}}</small>
                    </h2>
                </div>
                {{-- start role permission edit form header --}}


                {{-- start list role permissions --}}
                <div class="row">
                    @foreach($permissions as $resource => $permits)
                        <div class="col-md-3">
                            <p class="list-group-header" title="{{$resource}} Permits">
                                {{$resource}}
                            </p>
                            <hr/>
                            <ul class="list-group">
                                @foreach($permits as $permit)
                                    <li class="list-group-item list-checkbox-item">
                                        <div
                                            class="checkbox"
                                            title="{{$permit->description}}">
                                          <label
                                            for="{{$permit->id}}"
                                            title="{{$permit->description}}">
                                          {{
                                            Form::checkbox(
                                                'permissions[]',
                                                $permit->id,
                                                $role->hasPermission($permit->name)
                                            )
                                            }}
                                          {{$permit->display_name}}
                                          </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
                {{-- end list role permissions --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {{-- start hidden role details --}}
        {!! Form::hidden('name', null) !!}
        {!! Form::hidden('display_name', null) !!}
        {!! Form::hidden('description', null) !!}
        {{-- end hidden role details --}}


        {!! Form::close() !!}
        {{-- end role permission edit form --}}

    </div>
</div>
{{-- end page content --}}

@endsection
