@foreach (session('flash_notification', collect())->toArray() as $message)
    @if($message['level'] === 'danger' || $message['level'] === 'info')
        <div aria-live="assertive" class="alert alert-{{ $message['level'] }}" role="alert">
            {!! $message['message'] !!}
        </div>
    @else
        <div aria-live="assertive" x-data="{ show: true }"
             x-show="show"
             x-transition
             x-init="setTimeout(() => show = false, 2000)"
             class="alert alert-{{ $message['level'] }}"
             role="alert"
        >
            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}

@if (session('message'))
    <div aria-live="assertive">
        {{ session('message') }}
    </div>
@endif

@if (session('success'))
    <div aria-live="assertive" class="alert alert-green">
        {{ session('success') }}
    </div>
@endif

@if (session('status'))
    <div aria-live="assertive" class="alert alert-primary">
        {{ session('status') }}
    </div>
@endif
