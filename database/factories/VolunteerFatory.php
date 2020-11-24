<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Volunteer;
use Faker\Generator as Faker;

$factory->define(Volunteer::class, function (Faker $faker) {
    return [
        'user_id' => $faker->unique()->randomElement(\App\User::all()->where('role_id','=',3)->pluck('id')->toArray()),
        'avatar' => $faker->imageUrl($width = 640, $height = 480),
        'address' => $faker->address,
        'gender' =>$faker->boolean,
        'phone' =>$faker->phoneNumber,
        'birthday' =>$faker->date('Y-m-d')
    ];
});
