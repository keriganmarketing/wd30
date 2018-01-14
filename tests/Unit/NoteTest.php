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
        $note = create('App\Note');

        self::assertInstanceOf(Lead::class, $note->lead);
    }
}
