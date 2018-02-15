<?php

namespace Tests\Feature;

use App\Lead;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateLeadsTest extends TestCase
{
    use RefreshDatabase;

    protected $activeLead;
    protected $archivedLead;

    public function setUp()
    {
        parent::setUp();

        $this->activeLead   = factory('App\Lead')->create([
            'active' => 1
        ]);

        $this->archivedLead = factory('App\Lead')->create([
            'active' => 0
        ]);
    }

    /** @test */
    public function a_lead_can_be_sent_to_the_archive()
    {
        $this->patch($this->activeLead->path(), [
            'active' => 0
        ])->assertSuccessful();

        $lead = Lead::find($this->activeLead->id);

        $this->assertEquals(0, $lead->fresh()->active);
        $this->assertEquals(2, count(Lead::where('active', 0)->get()));
    }

    /** @test */
    public function a_lead_can_be_unarchived()
    {
        $this->patch($this->archivedLead->path(), [
            'active' => 1
        ])->assertSuccessful();

        $lead = Lead::find($this->archivedLead->id);

        $this->assertEquals(1, $lead->fresh()->active);
        $this->assertEquals(2, count(Lead::where('active', 1)->get()));

    }

    /** @test */
    public function a_lead_can_be_marked_as_important()
    {
        $this->patch($this->activeLead->path(), [
            'important' => 1
        ])->assertSuccessful();

        $this->assertDatabaseHas('leads', [
            'id' => $this->activeLead->id,
            'important' => 1
        ]);
    }

    /** @test */
    public function an_important_lead_can_be_changed_to_a_normal_lead()
    {
        $importantLead = create('App\Lead', [
            'important' => 1
        ]);

        $this->assertEquals(1, Lead::where('important', 1)->count());

        $this->patch($importantLead->path(), [
            'important' => 0
        ]);

        $this->assertEquals(0, Lead::where('important', 1)->count());
    }
}
