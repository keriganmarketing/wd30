<?php

namespace Tests\Feature;

use App\Lead;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateLeadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_lead_can_be_created()
    {
        $lead = [
            'name'              => 'Joe Testerson',
            'phone'             => '850-555-5555',
            'email'             => 'daron@kerigan.com',
            'message'           => 'Message contents',
            'listing'           => 'B2345',
            'listing_address'   => '123 Example Street Lynn Haven, FL',
            'listing_latitude'  => '88.88888',
            'listing_longitude' => '99.0000',
            'agent'             => 'Daron Adkins',
            'agent_email'       => 'daron@daron.com',
            'agent_phone'       => '4237436771',
        ];
        $this->post('/leads', $lead);
        $this->assertDatabaseHas('leads', $lead);
    }
}
