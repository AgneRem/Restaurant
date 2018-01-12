<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Menu::class, function (Faker $faker) {


    return [
        'title' => $faker->word,
    ];
});
$factory->define(App\Dish::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'description' => $faker->paragraph,
        'price' => 5,
        'photo' => 'picture.jpg',
        'menu_id' => App\Menu::all()->random()->id,
    ];
});
