{{-- start educations & languages --}}
<div class="row m-t-lg">

	{{--start educations--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.educations.title')}}">
			{{trans('cvs.headers.educations.name')}}
			<a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-educations-modal">
                	<span class="fa fa-plus" aria-hidden="true"/>
                </a>
		</h2>
		<hr class="hr-line-solid" />
		@if($user->educations && $user->educations->count() > 0)
			@foreach($user->educations as $education)
			<div>
				<h3 title="{{trans('educations.inputs.summary.description')}}">
					{{$education->summary}}
		        </h3>
		        <h4 title="{{trans('educations.inputs.level.description')}}">
		            {{$education->level}}
	            </h4>
		        <h4 title="{{trans('educations.inputs.institution.description')}}">
		            {{$education->institution}}
		            <span title="{{trans('educations.inputs.level.description')}}">{{$education->level}}</span>
		            <span class="pull-right" style="margin-right: 72px;">Remark</span>
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

                    {{--start delete action--}}
                    <span class="pull-right">
	                {!! Form::open([
                        'method'=>'DELETE',
                        'url' => route('educations.destroy', ['id' => $education->id, 'applicant_id'=> $education->applicant_id]),
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs pull-right',
                                'title' => trans('educations.actions.delete.title'),
                                'onclick'=>'return confirm("Confirm Delete?")'
                        ]) !!}
                    {!! Form::close() !!}
                    {{--start delete action--}}
                    {{--start edit action--}}
	                <a class="btn btn-white btn-xs pull-right m-r-sm" title="" data-toggle="modal" data-target="#user-edit-educations-modal-{{$education->id}}">
	                	<span class="fa fa-pencil" aria-hidden="true"/>
	                </a>
	                {{--end edit action--}}
	                </span>
	                <span class="pull-right m-r-md" title="{{trans('educations.inputs.remark.description')}}">
                    	{{display_or_na($education->remark)}}
                    </span>
                </h5>
                {{--start display attachment--}}
            	@if($education->attachment())
                <h5>
                	<i class="fa fa-paperclip"></i> 
                    <span>
                        <a href="{{$education->attachment()->public_url()}}" target="_blank">
                            {{$education->attachment()->file_name}}
                        </a>
                    </span>
                </h5>
                @endif
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
			<a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-languages-modal">
                	<span class="fa fa-plus" aria-hidden="true"/>
                </a>
		</h2>
		<hr class="hr-line-solid" />
		@if($user->languages && $user->languages->count() > 0)
			@foreach($user->languages as $language)
			<div>
				<h3 title="{{trans('languages.inputs.name.description')}}">
					{{$language->name}}
		        </h3>
		        <h5>
			        <span title="{{trans('languages.inputs.write_fluency.description')}}">
			            {{trans('languages.inputs.write_fluency.label')}} - {{$language->write_fluency}}
		            </span> | 
		            <span title="{{trans('languages.inputs.speak_fluency.description')}}">
			            {{trans('languages.inputs.speak_fluency.label')}} - {{$language->speak_fluency}}
		            </span>
		            {{--start delete action--}}
	                {!! Form::open([
                        'method'=>'DELETE',
                        'url' => route('languages.destroy', ['id' => $language->id, 'applicant_id'=> $language->applicant_id]),
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs pull-right',
                                'title' => trans('languages.actions.delete.title'),
                                'onclick'=>'return confirm("Confirm Delete?")'
                        ]) !!}
                    {!! Form::close() !!}
                    {{--start delete action--}}
                    {{--start edit action--}}
	                <a class="btn btn-white btn-xs pull-right m-r-sm" title="" data-toggle="modal" data-target="#user-edit-languages-modal-{{$language->id}}">
	                	<span class="fa fa-pencil" aria-hidden="true"/>
	                </a>
	                {{--end edit action--}}
	            </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end languages--}}
	
</div>
{{-- start educations & languages --}}