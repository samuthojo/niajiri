@extends('layouts.page')

@section('page')

<div id="vue_candidate_cv">

    <basic></basic>

</div>

@push('vue_scripts')

<script>
    
    new Vue({
        el: "#vue_candidate_cv"
    });

</script>

@endpush

@endsection