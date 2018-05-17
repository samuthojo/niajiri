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

                  <div class="row m-t-md m-b-md">

                    <div class="col-md-12">
                      <basic class="cv-major-block" :user="{{ $user }}" ref="basic"></basic>
                    </div>

                  </div>

                <div class="row m-t-md m-b-md">

                    <div class="col-md-6">
                      <intern
                        :user="{{ $user }}"
                        :experiences=" {{ $user->experiences }}"></intern>
                    </div>

                    <div class="col-md-6">
                      <honor
                        :user="{{ $user }}"
                        :honors="{{ $honors }}"></honor>
                    </div>

                </div>

                <div class="row m-t-md m-b-md">

                    <div class="col-md-6">
                      <education
                        :user="{{ $user }}"
                        :educations="{{ $educations }}"
                        :institutions= "{{ config('education.institutions') }}"
                        :qualifications="{{ config('education.qualifications') }}"></education>
                    </div>

                    <div class="col-md-6">
                      <language
                        :user="{{ $user }}"
                        :languages="{{ $user->languages }}"></language>
                    </div>

                </div>

                <div class="row m-t-md m-b-md">

                    <div class="col-md-6">
                      <certificate
                        :user="{{ $user }}"
                        :certifications="{{ $certificates }}">
                      </certificate>
                    </div>

                    <div class="col-md-6">
                      <referee
                        :user="{{ $user }}"
                        :referees="{{ $user->referees }}"></referee>
                    </div>

                </div>

                <div class="row m-t-md m-b-md">

                    <div class="col-md-6">
                      <skills
                        :user="{{ $user }}">
                      </skills>
                    </div>

                    <div class="col-md-6">
                      <extra-curriculum
                        :user="{{ $user }}">
                      </extra-curriculum>
                    </div>

                </div>

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
