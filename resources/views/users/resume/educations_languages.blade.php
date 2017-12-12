{{-- start educations & languages --}}
<div role="tabpanel" class="tab-pane row m-b-lg m-t-lg"  id="tab-2">

	{{--start educations--}}
	<div class="col-md-12">
		<h2 title="{{trans('cvs.headers.educations.title')}}">
			{{trans('cvs.headers.educations.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->educations && $user->educations->count() > 0)
			@foreach($user->educations as $education)
			<div>
				<h3 title="{{trans('educations.inputs.summary.description')}}">
					{{$education->summary}}
		        </h3>
		        <h4 title="{{trans('educations.inputs.institution.description')}}">
		            {{$education->institution}}
		            <span class="pull-right">Remark</span>
	            </h4>
		        <h5>
                    <i class="fa fa-calendar-o"></i>
                    <span title="{{trans('educations.inputs.started_at.description')}}">
                    	{{display_date($education->started_at, config('app.datepicker_parse_month_year_format'))}}
                    </span>
                    to
                    @if($education->finished_at)
                    <span title="{{trans('educations.inputs.finished_at.description')}}">
                    	{{display_date($education->finished_at, config('app.datepicker_parse_month_year_format'))}}
                    </span>
                    @else
                    <span title="{{trans('educations.inputs.finished_at.description')}}">Current</span>
                    @endif
                    <span class="pull-right" title="{{trans('educations.inputs.remark.description')}}">
                    	{{display_or_na($education->remark)}}
                    </span>
                </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end educations--}}

	{{--start languages--}}
	{{--<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.languages.title')}}">
			{{trans('cvs.headers.languages.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->languages && $user->languages->count() > 0)
			@foreach($user->languages as $language)
			<div>
				<h3 title="{{trans('languages.inputs.name.description')}}">
					{{$language->name}}
		        </h3>
		        <h5>
			        <p title="{{trans('languages.inputs.write_fluency.description')}}">
			            {{trans('languages.inputs.write_fluency.label')}} - {{$language->write_fluency}}
		            </p>
		            <p title="{{trans('languages.inputs.speak_fluency.description')}}">
			            {{trans('languages.inputs.speak_fluency.label')}} - {{$language->speak_fluency}}
		            </p>
	            </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>--}}
	{{--end languages--}}

</div>
{{-- start educations & languages --}}
