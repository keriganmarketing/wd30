<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $guarded = [];

    public function deletePhoto()
    {
        if (Storage::disk('public')->exists($this->featured_photo_path)){
            Storage::disk('public')->delete($this->featured_photo_path);
        }
    }
}
