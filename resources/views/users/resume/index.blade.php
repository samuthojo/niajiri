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
              <div class="row">
                  <div class="col-md-2">
                    <div class="profile-image">
                        <img src="{{$user->avatar()}}" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                  </div>
                  <div class="col-md-10">
                      <h2 class="no-margins">
                          {{$user->fullName()}}
                      </h2>
                      <h2>Age: {{$user->age()}}</h2>
                      <h2>{{$user->gender}}</h2>
                  </div>
              </div>
              <div class="panel blank-panel">
                <div class="panel-heading">
                    <div class="tabpanel panel-options">
                        <ul class="nav nav-tabs" role="tablist" >
                           <li role="presentation" class="active">
                               <a href="#tab-1" aria-controls="#tab-1" role="tab" data-toggle="tab">Summary</a>
                           </li>
                           <li role="presentation">
                               <a href="#tab-2" aria-controls="#tab-2" role="tab" data-toggle="tab">Education Background</a>
                           </li>
                           <li role="presentation">
                               <a href="#tab-3" aria-controls="#tab-3" role="tab" data-toggle="tab">Work Experience</a>
                           </li>
                           <li role="presentation">
                               <a href="#tab-4" aria-controls="#tab-4" role="tab" data-toggle="tab">Honors</a>
                           </li>
                           <li role="presentation">
                               <a href="#tab-5" aria-controls="#tab-5" role="tab" data-toggle="tab">Stage Summary</a>
                           </li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">

                <div class="tab-content">
                  {{-- start summary --}}
                  @include('users.resume.summary')
                  {{-- end summary --}}

                  {{-- start experiences_achievements --}}
                  @include('users.resume.experiences_achievements')
                  {{-- end experiences_achievements --}}

                  {{-- start educations_languages --}}
                  @include('users.resume.educations_languages')
                  {{-- end educations_languages --}}

                  {{-- start certificates_publications --}}
                  @include('users.resume.certificates_publications')
                  {{-- end certificates_publications --}}
                </div>
              </div>

            </div>

        </div>
        {{-- end page box content --}}

        </div>
        {{-- end page box --}}

        {{-- close resume --}}

    </div>
</div>
{{-- end page content --}}

@endsection
