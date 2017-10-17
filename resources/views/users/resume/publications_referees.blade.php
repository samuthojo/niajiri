{{-- start publications & referees --}}
<div class="row m-t-lg">

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

	{{--start referees--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.referees.title')}}">
			{{trans('cvs.headers.referees.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->referees && $user->referees->count() > 0)
			@foreach($user->referees as $referee)
			<div>
				<h3 title="{{trans('referees.inputs.name.description')}}">
					{{$referee->name}}
		        </h3>
		        <h4 title="{{trans('referees.inputs.title.description')}}">
		            {{$referee->title}} at <span title="{{trans('referees.inputs.organization.description')}}">{{$referee->organization}}</span>
	            </h4>
	            <h5>
	            @if($referee->mobile)
	            <span title="{{trans('referees.inputs.mobile.description')}}">
	            	<i class="fa fa-phone"></i> 
                    {{display_or_na($referee->mobile)}}
                </span>
	            @endif
	            @if($referee->email)
	            <span class="m-l-sm" title="{{trans('referees.inputs.email.description')}}">
	            	<i class="fa fa-envelope-o"></i> 
                    <a href="mailto:{{$referee->email}}" target="_top">
                    {{display_or_na($referee->email)}}
                    </a>
	            </span>
	            @endif
	            </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end referees--}}
	
</div>
{{-- start publications & referees --}}