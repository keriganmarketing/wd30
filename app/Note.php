<?php

namespace App;

use App\Lead;
use App\Note;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Note extends Model
{
    protected $guarded = [];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public static function forLead($id)
    {
        $notes = Note::where('lead_id', $id)->orderBy('updated_at', 'DESC')->get()->map(function ($note) {
            $note->diff = Carbon::parse($note->updated_at)->diffForHumans();
            return $note;
        });

        return $notes;
    }


}
