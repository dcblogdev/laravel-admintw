<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users\Edit;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

use function add_user_log;
use function flash;
use function view;

#[Title('User Profile')]
class Profile extends Component
{
    use WithFileUploads;

    public User $user;

    public string $name = '';

    public string $email = '';

    public $image = '';

    public function mount(): void
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render(): View
    {
        return view('livewire.admin.users.edit.profile');
    }

    protected function rules(): array
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,gif|max:5120',
            'email' => 'required|email',
        ];
    }

    protected array $messages = [
        'name.required' => 'Name is required',
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

        if ($this->image !== '') {
            Storage::disk('public')->delete($this->user->image);

            $token = md5(random_int(1, 10).microtime());
            $name = $token.'.jpg';
            $img = Image::make($this->image)->encode('jpg')->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();

            Storage::disk('public')->put('users/'.$name, $img);

            $this->user->image = 'users/'.$name;
        }

        $this->user->name = $this->name;
        $this->user->slug = Str::slug($this->name);
        $this->user->email = $this->email;
        $this->user->save();

        add_user_log([
            'title' => 'updated '.$this->name."'s profile",
            'reference_id' => $this->user->id,
            'link' => route('admin.users.edit', ['user' => $this->user->id]),
            'section' => 'Users',
            'type' => 'Update',
        ]);

        flash('Profile Updated!')->success();

        $this->dispatch('refreshUserMenu');
    }
}
