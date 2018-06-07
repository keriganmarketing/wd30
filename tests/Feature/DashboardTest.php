<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_see_the_dashboard()
    {
        $user = factory('App\User')->create();
        factory('App\Content')->create();

        $this->actingAs($user);

        $this->get('/home')
            ->assertStatus(200);
    }

    /** @test */
    public function an_unauthenticated_user_cannnot_see_the_dashboard()
    {
        $user = factory('App\User')->create();

        $this->get('/home')
            ->assertStatus(302);
    }
}
