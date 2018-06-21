{{-- start certificates & projects --}}
<div class="row m-t-lg">

	{{--start certificates--}}
	<div class="col-md-6">
		<h2 title="{{trans('cvs.headers.certificates.title')}}">
			{{trans('cvs.headers.certificates.name')}}
			<a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-certificates-modal">
                	<span class="fa fa-plus" aria-hidden="true"/>
                </a>
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

                    <span title="{{trans('certificates.inputs.summary.description')}}"> - {{$certificate->summary}}</span>

                    {{--start delete action--}}
	                {!! Form::open([
                        'method'=>'DELETE',
                        'url' => route('certificates.destroy', ['id' => $certificate->id, 'applicant_id'=> $certificate->applicant_id]),
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs pull-right',
                                'title' => trans('certificates.actions.delete.title'),
                                'onclick'=>'return confirm("Confirm Delete?")'
                        ]) !!}
                    {!! Form::close() !!}
                    {{--start delete action--}}
                    {{--start edit action--}}
	                <a class="btn btn-white btn-xs pull-right m-r-sm" title="" data-toggle="modal" data-target="#user-edit-certificates-modal-{{$certificate->id}}">
	                	<span class="fa fa-pencil" aria-hidden="true"/>
	                </a>
	                {{--end edit action--}}

                </h5>
                {{--start display attachment--}}
            	@if($certificate->attachment())
                <h5>
                	<i class="fa fa-paperclip"></i> 
                    <span>
                        <a href="{{$certificate->attachment()->public_url()}}" target="_blank">
                            {{$certificate->attachment()->file_name}}
                        </a>
                    </span>
                </h5>
                @endif
                {{--end display attachment--}}
				<hr class="hr-line-dashed" />
			</div>
			@endforeach
		@endif
	</div>
	{{--end certificates--}}

	{{--start referees--}}
    <div class="col-md-6">
        <h2 title="{{trans('cvs.headers.referees.title')}}">
            {{trans('cvs.headers.referees.name')}}
            <a class="btn btn-white btn-xs pull-right" title="" data-toggle="modal" data-target="#user-referees-modal">
                    <span class="fa fa-plus" aria-hidden="true"/>
                </a>
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
                
                {{--start delete action--}}
                {!! Form::open([
                        'method'=>'DELETE',
                        'url' => route('referees.destroy', ['id' => $referee->id, 'applicant_id'=> $referee->applicant_id]),
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<span class="fa fa-trash" aria-hidden="true" title=""></span>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs pull-right',
                                'title' => trans('referees.actions.delete.title'),
                                'onclick'=>'return confirm("Confirm Delete?")'
                        ]) !!}
                    {!! Form::close() !!}
                    {{--start delete action--}}
                    {{--start edit action--}}
                    <a class="btn btn-white btn-xs pull-right m-r-sm" title="" data-toggle="modal" data-target="#user-edit-referees-modal-{{$referee->id}}">
                        <span class="fa fa-pencil" aria-hidden="true"/>
                    </a>
                    {{--end edit action--}}
                </h5>
                <hr class="hr-line-dashed" />
            </div>
            @endforeach
        @endif
    </div>
    {{--end referees--}}
	
</div>
{{-- start certificates & projects --}}