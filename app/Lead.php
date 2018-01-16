<?php

namespace App;

use App\Note;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $guarded = [];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function path()
    {
        return '/leads/'. $this->id;
    }

    public function notesPath()
    {
        return $this->path() . '/notes';
    }
}