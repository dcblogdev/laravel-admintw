<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users\Edit;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

use function add_user_log;
use function flash;
use function view;

class AdminSettings extends Component
{
    public User $user;

    public $isOfficeLoginOnly;

    public $isActive;

    public $roleSelections = [];

    protected $listeners = ['refreshAdminSettings' => 'mount'];

    public function mount(): void
    {
        $this->isActive = (bool) $this->user->is_active;
        $this->isOfficeLoginOnly = (bool) $this->user->is_office_login_only;
    }

    public function render(): View
    {
        $users = User::get();

        return view('livewire.admin.users.edit.admin-settings', compact('users'));
    }

    protected function rules(): array
    {
        return [
            'isOfficeLoginOnly' => 'bool',
            'isActive' => 'bool',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function update(): void
    {
        $this->validate();

        if (hasRole('admin')) {
            $this->user->is_office_login_only = (bool) $this->isOfficeLoginOnly;
            $this->user->is_active = (bool) $this->isActive;
            $this->user->save();

            add_user_log([
                'title' => 'updated '.$this->user->name."'s admin settings",
                'reference_id' => $this->user->id,
                'link' => route('admin.users.edit', ['user' => $this->user->id]),
                'section' => 'Users',
                'type' => 'Update',
            ]);
        }

        flash('Settings Updated!')->success();
        $this->dispatch('refreshProfile');
    }
}
