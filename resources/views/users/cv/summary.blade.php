<div class="row m-b-lg m-t-lg">
    <div class="col-md-9">
        <div class="">
            <div class="">
                <div>
                    <h2 class="no-margins">
                        {{$user->fullName()}}
                        <button class="btn btn-white btn-xs m-l-sm" title="" data-toggle="modal" data-target="#user-edit-basic-modal">
                        <span class="fa fa-pencil" aria-hidden="true"/>
                    </button>
                    </h2>
                    <small>
                        {{display_or_na($user->summary)}}
                        <a class="btn btn-white btn-xs m-l-sm" title="" data-toggle="modal" data-target="#user-edit-basic-modal">
                        <span class="fa fa-pencil" aria-hidden="true"/>
                    </a>
                    </small>
                </div>
            </div>
            <div class="row m-t-md">
                <div class="col-md-6" title="{{trans('cvs.inputs.mobile.description')}}">
                    <i class="fa fa-phone-square"></i> {{display_or_na($user->mobile)}}
                    <a class="btn btn-white btn-xs m-l-sm" title="" data-toggle="modal" data-target="#user-edit-basic-modal">
                        <span class="fa fa-pencil" aria-hidden="true"/></a>
                </div>
                <div class="col-md-6" title="{{trans('cvs.inputs.email.description')}}">
                    <i class="fa fa-envelope"></i> 
                    <a href="mailto:{{$user->email}}" target="_top">
                    {{display_or_na($user->email)}}
                    </a>
                    <a class="btn btn-white btn-xs m-l-sm" title="" data-toggle="modal" data-target="#user-edit-basic-modal">
                        <span class="fa fa-pencil" aria-hidden="true"/>
                    </a>
                </div>
            </div>
            <div class="row m-t-xs">
                <div class="col-md-6" title="{{trans('cvs.inputs.alternative_mobile.description')}}">
                    <i class="fa fa-phone"></i> {{display_or_na($user->alternative_mobile)}}
                    <a class="btn btn-white btn-xs m-l-sm" title="" data-toggle="modal" data-target="#user-edit-basic-modal">
                        <span class="fa fa-pencil" aria-hidden="true"/>
                    </a>
                </div>
                <div class="col-md-6" title="{{trans('cvs.inputs.secondary_email.description')}}">
                    <i class="fa fa-envelope-o"></i> 
                    <a href="mailto:{{$user->secondary_email}}" target="_top">
                    {{display_or_na($user->secondary_email)}}
                    </a>
                    <a class="btn btn-white btn-xs m-l-sm" title="" data-toggle="modal" data-target="#user-edit-basic-modal">
                        <span class="fa fa-pencil" aria-hidden="true"/>
                    </a>
                </div>
            </div>
            <div class="row m-t-xs">
                <div class="col-md-6" title="{{trans('cvs.inputs.state.description')}} & {{trans('cvs.inputs.country.description')}}">
                    <i class="fa fa-map-marker"></i> {{display_or_na($user->state)}} - {{display_or_na($user->country)}}
                    <a class="btn btn-white btn-xs m-l-sm" title="" data-toggle="modal" data-target="#user-edit-basic-modal">
                        <span class="fa fa-pencil" aria-hidden="true"/>
                    </a>
                </div>
                <div class="col-md-6">
                    &nbsp;
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