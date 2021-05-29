@include('flash::message')

@if (session('message'))
    <x-alert color="blue">
        {{ session('messsage') }}
    </x-alert>
@endif

@if (session('success'))
    <x-alert color="green">
        {{ session('success') }}
    </x-alert>
@endif

@if (session('status'))
    <x-alert color="yellow">
        {{ session('status') }}
    </x-alert>
@endif

@if (isset($errors))
    @if (count($errors) > 0)
        <div class="alert alert-red">
            @foreach ($errors->all() as $error)
                {{ $error }}</br>
            @endforeach
        </div>
    @endif
@endif