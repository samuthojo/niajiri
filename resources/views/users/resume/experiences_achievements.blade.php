{{-- start experiences & achievements --}}
<div class="row m-t-lg">

	{{--start experiences--}}
	<div class="col-md-6">
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
                    	{{display_date($experience->started_at)}}
                    </span> 
                    to 
                    @if($experience->ended_at)
                    <span title="{{trans('experiences.inputs.ended_at.description')}}">
                    	{{display_date($experience->ended_at)}}
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

	{{--start achievements--}}
	<div class="col-md-6">
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
                    	{{display_date($achievement->issued_at)}}
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
		@endif
	</div>
	{{--end achievements--}}
	
</div>
{{-- start experiences & achievements --}}