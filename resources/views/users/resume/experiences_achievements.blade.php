{{-- start experiences & achievements --}}
<div role="tabpanel" class="tab-pane row m-b-lg m-t-lg"  id="tab-3">

	{{--start experiences--}}
	<div class="col-md-12">
		<h2 title="{{trans('cvs.headers.experiences.title')}}">
			{{trans('cvs.headers.experiences.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->experiences && $user->experiences->count() > 0)
			@foreach($user->experiences as $experience)
			<div>
				<h3 title="{{trans('experiences.inputs.position.description')}}">
					{{$experience->position}}
		        </h3>
		        <h4 title="{{trans('experiences.inputs.organization.description')}}">
		            {{$experience->organization}}
	            </h4>
		        <h5>
                    <i class="fa fa-calendar-o"></i>
                    <span title="{{trans('experiences.inputs.started_at.description')}}">
                    	{{display_date($experience->started_at, config('app.datepicker_parse_month_year_format'))}}
                    </span>
                    to
                    @if($experience->ended_at)
                    <span title="{{trans('experiences.inputs.ended_at.description')}}">
                    	{{display_date($experience->ended_at, config('app.datepicker_parse_month_year_format'))}}
                    </span>
                    @else
                    <span title="{{trans('experiences.inputs.ended_at.description')}}">Current</span>
                    @endif
                    <span class="m-l-md" title="{{trans('experiences.inputs.location.description')}}">
                    	<i class="fa fa-map-marker"></i>
                    	{{$experience->location}}
                    </span>
                </h5>
                <h5 title="{{trans('experiences.inputs.summary.description')}}">
                	Work Summary
                	<br/>
                	<h6 title="{{trans('experiences.inputs.summary.description')}}">
                		{!! $experience->summary !!}
                	</h6>
                </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end experiences--}}

</div>
{{-- start experiences & achievements --}}
