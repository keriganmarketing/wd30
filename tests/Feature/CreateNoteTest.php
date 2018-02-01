<?php

namespace Tests\Feature;

use App\Note;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lead;

class CreateNoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_note()
    {
        $note = make('App\Note');
        $lead = create('App\Lead');

        $attributes = [
            'lead_id' => $lead->id,
            'message' => $note->message
        ];

        $response = $this->post('/notes', $attributes);
        $response->assertSuccessful();

        $this->get('/notes')
            ->assertSuccessful()
            ->assertJson([
                [
                    'lead_id' => $lead->id,
                    'message' => $note->message
                ]
            ]);
    }
}
