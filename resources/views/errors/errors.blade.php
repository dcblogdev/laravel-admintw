@if (isset($errors))
    @if (count($errors) > 0)
        <x-alert variant="red">
            @foreach ($errors->all() as $error)
                {{ $error }}</br>
            @endforeach
        </x-alert>
    @endif
@endif
