<?php

namespace App;

use App\Lead;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}
