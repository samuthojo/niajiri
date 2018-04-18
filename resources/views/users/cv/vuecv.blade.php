@extends('layouts.page')

@section('page')

<div id="vue_candidate_cv">

        <basic class="cv-block"></basic>

        <div class="cv-block cv-composite-block">
            <intern class="inner-left-block"></intern>
            <honor class="inner-right-block"></honor>
        </div>

        <div class="cv-block cv-composite-block">
            <education class="inner-left-block"></education>
            <language class="inner-right-block"></language>
        </div>

        <div class="cv-block cv-composite-block">
            <certificate class="inner-left-block"></certificate>
            <referee class="inner-right-block"></referee>
        </div>

        <div class="cv-block cv-composite-block">
            <skills class="inner-left-block"></skills>
            <extra-curriculum class="inner-right-block"></extra-curriculum>
        </div>

    

</div>

@push('vue_scripts')

<script>
    
    new Vue({
        el: "#vue_candidate_cv"
    });

</script>

@endpush

@endsection