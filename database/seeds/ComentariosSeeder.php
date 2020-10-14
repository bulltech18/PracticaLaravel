<?php

use Illuminate\Database\Seeder;
use App\Comentarios;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comentarios::class,40)->create();
    }
}
