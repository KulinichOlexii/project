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

$factory->define(App\Fuel::class, function (Faker\Generator $faker) {
    return [
        'name_ru' => $faker->name,
        'name_ua' => $faker->name,
        'title_ru' => $faker->name,
        'title_ua' => $faker->name,
        'text_ru' => str_random(50),
        'text_ua' => str_random(50),
        'price' => str_random(50),
        'active' => '1',
    ];
});
