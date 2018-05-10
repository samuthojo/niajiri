@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start interactive cv --}}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content" id="vue-candidate-cv">

                  <vue-snotify></vue-snotify>

                  <basic class="cv-major-block" :user="{{ $user }}" ref="basic"></basic>

                  <!-- <div class="cv-composite-block">
                      <intern class="inner-left-block"></intern>
                      <honor class="inner-right-block"></honor>
                  </div>

                  <div class="cv-composite-block">
                      <education
                          :institutions= "{{ config('education.institutions') }}"
                          :qualifications="{{ config('education.qualifications') }}"
                          class="inner-left-block">
                      </education>
                      <language class="inner-right-block"></language>
                  </div>

                  <div class="cv-composite-block">
                      <certificate class="inner-left-block"></certificate>
                      <referee class="inner-right-block"></referee>
                  </div>

                  <div class="cv-composite-block">
                      <skills class="inner-left-block"></skills>
                      <extra-curriculum class="inner-right-block"></extra-curriculum>
                  </div> -->

      </div>

    </div>

  </div>

</div>

@push('vue_scripts')

<script>

    new Vue({
        el: "#vue-candidate-cv",
        mounted() {
          if (this.$refs.basic) {
            this.$refs.basic.initDatePicker();
          }
        }
    });

</script>

@endpush

@endsection
