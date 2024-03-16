<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Tenant;
use App\Models\TenantUser;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Application|View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'is_active' => 1,
            'is_office_login_only' => 0,
        ]);

        $tenant = $this->createTenant($user);

        $user->tenant_id = $tenant->id;
        $user->image = $this->generateImage($user);
        $user->save();

        $user->assignRole('admin');

        event(new Registered($user));

        //        add_user_log([
        //            'tenant_id' => $tenant->id,
        //            'title' => 'registered '.$user->name,
        //            'reference_id' => $user->id,
        //            'section' => 'Auth',
        //            'type' => 'Register',
        //        ]);

        $user->sendEmailVerificationNotification();
        flash('Please check your email for a verification link.')->info();

        return redirect()->back();
    }

    public function generateImage(User $user): string
    {
        $name = get_initials($user->name);
        $id = $user->id.'.png';
        $path = 'users/';

        return create_avatar($name, $id, $path);
    }

    public function createTenant(User $user): Tenant
    {
        $tenant = Tenant::create([
            'owner_id' => $user->id,
        ]);

        TenantUser::create([
            'tenant_id' => $tenant->id,
            'user_id' => $user->id,
        ]);

        setPermissionsTeamId($tenant->id);

        Role::create([
            'tenant_id' => $tenant->id,
            'name' => 'admin',
            'label' => 'Admin',
        ]);

        Role::create([
            'tenant_id' => $tenant->id,
            'name' => 'user',
            'label' => 'User',
        ]);

        Setting::create([
            'tenant_id' => $tenant->id,
            'key' => 'app.name',
            'value' => config('app.name'),
        ]);

        return $tenant;
    }
}
