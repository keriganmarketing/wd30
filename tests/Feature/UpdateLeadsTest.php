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
        //Given we have a lead
        $lead = create('App\Lead');

        $this->assertDatabaseHas('leads', [
            'active' => 1
        ]);
        //The lead can be sent to the archive
        $response = $this->patch('/leads/'. $lead->id, [
            'active' => 0
        ]);

        $response->assertSuccessful();
        $this->assertDatabaseHas('leads', [
            'active' => 0
        ]);
    }
}
