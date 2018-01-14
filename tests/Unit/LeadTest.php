<?php

namespace Tests\Unit;

use App\Lead;
use App\Note;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LeadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_lead_has_many_notes()
    {
        create(Note::class);

        $lead = Lead::with('notes')->first();

        self::assertInstanceOf(Note::class, $lead->notes[0]);
    }
}
