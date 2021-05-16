<?php

declare(strict_types=1);

namespace App\Http\Livewire\Users;

use Illuminate\Contracts\View\View;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;
use App\Models\User;

class EditProfile extends Component
{
    public User   $user;
    public string $name  = '';
    public string $email = '';
    public bool $updated = false;

    public function mount(): void
    {
        $this->name  = $this->user->name;
        $this->email = $this->user->email;

        $this->updated = false;
    }

    public function render(): View
    {
        return view('livewire.users.edit-profile');
    }

    #[ArrayShape(['name' => "string", 'email' => "string"])]
    protected function rules(): array
    {
        return [
            'name'  => 'required|string',
            'email' => 'required|email'
        ];
    }

    protected array $messages = [
        'name.required'  => 'Name is required',
        'email.required' => 'Email is required',
    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function update(): void
    {
        $this->validate();

        $this->user->name  = $this->name;
        $this->user->email = $this->email;
        $this->user->save();

        $this->updated = true;
    }
}
