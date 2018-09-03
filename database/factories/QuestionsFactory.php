<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Question::class, function (Faker $faker) {
    return [
       'questionvalue' => $faker->text,
       'weight' => rand(1,5),
    ];
});
