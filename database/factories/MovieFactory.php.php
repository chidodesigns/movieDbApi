<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        "title" => $faker->firstName(),
        "director" => $faker->firstName(),
        "writers" => $faker->firstName(),
        "stars" => $faker->firstName(),
        "synopsis" => $faker->sentence(5),
        "storyline" => $faker->sentence(20)
    ];
});