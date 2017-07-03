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

use Illuminate\Support\Str;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'fullname' => $name = $faker->name,
        'username' => $username = Str::slug(Str::lower($name), '.'),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt($name),
        'avatar' => 'no-image.png',
        'type' => 'member',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->text(30),
        'slug' => Str::slug($title),
        'description' => $faker->paragraph,
        'active' => rand(0, 1),
        'position' => rand(1, 50),
        'parent_id' => 0,
    ];
});

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->text(10),
        'slug' => Str::slug($title),
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->text(50),
        'slug' => Str::slug($title),
        'summary' => $faker->paragraph,
        'content' => $faker->text(500),
        'active' => rand(0, 1),
        'is_trending' => rand(0, 1),
    ];
});
