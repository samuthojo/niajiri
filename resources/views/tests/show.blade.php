@extends('layouts.test_page')

@section('page')

{{-- start test summary --}}
{{-- end test summary --}}

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

       {{-- start page box --}}
        <div class="ibox">

        	{{-- start page box content --}}
	        <div class="ibox-content">
	        	{{-- start question actions --}}
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                    	@permission("create:question")
                        <div class="btn-group">
                            <a class="btn btn-sm btn-white" role="button" title="{{ trans('questions.actions.create.title') }}" data-toggle="modal" data-target="#question-create-modal">
                            <i class="fa fa-plus"></i> {{ trans('questions.actions.create.name') }}</a>
                        </div>
                        @endpermission
                    </div>
                    <div class="col-sm-4">
                    	&nbsp;
                    </div>
                </div>
                {{-- end question actions --}}

		        {{--start test questions--}}
				@foreach($test->questions->sortBy('created_at') as $key => $question)
				<div class="row">
					<div class="col-md-offset-1 col-md-10 m-b-md m-t-md">
					    <div class="form-group">
					        <label class="question-label" for="{{$question->id}}" title="{!! $question->label !!}">
					            {{$key+1}}. {!! $question->label !!}
					        </label>
					        @if($question->attachment())
					        <div class="m-t-sm">
					        	<img class="question-img" src="{{$question->attachment()->public_url()}}" 
					        		title="{!! $question->label !!}">
					        </div>
					        @endif
					        <div class="m-t-md">
						        @foreach($question->choices() as $choice)
						        <div class="radio">
						          <label
						            for="{{$choice['id']}}"
						            title="{!! $choice['value'] !!}">
						          {!!
						            Form::radio($choice['name'], $choice['value'], null, ['id' => $choice['id'] ])!!}
						          {!! $choice['value'] !!}
						          </label>
						        </div>
						        @endforeach
						    </div>
					        <div class="row">
						        <div class="col-md-4">
							        <label for="{{$question->id}}_correct" title="{!! $question->correct !!}">
							            {{trans('questions.inputs.correct.label')}}: {!! $question->correct !!}
							        </label>
							    </div>
							    <div class="col-sm-4 pull-right">
			                        <div class="btn-group">
			                        	@permission('edit:question')
						                 <a class="btn btn-xs btn-primary" role="button" title="{{ trans('questions.actions.update.title') }}" data-toggle="modal" data-target="#question-update-modal-{{$question->id}}">
			                            <i class="fa fa-pencil"></i> {{ trans('questions.actions.update.name') }}
			                        	</a>
			                            @endpermission
								    	@permission("delete:question")
			                            <a href="{{route('questions.destroy', ['id' => $question->id])}}" class="btn btn-xs btn-danger" role="button" title="{{ trans('questions.actions.delete.title') }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="{{ trans('questions.actions.delete.prompt') }}">
			                            <i class="fa fa-trash"></i> {{ trans('questions.actions.delete.name') }}</a>
				                        @endpermission
			                        </div>
						        </label>
							    </div>
							</div>
					    </div>
					</div>
				</div>
				<hr class="hr-line-dashed">
				@endforeach
		        {{--end test questions--}}
	        </div>
           {{-- end page box content --}}

	    </div>
        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

{{-- start include new test modal--}}
@include('tests.blocks.create_modal')
{{-- end include new test modal--}}

{{--start include new question modal--}}
@include('tests.blocks.create_question_modal')
{{--end include new question modal--}}

{{--start include question update modal--}}
@foreach($test->questions as $question)
@include('tests.blocks.update_question_modal', [
		'question' => $question,
		'position' => $position,
		'stage' => $stage,
		'test' => $test
	])
@endforeach
{{--end include question update modal--}}

@endsection

@push('scripts')
<script type="text/javascript">
</script>
@endpush
