<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'user_id' => $faker->unique()->randomElement(\App\User::all()
            ->where('role_id','=',1)->pluck('id')->toArray())
    ];
});
