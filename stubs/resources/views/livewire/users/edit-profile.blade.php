<div>

    <x-card>

        <div class="mb-10">
            <div class="float-right">
                <span class="text-red-600">*</span>
                <span class="dark:text-gray-200"> = required</span>
            </div>
        </div>

        <x-alert/>

        <x-form wire:submit.prevent="" method="put">

            <x-row>

                <x-col>
                    <x-form.input wire:model="firstName" label='First Name' name='firstName' required></x-form.input>
                    <x-form.input wire:model="lastName" label='Last Name' name='lastName' required></x-form.input>

                </x-col>

                <x-col>
                    <x-form.input wire:model="email" label='Email' name='email' required></x-form.input>
                </x-col>

            </x-row>

            <x-form.button wire:click="update">Update Profile</x-form.button>

        </x-form>

    </x-card>
</div>