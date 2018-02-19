<?php

namespace App;

use App\User;
use App\MetaData;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    protected $table = 'meta_data';
    protected $fillable = ['title', 'description'];

    protected function getOrCreate()
    {
        $user = User::realtor();
        return MetaData::first() ?? MetaData::create([
            'title' => $user->company . ' | ' . $user->name,
            'description' => 'Combining experience, honesty, and state-of-the-art analytics, discover why '. $user->name .'  is the perfect Bay County realtor to help you find your new home.'
        ]);
    }
}
