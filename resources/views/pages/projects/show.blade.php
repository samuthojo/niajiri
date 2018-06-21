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
                            <div class="">`
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
                                                        'class' => 'btn btn-danger btn-sm pull-right',
                                                        'title' => trans('positions.actions.delete.title'),
                                                        'onclick'=>'return confirm("Confirm Close project?")'
                                                ]) !!}
                                            {!! Form::close() !!}
                                            @endif
                                            <a href="{{ route('projects.edit', ['id' => $project->id]) }}" class="btn btn-primary btn-sm pull-right m-r-sm">Edit project</a>
                                          @endpermission
                                            <h1 class="font-bold">{{$project->name}}</h1>
                                            <h4 class="text-navy">Open until {{$project->endedAt->formatLocalized('%A %d %B %Y')}}</h4>
                                            <h4 class="text-navy">Link for candidate: <a href="{{'http://'.$project->organization->slug.'.niajiri.co.tz/open/'.$project->slug.'/positions' }}" target="_blank">{{'http://'.$project->organization->slug.'.niajiri.co.tz/open/'.$project->slug.'/positions' }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>{{$project->summary}}</p>
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
