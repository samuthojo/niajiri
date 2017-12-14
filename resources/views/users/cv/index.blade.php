@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start cv --}}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">
            
            {{-- start summary --}}
            @include('users.cv.summary')
            {{-- end summary --}}

            {{-- start experiences_achievements --}}
            @include('users.cv.experiences_achievements')
            {{-- end experiences_achievements --}}

            {{-- start educations_languages --}}
            @include('users.cv.educations_languages')
            {{-- end educations_languages --}}

            {{-- start certificates_publications --}}
            @include('users.cv.certificates_publications')
            {{-- end certificates_publications --}}

            {{-- start skills_hobbies_interests_referees --}}
            @include('users.cv.skills_hobbies_interests_referees')
            {{-- end skills_hobbies_interests_referees --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {{-- close cv --}}

    </div>
</div>
{{-- end page content --}}

{{-- start include modals--}}
@include('users.cv.blocks.edits.skills_modal')
@include('users.cv.blocks.edits.hobbies_modal')
@include('users.cv.blocks.edits.interests_modal')
@include('users.cv.blocks.edits.extra_curriculars_modal')
{{-- end include modals--}}

@endsection

{{-- start cv builder js --}}
@push('scripts')
<script type="text/javascript">
</script>
@endpush
{{-- end cv builder js --}}