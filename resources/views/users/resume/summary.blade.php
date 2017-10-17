<div class="row m-b-lg m-t-lg">
    <div class="col-md-9">
        <div class="">
            <div class="">
                <div>
                    <h2 class="no-margins">
                        {{$user->fullName()}}
                    </h2>
                    <small>
                        {{display_or_na($user->summary)}}
                    </small>
                </div>
            </div>
            <div class="row m-t-md">
                <div class="col-md-6" title="{{trans('cvs.inputs.mobile.description')}}">
                    <i class="fa fa-phone"></i> {{display_or_na($user->mobile)}}
                </div>
                <div class="col-md-6" title="{{trans('cvs.inputs.email.description')}}">
                    <i class="fa fa-envelope-o"></i> 
                    <a href="mailto:{{$user->email}}" target="_top">
                    {{display_or_na($user->email)}}
                    </a>
                </div>
            </div>
            <div class="row m-t-xs">
                <div class="col-md-6" title="{{trans('cvs.inputs.website.description')}}">
                    <i class="fa fa-link"></i> 
                    <a href="{{display_url($user->website)}}" target="_blank">
                        {{display_or_na($user->website)}}
                    </a>
                </div>
                <div class="col-md-6" title="{{trans('cvs.inputs.state.description')}} && {{trans('cvs.inputs.country.description')}}">
                    <i class="fa fa-map-marker"></i> {{display_or_na($user->state)}} - {{display_or_na($user->country)}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="profile-image">
            <img src="{{$user->avatar()}}" class="img-circle circle-border m-b-md" alt="profile">
        </div>
    </div>
</div>