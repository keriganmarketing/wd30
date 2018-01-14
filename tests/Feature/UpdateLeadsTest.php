<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateLeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_lead_can_be_sent_to_the_archive()
    {
        $lead = create('App\Lead');

        $this->assertDatabaseHas('leads', [
            'active' => 1
        ]);
        $response = $this->patch('/leads/'. $lead->id, [
            'active' => 0
        ]);

        $response->assertSuccessful();
        $this->assertDatabaseHas('leads', [
            'active' => 0
        ]);
    }

    /** @test */
    public function a_lead_can_be_unarchived()
    {
        $lead = create('App\Lead', [
            'active' => 0
        ]);

        $this->patch('/leads/'. $lead->id, [
            'active' => 1
        ])->assertSuccessful();

        $this->assertDatabaseHas('leads', [
            'id'     => $lead->id,
            'active' => 1
        ]);

    }
}
