@extends('layouts.page')

@section('page')
{{-- start open application listing --}}
<div class="row">
    <div class="col-md-12">

        {{-- start box --}}
        <div class="ibox">

            {{-- start listing open applications --}}
            @foreach($applications as $application)
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">
                        <tbody>
                        <tr>
                            <td width="90">
                                <div class="cart-product-imitation cart-position-organization-logo">
                                    <img src="{{$application->organization->logo()}}">
                                </div>
                            </td>
                            <td class="desc">
                                <h3>
                                <a href="#" class="text-navy">
                                    {{$application->position->title}} - {{$application->organization->name}}
                                </a>
                                </h3>
                                <p class="small">
                                    {{str_limit($application->position->summary, 250)}}
                                </p>

                                <div class="m-t-sm">
                                    {{-- start sector --}}
                                    <span class="text-muted"><i class="fa fa-bullhorn"></i> Sector: {{$application->position->sector->name}} </span>
                                    {{-- end sector --}}
                                    |
                                    {{-- start deadlone --}}
                                    <span class="text-muted"><i class="fa fa-clock-o"></i> Deadline: {{$application->created_at->toFormattedDateString()}} </span>
                                    {{-- end deadline --}}
                                </div>
                            </td>

                            <td>
                                <a class="btn btn-primary" href="#"></i>Edit</a>
                            </td>
                            
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
            {{-- end listing open applications --}}

            {{-- start pagination --}}
            <div class="ibox-content">
                <div class="pagination-wrapper">
                    {!! $applications->render() !!}
                </div>
            </div>
            {{-- end pagination --}}

        </div>
        {{-- end box --}}

    </div>
</div>
{{-- end open application listing --}}
@endsection
