<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'S_Nombre' => $faker->firstName,
        'S_Apellidos' => $faker->lastName,
        'S_FotoPerfilUrl' => $faker->safeEmailDomain,
        'S_Activo' => '1',
        'password' => bcrypt('12345'), // password
        'verification_token' => $faker->sha256,
        'verified' => Str::random(10),
        
    ];
});
