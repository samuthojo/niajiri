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

            {{-- start certificates_referees --}}
            @include('users.cv.certificates_referees')
            {{-- end certificates_referees --}}

            {{-- start skills_hobbies_interests --}}
            @include('users.cv.skills_hobbies_interests')
            {{-- end skills_hobbies_interests --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {{-- close cv --}}

    </div>
</div>
{{-- end page content --}}

{{-- start cv builder js --}}
@push('scripts')
<script type="text/javascript">
var inputInstitution = {};
var inputOtherInstitution = {};
</script>
@endpush
{{-- end cv builder js --}}

{{-- start include modals--}}
@include('users.cv.blocks.creates.experience_modal')
@include('users.cv.blocks.creates.achievement_modal')
@include('users.cv.blocks.creates.education_modal', ['education' => new App\Models\Education()])
@include('users.cv.blocks.creates.language_modal')
@include('users.cv.blocks.creates.certificate_modal')
@include('users.cv.blocks.creates.publication_modal')
@include('users.cv.blocks.creates.referee_modal')
@include('users.cv.blocks.edits.basic_modal')
@include('users.cv.blocks.edits.skills_modal')
@include('users.cv.blocks.edits.hobbies_modal')
@include('users.cv.blocks.edits.interests_modal')
@include('users.cv.blocks.edits.extra_curriculars_modal')
@foreach($user->referees as $referee)
@include('users.cv.blocks.edits.referee_modal', ['referee' => $referee])
@endforeach
@foreach($user->publications as $publication)
@include('users.cv.blocks.edits.publication_modal', ['publication' => $publication])
@endforeach
@foreach($user->certificates as $certificate)
@include('users.cv.blocks.edits.certificate_modal', ['certificate' => $certificate])
@endforeach
@foreach($user->languages as $language)
@include('users.cv.blocks.edits.language_modal', ['language' => $language])
@endforeach
@foreach($user->educations as $education)
@include('users.cv.blocks.edits.education_modal', ['education' => $education])
@endforeach
@foreach($user->achievements as $achievement)
@include('users.cv.blocks.edits.achievement_modal', ['achievement' => $achievement])
@endforeach
@foreach($user->experiences as $experience)
@include('users.cv.blocks.edits.experience_modal', ['experience' => $experience])
@endforeach
{{-- end include modals--}}

@endsection