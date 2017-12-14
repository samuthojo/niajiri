<div role="tabpanel"  class="tab-pane active"   id="tab-1">
<div class="row m-b-lg m-t-lg">
    <div class="col-md-12">
        <div class="">
            <div class="">
                <div>
                    <p>
                        {{display_or_na($user->summary)}}
                    </p>
                </div>
            </div>
            <div class="row m-t-md">
              <div class="col-md-6">
                <h3  title="{{trans('cvs.inputs.mobile.description')}}">
                    <span class="font-bold">Phone Number:</span> {{display_or_na($user->mobile)}}
                </h3>
                <h3 title="{{trans('cvs.inputs.email.description')}}">
                    <span class="font-bold">Email:</span>
                    <a href="mailto:{{$user->email}}" target="_top">
                    {{display_or_na($user->email)}}
                    </a>
                </h3>
                <h3 title="{{trans('cvs.inputs.alternative_mobile.description')}}">
                  <span class="font-bold">Altenative Mobile:</span> {{display_or_na($user->alternative_mobile)}}
                </h3>
                <h3 title="{{trans('cvs.inputs.secondary_email.description')}}">
                    <span class="font-bold">Secondary Email:</span>
                    <a href="mailto:{{$user->secondary_email}}" target="_top">
                    {{display_or_na($user->secondary_email)}}
                    </a>
                </h3>
                <h3 title="{{trans('cvs.inputs.state.description')}} & {{trans('cvs.inputs.country.description')}}">
                    <span class="font-bold">Living in:</span> {{display_or_na($user->state)}} - {{display_or_na($user->country)}}
                </h3>
              </div>
              {{-- <div class="col-md-6">
                @if(!empty($application->coverLetter()))
                <div class="m-t-lg">
                      <h3 title="{{trans('cvs.headers.cover_letter.title')}}">
                        {{trans('cvs.headers.cover_letter.name')}}
                      </h3>
                    <div class="m-t-lg">
                        <div class="file-box">
                            <div class="file">
                                <div>
                                    <span class="corner"></span>

                                    <div class="icon">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="file-name">
                                        <a href="{{$application->coverLetter()->public_url()}}" target="_blank">
                                        {{$application->coverLetter()->file_name}}
                                        </a>
                                        <br>
                                        <small>Added: {{$application->coverLetter()->created_at->format(config('app.datetime_format'))}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
              </div> --}}
            </div>
        </div>
    </div>
</div>

{{-- start skills_hobbies_interests_referees --}}
@include('users.resume.skills_hobbies_interests_referees')
{{-- end skills_hobbies_interests_referees --}}
</div>
