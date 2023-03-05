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

class ApplicationLogo extends Component
{
    use WithFileUploads;

    public $applicationLogo = '';

    public $existingApplicationLogo = '';

    public $applicationLogoDark = '';

    public $existingApplicationLogoDark = '';

    public function mount(): void
    {
        parent::mount();

        $this->existingApplicationLogo = Setting::where('key', 'applicationLogo')->value('value');
        $this->existingApplicationLogoDark = Setting::where('key', 'applicationLogoDark')->value('value');
    }

    public function render(): View
    {
        return view('livewire.admin.settings.application-logo');
    }

    protected function rules(): array
    {
        return [
            'applicationLogo' => 'image|mimes:png,jpg,gif|max:5120',
            'applicationLogoDark' => 'image|mimes:png,jpg,gif|max:5120',
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

        if ($this->applicationLogo !== '') {
            $applicationLogo = Setting::where('key', 'applicationLogo')->value('value');
            if ($applicationLogo !== null) {
                Storage::disk('public')->delete($applicationLogo);
            }

            $token = md5(random_int(1, 10).microtime());
            $name = $token.'.png';
            $img = Image::make($this->applicationLogo)->encode('png')->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();

            Storage::disk('public')->put('logo/'.$name, $img);
            Setting::updateOrCreate(['key' => 'applicationLogo'], ['value' => 'logo/'.$name]);
        }

        if ($this->applicationLogoDark !== '') {
            $applicationLogoDark = Setting::where('key', 'applicationLogoDark')->value('value');
            if ($applicationLogoDark !== null) {
                Storage::disk('public')->delete($applicationLogoDark);
            }

            $token = md5(random_int(1, 10).microtime());
            $name = $token.'.png';
            $img = Image::make($this->applicationLogoDark)->encode('png')->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();

            Storage::disk('public')->put('logo/'.$name, $img);
            Setting::updateOrCreate(['key' => 'applicationLogoDark'], ['value' => 'logo/'.$name]);
        }

        add_user_log([
            'title' => 'updated Application logo',
            'link' => route('admin.settings'),
            'reference_id' => auth()->id(),
            'section' => 'Settings',
            'type' => 'Update',
        ]);

        flash('Application Logo Updated!')->success();
    }
}
