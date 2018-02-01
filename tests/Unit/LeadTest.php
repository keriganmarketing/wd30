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
        $lead = create(Lead::class);
        create(Note::class, [
            'lead_id' => $lead->id
        ]);

        $lead = Lead::with('notes')->first();

        self::assertInstanceOf(Note::class, $lead->notes[0]);
    }
}
