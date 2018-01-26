<?php

use App\FeaturedProperty;
use Faker\Generator as Faker;

$factory->define(FeaturedProperty::class, function (Faker $faker) {
    return [
        'mls_id' => '666843'
    ];
});
