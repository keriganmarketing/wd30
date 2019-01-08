<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function ($instance) {
            $instance->slug = str_slug($instance->title);
        });
    }

    public function deletePhoto()
    {
        if (Storage::disk('public')->exists($this->featured_photo_path)){
            Storage::disk('public')->delete($this->featured_photo_path);
        }
    }

    public function metaDescription()
    {
        $string = trim($this->body);

        if (strlen($string) > 300) {
            $string = wordwrap($string, 300, '!!@#$%^&*(()');
            $string = explode('!!@#$%^&*(()', $string, 2);
            $string = $string[0] . '...';
        }

        return strip_tags($string);
    }
}
