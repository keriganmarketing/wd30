<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateLeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_lead_can_be_created()
    {
        $lead = make('App\Lead');
        $attributes = $lead->toArray();

        $this->post('/leads', $attributes)
            ->assertSuccessful();

        $this->assertDatabaseHas('leads', $attributes);
    }
}
