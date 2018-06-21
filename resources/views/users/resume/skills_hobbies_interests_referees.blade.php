{{-- start skills, hobbies & interest --}}
<div class="row m-t-lg">

	{{--start skills_hobbies_interests--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.skills_hobbies_interests.title')}}">
			{{trans('cvs.headers.skills_hobbies_interests.name')}}
		</h2>
		<hr class="hr-line-solid" />
		
		@if($user->skills)
		<div>
			<h3 title="{{trans('cvs.inputs.skills.description')}}">
				{{trans('cvs.inputs.skills.label')}}
	        </h3>
	        <h5 title="{{trans('cvs.inputs.skills.description')}}">
	            {{$user->skills}}
            </h5>
			<hr class="hr-line-dashed" />
		</div>
		@endif

		@if($user->hobbies)
		<div>
			<h3 title="{{trans('cvs.inputs.hobbies.description')}}">
				{{trans('cvs.inputs.hobbies.label')}}
	        </h3>
	        <h5 title="{{trans('cvs.inputs.hobbies.description')}}">
	            {{$user->hobbies}}
            </h5>
			<hr class="hr-line-dashed" />
		</div>
		@endif

		@if($user->interests)
		<div>
			<h3 title="{{trans('cvs.inputs.interests.description')}}">
				{{trans('cvs.inputs.interests.label')}}
	        </h3>
	        <h5 title="{{trans('cvs.inputs.interests.description')}}">
	            {{$user->interests}}
            </h5>
			<hr class="hr-line-dashed" />
		</div>
		@endif

		@if($user->extracurricular_activities)
		<div>
			<h3 title="{{trans('cvs.inputs.extracurricular_activities.description')}}">
				{{trans('cvs.inputs.extracurricular_activities.label')}}
	        </h3>
	        <h5 title="{{trans('cvs.inputs.extracurricular_activities.description')}}">
	            {{$user->extracurricular_activities}}
            </h5>
			<hr class="hr-line-dashed" />
		</div>
		@endif

	</div>
	{{--end skills_hobbies_interests--}}

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
{{-- start skills, hobbies & interest --}}