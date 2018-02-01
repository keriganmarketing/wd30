<?php

use App\Lead;
use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leads = Lead::all();

        foreach ($leads as $lead) {
            factory(App\Note::class, 10)->create([
                'lead_id' => $lead->id
            ]);
        }
    }
}
