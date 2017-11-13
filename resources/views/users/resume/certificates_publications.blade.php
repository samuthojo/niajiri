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
                    	{{display_date($certificate->started_at)}}
                    </span> 
                    to 
                    @if($certificate->finished_at)
                    <span title="{{trans('certificates.inputs.finished_at.description')}}">
                    	{{display_date($certificate->finished_at)}}
                    </span>
                    @else
                    <span title="{{trans('certificates.inputs.finished_at.description')}}">Current</span>
                    @endif
                     | 
                    <span title="{{trans('certificates.inputs.expired_at.description')}}">
                    	<i class="fa fa-clock-o"></i> 
                    	{{display_date($certificate->expired_at)}}
                    </span>
                </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end certificates--}}

	{{--start publications--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.publications.title')}}">
			{{trans('cvs.headers.publications.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->publications && $user->publications->count() > 0)
			@foreach($user->publications as $publication)
			<div>
				<h3 title="{{trans('publications.inputs.title.description')}}">
					{{$publication->title}}
		        </h3>
		        <h4 title="{{trans('publications.inputs.publisher.description')}}">
		            {{$publication->publisher}}
	            </h4>
		        <h5>
                    <i class="fa fa-calendar-o"></i> 
                    <span title="{{trans('publications.inputs.published_at.description')}}">
                    	{{display_date($publication->published_at)}}
                    </span> 
                </h5>
                <h5 title="{{trans('publications.inputs.summary.description')}}">
                	Publication Summary
                	<br/>
                	<h6 title="{{trans('publications.inputs.summary.description')}}">
                		{!! $publication->summary !!}
                	</h6>
                </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end publications--}}
	
</div>
{{-- start certificates & projects --}}