<?php

use Illuminate\Database\Seeder;
use App\Personas;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Personas::class,10)->create();

    }
}
