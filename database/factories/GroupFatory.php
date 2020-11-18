<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()
            ->where('role_id','=',2)
            ->random()->id,
        'field_id' => \App\Field::all()->random()->id
    ];
});
