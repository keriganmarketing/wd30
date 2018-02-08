<?php

namespace Tests\Feature;

use App\Lead;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewNotesTest extends TestCase
{
    use RefreshDatabase;

    protected $lead;

    public function setUp()
    {
        parent::setUp();

        $this->lead = create(Lead::class);
    }

    /** @test */
    public function a_user_can_view_notes()
    {
        $note = create('App\Note', [
            'lead_id' => $this->lead->id
        ]);

        $this->get('/notes')
        ->assertSuccessful()
        ->assertJsonFragment([
            'message' => $note->message
        ]);
    }

    /** @test */
    public function a_user_can_view_notes_for_a_specific_lead()
    {
        $note = create('App\Note', [
            'lead_id' => $this->lead->id
        ]);

        $response = $this->get($note->lead->notesPath());
        $response->assertSuccessful();
        $response->assertJsonFragment([
            'message' => $note->message
        ]);
    }
}
