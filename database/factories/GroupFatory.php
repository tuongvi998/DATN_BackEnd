<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'user_id' => $faker->unique()->randomElement(\App\User::all()
            ->where('role_id','=',2)->pluck('id')->toArray()),
//        'field_id' => \App\Field::all()->random()->id,
        'address' =>$faker->address(),
        'field_id' => 2,
        'phone' => $faker->phoneNumber(),
        'founded_year' =>$faker->dateTimeBetween('-5years','-1years')
    ];
});
