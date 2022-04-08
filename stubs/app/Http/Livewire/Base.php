<?php

namespace App\Http\Livewire;

use App\Models\AuditTrail;
use App\Models\Roles\Permission;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Base extends Component
{
    public function mount()
    {
        Paginator::defaultView('vendor/pagination/tailwind');
        Paginator::defaultSimpleView('vendor/pagination/simple-tailwind');

        //if user is logged in
        if (auth()->check()) {
            foreach ($this->getPermissions() as $permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }

            //if user is not active log the user out
            if (!user()->is_active) {
                flash('Your account has been deactivated. You cannot login.')->warning();

                AuditTrail::create([
                    'user_id'      => auth()->id(),
                    'reference_id' => auth()->id(),
                    'title'        => "force logged out account, inactive",
                    'section'      => 'Auth',
                    'type'         => 'Logout'
                ]);

                auth()->logout();

                redirect(route('login'));
            }

            if (session('2fa-login') === true && url()->current() !== url('app/twofa')) {
                redirect('admin/twofa');
            }

            if (session('2fa-setup') === true && url()->current() !== url('app/twofasetup')) {
                redirect('admin/twofasetup');
            }

        } else {
            redirect(route('login'));
        }
    }

    protected function getPermissions(): Collection
    {
        return Permission::with('roles')->get();
    }
}
