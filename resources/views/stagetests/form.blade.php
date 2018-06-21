{{-- start stagetest form --}}

{{--start applicant id--}}
<input type="hidden" name="applicant_id" value="{{$applicant_id}}">
{{--end applicant id--}}

{{--start application id--}}
<input type="hidden" name="application_id" value="{{$application_id}}">
{{--end application id--}}

{{--start position id--}}
<input type="hidden" name="position_id" value="{{$position_id}}">
{{--end position id--}}

{{--start stage id--}}
<input type="hidden" name="stage_id" value="{{$stage_id}}">
{{--end stage id--}}

{{--start test id--}}
<input type="hidden" name="test_id" value="{{$test->id}}">
{{--end test id--}}

{{--start applicationstage id--}}
<input type="hidden" name="applicationstage_id" value="{{$applicationstage_id}}">
{{--end applicationstage id--}}

{{-- start questions --}}
@foreach($questions->shuffle() as $key => $question)
<div class="col-md-offset-1 col-md-10 m-b-md">
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
    </div>
</div>
@endforeach
{{-- end questions --}}

{{-- end stagetest form --}}