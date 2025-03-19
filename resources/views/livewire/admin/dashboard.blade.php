<div>
    <h1>{{ __('Dashboard') }}</h1>

    <div class="card">
        {{ __("You're logged in!") }}
    </div>


    <x-2col>
        <x-slot name="left">
            <p class="bg-primary text-white p-1">Left</p>
        </x-slot>
        <x-slot name="right">
            <p class="bg-primary text-white p-1">Right</p>
        </x-slot>
    </x-2col>

</div>
