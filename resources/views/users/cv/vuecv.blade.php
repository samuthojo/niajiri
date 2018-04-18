@extends('layouts.page')

@section('page')

<div id="vue-candidate-cv" class="container">

    <basic class="cv-block"></basic>

    <div class="cv-block cv-composite-block">
        <intern class="inner-left-block"></intern>
        <honor class="inner-right-block"></honor>
    </div>

    <div class="cv-block cv-composite-block">
        <education 
            :institutions= "{{ config('education.institutions') }}" 
            :qualifications="{{ config('education.qualifications') }}" 
            class="inner-left-block">
        </education>
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
        el: "#vue-candidate-cv"
    });

</script>

@endpush

@endsection