<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'lead_id' => factory('App\Lead')->create()->id,
        'message' => $faker->paragraph
    ];
});
