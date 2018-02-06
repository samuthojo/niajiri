@extends('layouts.stage_test')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start open stagetest create form --}}
        {!!
            Form::open([
                'route' => 'stagetests.store',
                'class' => 'form-horizontal',
                'files' => true,
                'id' => 'stage-test-form'
            ])
        !!}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">

                {{-- start form --}}
                <div class="row m-t-lg m-b-lg">
                    @include ('stagetests.form')
                </div>
                {{-- end form --}}

                {{-- start bottom actions --}}
                <div class="row m-b-lg">
                    <div class="hr-line-dashed"></div>
                    <div class="col-md-12">
                         {!!
                            Form::button(
                                trans('stagetests.actions.save.name'),
                                [
                                'type' => 'submit',
                                'class' => 'btn btn-primary pull-right',
                                'title' => trans('stagetests.actions.save.title'),
                            ])
                        !!}
                    </div>
                </div>
                {{-- end bottom actions --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {!! Form::close() !!}

        {{-- close stagetest create form --}}

    </div>
</div>
{{-- end page content --}}

{{-- start include stage test timeout modal--}}
@include('stagetests.blocks.timeout_modal')
{{-- end include stage test timeout modal--}}

@endsection

{{-- start test taking js --}}
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        window.oncontextmenu = function () {
            return false;
        }

        $(document).keydown(function (event) {
            if (event.keyCode == 123) {
                return false;
            }
            else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
                return false;
            }
        });

        $(window).bind('beforeunload', function(e) {
          return 'Are you sure you want to leave?';
        });

        //modal form submission handler
        $( "#stage-test-timeout-modal-submit" ).click(function() {
          $( "#stage-test-form" ).submit();
        });

        //config timer
        $("#timer").countdowntimer({
          hours: 0,
          minutes: {{$test->duration ? $test->duration : 30}}, //TODO set test default duration
          seconds: 0,
          size : "lg",
          borderColor: "#ffffff",
          fontColor: "#000000",
          backgroundColor: "#ffffff",
          timeUp: function () {
            //show timeout modal
            $('#stage-test-timeout-modal')
                .modal({backdrop:'static', keyboard:false, show:true});
          }
        });
      });
</script>
@endpush
{{-- end test taking js --}}
