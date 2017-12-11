@extends('layouts.test_page')

@section('page')

{{-- start test summary --}}
{{-- end test summary --}}

{{-- start page content --}}
<div class="row">
    <div class="col-md-12">

        {{-- start page box --}}

        {{-- end page box --}}

    </div>
</div>
{{-- end page content --}}

{{-- start include new test modal--}}
@include('tests.blocks.create_modal')
{{-- end include new test modal--}}

{{--start include new question modal--}}
{{--end include new question modal--}}

@endsection

@push('scripts')
<script type="text/javascript">
</script>
@endpush
