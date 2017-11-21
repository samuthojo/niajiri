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

                {{-- start organizations table in filter --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="{{route('organizations.create')}}" class="btn btn-sm btn-white" role="button" title="{{ trans('organizations.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('organizations.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        {{-- start organizations search form --}}
                        {!! Form::open([
                            'method'=>'GET',
                            'route' => 'organizations.index',
                            'style' => 'display:inline'
                        ]) !!}
                        <div class="input-group" title="{{ trans('organizations.actions.search.title') }}">
                            <input name="name" value="name" type="text" placeholder="{{ trans('organizations.actions.search.placeholder') }}" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    {!! Form::button(trans('organizations.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('organizations.actions.search.title')
                                        ]) !!}
                                </span>
                        </div>
                        {!! Form::close() !!}
                        {{-- end organizations search form --}}

                    </div>
                </div>
                {{-- end organizations table in filter --}}

                {{-- start organizations table --}}
                <div class="wrapper wrapper-content animated fadeInRight">
                @foreach ($organizations->chunk(4) as $chunkedOrgs)
                <div class="row">
                  @foreach ($chunkedOrgs as $item)

                <a href="{{ route('organizations.show', ['id' => $item->id]) }}">
                  <div class="col-md-3">
                    <div class="payment-card">
                        <i class="fa fa-cc-visa payment-icon-big text-success"></i>
                        <h2>
                            {{$item->name}}
                        </h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <small>
                                    <strong>Sector:</strong> {{$item->sector->name}}
                                </small>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('organizations.show', ['id' => $item->id]) }}" class="btn btn-xs btn-outline btn-primary">More Info <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                  </div>
                  </a>
                  @endforeach
                </div>
                @endforeach

                    {{-- start pagination --}}
                    <div class="pagination-wrapper">
                        {!! $organizations->render() !!}
                    </div>
                    {{-- end pagination --}}

                </div>
                {{-- end organizations table --}}

            </div>
           {{-- end page box content --}}

        </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

@endsection
