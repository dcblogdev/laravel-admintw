<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users;

use App\Mail\Users\SendInviteMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithPagination;

class Invite extends Component
{
    use WithPagination;

    public $name = '';

    public $email = '';

    public $rolesSelected = [];

    protected array $rules = [
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users,email',
        'rolesSelected' => 'required|min:1',
    ];

    protected array $messages = [
        'name.required' => 'Name is required',
        'email.required' => 'Email is required',
        'rolesSelected.required' => 'A role is required',
    ];

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function render(): View
    {
        $roles = Role::orderby('name')->get();

        return view('livewire.admin.users.invite', compact('roles'));
    }

    public function store(): void
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'email' => $this->email,
            'is_active' => 0,
            'is_office_login_only' => 0,
            'invite_token' => Str::random(32),
            'invited_by' => auth()->id(),
            'invited_at' => now(),
        ]);

        //generate image
        $name = get_initials($user->name);
        $id = $user->id.'.png';
        $path = 'users/';
        $imagePath = create_avatar($name, $id, $path);

        //save image
        $user->image = $imagePath;
        $user->save();

        foreach ($this->rolesSelected as $role) {
            $user->assignRole($role);
        }

        Mail::send(new SendInviteMail($user));

        add_user_log([
            'title' => 'invited '.$user->name,
            'reference_id' => $user->id,
            'section' => 'Auth',
            'type' => 'Join',
        ]);

        flash('User invited')->success();

        $this->dispatch('refreshUsers');
    }

    public function cancel(): void
    {
        $this->reset();
        $this->dispatch('close-modal');
    }
}
