<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentarios;
use Faker\Generator as Faker;

$factory->define(Comentarios::class, function (Faker $faker) {
    return [
        'cuerpo'=>$faker->text(50),
        'publicacion_id'=>$faker->numberbetween(1,30),
        'persona_id'=>$faker->numberbetween(1,10),
    ];
});
