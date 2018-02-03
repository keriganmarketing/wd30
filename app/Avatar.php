<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $guarded = [];

    public function realtor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
