<div>
    <h1>{{ __('Dashboard') }}</h1>

    <div class="card">
        {{ __("You're logged in!") }}
    </div>

    <x-dialog>
        <x-dialog.open>
            <x-button>Open</x-button>
        </x-dialog.open>

        <x-dialog.panel>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur commodi cumque cupiditate dolore est explicabo illum in maxime molestiae molestias pariatur praesentium, quas saepe totam unde veniam vitae voluptatibus?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur commodi cumque cupiditate dolore est explicabo illum in maxime molestiae molestias pariatur praesentium, quas saepe totam unde veniam vitae voluptatibus?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur commodi cumque cupiditate dolore est explicabo illum in maxime molestiae molestias pariatur praesentium, quas saepe totam unde veniam vitae voluptatibus?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur commodi cumque cupiditate dolore est explicabo illum in maxime molestiae molestias pariatur praesentium, quas saepe totam unde veniam vitae voluptatibus?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur commodi cumque cupiditate dolore est explicabo illum in maxime molestiae molestias pariatur praesentium, quas saepe totam unde veniam vitae voluptatibus?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur commodi cumque cupiditate dolore est explicabo illum in maxime molestiae molestias pariatur praesentium, quas saepe totam unde veniam vitae voluptatibus?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur commodi cumque cupiditate dolore est explicabo illum in maxime molestiae molestias pariatur praesentium, quas saepe totam unde veniam vitae voluptatibus?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur commodi cumque cupiditate dolore est explicabo illum in maxime molestiae molestias pariatur praesentium, quas saepe totam unde veniam vitae voluptatibus?</p>
        </x-dialog.panel>

        <x-dialog.footer>
            <x-dialog.close>
                <x-button>Close</x-button>
            </x-dialog.close>
        </x-dialog.footer>
    </x-dialog>

    <select>
        <option value="">Select</option>
        @foreach(App\Enums\Country::cases() as $country)
            <option value="{{ $country->value }}">{{ $country->label() }}</option>
        @endforeach
    </select>

</div>
