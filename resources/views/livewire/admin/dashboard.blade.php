<div>
    <h1>{{ __('Dashboard') }}</h1>

    <div class="card">
        {{ __("You're logged in!") }}
    </div>

    <select>
        <option value="">Select</option>
        @foreach(App\Enums\Country::cases() as $country)
            <option value="{{ $country->value }}">{{ $country->label() }}</option>
        @endforeach
    </select>

</div>
