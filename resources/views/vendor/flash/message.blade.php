@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert
                    alert-{{ $message['level'] }}
                    {{ $message['important'] ? 'alert-important' : '' }}"
                    role="alert"
        >
            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{-- start paint all error --}}
@if($errors->any())
   @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        <button type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true"
        >&times;</button>
            {!! $error !!}
        </div>
  @endforeach
@endif
{{-- end paint all error --}}

{{ session()->forget('flash_notification') }}
