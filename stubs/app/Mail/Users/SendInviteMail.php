<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class SendInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build(): SendInviteMail
    {
        return $this->to($this->user->email)
            ->subject('Invitation to '.config('app.name'))
            ->markdown('mail.users.invite');
    }
}
