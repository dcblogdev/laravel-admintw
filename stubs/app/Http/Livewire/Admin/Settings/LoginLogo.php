<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Settings;

use function add_user_log;
use App\Models\Setting;
use Exception;
use function flash;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use function view;

class LoginLogo extends Component
{
    use WithFileUploads;

    public $loginLogo = '';

    public $existingLoginLogo = '';

    public $loginLogoDark = '';

    public $existingLoginLogoDark = '';

    public function mount(): void
    {
        $this->existingLoginLogo = Setting::where('key', 'loginLogo')->value('value');
        $this->existingLoginLogoDark = Setting::where('key', 'loginLogoDark')->value('value');
    }

    public function render(): View
    {
        return view('livewire.admin.settings.login-logo');
    }

    protected function rules(): array
    {
        return [
            'loginLogo' => 'image|mimes:png,jpg,gif|max:5120',
            'loginLogoDark' => 'image|mimes:png,jpg,gif|max:5120',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * @throws Exception
     */
    public function update(): void
    {
        $this->validate();

        Cache::flush();

        if ($this->loginLogo !== '') {
            $loginLogo = Setting::where('key', 'loginLogo')->value('value');
            if ($loginLogo !== '') {
//                Storage::disk('public')->delete($loginLogo);
            }

            $token = md5(random_int(1, 10).microtime());
            $name = $token.'.png';
            $img = Image::make($this->loginLogo)->encode('png')->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();

            Storage::disk('public')->put('logo/'.$name, $img);
            Setting::updateOrCreate(['key' => 'loginLogo'], ['value' => 'logo/'.$name]);
        }

        if ($this->loginLogoDark !== '') {
            $loginLogoDark = Setting::where('key', 'loginLogoDark')->value('value');
            if ($loginLogoDark !== '') {
//                Storage::disk('public')->delete($loginLogoDark);
            }

            $token = md5(random_int(1, 10).microtime());
            $name = $token.'.png';
            $img = Image::make($this->loginLogoDark)->encode('png')->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();

            Storage::disk('public')->put('logo/'.$name, $img);
            Setting::updateOrCreate(['key' => 'loginLogoDark'], ['value' => 'logo/'.$name]);
        }

        add_user_log([
            'title' => 'updated login logo',
            'link' => route('admin.settings'),
            'reference_id' => auth()->id(),
            'section' => 'Settings',
            'type' => 'Update',
        ]);

        flash('Application Logo Updated!')->success();
    }
}
