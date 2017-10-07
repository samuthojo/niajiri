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
                <div class="col-lg-9">
                    <div class="wrapper wrapper-content animated fadeInUp">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="m-b-md">
                                            <a href="{{ route('organizations.edit', ['id' => $organization->id]) }}" class="btn btn-primary btn-xs pull-right">Edit project</a>
                                            <h2>{{$organization->name}}</h2>
                                        </div>
                                        <dl class="dl-horizontal">
                                            <dt>Status:</dt> <dd><span class="label label-primary">Active</span></dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <dl class="dl-horizontal">

                                            <dt>Fax:</dt> <dd>{{$organization->fax}}</dd>
                                            <dt>Email:</dt> <dd>{{$organization->email}}</dd>
                                            <dt>Website:</dt> <dd><a href="{{ $organization->website}}" target="_blank" class="text-navy">{{$organization->website}}</a> </dd>
                                            <dt>Mobile:</dt> <dd>{{$organization->mobile}}</dd>
                                            <dt>Physical Address:</dt> <dd>{{$organization->physical_address}}</dd>
                                            <dt>Postal Address:</dt> <dd>{{$organization->postal_address}}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-7" id="cluster_info">
                                        <dl class="dl-horizontal" >

                                            <dt>Last Updated:</dt> <dd>{{$organization->updated_at->diffForHumans()}}</dd>
                                            <dt>Created:</dt> <dd>{{$organization->created_at->diffForHumans()}}</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab-1" data-toggle="tab">Projects</a></li>
                                                <li class=""><a href="#tab-2" data-toggle="tab">Positions</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                    <div class="tab-content">
                                    @include('pages.organizations.projects')
                                    @include('pages.organizations.positions')

                                    </div>
                                  </div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    @include('pages.organizations.description')
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
