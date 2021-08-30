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
                    <x-form.input wire:model="name" label='Name' name='name' required />
                </div>

                <div>
                    <x-form.input wire:model="email" label='Email' name='email' required />
                </div>

            </div>

            @include('errors.success')

            <button class="btn btn-blue" wire:click="update">Update Profile</button>

        </x-form>

    </div>
</div>