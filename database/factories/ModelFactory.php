<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'location' => $faker->streetAddress,
        'description' => $faker->text($maxNbChars = 200),
        'link' => $faker->slug,
        'maximum_invitee' => $faker->numberBetween($min = 1, $max = 50),
        'color' => $faker->hexcolor,
        'is_active' => $faker->numberBetween($min = 0, $max = 1),
        'user_id' => App\User::all()->random()->id,
    ];
});
