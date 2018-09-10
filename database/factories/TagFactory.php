<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tag::class, function (Faker $faker) {
    return [
        'type' => ((rand(1,2) == 1)?"positive":"negative" )
    ];
});
