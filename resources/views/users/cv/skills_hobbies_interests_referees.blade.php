{{-- start skills, hobbies & interest --}}
<div class="row m-t-lg">

	{{--start skills_hobbies_interests--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.skills_hobbies_interests.title')}}">
			{{trans('cvs.headers.skills_hobbies_interests.name')}}
		</h2>
		<hr class="hr-line-solid" />
		
		{{--start skills--}}
		<div>
			<h3 title="{{trans('cvs.inputs.skills.description')}}">
				{{trans('cvs.inputs.skills.label')}}
	        </h3>
	        <h5 title="{{trans('cvs.inputs.skills.description')}}">
	            {{display_or_na($user->skills)}}
                <a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-skills-modal">
                	<span class="fa fa-pencil" aria-hidden="true"/>
                </a>
            </h5>
			<hr class="hr-line-dashed" />
		</div>
		{{--end skills--}}


		{{--start hobbies--}}
		<div>
			<h3 title="{{trans('cvs.inputs.hobbies.description')}}">
				{{trans('cvs.inputs.hobbies.label')}}
	        </h3>
	        <h5 title="{{trans('cvs.inputs.hobbies.description')}}">
	            {{display_or_na($user->hobbies)}}
	            <a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-hobbies-modal">
                	<span class="fa fa-pencil" aria-hidden="true"/>
                </a>
            </h5>
			<hr class="hr-line-dashed" />
		</div>
		{{--end hobbies--}}

		{{--start interests--}}
		<div>
			<h3 title="{{trans('cvs.inputs.interests.description')}}">
				{{trans('cvs.inputs.interests.label')}}
	        </h3>
	        <h5 title="{{trans('cvs.inputs.interests.description')}}">
	            {{display_or_na($user->interests)}}
	             <a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-interests-modal">
                	<span class="fa fa-pencil" aria-hidden="true"/>
                </a>
            </h5>
			<hr class="hr-line-dashed" />
		</div>
		{{--end interests--}}

		{{--start extra curriculars--}}
		<div>
			<h3 title="{{trans('cvs.inputs.extracurricular_activities.description')}}">
				{{trans('cvs.inputs.extracurricular_activities.label')}}
	        </h3>
	        <h5 title="{{trans('cvs.inputs.extracurricular_activities.description')}}">
	            {{display_or_na($user->extracurricular_activities)}}
	             <a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-extracurricular_activities-modal">
                	<span class="fa fa-pencil" aria-hidden="true"/>
                </a>
            </h5>
			<hr class="hr-line-dashed" />
		</div>
		{{--end extra curriculars--}}

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