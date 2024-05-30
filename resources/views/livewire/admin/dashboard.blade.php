<div>
    <h1>{{ __('Dashboard') }}</h1>

    <div class="card">
        {{ __("You're logged in!") }}
    </div>

    <x-form.radio name="want" id="yes" label="Yes" />
    <x-form.radio name="want" id="no" label="No" />
    <x-form.checkbox name="hey" id="jey" label="Hey" />
    <x-form.checkbox name="cool" id="cool" label="Cool" />

</div>
