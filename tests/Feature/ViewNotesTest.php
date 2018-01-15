<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewNotesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_notes()
    {
        $note = create('App\Note');

        $this->get('/notes')
        ->assertSuccessful()
        ->assertJsonFragment([
            'message' => $note->message
        ]);
    }

    /** @test */
    public function a_user_can_view_notes_for_a_specific_lead()
    {
        $note = create('App\Note');

        $response = $this->get($note->lead->notesPath());
        $response->assertSuccessful();
        $response->assertJsonFragment([
            'message' => $note->message
        ]);
    }
}
