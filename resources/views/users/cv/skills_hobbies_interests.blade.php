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

	</div>
	{{--end skills_hobbies_interests--}}

	{{--start referees--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.extra_curriculum_activities.title')}}">
			{{trans('cvs.headers.extra_curriculum_activities.name')}}
		</h2>
		<hr class="hr-line-solid" />
		{{--start extra curriculars--}}
		<div>
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
	{{--end referees--}}
	
</div>
{{-- start skills, hobbies & interest --}}