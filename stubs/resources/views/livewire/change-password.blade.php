<div>
    <x-card>
        <h2 class="mb-5">Change Password</h2>

        <x-form wire:submit.prevent="update" method="put">

            <x-row>

                <x-col>
                    <x-form.input wire:model="newPassword" name="newPassword" type="password" label="New Password"/>
                </x-col>

                <x-col>
                    <x-form.input wire:model="confirmPassword" name="confirmPassword" type="password" label="Confirm Password"/>
                </x-col>

            </x-row>

            <x-alert/>

            <x-form.button>Change Password</x-form.button>
        </x-form>


    </x-card>
</div>
