<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MlsNumber extends Model
{
    protected $fillable = [
        'mls_id'
    ];

    protected $table = 'mls_numbers';

    public function realtor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
