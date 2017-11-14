{{-- start certificates & projects --}}
<div class="row m-t-lg">

	{{--start certificates--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.certificates.title')}}">
			{{trans('cvs.headers.certificates.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->certificates && $user->certificates->count() > 0)
			@foreach($user->certificates as $certificate)
			<div>
				<h3 title="{{trans('certificates.inputs.title.description')}}">
					{{$certificate->title}}
		        </h3>
		        <h4 title="{{trans('certificates.inputs.institution.description')}}">
		            {{$certificate->institution}}
	            </h4>
		        <h5>
                    <i class="fa fa-calendar-o"></i> 
                    <span title="{{trans('certificates.inputs.started_at.description')}}">
                    	{{display_date($certificate->started_at, config('app.datepicker_parse_month_year_format'))}}
                    </span> 
                    to 
                    @if($certificate->finished_at)
                    <span title="{{trans('certificates.inputs.finished_at.description')}}">
                    	{{display_date($certificate->finished_at, config('app.datepicker_parse_month_year_format'))}}
                    </span>
                    @else
                    <span title="{{trans('certificates.inputs.finished_at.description')}}">Current</span>
                    @endif
                     | 
                    <span title="{{trans('certificates.inputs.expired_at.description')}}">
                    	<i class="fa fa-clock-o"></i> 
                    	{{display_date($certificate->expired_at, config('app.datepicker_parse_month_year_format'))}}
                    </span>
                </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end certificates--}}

	{{--start projects--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.projects.title')}}">
			{{trans('cvs.headers.projects.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->assignments && $user->assignments->count() > 0)
			@foreach($user->assignments as $assignment)
			<div>
				<h3 title="{{trans('assignments.inputs.title.description')}}">
					{{$assignment->title}}
		        </h3>
		        <h4 title="{{trans('assignments.inputs.client.description')}}">
		            {{$assignment->client}}
	            </h4>
		        <h5>
                    <i class="fa fa-calendar-o"></i> 
                    <span title="{{trans('assignments.inputs.started_at.description')}}">
                    	{{display_date($assignment->started_at)}}
                    </span> 
                    to 
                    @if($assignment->finished_at)
                    <span title="{{trans('assignments.inputs.finished_at.description')}}">
                    	{{display_date($assignment->finished_at)}}
                    </span>
                    @else
                    <span title="{{trans('assignments.inputs.finished_at.description')}}">Current</span>
                    @endif
                    <span class="m-l-md" title="{{trans('assignments.inputs.location.description')}}">
                    	<i class="fa fa-map-marker"></i>
                    	{{$assignment->location}} 
                    </span>
                </h5>
                <h5 title="{{trans('assignments.inputs.summary.description')}}">
                	Project Summary
                	<br/>
                	<h6 title="{{trans('assignments.inputs.summary.description')}}">
                		{!! $assignment->summary !!}
                	</h6>
                </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end projects--}}
	
</div>
{{-- start certificates & projects --}}