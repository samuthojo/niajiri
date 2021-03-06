@extends('layouts.page')

@section('page')
{{-- start open position listing --}}
<div class="row">
    <div class="col-md-12">

        {{-- start box --}}
        <div class="ibox">

            {{-- start listing open positions --}}
            @foreach($positions as $position)
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">
                        <tbody>
                        <tr>
                            <td width="90">
                                <div class="cart-product-imitation cart-position-organization-logo">
                                    <img src="{{$position->organization->logo()}}">
                                </div>
                            </td>
                            <td class="desc">
                                <h3>
                                <a href="{{ route('positions.preview', ['id' => $position->id]) }}"  class="text-navy">
                                    {{$position->title}} - {{$position->organization->name}}
                                </a>
                                </h3>
                                <p class="small">
                                    {{str_limit($position->summary, 250)}}
                                </p>

                                <div class="m-t-sm">
                                    {{-- start sector --}}
                                    <span class="text-muted"><i class="fa fa-bullhorn"></i> Sector: {{$position->sector}} </span>
                                    {{-- end sector --}}
                                    |
                                    {{-- start deadline --}}
                                    <span class="text-muted"><i class="fa fa-clock-o"></i> Deadline: {{$position->dueAt->toFormattedDateString()}} </span>
                                    {{-- end deadline --}}
                                </div>
                            </td>

                            <td>
                                <a class="btn btn-primary" href="{{route('positions.preview', ['id' => $position->id, 'applicant_id' => Auth::user()->id])}}" title="{{trans('positions.actions.view.title')}}"></i>{{trans('positions.actions.view.name')}}</a>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
            {{-- end listing open positions --}}

            {{-- start pagination --}}
            <div class="ibox-content">
                <div class="pagination-wrapper">
                    {!! $positions->render() !!}
                </div>
            </div>
            {{-- end pagination --}}

        </div>
        {{-- end box --}}

    </div>
</div>
{{-- end open position listing --}}
@endsection
