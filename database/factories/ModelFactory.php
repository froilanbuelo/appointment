<?php

use Carbon\Carbon;

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
    $name = $faker->name;
    return [
        'name' => $name,
        'username' => str_slug($name),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    $name = $faker->sentence;
    $duration_hours = $faker->randomElement($array = array (0,1,2));
    $arr =  [
        'name' => $name,
        'location' => $faker->streetAddress,
        'description' => $faker->text($maxNbChars = 200),
        'link' => str_slug($name),
        'maximum_invitee' => $faker->numberBetween($min = 1, $max = 50),
        'color' => $faker->hexcolor,
        'is_active' => $faker->numberBetween($min = 0, $max = 1),
        'user_id' => App\User::all()->random()->id,
        'duration_hours' => $duration_hours,
    ];
    if ($duration_hours == 0){
        $arr ['duration_minutes'] = $faker->randomElement($array = array (15,30,45));
    }else{
        $arr ['duration_minutes'] = $faker->randomElement($array = array (0,15,30,45));
    }
    return $arr;
});

$factory->define(App\Availability::class, function (Faker\Generator $faker) {
    $availability_type = $faker->randomElement($array = array ('D','R','I'));
    $arr =  [
        'availability_type' => $availability_type,
        'increment_of' => $faker->randomElement($array = array (15,30,60)),
        'maximum_events_per_day' => $faker->numberBetween($min = 1, $max = 10),
        'maximum_scheduling_notice' => $faker->numberBetween($min = 4, $max = 24),
        'buffer_before' => $faker->randomElement($array = array (15,30,60)),
        'buffer_after' => $faker->randomElement($array = array (15,30,60)),
        'is_secret' => $faker->boolean($chanceOfGettingTrue = 10),
        // 'event_id' => App\Event::all()->random()->id,
    ];
    if ($availability_type == 'D'){
        $arr ['rolling_days'] = $faker->numberBetween($min = 1, $max = 60);
    }else if ($availability_type == 'R'){
        $startDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addDays($faker->numberBetween($min = 1, $max = 60));
        $arr ['date_range_start'] = $startDate->toDateString();
        $arr ['date_range_end'] = $endDate->toDateString();
    }
    return $arr;
});
