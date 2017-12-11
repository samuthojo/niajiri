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
                        <div class="btn-group">
                            <a href="" class="btn btn-sm btn-white" role="button" title="{{ trans('questions.actions.create.title') }}">
                            <i class="fa fa-plus"></i> {{ trans('questions.actions.create.name') }}</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    	&nbsp;
                    </div>
                </div>
                {{-- end question actions --}}

		        {{--start test questions--}}
		        <div class="m-t-lg">
				@foreach($test->questions as $key => $question)
				<div class="row">
					<div class="col-md-offset-1 col-md-10 m-b-md">
					    <div class="form-group">
					        <label for="{{$question->id}}" title="{{$question->label}}">
					            {{$key+1}}. {{$question->label}}
					        </label>
					        @foreach($question->choices() as $choice)
					        <div class="radio">
					          <label
					            for="{{$choice['id']}}"
					            title="{{$choice['value']}}">
					          {!!
					            Form::radio($choice['name'], $choice['value'], null, ['id' => $choice['id'] ])!!}
					          {{$choice['value']}}
					          </label>
					        </div>
					        @endforeach
					        <label for="{{$question->id}}_correct" title="{{$question->correct}}">
					            {{trans('questions.inputs.correct.label')}}: {{$question->correct}}
					        </label>
					    </div>
					</div>
				</div>
				@endforeach
				</div>
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
{{--end include new question modal--}}

@endsection

@push('scripts')
<script type="text/javascript">
</script>
@endpush
