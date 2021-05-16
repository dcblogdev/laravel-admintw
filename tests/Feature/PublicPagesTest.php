<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    /** @test **/
    public function can_see_home_page(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
