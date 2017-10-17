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

	</div>
	{{--end skills_hobbies_interests--}}

	<div class="col-md-6">&nbsp;</div>
	
</div>
{{-- start skills, hobbies & interest --}}