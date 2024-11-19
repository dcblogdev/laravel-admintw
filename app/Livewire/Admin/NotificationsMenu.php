<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Models\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class NotificationsMenu extends Component
{
    /**
     * @var Collection<int, Notification>
     */
    public Collection $notifications;

    public int $unseenCount = 0;

    public function mount(): void
    {
        $this->notifications = Notification::where('assigned_to_user_id', auth()->id())->take(20)->get();
        $this->unseenCount = Notification::where('assigned_to_user_id', auth()->id())->where('viewed', 0)->count();
    }

    public function render(): View
    {
        return view('livewire.admin.notifications-menu');
    }

    public function open(): void
    {
        Notification::where('assigned_to_user_id', auth()->id())
            ->where('viewed', 0)
            ->update([
                'viewed' => 1,
                'viewed_at' => now(),
            ]);
    }
}
