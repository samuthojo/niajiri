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
		&nbsp;
	</div>
	{{--end referees--}}
	
</div>
{{-- start skills, hobbies & interest --}}