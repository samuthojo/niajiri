{{-- start educations & languages --}}
<div class="row m-t-lg">

	{{--start educations--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.educations.title')}}">
			{{trans('cvs.headers.educations.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->educations && $user->educations->count() > 0)
			@foreach($user->educations as $education)
			<div>
				<h3>
					{{$education->summary}}
		        </h3>
		        <h4>
		            {{$education->institution}}
		            <span class="pull-right">Remark</span>
	            </h4>
		        <h5>
                    <i class="fa fa-calendar-o"></i> 
                    <span title="{{trans('educations.inputs.started_at.description')}}">
                    	{{$education->started_at->format(config('app.date_format'))}}
                    </span> 
                    to 
                    @if($education->finished_at)
                    <span title="{{trans('educations.inputs.finished_at.description')}}">
                    	{{$education->finished_at->format(config('app.date_format'))}}
                    </span>
                    @else
                    <span>Current</span>
                    @endif
                    <span class="pull-right">
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
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.languages.title')}}">
			{{trans('cvs.headers.languages.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->languages && $user->languages->count() > 0)
			@foreach($user->languages as $language)
			<div>
				<h3>
					{{$language->name}}
		        </h3>
		        <h5>
		            {{$language->fluency}}
	            </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end languages--}}
	
</div>
{{-- start educations & languages --}}