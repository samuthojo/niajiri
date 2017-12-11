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
              <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInUp">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="m-b-md">
                                          @permission('edit:project')
                                            @if($project->status === "open")
                                            {!! Form::open([
                                                'method'=>'PATCH',
                                                'url' => route('projects.close_project', ['id' => $project->id]),
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span aria-hidden="true" title="">Close Project</span>', [
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs pull-right',
                                                        'title' => trans('positions.actions.delete.title'),
                                                        'onclick'=>'return confirm("Confirm Close project?")'
                                                ]) !!}
                                            {!! Form::close() !!}
                                            @endif
                                            <a href="{{ route('projects.edit', ['id' => $project->id]) }}" class="btn btn-primary btn-xs pull-right">Edit project</a>
                                          @endpermission
                                            <h1 class="font-bold">{{$project->name}}</h1>
                                            <h4 class="text-navy">Open until {{$project->endedAt->formatLocalized('%A %d %B %Y')}}</h4>
                                            <h4 class="text-navy">Link for candidate: <a href="{{ route('projects.open_position', ['id' => $project->id]) }}">{{ route('projects.open_position', ['id' => $project->id]) }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                      <h2 class="font-bold">Positions</h2>
                                      @include('pages.projects.positions')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
