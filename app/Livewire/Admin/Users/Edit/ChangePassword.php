<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users\Edit;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

use function add_user_log;
use function flash;
use function view;

class ChangePassword extends Component
{
    public User $user;

    public string $newPassword = '';

    public string $confirmPassword = '';

    public function render(): View
    {
        return view('livewire.admin.users.edit.change-password');
    }

    /**
     * @return array<string, array<int, Password|string>>
     */
    protected function rules(): array
    {
        return [
            'newPassword' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->uncompromised(),
            ],
            'confirmPassword' => [
                'required',
                'same:newPassword',
            ],
        ];
    }

    /**
     * @var array<string, string>
     */
    protected array $messages = [
        'newPassword.required' => 'New password is required',
        'newPassword.uncompromised' => 'The given new password has appeared in a data leak by https://haveibeenpwned.com please choose a different new password. ',
        'confirmPassword.required' => 'Confirm password is required',
        'confirmPassword.same' => 'Confirm password and new password must match',
    ];

    /**
     * @throws ValidationException
     */
    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function update(): void
    {
        $this->validate();

        $this->user->password = Hash::make($this->newPassword);
        $this->user->save();

        add_user_log([
            'title' => 'updated '.$this->user->name."'s password",
            'reference_id' => $this->user->id,
            'link' => route('admin.users.edit', ['user' => $this->user->id]),
            'section' => 'Users',
            'type' => 'Update',
        ]);

        $this->reset(['newPassword', 'confirmPassword']);

        flash('Password Updated!')->success();
    }
}
