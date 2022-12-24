<div>
    <x-2col>
        <x-slot name="left">
            <h3>Change Password</h3>
            <p>Ensure your account is using a long, random password to stay secure.</p>
            <p>Use a password manager, we recommend using 1Password for creating and storing passwords or <a href="https://1password.com/password-generator/" target="blank">1password.com/password-generator</a></p>
        </x-slot>
        <x-slot name="right">

            <div class="card">
                <x-form wire:submit.prevent="update" method="put">

                    <x-form.input wire:model="newPassword" type="password" label='New Password' name='newPassword'></x-form.input>
                    <x-form.input wire:model="confirmPassword" type="password" label='Confirm Password' name='confirmPassword'></x-form.input>

                    <x-button>Change Password</x-button>

                    @include('errors.messages')

                </x-form>
            </div>

        </x-slot>
    </x-2col>
</div>