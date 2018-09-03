<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Answer::class, function (Faker $faker) {
    return [
        'answervalue' => $faker->sentence(6, true),
    ];
});
