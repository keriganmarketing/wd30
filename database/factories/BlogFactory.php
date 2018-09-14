<?php

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(App\Blog::class, function (Faker $faker) {
    $image = UploadedFile::fake()->image('featured_photo.jpg');
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'file' => $image
    ];
});
