{{-- start experiences & achievements --}}
<div class="row m-t-lg">

	{{--start experiences--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.experiences.title')}}">
			{{trans('cvs.headers.experiences.name')}}
			<a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-experiences-modal">
                	<span class="fa fa-plus" aria-hidden="true"/>
                </a>
		</h2>
		<hr class="hr-line-solid" />
		@if($user->experiences && $user->experiences->count() > 0)
			@foreach($user->experiences as $experience)
			<div>
				<h3 title="{{trans('experiences.inputs.position.description')}}">
					{{$experience->position}}
		        </h3>
		        <h4 title="{{trans('experiences.inputs.organization.description')}}">
		            {{$experience->organization}}
	            </h4>
		        <h5>
                    <i class="fa fa-calendar-o"></i> 
                    <span title="{{trans('experiences.inputs.started_at.description')}}">
                    	{{display_date($experience->started_at, config('app.datepicker_parse_month_year_format'))}}
                    </span> 
                    to 
                    @if($experience->ended_at)
                    <span title="{{trans('experiences.inputs.ended_at.description')}}">
                    	{{display_date($experience->ended_at, config('app.datepicker_parse_month_year_format'))}}
                    </span>
                    @else
                    <span title="{{trans('experiences.inputs.ended_at.description')}}">Current</span>
                    @endif
                    <span class="m-l-md" title="{{trans('experiences.inputs.location.description')}}">
                    	<i class="fa fa-map-marker"></i>
                    	{{$experience->location}} 
                    </span>
                </h5>
                <h5 title="{{trans('experiences.inputs.summary.description')}}">
                	<span title="{{trans('experiences.inputs.summary.description')}}">
                		{!! $experience->summary !!}
                	</span>
                	 {{--start delete action--}}
	                {!! Form::open([
                        'method'=>'DELETE',
                        'url' => route('experiences.destroy', ['id' => $experience->id, 'applicant_id'=> $experience->applicant_id]),
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs pull-right',
                                'title' => trans('experiences.actions.delete.title'),
                                'onclick'=>'return confirm("Confirm Delete?")'
                        ]) !!}
                    {!! Form::close() !!}
                    {{--start delete action--}}
                    {{--start edit action--}}
	                <a class="btn btn-white btn-xs pull-right m-r-sm" title="" data-toggle="modal" data-target="#user-edit-experiences-modal-{{$experience->id}}">
	                	<span class="fa fa-pencil" aria-hidden="true"/>
	                </a>
	                {{--end edit action--}}
                </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end experiences--}}

	{{--start achievements--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.achievements.title')}}">
			{{trans('cvs.headers.achievements.name')}}
			<a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-achievements-modal">
                	<span class="fa fa-plus" aria-hidden="true"/>
                </a>
		</h2>
		<hr class="hr-line-solid" />
		@if($user->achievements && $user->achievements->count() > 0)
			@foreach($user->achievements as $achievement)
			<div>
				<h3 title="{{trans('achievements.inputs.title.description')}}">
					{{$achievement->title}}
		        </h3>
		        <h4 title="{{trans('achievements.inputs.organization.description')}}">
		            {{$achievement->organization}}
	            </h4>
		        <h5>
                    <i class="fa fa-calendar-o"></i> 
                    <span title="{{trans('achievements.inputs.issued_at.description')}}">
                    	{{display_date($achievement->issued_at, config('app.datepicker_parse_month_year_format'))}}
                    </span> 
                </h5>
                <h5 title="{{trans('achievements.inputs.summary.description')}}">
                	<span title="{{trans('achievements.inputs.summary.description')}}">
                		{!! $achievement->summary !!}
                	</span>

                	{{--start delete action--}}
	                {!! Form::open([
                        'method'=>'DELETE',
                        'url' => route('achievements.destroy', ['id' => $achievement->id, 'applicant_id'=> $achievement->applicant_id]),
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs pull-right',
                                'title' => trans('achievements.actions.delete.title'),
                                'onclick'=>'return confirm("Confirm Delete?")'
                        ]) !!}
                    {!! Form::close() !!}
                    {{--start delete action--}}
                    {{--start edit action--}}
	                <a class="btn btn-white btn-xs pull-right m-r-sm" title="" data-toggle="modal" data-target="#user-edit-achievements-modal-{{$achievement->id}}">
	                	<span class="fa fa-pencil" aria-hidden="true"/>
	                </a>
	                {{--end edit action--}}
                </h5>
                {{--start display attachment--}}
            	@if($achievement->attachment())
                <h5>
                	<i class="fa fa-paperclip"></i> 
                    <span>
                        <a href="{{$achievement->attachment()->public_url()}}" target="_blank">
                            {{$achievement->attachment()->file_name}}
                        </a>
                    </span>
                </h5>
                @endif
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end achievements--}}
	
</div>
{{-- start experiences & achievements --}}