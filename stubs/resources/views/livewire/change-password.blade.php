<div>
    <div class="card">
        <h2 class="mb-5">Change Password</h2>

        <x-form wire:submit.prevent="update" method="put">

            <div class="col2">

                <div>
                    <x-form.input wire:model="newPassword" name="newPassword" type="password" label="New Password"/>
                </div>

                <div>
                    <x-form.input wire:model="confirmPassword" name="confirmPassword" type="password" label="Confirm Password"/>
                </div>

            </div>

            <button class="btn btn-blue">Change Password</button>
        </x-form>

    </div>
</div>
