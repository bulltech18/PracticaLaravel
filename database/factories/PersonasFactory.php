<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Personas;
use Faker\Generator as Faker;

$factory->define(Personas::class, function (Faker $faker) {
    return [
         'nombre'=>$faker->name,
         'apellido'=>$faker->lastname,
         'edad'=>rand(15,40),
         'sexo'=>$faker->randomElement(['M','F']),
    ];
});
