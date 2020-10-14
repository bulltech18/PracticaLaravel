<?php

use Illuminate\Database\Seeder;
use App\Publicaciones;

class PublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Publicaciones::class,30)->create();
    }
}
