<?php

declare(strict_types=1);

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;

class ChangePassword extends Component
{
    public User   $user;
    public string $newPassword     = '';
    public string $confirmPassword = '';

    public function render(): View
    {
        return view('livewire.change-password');
    }

    #[ArrayShape([
        'newPassword' => "array",
        'confirmPassword' => "string"
    ])]
    protected function rules(): array
    {
        return [
            'newPassword'     => [
                'required',
                Password::min(8)->mixedCase()->letters()->numbers()->uncompromised()
            ],
            'confirmPassword' => 'required|same:newPassword'
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function update(): void
    {
        $this->validate();

        $this->user->password = Hash::make($this->newPassword);
        $this->user->save();

        session()->flash('success', 'Password Changes');
    }
}
