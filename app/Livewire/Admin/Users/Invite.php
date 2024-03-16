<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users;

use App\Mail\Users\SendInviteMail;
use App\Models\Role;
use App\Models\TenantUser;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithPagination;

class Invite extends Component
{
    use withPagination;

    public string $name = '';

    public string $email = '';

    /**
     * @var array<int>
     */
    public array $rolesSelected = [];

    /**
     * @var array<string, array<int, string>>
     */
    protected array $rules = [
        'name' => [
            'required',
            'string',
        ],
        'email' => [
            'required',
            'string',
            'email',
            'unique:users,email',
        ],
        'rolesSelected' => [
            'required',
            'min:1',
        ],
    ];

    /**
     * @var array<string, string>
     */
    protected array $messages = [
        'name.required' => 'Name is required',
        'email.required' => 'Email is required',
        'rolesSelected.required' => 'A role is required',
    ];

    /**
     * @throws ValidationException
     */
    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function render(): View
    {
        $roles = Role::where('tenant_id', auth()->user()->tenant_id)->orderby('name')->get();

        return view('livewire.admin.users.invite', compact('roles'));
    }

    public function store(): void
    {
        $this->validate();

        $tenantId = auth()->user()->tenant_id;

        $user = User::create([
            'tenant_id' => $tenantId,
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

        TenantUser::create([
            'tenant_id' => $tenantId,
            'user_id' => $user->id,
        ]);

        setPermissionsTeamId($tenantId);

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
        $this->dispatch('close-modal');
    }

    public function cancel(): void
    {
        $this->reset();
        $this->dispatch('close-modal');
    }
}
