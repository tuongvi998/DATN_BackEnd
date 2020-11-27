<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'volunteer_id' =>\App\Volunteer::all()->random()->id,
        'activity_id' => \App\ActivityDetail::all()->random()->id,
        'introduction' => $faker->text(1000),
        'register_date' => $faker->date('Y-m-d'),
        'interest' => $faker->text(500)
    ];
});
