{{-- start certificates & projects --}}
<div class="row m-t-lg">

	{{--start certificates--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.certificates.title')}}">
			{{trans('cvs.headers.certificates.name')}}
		</h2>
		<hr class="hr-line-solid" />
		@if($user->certificates && $user->certificates->count() > 0)
			@foreach($user->certificates as $certificate)
			<div>
				<h3 title="{{trans('certificates.inputs.title.description')}}">
					{{$certificate->title}}
		        </h3>
		        <h4 title="{{trans('certificates.inputs.institution.description')}}">
		            {{$certificate->institution}}
	            </h4>
		        <h5>
                    <i class="fa fa-calendar-o"></i> 
                    <span title="{{trans('certificates.inputs.started_at.description')}}">
                    	{{display_date($certificate->started_at, config('app.datepicker_parse_month_year_format'))}}
                    </span> 
                    to 
                    @if($certificate->finished_at)
                    <span title="{{trans('certificates.inputs.finished_at.description')}}">
                    	{{display_date($certificate->finished_at, config('app.datepicker_parse_month_year_format'))}}
                    </span>
                    @else
                    <span title="{{trans('certificates.inputs.finished_at.description')}}">Current</span>
                    @endif
                </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end certificates--}}

	{{--start publications--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.publications.title')}}">
			{{trans('cvs.headers.publications.name')}}
			<a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-publications-modal">
                	<span class="fa fa-plus" aria-hidden="true"/>
                </a>
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
                	
                	<span title="{{trans('publications.inputs.summary.description')}}">
                		{!! $publication->summary !!}
                	</span>
                	
                	{{--start delete action--}}
	                {!! Form::open([
                        'method'=>'DELETE',
                        'url' => route('publications.destroy', ['id' => $publication->id, 'applicant_id'=> $publication->applicant_id]),
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs pull-right',
                                'title' => trans('publications.actions.delete.title'),
                                'onclick'=>'return confirm("Confirm Delete?")'
                        ]) !!}
                    {!! Form::close() !!}
                    {{--start delete action--}}
                    {{--start edit action--}}
	                <a class="btn btn-white btn-xs pull-right m-r-sm" title="" data-toggle="modal" data-target="#user-edit-publications-modal-{{$publication->id}}">
	                	<span class="fa fa-pencil" aria-hidden="true"/>
	                </a>
	                {{--end edit action--}}
                </h5>
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end publications--}}
	
</div>
{{-- start certificates & projects --}}