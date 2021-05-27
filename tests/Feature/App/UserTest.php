<?php

namespace Tests\Feature\App;

use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test **/
    public function can_see_edit_page(): void
    {
        $this->authenticate();   

        $response = $this->get(route('app.users.edit'));
        $response->assertStatus(200);
    }

    /** @test **/
    public function is_redirected_when_not_authenticated(): void
    {
        $response = $this->get(route('app.users.edit'));
        $response->assertStatus(302);
    }
}