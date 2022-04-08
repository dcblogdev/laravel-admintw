<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Base;
use App\Models\Notification;
use Illuminate\Contracts\View\View;

use function auth;
use function now;
use function view;

class NotificationsMenu extends Base
{
    public $notifications;
    public $unseenCount = 0;

    public function mount(): void
    {
        parent::mount();

        $this->notifications = Notification::where('assigned_to_user_id', auth()->id())->take(20)->get();
        $this->unseenCount   = Notification::where('assigned_to_user_id', auth()->id())->where('viewed', 0)->count();
    }

    public function render(): View
    {
        return view('livewire.admin.notifications-menu');
    }

    public function open(): void
    {
        Notification::where('assigned_to_user_id', auth()->id())->where('viewed', 0)->update([
            'viewed'    => 1,
            'viewed_at' => now()
        ]);
    }
}
