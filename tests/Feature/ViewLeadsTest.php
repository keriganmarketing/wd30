<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewLeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_their_leads()
    {
        $lead = create('App\Lead');

        $this->get('/leads')
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $lead->name
            ]);
    }

}
