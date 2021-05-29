<?php

namespace Tests\Feature\App;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    /** @test **/
    public function can_see_dashboard_when_authenticated(): void
    {
        $this->authenticate();

        $response = $this->get(route('app'));
        $response->assertStatus(200);
    }

    /** @test **/
    public function is_redirected_when_not_authenticated(): void
    {
        $response = $this->get(route('app'));
        $response->assertStatus(302);
    }
}