<div>

    <div class="card">

        <div class="mb-10">
            <div class="float-right">
                <span class="error">*</span>
                <span class="dark:text-gray-200"> = required</span>
            </div>
        </div>

        <x-form wire:submit.prevent="" method="put">

            <div class="col2">

                <div>
                    <x-form.input wire:model="firstName" label='First Name' name='firstName' required></x-form.input>
                    <x-form.input wire:model="lastName" label='Last Name' name='lastName' required></x-form.input>

                </div>

                <div>
                    <x-form.input wire:model="email" label='Email' name='email' required></x-form.input>
                </div>

            </div>

            <button class="btn btn-blue" wire:click="update">Update Profile</button>

        </x-form>

    </div>
</div>