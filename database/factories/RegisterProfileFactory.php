<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RegisterProfile;
use Faker\Generator as Faker;

$factory->define(RegisterProfile::class, function (Faker $faker) {
    return [
        'volunteer_user_id'=>\App\Volunteer::all()->random()->user_id,
        'activity_id'=>\App\ActivityDetail::all()->random()->id,
        'register_date'=>$faker->date('Y-m-d'),
        'introduction'=>$faker->text(500),
        'interest'=>$faker->text(500),
        'isAccept' =>$faker->boolean
    ];
});
