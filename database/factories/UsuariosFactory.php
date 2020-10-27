<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuarios;
use Faker\Generator as Faker;

$factory->define(Usuarios::class, function (Faker $faker) {
    return [
        'username'=>$faker->name,
        'email'=>$faker->unique()->safeEmail(),
        'password'=>$faker->password(1,10),
        'persona_id'=>$faker->numberBetween(1,10),
        'rol_id'=>$faker->numberBetween(1,2),
        'email_verified_at'=>now()
    ];
});
