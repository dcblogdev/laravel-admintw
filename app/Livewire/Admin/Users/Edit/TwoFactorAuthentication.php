<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users\Edit;

use App\Models\User;
use App\Rules\TwoFactorCodeRule;
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

    public string $secretKey = '';

    public string $inlineUrl = '';

    public string $code = '';

    protected TwoFactorAuth $twoFactorAuth;

    public function boot(TwoFactorAuth $twoFactorAuth): void
    {
        $this->twoFactorAuth = $twoFactorAuth;
    }

    /**
     * @throws TwoFactorAuthException
     */
    public function mount(): void
    {
        $this->secretKey = $this->twoFactorAuth->createSecret();
        $this->inlineUrl = $this->twoFactorAuth->getQRCodeImageAsDataUri(config('app.name'), $this->secretKey);
    }

    public function render(): View
    {
        return view('livewire.admin.users.edit.two-factor-authentication');
    }

    /**
     * @return array<string, array<int, string|TwoFactorCodeRule>>
     */
    protected function rules(): array
    {
        return [
            'code' => [
                'required',
                'min:6',
                new TwoFactorCodeRule($this->twoFactorAuth),
            ],
        ];
    }

    /**
     * @var array<string, string>
     */
    protected array $messages = [
        'code.required' => 'Please enter the code from your authenticator app',
    ];

    /**
     * @throws ValidationException
     */
    public function updated(string $propertyName): void
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
