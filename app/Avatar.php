<?php

namespace App;

use App\User;
use App\Avatar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Avatar extends Model
{
    protected $guarded = [];

    public function realtor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function deleteIfExists()
    {
        $avatar = Avatar::where('user_id', 1)->exists() ? Avatar::first() : null;
        if ($avatar) {
            Storage::disk('public')->delete($avatar->path);
            $avatar->delete();
        }
    }

    public static function upload($file)
    {
        $path = Storage::disk('public')->put('avatar', $file);
        $user = User::realtor();

        $avatar = Avatar::create([
            'user_id' => $user->id,
            'path'    => $path
        ]);

        return $path;
    }
}
