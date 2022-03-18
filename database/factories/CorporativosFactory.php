<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Corporativos;
use Faker\Generator as Faker;

$factory->define(Corporativos::class, function (Faker $faker) {
    return [
        'S_NombreCorto' => $faker->companySuffix,
        'S_NombreCompleto' => $faker->company,
        'S_LogoUrl' => $faker->safeEmailDomain,
        'S_DBName' => $faker->word,
        'S_DBUsuario' => $faker->unique()->userName,
        'S_DBPassword' => $faker->password,
        'S_SystemUrl' => $faker->url,
        'S_Activo' => 1,
        'D_FechaIncorporacion' => $faker->date,
        'tw_usuarios_id' => $faker->unique()->numberBetween(1, App\User::count()),
    ];
});
