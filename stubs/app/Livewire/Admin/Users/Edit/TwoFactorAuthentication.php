<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users\Edit;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use RobThree\Auth\TwoFactorAuth;
use RobThree\Auth\TwoFactorAuthException;

use function add_user_log;
use function config;
use function flash;
use function view;

class TwoFactorAuthentication extends Component
{
    public User $user;

    public $secretKey = '';

    public $inlineUrl = '';

    public $code = '';

    /**
     * @throws TwoFactorAuthException
     */
    public function mount(): void
    {
        $tfa = new TwoFactorAuth();
        $this->secretKey = $tfa->createSecret();
        $this->inlineUrl = $tfa->getQRCodeImageAsDataUri(config('app.name'), $this->secretKey);
    }

    public function render(): View
    {
        return view('livewire.admin.users.edit.two-factor-authentication');
    }

    protected function rules(): array
    {
        return [
            'code' => [
                'required', 'min:6', function ($attribute, $value, $fail) {
                    $tfa = new TwoFactorAuth();
                    $valid = $tfa->verifyCode($this->secretKey, $this->code);

                    if ($valid === false) {
                        $fail('Code is invalid please scan the barcode again and enter the code.');
                    }
                },
            ],
        ];
    }

    protected array $messages = [
        'code.required' => 'Please enter the code from your authenticator app',
    ];

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function update(): void
    {
        $this->validate();

        $this->user->two_fa_active = true;
        $this->user->two_fa_secret_key = $this->secretKey;
        $this->user->save();

        add_user_log([
            'title' => 'turned on '.$this->user->name."'s 2FA",
            'reference_id' => $this->user->id,
            'link' => route('admin.users.edit', ['user' => $this->user->id]),
            'section' => 'Users',
            'type' => 'Update',
        ]);

        flash('Success, next time you login you will be asked for a code from the authenticator admin.')->success();
    }

    public function remove(): void
    {
        $this->user->two_fa_active = false;
        $this->user->two_fa_secret_key = null;
        $this->user->save();

        add_user_log([
            'title' => 'turned off '.$this->user->name."'s 2FA",
            'reference_id' => $this->user->id,
            'link' => route('admin.users.edit', ['user' => $this->user->id]),
            'section' => 'Users',
            'type' => 'Update',
        ]);

        flash('2FA turned off')->success();
    }
}
