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

                {{-- start projects table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('projects.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('projects.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('projects.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start projects search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'projects.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('projects.actions.search.title') }}">
                            <input name="name" value="name" type="text" placeholder="{{ trans('projects.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('projects.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('projects.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end projects search form --}}

                    </div>
                </div>
                {{-- end projects table in filter --}}

                <div class="tab-pane active gray-bg" id="tab-1">
                  {{-- start organizations table --}}
                  <div class="wrapper wrapper-content animated fadeInRight">
                  @foreach ($projects->chunk(3) as $chunkedProject)
                  <div class="row">
                    @foreach ($chunkedProject as $item)

                  <a href="{{ route('projects.show', ['id' => $item->id]) }}">
                    <div class="col-md-4">
                      <div class="widget red-bg p-lg text-center">
                        <div class="m-b-md">
                          <h1>
                              {{$item->name}}
                          </h1>
                        </div>
                      </div>
                    </div>
                    </a>
                    @endforeach
                  </div>
                  @endforeach

                  </div>
                  {{-- end organizations table --}}
                </div>

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
