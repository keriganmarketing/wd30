<?php

namespace Tests\Unit;

use App\Lead;
use App\Note;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_note_belongs_to_a_lead()
    {
        $lead = create(Lead::class);
        $note = create('App\Note', [
            'lead_id' => $lead->id
        ]);

        self::assertInstanceOf(Lead::class, $note->lead);
    }
}
