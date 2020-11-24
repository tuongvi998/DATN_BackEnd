<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ActivityDetail;
use Faker\Generator as Faker;

$factory->define(ActivityDetail::class, function (Faker $faker) {
    return [
        'group_id' => \App\Group::all()->random()->id,
        'title' => $faker->title,
        'close_date' => $faker->date('Y-m-d'),
        'start_date' => $faker->date('Y-m-d'),
        'end_date' => $faker->date('Y-m-d'),
        'address' =>$faker->address,
        'content' => $faker->text(1000),
        'image' =>$faker->imageUrl(500,300),
        'max_register' => $faker->numberBetween(10,100),
        'min_register' => $faker->numberBetween(10,100),
        'donate' => $faker->numberBetween(5,10000000),
        'cost' => $faker->numberBetween(5,10000000),
    ];
});
