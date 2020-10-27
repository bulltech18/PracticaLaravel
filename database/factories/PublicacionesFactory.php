<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publicaciones;
use Faker\Generator as Faker;

$factory->define(Publicaciones::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->text(10),
        'cuerpo'=>$faker->text(50),
        'usuario_id'=>$faker->numberbetween(1,10),

        
    ];
});
