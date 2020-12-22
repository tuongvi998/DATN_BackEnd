<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RegisterProfile;
use Faker\Generator as Faker;

$factory->define(RegisterProfile::class, function (Faker $faker) {
    return [
        'volunteer_user_id'=>\App\Volunteer::all()->random()->user_id,
        'activity_id'=>\App\ActivityDetail::all()->random()->id,
        'register_date'=>$faker->dateTimeBetween('-450 days', '0 days'),
        'introduction'=>$faker->text(200),
        'experience' => $faker->text(200),
        'interest'=>$faker->text(200),
        'isAccept' =>$faker->boolean
    ];
});
