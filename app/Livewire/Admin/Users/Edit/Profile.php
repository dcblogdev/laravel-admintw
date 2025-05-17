<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Users\Edit;

use App\Actions\Images\DeleteImageAction;
use App\Actions\Images\StoreUploadedImageAction;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;

use function add_user_log;
use function flash;
use function view;

class Profile extends Component
{
    use WithFileUploads;

    public User $user;

    public string $name = '';

    public string $email = '';

    public mixed $image = null;

    /**
     * @var array<string>
     */
    protected $listeners = ['refreshProfile' => 'mount'];

    public function mount(): void
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render(): View
    {
        return view('livewire.admin.users.edit.profile');
    }

    /**
     * @throws ValidationException
     */
    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function update(DeleteImageAction $deleteImageAction, StoreUploadedImageAction $storeUploadedImageAction): void
    {
        $validated = $this->validate();

        if (! blank($this->image)) {

            if ($this->user->image !== null) {
                $deleteImageAction($this->user->image);
            }

            $validated['image'] = $storeUploadedImageAction($this->image, 'users', width: 400);
        }

        $this->user->slug = Str::slug($this->name);
        $this->user->update($validated);

        add_user_log([
            'title' => 'updated '.$this->name."'s profile",
            'reference_id' => $this->user->id,
            'link' => route('admin.users.edit', ['user' => $this->user->id]),
            'section' => 'Users',
            'type' => 'Update',
        ]);

        flash('Profile Updated!')->success();

        $this->dispatch('refreshAdminSettings');
    }

    /**
     * @return array<string, array<int, string>>
     */
    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:png,jpg,gif',
                'max:5120',
            ],
            'email' => [
                'required',
                'email',
            ],
        ];
    }
}
