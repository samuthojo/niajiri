{{-- start breadcrumbs --}}
@if (count($breadcrumbs))

    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li>
	                <a href="{{ $breadcrumb->url }}" title="{{ $breadcrumb->title }}">
	                	{{ $breadcrumb->title }}
	                </a>
                </li>
            @else
                <li class="active" title="{{ $breadcrumb->title }}">
	                {{ $breadcrumb->title }}
                </li>
            @endif

        @endforeach
    </ol>

@endif
{{-- end breadcrumbs --}}
