<?php

namespace Tests\Feature\LivewireComponents\Users;

use App\Http\Livewire\Users\EditProfile;
use Livewire\Livewire;
use Tests\TestCase;

class EditProfileTest extends TestCase
{
    /** @test */
    public function can_see_profile(): void
    {
        $user = $this->authenticate();

        $response = $this->get(route('app.users.edit'));
        $response->assertSeeLivewire('users.edit-profile');
    }

    /** @test **/
    public function can_confirm_profile_fields_are_wired_to_livewire(): void
    {
        $user = $this->authenticate();

        Livewire::actingAs($user)
        ->test(EditProfile::class, ['user' => $user])
        ->assertPropertyWired('name')
        ->assertPropertyWired('email');
    }

    /** @test **/
    public function can_confirm_profile_has_update_method_wired_to_livewire(): void
    {
        $user = $this->authenticate();

        Livewire::actingAs($user)
        ->test(EditProfile::class, ['user' => $user])
        ->assertMethodWired('update');
    }
}