{{-- start experiences & achievements --}}
<div role="tabpanel" class="tab-pane row m-b-lg m-t-lg"  id="tab-4">
  {{--start achievements--}}
  <div class="col-md-12">
    <h2 title="{{trans('cvs.headers.achievements.title')}}">
      {{trans('cvs.headers.achievements.name')}}
    </h2>
    <hr class="hr-line-solid" />
    @if($user->achievements && $user->achievements->count() > 0)
      @foreach($user->achievements as $achievement)
      <div>
        <h3 title="{{trans('achievements.inputs.title.description')}}">
          {{$achievement->title}}
            </h3>
            <h4 title="{{trans('achievements.inputs.organization.description')}}">
                {{$achievement->organization}}
              </h4>
            <h5>
                    <i class="fa fa-calendar-o"></i>
                    <span title="{{trans('achievements.inputs.issued_at.description')}}">
                      {{display_date($achievement->issued_at, config('app.datepicker_parse_month_year_format'))}}
                    </span>
                </h5>
                <h5 title="{{trans('achievements.inputs.summary.description')}}">
                  Brief Summary
                  <br/>
                  <h6 title="{{trans('achievements.inputs.summary.description')}}">
                    {!! $achievement->summary !!}
                  </h6>
                </h5>
        <hr class="hr-line-dashed" />
      </div>
      @endforeach
      @else
      <div>
        <h3>{{ trans('achievements.empty_state.resume') }}</h3>
      </div>
    @endif
  </div>
  {{--end achievements--}}
</div>
