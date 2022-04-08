<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Base;
use App\Mail\Users\SendInviteMail;
use App\Models\Roles\Role;
use App\Models\Roles\RoleUser;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use function add_user_log;
use function auth;
use function create_avatar;
use function flash;
use function get_initials;
use function now;
use function view;

class Invite extends Base
{
    public $name          = '';
    public $email         = '';
    public $rolesSelected = [];

    protected array $rules = [
        'name'          => 'required|string',
        'email'         => 'required|string|email|unique:users,email',
        'rolesSelected' => 'required|min:1'
    ];

    protected array $messages = [
        'name.required'          => 'Name is required',
        'email.required'         => 'Email is required',
        'rolesSelected.required' => 'A role is required'
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
            'name'                 => $this->name,
            'slug'                 => Str::slug($this->name),
            'email'                => $this->email,
            'is_active'            => 0,
            'is_office_login_only' => 0,
            'invite_token'         => Str::random(32),
            'invited_by'           => auth()->id(),
            'invited_at'           => now(),
        ]);

        //generate image
        $name      = get_initials($user->name);
        $id        = $user->id.'.png';
        $path      = 'users/';
        $imagePath = create_avatar($name, $id, $path);

        //save image
        $user->image = $imagePath;
        $user->save();

        foreach ($this->rolesSelected as $role_id) {
            RoleUser::create([
                'role_id' => $role_id,
                'user_id' => $user->id
            ]);
        }

        Mail::send(new SendInviteMail($user));

        add_user_log([
            'title'        => "invited ".$user->name,
            'reference_id' => $user->id,
            'section'      => 'Auth',
            'type'         => 'Join'
        ]);

        flash('User invited')->success();

        $this->reset();
        $this->emit('refreshUsers');
    }

    public function cancel(): void
    {
        $this->reset();
        $this->dispatchBrowserEvent('close-modal');
    }
}
