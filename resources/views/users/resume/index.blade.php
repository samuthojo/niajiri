@extends('layouts.page')

@section('page')

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start resume --}}

        {{-- start page box --}}
        <div class="ibox">

            {{-- start page box content --}}
            <div class="ibox-content">
            
            {{-- start summary --}}
            @include('users.resume.summary')
            {{-- end summary --}}

            {{-- start experiences_achievements --}}
            @include('users.resume.experiences_achievements')
            {{-- end experiences_achievements --}}

            {{-- start educations_languages --}}
            @include('users.resume.educations_languages')
            {{-- end educations_languages --}}

            {{-- start certificates_projects --}}
            @include('users.resume.certificates_projects')
            {{-- end certificates_projects --}}

            {{-- start publications_referees --}}
            @include('users.resume.publications_referees')
            {{-- end publications_referees --}}

            </div>
            {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {{-- close resume --}}

    </div>
</div>
{{-- end page content --}}

@endsection
