<?php

namespace App;

use App\Lead;
use App\Note;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public static function forLead($id)
    {
        return Note::where('lead_id', $id)->get();
    }
}
