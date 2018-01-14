<?php

namespace Tests\Feature;

use App\Note;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateNoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_note()
    {
        $note = make('App\Note');

        $response = $this->post('/notes', $note->toArray());
        $response->assertSuccessful();

        $this->get('/notes')
            ->assertSuccessful()
            ->assertJsonFragment([
                'message' => $note->message
            ]);

    }

}
